<?php

namespace App\Http\Requests\Submitting;

use Illuminate\Foundation\Http\FormRequest;

class WatchAdvertRequest extends FormRequest
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
            'model_code' => 'required|max:200',
            "watchType"=> 'required|max:200',
            "brand"=> 'required|max:200',
            "model"=> 'required|max:200',
            "state"=> 'required|max:200',
            "deliveryVolume"=> 'required|max:200',
            "sex"=> 'required|max:200',
            "typeMechanism"=> 'required|max:200',
            "currency"=> 'max:200',
            "surname"=> 'max:200',
            "name"=> 'max:200',
            "phone"=> 'max:200',
            "street"=> 'max:200',
            "street_addition"=> 'max:200',
            "zip_code"=> 'max:200',
            "city"=> 'max:200',
            "country"=> 'max:200',
            "region"=> 'max:200',
            "lat"=> 'max:200',
            "lng"=> 'max:200',
            "description"=> 'max:3000',
            "price"=> 'numeric',
            "width"=> 'numeric',
            "height"=> 'numeric',
        ];
    }
}
