<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FichaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nrFicha' => 'required | max:5',
            'vtrFicha' => 'required',
            'missionFicha' => 'required',
            'inOrderFicha' => 'required | max:255',
            'pgMotFicha' => 'required',
            'nameMotFicha' => 'required | max:255',
            'natOfServFicha' => 'required | max:255',
        ];
    }
}