<?php

namespace inbloom\Http\Requests\Product\Boxe;

use Illuminate\Foundation\Http\FormRequest;

class InsertModifyBoxeTypeRequest extends FormRequest
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
            'txtName'=>'required|min:2',
        ];
    }
}
