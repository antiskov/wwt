<?php

namespace App\Http\Requests\Admin;

use App\DataObjects\Admin\UpdateUser;
use Illuminate\Foundation\Http\FormRequest;

class UpdaeUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
        ];
    }
    public function getDto(): UpdateUser
    {
        \Log::info('before returning user DTO');
        return new UpdateUser(
            $this
        );
    }
}
