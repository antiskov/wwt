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
            'email' => 'required|email',
            'name' => 'max:20',
            'surname' => 'max:20',
            'country' => 'max:30',
            'region' => 'max:30',
            'city' => 'max:30',
            'street' => 'max:60',
            'specialisation' => 'max:50',
            'timezone_id' => 'max:22',
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
