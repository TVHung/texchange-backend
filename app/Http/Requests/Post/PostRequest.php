<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => 'bail|required|string',
            'status' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'guarantee' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'address' => 'bail|required|string',
            'description' => 'bail|required|string',
            'price' => 'bail|required|regex:/^\d+(\.\d{1,2})?$/',
            'title' => 'bail|required|string',
        ];
    }

    public function messages()
    {
        return [
            // required
            'name.required' => config('apps.message.feild_require'),
            'status.required' => config('apps.message.feild_require'),
            'guarantee.required' => config('apps.message.feild_require'),
            'address.required' => config('apps.message.feild_require'),
            'description.required' => config('apps.message.feild_require'),
            'price.required' => config('apps.message.feild_require'),
            'title.required' => config('apps.message.feild_require'),
        ];
    }
}
