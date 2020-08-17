<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    private $index_seo;

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
            'title' => 'required',
            'slug' => 'required|unique:slugs,slug,'.$this->slugs['id'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Vui lòng nhập tiêu đề danh mục',
            'slug.required'=>'Vui lòng nhập slug danh mục',
            'slug.unique'=>'Slug đã tồn tại'
        ];
    }
}
