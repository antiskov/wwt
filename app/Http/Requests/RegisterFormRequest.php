<?php

namespace App\Http\Requests;

use App\DataObjects\RegisterUser;
use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'referrer'=>'string',
            'email'=>'required|unique:users',
            'password'=>'required|min:8',
            'data-protection' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.unique:users' => 'A email must be unique',
        ];
    }

    public function getDto(): RegisterUser
    {
        return new RegisterUser(
            $this
        );
    }
}
