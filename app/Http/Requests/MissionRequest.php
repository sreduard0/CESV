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
        if (session('CESV')['profileType'] == 3 || session('CESV')['profileType'] == 4) {
            return true;
        } else {
            return false;
        }
    }

    public function rules()
    {
        return
            [
            'typeMission' => 'required | max:2',
            'nameMission' => 'required | max:255',
            'destinyMission' => 'required | max:255',
            'classMission' => 'required | max:5',
            'docMission' => 'required | max:255',
            'originMission' => 'required | max:255',
            'pgSegMission' => 'required',
            'nameSegMission' => 'required | max:255',
            'datePrevPartMission' => 'required',
            'datePrevChgdMission' => 'required',
            'contactCmtMission' => 'required',
        ];

    }
}
