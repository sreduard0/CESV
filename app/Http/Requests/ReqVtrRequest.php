<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReqVtrRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'rank' => 'required | max:7',
            'name' => 'required | max:255',
            'mission' => 'required | max:255',
            'destiny' => 'required | max:255',
            'date_part' => 'required',
            'contact' => 'required| max:17',
            'qtd_mil' => 'required',
        ];
    }
}
