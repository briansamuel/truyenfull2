<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckStoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
                //thiết lập các rule cho form
              'story_title' => 'required|min:6|unique:stories,story_title', // field name bắt buộc nhập và phải có tổi thiểu 6 ký tự
              'story_excerpt' => 'required|min:20', // field author bắt buộc nhập
              'story_thumbnail' => 'required',
              ];
    }
    public function messages()
    {
        return [
            'story_title.required' => 'Bạn chưa điền tên truyện',
            'story_title.min' => 'Tên truyện phải trên 6 ký tự',
            'story_title.unique' => 'Tên truyện đã tồn tại',
            'story_excerpt.required' => 'Nội dung bài viết không được để trống',
            'story_excerpt.min' => 'Nội dung bài viết phải trên 20 ký tự',
            'story_thumbnail.required' => 'Không được để trống hình ảnh',
        ];
    }
}
