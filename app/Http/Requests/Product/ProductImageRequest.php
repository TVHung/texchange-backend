<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
            'product_id' => 'required',
            'is_banner' => 'required|in:0,1',
            'image_url' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // required
            'product_id.required' => 'Trường này là bắt buộc',
            'is_banner.required' => 'Trường này là bắt buộc',
            'image_url.required' => 'Trường này là bắt buộc',
        ];
    }
}
