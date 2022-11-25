<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VtrRequest;
use App\Models\VtrModel;
use Illuminate\Http\Request;

class VtrController extends Controller
{
    // AÇÕES
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
        $vtr->obs = $data['obsVtr'];
        $vtr->save();
    }

    public function deleteVtr($id)
    {
        VtrModel::find($id)->delete();
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
        if ($requestData['columns'][3]['search']['value']) {
            $vtrs = VtrModel::where('status', $requestData['columns'][3]['search']['value'])->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($vtrs);
            $rows = count(VtrModel::all());
        } else {
            $vtrs = VtrModel::orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
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
            $dado[] = $vtr->ton;
            $dado[] = $vtr->vol;
            if ($vtr->status == 1) {
                $dado[] = 'Disponível';
            } else {
                $dado[] = 'Indisponível';

            }
            if (session('CESV')['profileType'] == 5) {
                $dado[] = '
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $vtr->id . '"><i
                                        class="fa fa-car"></i></button>';

            } else {
                $dado[] = '
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $vtr->id . '"><i
                                        class="fa fa-car"></i></button>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-vtr" data-id="' . $vtr->id . '"><i
                                        class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete" onclick="deleteVtr(' . $vtr->id . ')"><i
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
