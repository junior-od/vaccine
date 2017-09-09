<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'child_first_name' => 'required',
            'child_last_name' => 'required',
            'child_age' => 'required|numeric|valid_age',
            'guardian_first_name' => 'required',
            'guardian_last_name' => 'required',
            'contact_phone' => 'required|numeric',
            'address' => 'required',
            'vaccine_name' => 'required',
            //'reported_by' => 'required|numeric',
            'sex' => 'required',
        ];
    }
}
