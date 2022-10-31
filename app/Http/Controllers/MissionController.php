<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MissionModel;
use Illuminate\Http\Request;

class MissionController extends Controller
{

    // INFORMAÇÕES DA MISSÃO SOLICITADA
    public function infoMission($id){
        return MissionModel::find($id)->with('vtr');
    }


    // TABELA DAS MISSÕES
    public function listMission(Request $request){

       //Receber a requisão da pesquisa
       $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0=> 'id',
            1=> 'mission_name',
            2 =>'type_mission',
            3 => 'destiny',
            4 => 'doc',
            5 => 'class',
            6=> 'vtr',
            7=> 'prev_date_part',
            8=> 'status'
        );

       //Obtendo registros de número total sem qualquer pesquisa
       $rows = count(MissionModel::all());

       //Se há pesquisa ou não
        // if( $requestData['search']['value'] )
        // {
        //    $missions = LoginModel::with('data')->orWhere('login', 'LIKE', '%'.$requestData['search']['value'] .'%')->where('status', 3)->get();
        //     $filtered = count($missions);
        // }
        // else
        // {
            $missions = MissionModel::where('status', 0)->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'] )->offset( $requestData['start'])->take($requestData['length'])->get();
            $filtered = count($missions);
        // }

        // Ler e criar o array de dados
        $dados = array();
        $i = 1;
        foreach ($missions as $mission){
            $dado = array();
            $dado[] = $i++;
            $dado[] = $mission->mission_name;
            $dado[] = $mission->type_mission;
            $dado[] = $mission->destiny;
            $dado[] = $mission->doc;
            $dado[] = $mission->class;
            $dado[] = $mission->vtr;
            $dado[] = date('d-m-Y h:i',strtotime($mission->prev_date_part));
               if ($mission->status == 0) {
                   $dado[] = 'Aguardando';
               }else{
                   $dado[] = 'Em execução';
               }
            $dado[] = '
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="'.$mission->vtr.'"><i
                                        class="fa fa-car"></i></button>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-mission" data-id="'.$mission->id.'"
                                    ><i class="fa fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete" data-id="'.$mission->id.'"><i
                                        class="fa fa-trash"></i></button>';
            $dados[] = $dado;
        }


        //Cria o array de informações a serem retornadas para o Javascript
        $json_data = array(
            "draw" => intval($requestData['draw']),//para cada requisição é enviado um número como parâmetro
            "recordsTotal" => intval( $filtered ),  //Quantidade de registros que há no banco de dados
            "recordsFiltered" => intval($rows ), //Total de registros quando houver pesquisa
            "data" => $dados   //Array de dados completo dos dados retornados da tabela
        );

        return json_encode($json_data);  //enviar dados como formato json

    }


    // CRUD DAS MISSÕES

    public function registerMission(Request $request){
        $data = $request->all(); //Buscando todos campos enviados do formato


        print_r($data) ;

    }
}
