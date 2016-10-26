<?php

namespace inbloom\Http\Requests\Product\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class InsertModifyProductRequest extends FormRequest
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
          'txtCodeProduct'=>'min:3|max:20',
          'txtCodeUpc'=>'min:3|max:20',
          'txtState'=>'min:3',
          'txtNameProduct'=>'min:3|max:100',
          'txtOnlineName'=>'min:3|max:100',
      ];
    }

    public function messages(){
      return  [
        'txtCodeProduct.min'=> 'Longitud no valida',
      ];
    }
}
