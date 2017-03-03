<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckTermRequest extends FormRequest
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
                  'term_name' => 'required|min:6|unique:terms,term_name', // field name bắt buộc nhập và phải có tổi thiểu 6 ký tự
                  'term_parent' => 'required', // field author bắt buộc nhập
                  'term_keyword' => 'required',
                  'term_description' => 'required|min:20',
                  ];
        }
        
        public function messages()
        {
            return [
                'term_name.required' => 'Bạn chưa điền tên Danh Mục',
                'term_name.min' => 'Danh mục phải trên 6 ký tự',
                'term_name.unique' => 'Danh mục đã tồn tại',
                'term_keyword.required' => 'Vui lòng điền vào Meta Keyword',
                'term_description.required' => 'Vui lòng điền vào mô tả Danh mục',
                'term_description.min' => 'Mô tả danh mục phải trên 20 ký tự',
                'term_type.parent' => 'Bạn phải chọn danh mục có sẵn hoặc để trống',
            ];
        }
}
