<?php

namespace App\Http\Controllers;

use App\Classes\Email;
use App\Classes\Tools;
use App\Http\Controllers\Controller;
use App\Http\Requests\MissionRequest;
use App\Models\FichaModel;
use App\Models\MissionModel;
use App\Models\RelGdaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class MissionController extends Controller
{
    private $Tools;
    private $Email;
    public function __construct()
    {
        $this->Tools = new Tools;
        $this->Email = new Email;
    }

    // INFORMAÇÕES DA MISSÃO SOLICITADA
    public function infoMission($id)
    {
        return MissionModel::with('vtrInfo')->find($id);
    }
    // MUDAR STATUS DA MISSÃO PARA EM ANDAMENTO
    public function altStsMission($id)
    {
        $mission = MissionModel::with('vtrinfo')->find($id);

        if (count($mission->vtrinfo) == 0) {
            return 'vtr';
        }
        $mission->status = 2;
        $mission->save();
    }
    // FINALIZAR MISSÃO
    public function finishMission($id)
    {
        // //MISSÃO
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

        // Notificando CMT da MISSÃO
        $data = [
            'link' => url('/relatorio/form') . '/' . $this->Tools->hash($id, 'encrypt'),
            'contactCmtMission' => $mission->contact,
        ];
        return $data;
    }

    public function printReport($id, $status)
    {
        $mission = MissionModel::find($this->Tools->hash($id, 'decrypt'));
        if (empty($mission)) {
            return redirect()->route('login');
        }
        $data = [
            'mission' => $mission,
            'status' => $status,

        ];
        return view('print-report', $data);
    }

    public function sendEmailReport($id, $mail)
    {
        $mission = MissionModel::find($this->Tools->hash($id, 'decrypt'));
        if (empty($mission)) {
            return redirect()->route('login');
        }
        $reportData = [
            'mission' => $mission,
            'status' => true,

        ];
        $pdfName = 'relatório_missão_' . $mission->mission_name . '_' . $mission->pg_seg . ' ' . $mission->name_seg . '.pdf';
        Pdf::loadView('print-report', $reportData)->save(storage_path('pdfmake/' . $pdfName));

        $data = [
            'email' => $mail,
            'cmtMission' => $mission->pg_seg . ' ' . $mission->name_seg,
            'pdfName' => $pdfName,
        ];
        $this->Email->reportMail($data);

        File::delete(storage_path('pdfmake/' . $pdfName));

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
        $saveData->class = $data['classMission'] ? $data['classMission'] : ' - ';
        $saveData->doc = $data['docMission'] ? $data['docMission'] : 'Não especificado';
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
        $saveData->class = $data['classMission'] ? $data['classMission'] : ' - ';
        $saveData->doc = $data['docMission'] ? $data['docMission'] : 'Não especificado';
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

    public function saveReport(Request $request)
    {
        $data = $request->all();
        $report = MissionModel::find($this->Tools->hash($data['id'], 'decrypt'));
        $report->finish_mission = date('Y-m-d', strtotime($data['dateFinish']));
        $report->peso = $data['kiloGram'];
        $report->vol = $data['metersCub'];
        $report->cons_gas = $data['consGas'];
        $report->cons_diesel = $data['consDiesel'];
        $report->alteration = $data['altMission'];
        $report->obs_alteration = $data['obsMission'];
        $report->save();
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
            switch (session('CESV')['profileType']) {
                case 1:
                    $missions = MissionModel::where('status', $requestData['columns'][3]['search']['value'])
                        ->with('vtrInfo')
                        ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                        ->offset($requestData['start'])
                        ->take($requestData['length'])
                        ->get();
                    break;
                case 3:
                    $missions = MissionModel::where('status', $requestData['columns'][3]['search']['value'])
                        ->where('type_mission', 'OP')
                        ->with('vtrInfo')
                        ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                        ->offset($requestData['start'])
                        ->take($requestData['length'])
                        ->get();
                    break;
                case 4:
                    $missions = MissionModel::where('status', $requestData['columns'][3]['search']['value'])
                        ->where('type_mission', 'OM')
                        ->with('vtrInfo')
                        ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                        ->offset($requestData['start'])
                        ->take($requestData['length'])
                        ->get();
                    break;
                case 5:
                    $missions = MissionModel::where('status', $requestData['columns'][3]['search']['value'])
                        ->with('vtrInfo')
                        ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                        ->offset($requestData['start'])
                        ->take($requestData['length'])
                        ->get();
                    break;
            }
            $filtered = count($missions);
            $rows = count(MissionModel::where('status', $requestData['columns'][3]['search']['value'])->get());
        } else {
            switch (session('CESV')['profileType']) {
                case 1:
                    $missions = MissionModel::where('status', '<=', 2)
                        ->with('vtrInfo')
                        ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                        ->offset($requestData['start'])
                        ->take($requestData['length'])
                        ->get();
                    break;
                case 3:
                    $missions = MissionModel::where('status', '<=', 2)
                        ->where('type_mission', 'OP')
                        ->with('vtrInfo')
                        ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                        ->offset($requestData['start'])
                        ->take($requestData['length'])
                        ->get();
                    break;
                case 4:
                    $missions = MissionModel::where('status', '<=', 2)
                        ->where('type_mission', 'OM')
                        ->with('vtrInfo')
                        ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                        ->offset($requestData['start'])
                        ->take($requestData['length'])
                        ->get();
                    break;
                case 5:
                    $missions = MissionModel::with('vtrInfo')
                        ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                        ->offset($requestData['start'])
                        ->take($requestData['length'])
                        ->get();
                    break;
            }
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
                    $dado[] = 'Na fila';
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
                $btnAltstatus = ' <button title="Iniciar missão" class="btn btn-sm btn-success" onclick="altStatusMission(' . $mission->id . ')"
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

            } elseif (session('CESV')['profileType'] == 5) {
                $dado[] = ' <button title="Informações da missão" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-mission" data-id="' . $mission->id . '"><i class="fa fa-eye"></i></button> ';

            } else {

                $btnInfo = ' <button title="Informações da missão" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-mission" data-id="' . $mission->id . '"><i class="fa fa-eye"></i></button> ';
                $btnEdt = ' <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit-mission" data-id="' . $mission->id . '"
                                    ><i class="fa fa-edit"></i></button>';
                $btnDel = ' <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete" onclick="deleteMission(' . $mission->id . ')"><i
                                        class="fa fa-trash"></i></button>';
                switch ($mission->status) {
                    case 1:
                        $dado[] = $btnInfo . $btnEdt . $btnDel;
                        break;
                    case 2:
                        $dado[] = $btnInfo . $btnEdt;

                        break;
                    case 3:
                        $dado[] = $btnInfo;
                        break;
                }

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
