<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FichaModel;
use App\Models\MissionModel;
use App\Models\VtrModel;

class ViewController extends Controller
{
    public function home()
    {
        switch (session('CESV')['profileType']) {
            case 0:
            case 2:
                $data = [
                    'fichas' => FichaModel::where('status', 1)->get(),
                ];

                return view('home-gda-adj', $data);
                break;
            case 1:
                $data = [
                    'viaturas' => VtrModel::where('status', 1)->orderBy('nr_vtr', 'asc')->get(),
                ];
                return view('home-gest', $data);
                break;
        }
    }

    public function fichas()
    {
        $data = [
            'viaturas' => VtrModel::where('status', 1)->get(),
            'missions' => MissionModel::all(),

        ];
        return view('ficha-list', $data);
    }
    public function viatura()
    {
        return view('vtr-list');
    }
}
