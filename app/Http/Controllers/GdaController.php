<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RelGdaRequest;
use App\Models\MotModel;
use App\Models\RelGdaModel;
use App\Models\VtrModel;
use Illuminate\Http\Request;

class GdaController extends Controller
{
    //INFORMAÇÕES DA FICHA E MISSAÕES PREENCHER RELA
    public function infoRelGda($ebplaca)
    {
        return VtrModel::with('infoFicha')->where('ebplaca', $ebplaca)->first();
    }
    //INFORMAÇÕES DA FICHA E MISSAÕES PREENCHER RELA
    public function infoRegister($id)
    {
        return RelGdaModel::with('ficha')->find($id);
    }

    // COUNTAR VTRS PARA EXIBIR NOS CARDS
    public function countRelGda()
    {
        $data = [
            'civil' => RelGdaModel::where('type_veicle', 'civil')->where('status', 1)->count(),
            'oom' => RelGdaModel::where('type_veicle', 'oom')->where('status', 1)->count(),
            'adm' => RelGdaModel::where('type_veicle', 'adm')->where('status', 1)->count(),
            'op' => RelGdaModel::where('type_veicle', 'op')->where('status', 1)->count(),
        ];
        return $data;
    }

    // CRUD
    public function registerRelGda(RelGdaRequest $request)
    {
        $vtr = $request->only('vtrType');
        switch ($vtr['vtrType']) {
            case 'op':
            case 'adm':
                $data = $request->validate([
                    'vtrType' => 'required',
                    'nrFicha' => 'required|max:5',
                    'idMot' => 'required',
                    'pgSeg' => 'required|max:6',
                    'nameSeg' => 'required|max:255',
                    'modVtr' => 'required|max:255',
                    'ebPlaca' => 'required|max:15',
                    'odSai' => 'required|max:20',
                    'destiny' => 'required|max:255',
                    'hourSai' => 'required',
                    'obs' => '',
                    'vtrType' => '',
                ]);

                $checkFicha = RelGdaModel::where('id_ficha', $data['nrFicha'])->where('status', 1)->first();
                if ($checkFicha) {
                    return 'ficha';
                }
                $mot = MotModel::find($data['idMot']);
                $rel = new RelGdaModel();
                $rel->type_veicle = $data['vtrType'];
                $rel->id_ficha = $data['nrFicha'];
                $rel->id_mot = $data['idMot'];
                $rel->pg_mot = $mot->pg;
                $rel->name_mot = $mot->name;
                $rel->pg_seg = $data['pgSeg'];
                $rel->name_seg = $data['nameSeg'];
                $rel->mod_veicle = $data['modVtr'];
                $rel->placaeb = strtoupper($data['ebPlaca']);
                $rel->od_sai = str_replace('_', '', $data['odSai']);
                $rel->destiny = $data['destiny'];
                $rel->obs = $data['obs'];
                $rel->hour_sai = date('Y-m-d H:i', strtotime($data['hourSai']));
                $rel->status = 1;
                $rel->om = '3º B Sup';

                $rel->user_rel_sai = session('user')['rank'] . ' ' . session('user')['professionalName'];
                $rel->save();
                break;
            case 'oom':
                $data = $request->validate([
                    'pgMot' => 'required|max:6',
                    'nameMot' => 'required|max:255',
                    'pgSeg' => 'required|max:6',
                    'nameSeg' => 'required|max:255',
                    'idtMil' => 'required|max:255',
                    'modVtr' => 'required|max:255',
                    'ebPlaca' => 'required|max:15',
                    'om' => 'required|max:15',
                    'destiny' => 'required|max:255',
                    'hourEnt' => 'required',
                    'obs' => '',
                    'vtrType' => '',
                ]);

                $checkVtr = RelGdaModel::where('placaeb', $data['ebPlaca'])->where('status', 1)->first();
                if ($checkVtr) {
                    return 'vtr';
                }

                $rel = new RelGdaModel();
                $rel->pg_mot = $data['pgMot'];
                $rel->name_mot = $data['nameMot'];
                $rel->pg_seg = $data['pgSeg'];
                $rel->name_seg = $data['nameSeg'];
                $rel->idt = $data['idtMil'];
                $rel->mod_veicle = $data['modVtr'];
                $rel->placaeb = strtoupper($data['ebPlaca']);
                $rel->om = $data['om'];
                $rel->destiny = $data['destiny'];
                $rel->obs = $data['obs'];
                $rel->hour_ent = date('Y-m-d H:i', strtotime($data['hourEnt']));
                $rel->type_veicle = $data['vtrType'];
                $rel->status = 1;
                $rel->user_rel_ent = session('user')['rank'] . ' ' . session('user')['professionalName'];

                $rel->save();
                break;
            case 'civil':
                $data = $request->validate([
                    'nameMot' => 'required|max:255',
                    'doc' => 'required|max:255',
                    'modVtr' => 'required|max:255',
                    'placaVtr' => 'required|max:15',
                    'qtdPass' => 'required|max:15',
                    'destiny' => 'required|max:255',
                    'hourEnt' => 'required',
                    'obs' => '',
                    'vtrType' => '',
                ]);

                $checkVtr = RelGdaModel::where('placaeb', $data['placaVtr'])->where('status', 1)->first();
                if ($checkVtr) {
                    return 'vtr';
                }
                $rel = new RelGdaModel();
                $rel->name_mot = $data['nameMot'];
                $rel->idt = $data['doc'];
                $rel->mod_veicle = $data['modVtr'];
                $rel->placaeb = strtoupper($data['placaVtr']);
                $rel->passengers = str_replace('_', '', $data['qtdPass']);
                $rel->om = 'Civil';
                $rel->destiny = $data['destiny'];
                $rel->obs = $data['obs'];
                $rel->hour_ent = date('Y-m-d H:i', strtotime($data['hourEnt']));
                $rel->type_veicle = $data['vtrType'];
                $rel->status = 1;
                $rel->user_rel_ent = session('user')['rank'] . ' ' . session('user')['professionalName'];

                $rel->save();

                break;

        }
    }
    public function editRelGda(RelGdaRequest $request)
    {
        $vtr = $request->only('vtrType');
        switch ($vtr['vtrType']) {
            case 'op':
            case 'adm':
                $data = $request->validate([
                    'dateSai' => 'required',
                    'dateEnt' => '',
                    'odEnt' => '',
                    'odSai' => 'required',
                    'idMot' => 'required',
                    'pgSeg' => 'required|max:6',
                    'nameSeg' => 'required|max:255',
                    'destiny' => 'required|max:255',
                    'id' => '',
                    'obs' => '',
                    'vtrType' => '',
                ]);

                $mot = MotModel::find($data['idMot']);
                $rel = RelGdaModel::find($data['id']);
                if ($data['odEnt'] && $rel->od_sai > str_replace('_', '', $data['odEnt'])) {
                    return 'od';
                }
                if ($rel->status == 2) {
                    if (!$data['odEnt'] || !$data['dateEnt']) {
                        return 'enc';
                    }
                }

                $rel->id_mot = $data['idMot'];
                $rel->pg_mot = $mot->pg;
                $rel->name_mot = $mot->name;
                $rel->pg_seg = $data['pgSeg'];
                $rel->name_seg = $data['nameSeg'];
                $rel->od_sai = str_replace('_', '', $data['odSai']);
                $rel->od_ent = $data['dateEnt'] && $data['odEnt'] ? str_replace('_', '', $data['odSai']) : null;
                $rel->hour_ent = $data['dateEnt'] && $data['odEnt'] ? date('Y-m-d H:i', strtotime($data['dateEnt'])) : null;
                $rel->hour_sai = date('Y-m-d H:i', strtotime($data['dateSai']));
                $rel->destiny = $data['destiny'];
                $rel->obs = $data['obs'];
                $rel->user_rel_sai = session('user')['rank'] . ' ' . session('user')['professionalName'];
                $rel->user_rel_ent = session('user')['rank'] . ' ' . session('user')['professionalName'];
                if ($data['odEnt'] && $data['dateEnt']) {
                    $rel->status = 2;
                }
                $rel->save();

                break;
            case 'oom':
                $data = $request->validate([
                    'dateEnt' => 'required',
                    'dateSai' => '',
                    'pgMot' => 'required|max:6',
                    'nameMot' => 'required|max:255',
                    'pgSeg' => 'required|max:6',
                    'nameSeg' => 'required|max:255',
                    'idtMil' => 'required|max:255',
                    'modVtr' => 'required|max:255',
                    'ebPlaca' => 'required|max:15',
                    'om' => 'required|max:15',
                    'destiny' => 'required|max:255',
                    'obs' => '',
                    'id' => 'required',
                    'vtrType' => 'required',
                ]);
                $checkVtr = RelGdaModel::where('placaeb', $data['ebPlaca'])->where('status', 1)->where('id', '!=', $data['id'])->first();
                if ($checkVtr) {
                    return 'vtr';
                }

                $rel = RelGdaModel::find($data['id']);
                $rel->pg_mot = $data['pgMot'];
                $rel->name_mot = $data['nameMot'];
                $rel->pg_seg = $data['pgSeg'];
                $rel->name_seg = $data['nameSeg'];
                $rel->idt = $data['idtMil'];
                $rel->mod_veicle = $data['modVtr'];
                $rel->placaeb = $data['ebPlaca'];
                $rel->om = $data['om'];
                $rel->destiny = $data['destiny'];
                $rel->obs = $data['obs'];
                $rel->hour_ent = date('Y-m-d H:i', strtotime($data['dateEnt']));
                $rel->hour_sai = $data['dateSai'] ? date('Y-m-d H:i', strtotime($data['dateSai'])) : null;
                $rel->status = $data['dateSai'] ? 2 : 1;
                $rel->user_rel_sai = session('user')['rank'] . ' ' . session('user')['professionalName'];
                $rel->user_rel_ent = session('user')['rank'] . ' ' . session('user')['professionalName'];
                $rel->save();

                break;
            case 'civil':
                $data = $request->validate([
                    'dateEnt' => 'required',
                    'dateSai' => '',
                    'nameMot' => 'required|max:255',
                    'doc' => 'required|max:255',
                    'modVtr' => 'required|max:255',
                    'placaVtr' => 'required|max:15',
                    'qtdPass' => 'required|max:15',
                    'destiny' => 'required|max:255',
                    'obs' => '',
                    'id' => 'required',
                    'vtrType' => 'required',
                ]);

                $checkVtr = RelGdaModel::where('placaeb', $data['placaVtr'])->where('status', 1)->where('id', '!=', $data['id'])->first();
                if ($checkVtr) {
                    return 'vtr';
                }

                $rel = RelGdaModel::find($data['id']);
                $rel->name_mot = $data['nameMot'];
                $rel->idt = $data['doc'];
                $rel->mod_veicle = $data['modVtr'];
                $rel->placaeb = $data['placaVtr'];
                $rel->passengers = str_replace('_', '', $data['qtdPass']);
                $rel->destiny = $data['destiny'];
                $rel->obs = $data['obs'];
                $rel->hour_ent = date('Y-m-d H:i', strtotime($data['dateEnt']));
                $rel->hour_sai = $data['dateSai'] ? date('Y-m-d H:i', strtotime($data['dateSai'])) : null;
                $rel->user_rel_sai = session('user')['rank'] . ' ' . session('user')['professionalName'];
                $rel->user_rel_ent = session('user')['rank'] . ' ' . session('user')['professionalName'];
                $rel->status = $data['dateSai'] ? 2 : 1;
                $rel->save();

                break;

        }
    }

    public function closeRelGda(RelGdaRequest $request)
    {
        $data = $request->all();

        switch ($data['vtrType']) {
            case 'op':
            case 'adm':
                $rel = RelGdaModel::where('id', $data['id_rel'])->first();

                if (empty($rel)) {
                    return 'erro';
                }
                if ($rel->status == 2) {
                    return 'fin';
                }

                if ($rel->od_sai > str_replace('_', '', $data['od'])) {
                    return 'od';
                }
                $rel->od_ent = str_replace('_', '', $data['od']);
                $rel->total_od = str_replace('_', '', $data['od']) - $rel->od_sai;
                $rel->hour_ent = date('Y-m-d H:i', strtotime($data['hour']));
                $rel->status = 2;
                $rel->user_rel_ent = session('user')['rank'] . ' ' . session('user')['professionalName'];

                $rel->save();

                return str_replace('_', '', $data['od']) - $rel->od_sai;
                break;
            case 'oom':
            case 'civil':
                $rel = RelGdaModel::where('id', $data['id_rel'])->first();

                if (empty($rel)) {
                    return 'erro';
                }

                if ($rel->status == 2) {
                    return 'erro';
                }

                $rel->hour_sai = date('Y-m-d H:i', strtotime($data['hour']));
                $rel->status = 2;
                $rel->user_rel_sai = session('user')['rank'] . ' ' . session('user')['professionalName'];

                $rel->save();
                break;

        }
    }

    public function deleteRelGda($id)
    {
        if (session('CESV')['profileType'] == 2) {
            return RelGdaModel::find($id)->delete();
        }
    }

    // TABELA RELAÇÃO GDA
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

        //Se há pesquisa ou não
        if ($requestData['columns'][3]['search']['value'] || $requestData['columns'][4]['search']['value']) {
            $registers = RelGdaModel::where('type_veicle', $requestData['columns'][3]['search']['value'])
                ->where('status', 1)
                ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                ->offset($requestData['start'])
                ->take($requestData['length'])->get();

            $filtered = count($registers);
            $rows = count(RelGdaModel::all());
        } else {
            $registers = RelGdaModel::where('status', 1)->with('ficha')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($registers);
            $rows = count(RelGdaModel::where('status', 1)->get());

        }

        // Ler e criar o array de dados
        $dados = array();
        foreach ($registers as $register) {
            $dado = array();
            $dado[] = $register->mod_veicle;
            $dado[] = $register->pg_mot . ' ' . $register->name_mot;
            $dado[] = $register->name_seg ? $register->pg_seg . ' ' . $register->name_seg : '-';
            $dado[] = $register->hour_ent ? date('d-m-Y H:i', strtotime($register->hour_ent)) : 'Fora da OM';
            $dado[] = $register->hour_sai ? date('d-m-Y H:i', strtotime($register->hour_sai)) : 'Dentro da OM';
            $dado[] = $register->om ? $register->om : '3º B Sup';
            $dado[] = $register->destiny;
            $dado[] = session('CESV')['profileType'] == 0 ? '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-register" data-id="' . $register->id . '"><i class="fa fa-eye"></i></button> <button class="btn btn-sm btn-success" onclick="return closeRegisterModal(' . $register->id . ',\'' . $register->type_veicle . '\')"><i class="fa fa-check"></i></button>' : '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-register" data-id="' . $register->id . '"><i class="fa fa-eye"></i></button> <button class="btn btn-sm btn-success"onclick="selectEditVtrType(' . $register->id . ')"><i class="fa fa-edit"></i></button> <button class="btn btn-sm btn-danger" onclick="deleteRelGda(' . $register->id . ')"><i class="fa fa-trash"></i> </button>';
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

    // TABELA RELATÓRIO RELAÇÃO GDA
    public function reportRelGda(Request $request)
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

        //Se há pesquisa ou não
        if ($requestData['columns'][6]['search']['value'] == 'find') {

            if (session('CESV')['profileType'] == 4) {
                $search = RelGdaModel::where('type_veicle', 'OP')->orWhere('type_veicle', 'OM');
            } else {
                $search = RelGdaModel::query();
            }

            if ($requestData['columns'][5]['search']['value']) {
                $search->where('type_veicle', $requestData['columns'][5]['search']['value']);
            }
            if ($requestData['columns'][0]['search']['value']) {
                $search->where('placaeb', $requestData['columns'][0]['search']['value']);
            }
            if ($requestData['columns'][4]['search']['value']) {
                $search->where('om', 'LIKE', '%' . $requestData['columns'][4]['search']['value'] . '%');

            }
            if ($requestData['columns'][1]['search']['value']) {
                $search->where('name_mot', 'LIKE', '%' . $requestData['columns'][1]['search']['value'] . '%');
            }
            if ($requestData['columns'][2]['search']['value']) {
                $dateEnt = date('Y-m-d H:i:s', strtotime($requestData['columns'][2]['search']['value']));

                $search->where('hour_ent', '>=', $dateEnt);
            }
            if ($requestData['columns'][3]['search']['value']) {
                $dateSai = date('Y-m-d H:i:s', strtotime($requestData['columns'][3]['search']['value']));
                $search->where('hour_sai', '<=', $dateSai);
            }

            $rows = $search->count();
            $registers = $search->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                ->offset($requestData['start'])
                ->take($requestData['length'])->get();

            $filtered = count($registers);
        } else {
            if (session('CESV')['profileType'] == 4) {
                $registers = RelGdaModel::with('ficha')->where('type_veicle', 'OP')->orWhere('type_veicle', 'OM')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            } else {
                $registers = RelGdaModel::with('ficha')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            }

            $filtered = count($registers);
            $rows = count(RelGdaModel::all());

        }
        // Ler e criar o array de dados
        $dados = array();
        foreach ($registers as $register) {
            $dado = array();
            $dado[] = $register->mod_veicle;
            $dado[] = $register->pg_mot . ' ' . $register->name_mot;
            $dado[] = $register->name_seg ? $register->pg_seg . ' ' . $register->name_seg : '-';
            $dado[] = $register->hour_ent ? date('d-m-Y H:i', strtotime($register->hour_ent)) : 'Fora da OM';
            $dado[] = $register->hour_sai ? date('d-m-Y H:i', strtotime($register->hour_sai)) : 'Dentro da OM';
            $dado[] = $register->total_od ? $register->total_od : ' - ';
            $dado[] = $register->om ? $register->om : '3º B Sup';
            $dado[] = $register->destiny;
            $dado[] = '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-register" data-id="' . $register->id . '"><i class="fa fa-eye"></i></button>';
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
