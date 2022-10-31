<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VtrModel;
use Illuminate\Http\Request;

class VtrController extends Controller
{
    public function get_info_vtr($id){
        return VtrModel::find($id);
    }
}
