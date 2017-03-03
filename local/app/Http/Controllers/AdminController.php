<?php

namespace App\Http\Controllers;
use DB;
use App\Stories;
use App\Terms;
use Illuminate\Http\Request;
use App\Http\Requests\CheckStoryRequest;
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
    
    public function categoriesAction()
    {
        if(isset($_GET['action']))
        {
            
            if($_GET['action'] == 'allstory')
            {
                return $this->liststories();
            }
            else if($_GET['action'] == 'addcategory')
            {
                $categories = Terms::orderBy('term_id', 'desc')->get();
                return  view('admin/term/addcategory')->with('categories',$categories);
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
                <td>'.$story->story_author.'</td>
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
        include_once(app_path() . '\Libraries\simple_html_dom.php');
        $url = 'http://truyenfull.vn/the-loai/tien-hiep/trang-3/';
        $html = $this->CurlHTML($url);
        $html = str_get_html($html);
        $elements = $html->find('.truyen-title a ');
        foreach ($elements as $element) {
            if(isset($element->href))
            {
                $html_story = $this->CurlHTML($element->href);
                $html_story = str_get_html($html_story);
                $title = "";
                $excerpt = "";
                $keywords = "";
                $author = "";
                $thumbnail = "";
                foreach ($html_story->find('h3.title') as $element)
                {

                    $title = $element->innertext;
                    if(isset($title))
                    {
                        break;
                    }
                }
                foreach ($html_story->find('meta[name=keywords]') as $element){
                    $keywords = $element->content;
                    if(isset($keywords))
                    {
                        break;
                    }

                }
                foreach ($html_story->find('.desc-text') as $element){
                    $excerpt = $element->plaintext;
                    if(isset($excerpt))
                    {
                        break;
                    }
                }
                foreach ($html_story->find('.info a[itemprop="author"]') as $element){
                    $author = $element->innertext;
                    if(isset($author))
                    {
                        break;
                    }
                }
                foreach ($html_story->find('.books img') as $element){

                    $thumbnail = $element->src;
                    if(isset($thumbnail))
                    {
                        break;
                    }
                }
                $story_title_exist = DB::table('stories')
                    ->where('story_title', '=', $title)
                    ->first();
                if (is_null($story_title_exist)) {
                    $this->AutoAddStory($title,$excerpt,$keywords,$author,$thumbnail);
                    // It does not exist - add to favorites button will show
                }
                else
                {
                    echo 'Trùng lặp với ID '.$story_title_exist->id;
                }
                
            }
            
        }

    }
    public function AutoAddStory($title,$excerpt,$keywords,$author,$thumbnail)
    {
        $stories = new Stories;
        $stories->story_title = $title;
        $stories->story_excerpt = $excerpt;
        $stories->story_keyword = $keywords;
        $stories->story_author = $author;

        $stories->story_thumbnail = $thumbnail;
        $stories->story_slug = str_slug($title);
        $result = $stories->save();
        if($result)
        {
            echo $title.' - Đăng thành công <br>';
        }
    }
    public function CurlHTML($url)
    {
        $c = curl_init($url);
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

    public function ajaxGetstory(Request $request)
    {
        include_once(app_path() . '\Libraries\simple_html_dom.php');
        $data = $request->all(); // This will get all the request data.
        $url = $data['url'];
        $html = $this->CurlHTML($url);
        $html = str_get_html($html);
        $story_array_url = array();
        $elements = $html->find('.truyen-title a ');
        foreach ($elements as $element)
            array_push($story_array_url, $element->href);
        echo json_encode($story_array_url);
    }
    public function ajaxAddstory(Request $request)
    {   
        include_once(app_path() . '\Libraries\simple_html_dom.php');
        $data = $request->all(); // This will get all the request data.
        $url = $data['url'];
        $html_story = $this->CurlHTML($url);
        $html_story = str_get_html($html_story);
        $title = "";
        $excerpt = "";
        $keywords = "";
        $author = "";
        $thumbnail = "";
        foreach($html_story->find('h3.title') as $element) {

            $title = $element->innertext;
            if (isset($title)) {
                break;
            }
        }
        foreach($html_story->find('meta[name=keywords]') as $element) {
            $keywords = $element->content;
            if (isset($keywords)) {
                break;
            }

        }
        foreach($html_story->find('.desc-text') as $element) {
            $excerpt = $element->plaintext;
            if (isset($excerpt)) {
                break;
            }
        }
        foreach($html_story->find('.info a[itemprop="author"]') as $element) {
            $author = $element->innertext;
            if (isset($author)) {
                break;
            }
        }
        foreach($html_story->find('.books img') as $element) {

            $thumbnail = $element->src;
            if (isset($thumbnail)) {
                break;
            }
        }
        $story_title_exist = DB::table('stories')->where('story_title', '=', $title)->first();
        if (is_null($story_title_exist)) {
            $thumbnail = $this->creatThumbbyUrl($thumbnail);
            $this->AutoAddStory($title, $excerpt, $keywords, $author, $thumbnail);
            // It does not exist - add to favorites button will show
        } else {
            echo 'Trùng lặp với ID '.$story_title_exist->id.'<br>';
        }
            
    }
    public function creatThumbbyUrl($url)
    {
        $name = basename($url);
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] ."/truyenfull/upload/images/Thumbnail/$name";
        $upload = file_put_contents($uploadfile,file_get_contents($url));
        if($upload)
        {
            return 'http://localhost/truyenfull/upload/images/Thumbnail/'.$name;
        }
        else
        {
            return false;
        }
    }
    public function test_get_image()
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
