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
            else if($_GET['action'] == 'editstory')
            {
                if(isset($_GET['story_id']))
                {
                     return $this->editstory($_GET['story_id']);
                }
               
            }
               
        }
        else
        {
            return $this->liststories();
        }
        
    }
    public function chaptersAction()
    {
        if(isset($_GET['action']))
        {
            
            if($_GET['action'] == 'allchapter')
            {
                return $this->listschapters();
            }
            else if($_GET['action'] == 'addchapter')
            {
                return view('admin/chapter/addchapter');
            }
            else if($_GET['action'] == 'editchapter')
            {
                if(isset($_GET['chapter_id']))
                {
                     return $this->editchapter($_GET['chapter_id']);
                }
               
            }
               
        }
        else
        {
            return $this->listchapters();
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
                <td><a href="admin/story?action=editstory&story_id='.$story->id.'">'.$story->story_title.'</a></td>
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
    public function editstory($id)
    {
        $html = Terms::AllCategoriesHTML();
        $story = Stories::getStorybyId($id)->first();
        $data = array(
            'story'  => $story,
            'html'   => $html,
        );

        return view('admin/story/editstory')->with($data);
    }

    public function test()
    {
        $url = "http://theonlytutorials.com/wp-content/uploads/2015/06/blog-logo1.png";
        $name = basename($url);
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] ."/truyenfull/upload/images/Thumbnail/$name";
        $upload = file_put_contents($uploadfile,file_get_contents($url));
        //check success
        if($upload)
            echo "Success: <a href='upload/".$name."' target='_blank'>Check Uploaded</a>"; 
        else "please check your folder permission";

    }
}
