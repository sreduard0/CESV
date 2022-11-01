<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionRequest extends FormRequest
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

     public function rules()
    {
        return
            [
                'typeMission' => 'required | max:2',
                'nameMission' => 'required | max:255',
                'destinyMission' => 'required | max:255',
                'classMission' => 'required | max:8',
                'vtrMission' => 'required',
                'docMission' => 'required | max:255',
                'originMission' => 'required | max:255',
                'pgMotMission' => 'required',
                'nameMotMission' => 'required | max:255',
                'pgSegMission' => 'required',
                'nameSegMission' => 'required | max:255',
                'datePrevPartMission' => 'required',
                'datePrevChgdMission' => 'required',
                'contactCmtMission' => 'required',
            ];

    }
}