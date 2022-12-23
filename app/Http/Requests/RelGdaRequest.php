<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelGdaRequest extends FormRequest
{
    public function authorize()
    {
        if (session('CESV')['profileType'] == 0 || session('CESV')['profileType'] == 2 || session('CESV')['profileType'] == 6) {
            return true;
        } else {
            return false;
        }

    }

    public function rules()
    {
        return [];
    }
}
