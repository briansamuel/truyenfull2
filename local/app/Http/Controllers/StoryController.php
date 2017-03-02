<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stories;
use App\Http\Requests\CheckStoryRequest;
class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckStoryRequest $request)
    {
        //
        $dulieu_tu_input = $request->all();
        //Gọi model Stories.php đã được tạo ra ở các bài trước
        $stories = new Stories;
        $stories->story_title = $dulieu_tu_input['story_title'];
        $stories->story_excerpt = $dulieu_tu_input['story_excerpt'];
        $stories->story_keyword = $dulieu_tu_input['story_keyword'];
        $stories->story_author = $dulieu_tu_input['story_author'];
        $stories->story_thumbnail = $dulieu_tu_input['story_thumbnail'];
        $stories->story_slug = str_slug($dulieu_tu_input['story_title']);
        $stories->save();
        return redirect('admin/story');
        
        //var_dump('Hello');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function AjaxListStory(Request $request)
    {   
         $stories = new Stories;
        if($request->has('term'))
        {
            $term = $request->input('term');
            $term = '%'.$term.'%';
            $all = $stories::orderBy('story_title')->select('id','story_title')->where('story_title', 'like', $term)->get();
            return array('items' => $all);
            
        }
        else
        {
            $all = $stories::orderBy('story_title')->select('id','story_title')->get();
            return array('items' => $all);
        }
        
    }
    
}
