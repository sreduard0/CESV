<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'id' => 'required',
            'dateFinish' => 'required',
            'kiloGram' => 'required',
            'metersCub' => 'required',
            'consGas' => 'required',
            'consDiesel' => 'required',
            'altMission' => 'required',
            'sendReport' => 'required',
        ];
    }
}
