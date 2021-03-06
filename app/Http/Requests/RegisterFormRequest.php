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
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'referrer'=>'string',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'data-protection' => 'required'
        ];
    }

    public function messages(): array
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
