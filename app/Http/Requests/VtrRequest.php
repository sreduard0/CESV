<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VtrRequest extends FormRequest
{

    public function authorize()
    {
        if (session('CESV')['profileType'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return [
            'nrVtr' => 'required | max:4',
            'typeVtr' => 'required | max:3',
            'modVtr' => 'required | max:255',
            'tonVtr' => 'required | max:10',
            'volVtr' => 'required | max:10',
            'ebPlacaVtr' => 'required| max:20',
            'statusVtr' => 'required',
        ];
    }
}
