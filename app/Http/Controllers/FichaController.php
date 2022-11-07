<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FichaRequest;
use App\Models\FichaModel;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    // AÇÕES
    public function infoFicha($id)
    {
        return FichaModel::find($id);
    }

    // CRUD FICHAS
    public function registerFicha(FichaRequest $request)
    {
        $data = $request->all();

        $checkVtr = FichaModel::where('status', 1)->where('id_vtr', $data['vtrFicha'])->first();
        $checkFicha = FichaModel::where('status', 1)->where('nr_ficha', $data['nrFicha'])->first();
        if ($checkVtr) {
            return 'vtr';
        }
        if ($checkFicha) {
            return 'ficha';
        }

        if ($data['pgSegFicha'] == '' || $data['nameSegFicha'] == '') {
            $pgSeg = null;
            $nameSeg = null;
        } else {
            $pgSeg = $data['pgSegFicha'];
            $nameSeg = $data['nameSegFicha'];
        }
        $ficha = new FichaModel;
        $ficha->nr_ficha = str_replace('_', '', $data['nrFicha']);
        $ficha->pg_mot = $data['pgMotFicha'];
        $ficha->name_mot = $data['nameMotFicha'];
        $ficha->pg_seg = $pgSeg;
        $ficha->name_seg = $nameSeg;
        $ficha->nat_of_serv = $data['natOfServFicha'];
        $ficha->in_order = $data['inOrderFicha'];
        $ficha->status = 1;
        $ficha->id_vtr = $data['vtrFicha'];
        $ficha->id_mission = $data['missionFicha'];
        $ficha->save();

    }
    public function editFicha(FichaRequest $request)
    {
        $data = $request->all();

        $checkVtr = FichaModel::where('id', '!=', $data['id'])->where('status', 1)->where('id_vtr', $data['vtrFicha'])->first();
        $checkFicha = FichaModel::where('id', '!=', $data['id'])->where('status', 1)->where('nr_ficha', $data['nrFicha'])->first();
        if ($checkVtr) {
            return 'vtr';
        }
        if ($checkFicha) {
            return 'ficha';
        }

        if ($data['pgSegFicha'] == '' || $data['nameSegFicha'] == '') {
            $pgSeg = null;
            $nameSeg = null;
        } else {
            $pgSeg = $data['pgSegFicha'];
            $nameSeg = $data['nameSegFicha'];
        }
        $ficha = FichaModel::find($data['id']);
        $ficha->nr_ficha = str_replace('_', '', $data['nrFicha']);
        $ficha->pg_mot = $data['pgMotFicha'];
        $ficha->name_mot = $data['nameMotFicha'];
        $ficha->pg_seg = $pgSeg;
        $ficha->name_seg = $nameSeg;
        $ficha->nat_of_serv = $data['natOfServFicha'];
        $ficha->in_order = $data['inOrderFicha'];
        $ficha->status = 1;
        $ficha->id_vtr = $data['vtrFicha'];
        $ficha->id_mission = $data['missionFicha'];
        $ficha->save();

    }
    public function finishFicha($id)
    {
        $ficha = FichaModel::find($id);
        $ficha->status = 2;
        $ficha->save();
    }
    // TABELA DE FICHAS
    public function listFichas(Request $request)
    {
        //Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'nr_ficha',
            1 => 'id_vtr',
            2 => 'id_mission',
            3 => 'in_order',
            4 => 'pg_mot',
            5 => 'pg_seg',
            6 => 'nat_of_serv',
            7 => 'status',
        );

        //Obtendo registros de número total sem qualquer pesquisa
        $rows = count(FichaModel::all());

        //Se há pesquisa ou não
        if ($requestData['columns'][3]['search']['value']) {
            $fichas = FichaModel::with('vtrInfo')->where('status', $requestData['columns'][3]['search']['value'])->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($fichas);
            $rows = count(FichaModel::all());
        } else {
            $fichas = FichaModel::where('status', 1)->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($fichas);
        }

        // Ler e criar o array de dados
        $dados = array();
        foreach ($fichas as $ficha) {
            $dado = array();
            $dado[] = $ficha->nr_ficha;
            $dado[] = $ficha->vtrInfo->nr_vtr . ' | ' . $ficha->vtrInfo->mod_vtr;
            $ficha->id_mission == 0 ? $dado[] = 'Serviço/Guarnição' : $dado[] = $ficha->missionInfo->mission_name;
            $dado[] = $ficha->in_order;
            $dado[] = $ficha->pg_mot . ' ' . $ficha->name_mot;
            if ($ficha->pg_seg == null) {
                $dado[] = 'Não especificado';
            } else {
                $dado[] = $ficha->pg_seg . ' ' . $ficha->name_seg;
            }
            $dado[] = $ficha->nat_of_serv;
            if ($ficha->status == 1) {
                $dado[] = 'Aberta';
            } else {
                $dado[] = 'Encerrada';

            }
            $dado[] = '
                        <button title="Informações da viatura" class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $ficha->id_vtr . '"><i
                                        class="fa fa-car"></i></button>
                        <button title="Editar ficha" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-ficha" data-id="' . $ficha->id . '"><i
                                        class="fa fa-edit"></i></button>
                        <button title="Fechar ficha" class="btn btn-sm btn-danger" data-toggle="modal" onclick="finishFicha(' . $ficha->id . ')"><i
                                        class="fa fa-times"></i></button>';
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
    // TABELA DE FICHAS DO LAYOUT
    public function fichasLayout(Request $request)
    {
        //Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'nr_ficha',
            1 => 'pg_mot',
            2 => 'id_vtr',
        );

        //Obtendo registros de número total sem qualquer pesquisa
        $rows = count(FichaModel::all());
        $fichas = FichaModel::where('status', 1)->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
        $filtered = count($fichas);

        // Ler e criar o array de dados
        $dados = array();
        foreach ($fichas as $ficha) {
            $dado = array();
            $dado[] = $ficha->nr_ficha;
            $dado[] = $ficha->pg_mot . ' ' . $ficha->name_mot;
            $dado[] = $ficha->vtrInfo->ebplaca;

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
