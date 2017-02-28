<?php

namespace App\Http\Controllers;
use DB;
use App\Stories;
use App\Terms;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/content');
    }
    public function storiesAction()
    {
        if(isset($_GET['action']))
        {
            
            if($_GET['action'] == 'allstory')
            {
                return $this->liststories();
            }
            else if($_GET['action'] == 'addstory')
            {
                return $this->addstory();
            }
               
        }
        else
        {
            return $this->liststories();
        }
        
    }
    public function liststories()
    {
        $html = '';
        $stories = Stories::orderBy('created_at', 'desc')->get();
        foreach ($stories as $story) {
            //$categoriesHTML = Categories::getCategoriesbyID($article->id);
            $html .= '<tr>
                <th>
                <input data-check="'.$story->id.'" type="checkbox" name="remember">
                </th>
                <td>'.$story->id.'</td>
                <td>'.$story->story_title.'</td>
                <td>'.$story->story_excerpt.'</td>
                <td></td>
                <td></td>
                <td>'.$story->created_at->format('d/m/Y').'</td>
                                  
             </tr>';
              
        }
        return view('admin/story/allstory')->with("articleshtml", $html);
    }

    public function addstory()
    {
        $html = Terms::AllCategoriesHTML();
        return view('admin/story/addstory')->with("html", $html);
    }
}
