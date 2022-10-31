<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home(){
        switch (session('CESV')['profileType']) {
            case 0:
            case 2:
                return view('home-gda-adj');
                break;
            case 1:
                return view('home-gest');
                break;
        }
    }
}
