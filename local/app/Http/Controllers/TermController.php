<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;
use DB;
use App\Http\Requests\CheckTermRequest;
class TermController extends Controller
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
    public function store(Request $request)
    {
        //
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
    // Thêm Category Controller
    public function addcategory(CheckTermRequest $request)
    {
        $dulieu_tu_input = $request->all();
 
        //Gọi model Articles.php đã được tạo ra ở các bài trước
        $categories = new Terms;
 
        //Lấy thông tin từ các input đưa vào thuộc tính name, author
                //trong model Articles
        $categories->term_name = $dulieu_tu_input["term_name"];
        $categories->term_parent = $dulieu_tu_input["term_parent"];
        $categories->term_keyword = $dulieu_tu_input["term_keyword"];
        $categories->term_description = $dulieu_tu_input["term_description"];
        $categories->term_slug = str_slug($dulieu_tu_input["term_name"]);
        $categories->term_type = 'category';
        //Tiến hành lưu dữ liệu vào database
        $categories->save();
 
        //Sau khi đã lưu xong, tiến hành chuyển hướng tới route articles
                //hiển thị toàn bộ thông tin bảng articles trong database đã được tạo ở các bài trước
        return redirect('admin');
    }
    public function getCategoriesbyID($id)
    {
        $categories = new Categories;
        return $categories->getCategoriesbyID($id);
    }
}
