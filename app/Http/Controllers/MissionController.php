<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MissionRequest;
use App\Models\FichaModel;
use App\Models\MissionModel;
use App\Models\RelGdaModel;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    // INFORMAÇÕES DA MISSÃO SOLICITADA
    public function infoMission($id)
    {
        return MissionModel::with('vtrInfo')->find($id);
    }
    // MUDAR STATUS DA MISSÃO PADA EM ANDAMENTO
    public function altStsMission($id)
    {
        $mission = MissionModel::find($id);
        $mission->status = 2;
        $mission->save();
    }
    // FINALIZAR MISSÃO
    public function finishMission($id)
    {

        //MISSÃO
        $mission = MissionModel::find($id);
        $mission->status = 3;
        $mission->save();

        // FICHAS VINCULADAS
        $fichas = FichaModel::where('id_mission', $id)->get();
        foreach ($fichas as $ficha) {
            // RELAÇÃO DA GUARDA
            $od = [];
            foreach (RelGdaModel::where('id_ficha', $ficha->id)->get() as $relGda) {
                $od[] = $relGda->total_od;
            }
            $ficha->od_total = array_sum($od);
            $ficha->status = 2;
            $ficha->save();

        }
    }

    // CRUD DAS MISSÕES
    public function registerMission(MissionRequest $request)
    {
        $data = $request->all(); //Buscando todos campos enviados do formato

        $saveData = new MissionModel;
        $saveData->type_mission = $data['typeMission'];
        $saveData->status = 1;
        $saveData->mission_name = $data['nameMission'];
        $saveData->destiny = $data['destinyMission'];
        $saveData->class = $data['classMission'];
        $saveData->doc = $data['docMission'];
        $saveData->origin = $data['originMission'];
        $saveData->pg_seg = $data['pgSegMission'];
        $saveData->name_seg = $data['nameSegMission'];
        $saveData->prev_date_part = date('Y-m-d h:i', strtotime($data['datePrevPartMission']));
        $saveData->prev_date_chgd = date('Y-m-d h:i', strtotime($data['datePrevChgdMission']));
        $saveData->contact = '55' . str_replace(['(', ')', '-', ' ', '_'], '', $data['contactCmtMission']);
        $saveData->obs = $data['obsMission'];
        $saveData->save();
    }

    public function editMission(MissionRequest $request)
    {
        $data = $request->all(); //Buscando todos campos enviados do formato

        $saveData = MissionModel::find($data['id']);
        $saveData->type_mission = $data['typeMission'];
        $saveData->mission_name = $data['nameMission'];
        $saveData->destiny = $data['destinyMission'];
        $saveData->class = $data['classMission'];
        $saveData->doc = $data['docMission'];
        $saveData->origin = $data['originMission'];
        $saveData->pg_seg = $data['pgSegMission'];
        $saveData->name_seg = $data['nameSegMission'];
        $saveData->prev_date_part = date('Y-m-d h:i', strtotime($data['datePrevPartMission']));
        $saveData->prev_date_chgd = date('Y-m-d h:i', strtotime($data['datePrevChgdMission']));
        $saveData->contact = '55' . str_replace(['(', ')', '-', ' ', '_'], '', $data['contactCmtMission']);
        $saveData->obs = $data['obsMission'];
        $saveData->save();
    }

    public function deleteMission($id)
    {
        MissionModel::find($id)->delete();
    }

    // TABELA DAS MISSÕES
    public function listMission(Request $request)
    {

        //Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'id',
            1 => 'mission_name',
            2 => 'type_mission',
            3 => 'destiny',
            4 => 'doc',
            5 => 'class',
            6 => 'vtr',
            7 => 'prev_date_part',
            8 => 'status',
        );

        //Obtendo registros de número total sem qualquer pesquisa

        //Se há pesquisa ou não
        if ($requestData['columns'][3]['search']['value']) {
            $missions = MissionModel::where('status', $requestData['columns'][3]['search']['value'])->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($missions);
            $rows = count(MissionModel::where('status', $requestData['columns'][3]['search']['value'])->get());
        } else {
            $missions = MissionModel::where('status', 1)->with('vtrInfo')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($missions);
            $rows = count(MissionModel::where('status', 1)->get());

        }

        // Ler e criar o array de dados
        $dados = array();
        foreach ($missions as $mission) {
            $dado = array();
            $dado[] = $mission->id;
            $dado[] = $mission->mission_name;
            $dado[] = $mission->type_mission;
            $dado[] = $mission->destiny;
            $dado[] = $mission->doc;
            $dado[] = $mission->class;
            $dado[] = count($mission->vtrinfo);
            $dado[] = date('d-m-Y h:i', strtotime($mission->prev_date_part));
            switch ($mission->status) {
                case 1:
                    $dado[] = 'Aguardando';
                    break;

                case 2:
                    $dado[] = 'Em andamento';
                    break;

                case 3:
                    $dado[] = 'Encerrada';
                    break;
            }
            if (session('CESV')['profileType'] == 1) {
                $btnInfo = ' <button title="Informações da missão" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-mission" data-id="' . $mission->id . '"><i class="fa fa-eye"></i></button> ';
                $btnAltstatus = ' <button title="Iniciar missão" class="btn btn-sm btn-secondary" onclick="altStatusMission(' . $mission->id . ')"
                                    ><i class="fa fa-check"></i></button> ';
                $btnFinMission = ' <button title="Finalizar missão" class="btn btn-sm btn-danger" onclick="finishMission(' . $mission->id . ')"
                                    ><i class=" fs-18 fa fa-times"></i></button> ';
                switch ($mission->status) {
                    case 1:
                        $dado[] = $btnInfo . $btnAltstatus;
                        break;
                    case 2:
                        $dado[] = $btnInfo . $btnFinMission;

                        break;
                    case 3:
                        $dado[] = $btnInfo;
                        break;
                }

            } else {
                $dado[] = '
                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-mission" data-id="' . $mission->id . '"
                                    ><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit-mission" data-id="' . $mission->id . '"
                                    ><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete" onclick="deleteMission(' . $mission->id . ')"><i
                                        class="fa fa-trash"></i></button>';

            }
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
