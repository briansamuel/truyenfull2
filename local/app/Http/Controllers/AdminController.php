<?php

namespace App\Http\Controllers;
use DB;
use App\Stories;
use App\Terms;
use App\Libraries\simplet;
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
    public function test_get()
    {
        include_once(app_path() . '\Libraries\simple_html_dom.php');
        $html = $this->CurlHTML();
        $html = str_get_html($html);
        $elements = $html->find('h3.title');
        foreach ($elements as $element) {
            echo $element->innertext;
        }

    }
    public function CurlHTML()
    {
        $c = curl_init('http://truyenfull.vn/nga-duc-phong-thien/trang-2');
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_USERAGENT, "booyah!");
        curl_setopt($c, CURLOPT_HEADER, 0);
        curl_setopt($c,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
        //curl_setopt(... other options you want...)
        $html = curl_exec($c);
        if(curl_exec($c) === false)
        {
            echo 'Curl error: ' . curl_error($c);
        }
        else
        {
            return $html;
        }
        // Get the status code
        
        curl_close($c);
    }
}
