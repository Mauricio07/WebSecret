<?php

namespace inbloom\Http\Requests\Product\Process;

use Illuminate\Foundation\Http\FormRequest;

class InsertModifyProcessRequest extends FormRequest
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
             'txtName'=>'required|min:3',
         ];
     }

     /*
     * Menssage
     */
     public function messages(){
       return [
         'txtName.required'=>'The name is required',
         'txtName.unique'=>'The name not duplicate',
       ];
     }
}