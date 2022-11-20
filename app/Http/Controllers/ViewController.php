<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FichaModel;
use App\Models\MissionModel;
use App\Models\MotModel;
use App\Models\VtrModel;

class ViewController extends Controller
{
    public function home()
    {
        switch (session('CESV')['profileType']) {
            case 0:
            case 2:
                $data = [
                    'motoristas' => MotModel::where('val_cnh', '>', date('Y-m-d'))->get(),
                    'fichas' => FichaModel::where('status', 1)->get(),
                ];

                return view('home-gda-adj', $data);
                break;
            case 1:
            case 3:
            case 4:
                $data = [
                    'viaturas' => VtrModel::where('status', 1)->orderBy('nr_vtr', 'asc')->get(),
                ];
                return view('home-gest', $data);
                break;
            case 5:
                $data = [
                    // 'viaturas' => VtrModel::where('status', 1)->orderBy('nr_vtr', 'asc')->get(),
                ];
                return view('home-admin', $data);
                break;
        }
    }

    public function fichas()
    {
        $data = [
            'viaturas' => VtrModel::where('status', 1)->get(),
            'missions' => MissionModel::where('status', 1)->get(),
            'motoristas' => MotModel::where('val_cnh', '>', date('Y-m-d'))->get(),

        ];
        return view('ficha-list', $data);
    }
    public function viatura()
    {
        return view('vtr-list');
    }

    public function drivers()
    {
        return view('mot-list');
    }

    public function reports()
    {
        $data = [
            'viaturas' => VtrModel::withTrashed()->get(),
            'fichas' => FichaModel::where('status', 1)->get(),

        ];

        return view('reports', $data);
    }
    public function missions()
    {
        $data = [
            'fichas' => FichaModel::where('status', 1)->get(),
        ];

        return view('home-gest', $data);
    }
}
