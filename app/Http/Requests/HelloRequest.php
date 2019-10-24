<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
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
            //
                'name'=>'required',
                'species'=>'required|string',
                'height'=>'required|numeric',
                'weight'=>'required|numeric'
        ];
    }
    public function messages(){
        return[
            'name.required'=>'名前は必ず入力してください',
            'species.required'=>'分類は必ず入力してください',
            'species.string'=>'文字列で入力してください',
            'height.required'=>'高さは必ず入力してください',
            'height.numeric'=>'数字で入力してください',
            'weight.required'=>'体重は必ず入力してください',
            'weight.numeric'=>'数字で入力してください'
        ];
    }
}
