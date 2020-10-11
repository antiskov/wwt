<?php

namespace App\Http\Requests\Admin;

use App\DataObjects\Admin\CreateUser;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserFormRequest extends FormRequest
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
            'email'=>'required|unique:users',
            'name'=>'string',
            'surname'=>'string',
            'role'=>'required|numeric',
            'password'=>'required|min:6|string'
        ];
    }
    public function getDto(): CreateUser
    {
        return new CreateUser(
            $this
        );
    }

}
