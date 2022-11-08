<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FichaModel;
use App\Models\VtrModel;

class GdaController extends Controller
{
//INFORMAÇÕES DA FICHA E MISSAÕES PREENCHER RELA
    public function infoRelGda($ebplaca)
    {
        return VtrModel::with('infoFicha')->where('ebplaca', $ebplaca)->first();
    }
}
