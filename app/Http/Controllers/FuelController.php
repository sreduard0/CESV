<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FuelRequest;
use App\Models\FichaModel;
use App\Models\FuelModel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    public function getNewRequestFuel()
    {
        return FuelModel::all()->count();
    }
    // AÇÕES
    public function infoRequestFuel($id)
    {
        return FuelModel::with('motinfo', 'vtrinfo', 'missioninfo', 'fichainfo')->find($id);
    }
    // CRUD
    public function requestFuel(FuelRequest $request)
    {
        $data = $request->all();

        $ficha = FichaModel::with('vtrinfo')->find($data['id_ficha']);

        if (FuelModel::where('id_ficha', $data['id_ficha'])->where('status', '<', 4)->first()) {
            return 'ficha';
        }

        $fuel = new FuelModel();
        $fuel->id_vtr = $ficha->id_vtr;
        $fuel->id_ficha = $ficha->id;
        $fuel->id_mission = $ficha->id_mission;
        $fuel->id_mot = $ficha->id_mot;
        $fuel->fuel = $ficha->vtrinfo->fuel ? $ficha->vtrinfo->fuel : null;
        $fuel->status = 1;
        $fuel->od = str_replace('_', '', $data['od']);
        $fuel->destiny = $data['destiny'];
        $fuel->request_by = session('user')['rank'] . ' ' . session('user')['professionalName'];
        $fuel->obs = $data['obs'];
        $fuel->save();

    }
    public function actionRequestFuel(Request $request)
    {
        $data = $request->all();

        if (FuelModel::where('id', $data['id'])->where('status', '!=', 1)->first()) {
            return 'response';
        }
        $requestFuel = FuelModel::find($data['id']);
        $requestFuel->status = $data['action'] == 1 ? 2 : 4;
        $requestFuel->code_auth = $data['code'];
        $requestFuel->qnt_released = $data['qtdAutorized'];
        $requestFuel->autorized_by = session('user')['rank'] . ' ' . session('user')['professionalName'];
        $requestFuel->obs_fiscadm = $data['obs'];
        $requestFuel->save();

    }
    public function finishRequestFuel(Request $request)
    {
        $data = $request->all();

        if (FuelModel::where('id', $data['id'])->where('status', 3)->first()) {
            return 'response';
        }
        $requestFuel = FuelModel::find($data['id']);
        $requestFuel->status = 3;
        $requestFuel->save();

    }

    // TABELA DE SOLICITAÇOES
    public function fuelRequestList(Request $request)
    {
        //Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'id',
            1 => 'id_vtr',
            2 => 'id_mission',
            3 => 'id_mot',
            4 => 'status',
            5 => 'id',
        );

        //Obtendo registros de número total sem qualquer pesquisa

        //Se há pesquisa ou não
        if ($requestData['columns'][3]['search']['value'] == 'find') {

            $search = FuelModel::query();

            if ($requestData['columns'][1]['search']['value']) {
                $search->where('status', $requestData['columns'][1]['search']['value']);
            }

            if ($requestData['columns'][4]['search']['value']) {
                $search->where('fuel', $requestData['columns'][4]['search']['value']);
            }

            if ($requestData['columns'][2]['search']['value']) {
                $betweenDate = explode('>', $requestData['columns'][2]['search']['value']);
                $search->whereBetween('created_at', [date('Y-m-d', strtotime($betweenDate[0])) . ' 00:00', date('Y-m-d', strtotime($betweenDate[1])) . ' 23:59']);
            }

            $requestsFuel = $search->with('motinfo', 'vtrinfo', 'missioninfo', 'fichainfo')
                ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                ->offset($requestData['start'])
                ->take($requestData['length'])
                ->get();

            // print_r($requestsFuel);
            $filtered = count($requestsFuel);
            $rows = $search->count();
        } else {
            $rows = count(FuelModel::where('status', '<=', 2)->get());

            $requestsFuel = FuelModel::where('status', '<=', 2)
                ->with('motinfo', 'vtrinfo', 'missioninfo', 'fichainfo')
                ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
                ->offset($requestData['start'])
                ->take($requestData['length'])
                ->get();
            $filtered = count($requestsFuel);
        }
        // Ler e criar o array de dados
        $dados = array();
        foreach ($requestsFuel as $requestFuel) {
            $dado = array();
            $dado[] = date('d-m-Y', strtotime($requestFuel->created_at));
            $dado[] = $requestFuel->vtrinfo->mod_vtr;
            $dado[] = $requestFuel->vtrinfo->ebplaca;
            if ($requestFuel->missioninfo) {
                $dado[] = $requestFuel->missioninfo->name_mission;
            } else {
                $dado[] = $requestFuel->fichainfo->nat_of_serv;
            }
            $dado[] = $requestFuel->destiny;
            $dado[] = $requestFuel->motinfo->pg . ' ' . $requestFuel->motinfo->name;
            switch ($requestFuel->status) {
                case 1:
                    $dado[] = 'Aguardando autorização';

                    break;
                case 2:
                    $dado[] = 'Autorizado';

                    break;
                case 3:
                    $dado[] = 'Abastecido';

                    break;
                case 4:
                    $dado[] = 'Negado';

                    break;

            }
            $dado[] = $requestFuel->fuel;
            $dado[] = ' <button class="btn btn-sm btn-primary" title="Ver dados" data-toggle="modal" data-target="#info-request-fuel" data-id="' . $requestFuel->id . '"
                                    ><i class="fas fa-arrow-right"></i></button>';

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
