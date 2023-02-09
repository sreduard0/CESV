<?php

namespace App\Http\Controllers;

use App\Classes\Tools;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReqVtrRequest;
use App\Http\Requests\VtrRequest;
use App\Models\ReqVtrModel;
use App\Models\VtrModel;
use Illuminate\Http\Request;

class VtrController extends Controller
{
    private $Tools;
    public function __construct()
    {
        $this->Tools = new Tools();
    }
    // AÇÕES
    public function getNewReqVtr()
    {
        return ReqVtrModel::all()->count();
    }

    public function get_info_vtr($id)
    {
        return VtrModel::withTrashed()->find($id);
    }

    // CRUD VTR
    public function registerVtr(VtrRequest $request)
    {
        $data = $request->all();

        $checkVtr = VtrModel::where('nr_vtr', $data['nrVtr'])->first();
        $checkEbplaca = VtrModel::where('ebplaca', $data['ebPlacaVtr'])->first();

        if ($checkVtr) {
            return 'nrvtr';
        }
        if ($checkEbplaca) {
            return 'ebplaca';
        }

        $vtr = new VtrModel;
        $vtr->nr_vtr = str_replace('_', '', $data['nrVtr']);
        $vtr->mod_vtr = $data['modVtr'];
        $vtr->fuel = $data['fuelVtr'];
        $vtr->type_vtr = $data['typeVtr'];
        $vtr->ebplaca = strtoupper($data['ebPlacaVtr']);
        $vtr->ton = str_replace('_', '', $data['tonVtr']);
        $vtr->vol = str_replace('_', '', $data['volVtr']);
        $vtr->status = $data['statusVtr'];
        $vtr->obs = $data['obsVtr'];
        $vtr->save();
    }

    public function editVtr(VtrRequest $request)
    {
        $data = $request->all();

        $checkVtr = VtrModel::where('nr_vtr', $data['nrVtr'])->where('id', '!=', $data['id'])->first();
        $checkEbplaca = VtrModel::where('ebplaca', $data['ebPlacaVtr'])->where('id', '!=', $data['id'])->first();

        if ($checkVtr) {
            return 'nrvtr';
        }
        if ($checkEbplaca) {
            return 'ebplaca';
        }

        $vtr = VtrModel::find($data['id']);
        $vtr->nr_vtr = str_replace('_', '', $data['nrVtr']);
        $vtr->mod_vtr = $data['modVtr'];
        $vtr->ebplaca = $data['ebPlacaVtr'];
        $vtr->type_vtr = $data['typeVtr'];
        $vtr->ton = str_replace('_', '', $data['tonVtr']);
        $vtr->vol = str_replace('_', '', $data['volVtr']);
        $vtr->status = $data['statusVtr'];
        $vtr->fuel = $data['fuelVtr'];
        $vtr->obs = $data['obsVtr'];
        $vtr->save();
    }

    public function deleteVtr($id)
    {
        VtrModel::find($id)->delete();
    }

    public function getObsReqVtr($id)
    {
        return ReqVtrModel::select('obs')->find($id);
    }
    public function reqVtrAction($action, $id)
    {
        if ($action == 'acept') {
            //MONTAR ESTRUTURA DE MISSAO
        } else {
            ReqVtrModel::find($id)->forceDelete();
        }
    }
    public function requestVtr(ReqVtrRequest $request)
    {
        $data = $request->all();

        $request = new ReqVtrModel;

        $request->rank = $data['rank'];
        $request->name = $data['name'];
        $request->mission = $data['mission'];
        $request->destiny = $data['destiny'];
        $request->date_part = date('Y-m-d H:i', strtotime($data['date_part']));
        $request->contact = str_replace([' ', '(', ')', '-'], '', $data['contact']);
        $request->qtd_mil = $data['qtd_mil'];
        $request->obs = $data['obs'];
        $request->save();
        return 'success';

    }
    // TABELA DE VTRs
    public function listVtr(Request $request)
    {
        //Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'nr_vtr',
            1 => 'mod_vtr',
            2 => 'ebplaca',
            3 => 'ton',
            4 => 'vol',
            5 => 'status',
            6 => 'obs',
        );

        //Obtendo registros de número total sem qualquer pesquisa
        $rows = count(VtrModel::all());

        //Se há pesquisa ou não
        if ($requestData['search']['value']) {
            $vtrs = VtrModel::where('ebplaca', 'LIKE', '%' . $requestData['search']['value'] . '%')->with('infoFicha')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($vtrs);
            $rows = count(VtrModel::all());
        } elseif ($requestData['columns'][3]['search']['value']) {
            $vtrs = VtrModel::where('status', $requestData['columns'][3]['search']['value'])->with('infoFicha')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($vtrs);
            $rows = count(VtrModel::all());
        } else {
            $vtrs = VtrModel::with('infoFicha')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($vtrs);
        }

        // Ler e criar o array de dados
        $dados = array();
        $i = 1;
        foreach ($vtrs as $vtr) {
            $dado = array();
            $dado[] = $vtr->nr_vtr;
            $dado[] = $vtr->mod_vtr;
            $dado[] = $vtr->ebplaca;
            $dado[] = $vtr->ton . ' Ton';
            $dado[] = $vtr->vol;
            switch ($vtr->status) {
                case 1:
                    $dado[] = 'Disponível';
                    break;
                case 2:
                    $dado[] = 'Indisponível';

                    break;
                case 3:
                    $dado[] = 'Disp. c/ restrição';
                    break;
            }
            switch (session('CESV')['profileType']) {
                case 5:
                    $dado[] = '
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $vtr->id . '"><i
                                        class="fa fa-car"></i></button>';
                    break;
                case 3:
                    $dado[] = $vtr->infoFicha == null ? 'Livre' : $vtr->infoFicha->nat_of_serv;
                    $dado[] = '
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $vtr->id . '"><i
                                        class="fa fa-car"></i></button>';
                    break;
                default:

                    $dado[] = '
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $vtr->id . '"><i
                                        class="fa fa-car"></i></button>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-vtr" data-id="' . $vtr->id . '"><i
                                        class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete" onclick="deleteVtr(' . $vtr->id . ')"><i
                                        class="fa fa-trash"></i></button>';
                    break;
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
    public function listReqVtr(Request $request)
    {
        //Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'id',
            1 => 'rank',
            2 => 'name',
            3 => 'mission',
            4 => 'destiny',
            5 => 'date_part',
            6 => 'contact',
            7 => 'id',
        );

        //Obtendo registros de número total sem qualquer pesquisa
        $rows = count(ReqVtrModel::all());

        //Se há pesquisa ou não
        if ($requestData['search']['value']) {
            $requests = ReqVtrModel::where('ebplaca', 'LIKE', '%' . $requestData['search']['value'] . '%')->with('infoFicha')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($requests);
            $rows = count(ReqVtrModel::all());
        } elseif ($requestData['columns'][3]['search']['value']) {
            $requests = ReqVtrModel::where('status', $requestData['columns'][3]['search']['value'])->with('infoFicha')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($requests);
            $rows = count(ReqVtrModel::all());
        } else {
            $requests = ReqVtrModel::orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($requests);
        }

        // Ler e criar o array de dados
        $dados = array();
        $i = 1;
        foreach ($requests as $data) {
            $dado = array();
            $dado[] = $data->id;
            $dado[] = $data->rank;
            $dado[] = $data->name;
            $dado[] = $data->mission;
            $dado[] = $data->destiny;
            $dado[] = date('d-m-Y H:i', strtotime($data->date_part));
            $dado[] = $this->Tools->mask('(##) # ####-####', $data->contact);
            $dado[] = $data->qtd_mil;

            switch (session('CESV')['profileType']) {
                case 5:
                    $dado[] = '<button class="btn btn-sm btn-success"><i class="fa fa-list"></i></button>';
                case 6:
                case 1:
                    $dado[] = '<button onclick="denyReqVtr(' . $data->id . ')" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button> <button onclick="aceptReqVtr(' . $data->id . ')" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>';
                    break;
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
