<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotRequest extends FormRequest
{

    public function authorize()
    {
        if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 6) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pgMot' => 'required',
            'nameMot' => 'required | max:255',
            'catMot' => 'required',
            'fullNameMot' => 'required | max:255',
            'contactMot' => 'required',
            'cnhMot' => 'required',
            'ValCnhMot' => 'required',
            'idtMot' => 'required',
        ];
    }
}
