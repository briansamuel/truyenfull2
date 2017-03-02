<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Stories extends Model
{
    //
    protected $table = 'stories';

    protected $fillable = [
        'story_title',
        'story_excerpt',
        'story_parent',
        'story_keyword',
       	
    ];
    public static function getStorybyId($id)
    {
    	$story = DB::table('stories')->where('id', $id)->get();
    	return $story;
    }

}
