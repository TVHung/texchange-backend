<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostTradeRequest extends FormRequest
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
            'post_id' => 'required|exists:posts',
            'category_id' => 'required|numeric|in:1,2,3',
            'name' => 'required|string|max:100',
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:255',
            'guarantee' => 'required|numeric|nullable',
        ];
    }
  
    public function messages()
    {
        return [
            // required
            'post_id.required' => 'Trường này là bắt buộc',
            'category_id.required' => 'Trường này là bắt buộc',
            'name.required' => 'Trường này là bắt buộc',
            'title.required' => 'Trường này là bắt buộc',
            'description.required' => 'Trường này là bắt buộc',

            //string
            'name.string' => 'Trường này phải là chuỗi',
            'title.string' => 'Trường này phải là chuỗi',
            'description.string' => 'Trường này phải là chuỗi',

            //number
            'category_id.numeric' => 'Trường này phải là 1 số',
            'guarantee.numeric' => 'Trường này phải là 1 số',
            
        ];
    }
}
