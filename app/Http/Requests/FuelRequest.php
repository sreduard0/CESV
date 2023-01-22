<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuelRequest extends FormRequest
{
    public function authorize()
    {
        if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 6) {
            return true;
        } else {
            return false;
        }

    }
    public function rules()
    {
        return [
            'id_ficha' => 'required',
            'od' => 'required',
            'destiny' => 'required',
        ];
    }

}
