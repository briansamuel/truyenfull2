<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    //
    protected $table = 'terms';

    protected $fillable = [
        
       	
    ];
    public $timestamps = false;
    public static function AllCategoriesHTML()
    {
        $html = '<ul id="listCategorieshmtl">';
        $categories = DB::table('terms')->where('term_type', 'category')->where('term_parent', 0)->get();
        foreach ($categories as $category) {
            $html .= '<li>
                    <label>
                    <input name="categories[]" type="checkbox" id="'.$category->term_id.'" value="'.$category->term_id.'" > '.$category->term_name.'
                    </label>';
            $subcategories = DB::table('terms')->where('term_type', 'category')->where('term_parent', $category->term_id)->get();
            $html .= '<ul id="sublistCategorieshmtl">';
            foreach ($subcategories as $subcategory) {
                $html .= '<li>
                        <label>
                        <input name="categories[]" type="checkbox" id="'.$subcategory->term_id.'" value="'.$category->id.'"> '.$subcategory->term_name.'
                        </label>';
                $subcategories = DB::table('term_taxonomy')->where('taxonomy', 'category')->where('parent', $category->term_id)->get();
                $html .= '</li>';
            }
            $html .= '</ul>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}
