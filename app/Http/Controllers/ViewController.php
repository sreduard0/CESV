<?php

namespace App\Http\Controllers;

use App\Classes\Tools;
use App\Http\Controllers\Controller;
use App\Models\FichaModel;
use App\Models\MissionModel;
use App\Models\MotModel;
use App\Models\VtrModel;

class ViewController extends Controller
{
    private $Tools;
    public function __construct()
    {
        $this->Tools = new Tools();
    }
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
                return view('home-admin');
                break;
        }
    }

    public function fichas()
    {
        $data = [
            'viaturas' => VtrModel::where('status', 1)->orWhere('status', 3)->get(),
            'missions' => MissionModel::where('status', '<=', 2)->get(),
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

    public function users()
    {
        return view('users');
    }

    public function login()
    {
        if (session()->has('user')) {
            return redirect()->route('home');
        }
        return view('form-login');
    }
    public function reportForm($id)
    {
        // $mission = MissionModel::with('vtrinfo')->find($this->Tools->hash($id, 'decrypt'));
        $mission = MissionModel::with('vtrinfo')->find($id);
        if (empty($mission)) {
            return redirect()->route('login');
        }

        $data = [
            'mission' => $mission,
        ];
        return view('report-cmt-mission', $data);
    }
}
