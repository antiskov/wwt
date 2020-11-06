<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
//            'email' => 'email',
            'name' => 'min:2|max:20',
            'surname' => 'min:2|max:20',
//            'phone' => 'required|numeric|min:10',
//            'country' => 'required|min:2|regex:/^[a-zA-Z]+$/u|max:255',
//            'region' => 'required|min:2|regex:/^[a-zA-Z]+$/u|max:255',
//            'city' => 'required|min:2|regex:/^[a-zA-Z]+$/u|max:255',
//            'street' => 'required|min:2|regex:/^[a-zA-Z]+$/u|max:255',
//            'zip_code' => numeric,
//            'specialisation' => 'required|min:2|regex:/^[a-zA-Z]+$/u|max:255',
        ];
    }

    public function messages()
    {
        return [
            'email' => 'Please enter the data correctly.',
            'name' => 'Please enter the data correctly.',
            'surname' => 'Please enter the data correctly.',
            'phone' => 'Please enter the data correctly.',
            'country' => 'Please enter the data correctly.',
            'region' => 'Please enter the data correctly.',
            'city' => 'Please enter the data correctly.',
            'street' => 'Please enter the data correctly.',
            'specialisation' => 'Please enter the data correctly.',
        ];
    }
}
