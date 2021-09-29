<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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

            'prod_name' => 'required',
            'prod_price' => 'required',
            'prod_ctgy' => 'required',
            'prod_desc' => 'required',
            'prod_qty' => 'required',
            'image' => 'required|image',

        ];
    }

    public function messages()
    {
        return[
            'prod_name.required'=>'Insert Product Name',
        ];
    }
}
