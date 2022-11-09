<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RelGdaModel;
use App\Models\VtrModel;
use Illuminate\Http\Request;

class GdaController extends Controller
{
//INFORMAÇÕES DA FICHA E MISSAÕES PREENCHER RELA
    public function infoRelGda($ebplaca)
    {
        return VtrModel::with('infoFicha', 'infoRelGda')->where('ebplaca', $ebplaca)->first();
    }

    // TABELA RELAÃO GDA
    public function listRelGda(Request $request)
    {
        //Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'mod_veicle',
            1 => 'mot_name',
            2 => 'seg_name',
            3 => 'hour_sai',
            4 => 'od_sai',
            5 => 'om',
            6 => 'destiny',
            8 => 'id',
        );

        //Obtendo registros de número total sem qualquer pesquisa
        $rows = count(RelGdaModel::all());

        //Se há pesquisa ou não
        // if ($requestData['columns'][3]['search']['value']) {
        //     $registers = RelGdaModel::where('status', $requestData['columns'][3]['search']['value'])->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
        //     $filtered = count($registers);
        //     $rows = count(RelGdaModel::all());
        // } else {
        $registers = RelGdaModel::where('status', 1)->with('vtr', 'ficha')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
        $filtered = count($registers);
        // }

        // Ler e criar o array de dados
        $dados = array();
        foreach ($registers as $register) {
            $dado = array();
            $dado[] = $register->mod_veicle;
            $dado[] = $register->mot_name;
            $dado[] = $register->seg_name;
            $dado[] = $register->hour_sai;
            $dado[] = $register->od_sai;
            $dado[] = $register->om;
            $dado[] = $register->destiny;
            $dado[] = '
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-register" data-id="' . $register->id . '"
                                    ><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit-register" data-id="' . $register->id . '"
                                    ><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete" onclick="deleteRegister(' . $register->id . ')"><i
                                        class="fa fa-trash"></i></button>';
            $dados[] = $dado;
        }

//Cria o array de informações a serem retornadas para o Javascript
        $json_data = array(
            "draw" => intval($requestData['draw']), //para cada requisição é enviado um número como parâmetro
            "recordsTotal" => intval($filtered), //Quantidade de registros que há no banco de dados
            "recordsFiltered" => intval($rows), //Total de registros quando houver pesquisa
            "data" => $dados, //Array de dados completo dos dados retornados da tabela
        );

        return json_encode($json_data); //enviar dados como formato json

    }
}
