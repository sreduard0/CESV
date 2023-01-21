<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FuelModel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
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
        if ($requestData['columns'][3]['search']['value']) {
            $fichas = FuelModel::where('status', $requestData['columns'][3]['search']['value'])->with('motinfo')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($fichas);
            $rows = count(FuelModel::where('status', $requestData['columns'][3]['search']['value'])->get());
        } else {
            $rows = count(FuelModel::where('status', '>=', 2)->get());

            $fichas = FuelModel::where('status', '>=', 2)->with('motinfo', 'vtrinfo', 'missioninfo')->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($fichas);
        }
        // Ler e criar o array de dados
        $dados = array();
        foreach ($fichas as $ficha) {
            $dado = array();
            $dado[] = $ficha->id;
            $dado[] = $ficha->vtrinfo->id;
            $dado[] = $ficha->missioninfo->id;
            $dado[] = $ficha->motinfo->id;

            if ($ficha->status == 1) {
                $dado[] = 'Aguardando autorização';
            } elseif ($ficha->status == 2) {
                $dado[] = 'Autorizada';

            } elseif ($ficha->status == 3) {
                $dado[] = 'Abastecida';

            }

            switch (session('CESV')['profileType']) {
                case 1:
                    $btns = $ficha->status == 1 || $ficha->status == 3 ? '<button title="Editar ficha" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-ficha" data-id="' . $ficha->id . '"><i
                                        class="fa fa-edit"></i></button>
                        <button title="Fechar ficha" class="btn btn-sm btn-danger" data-toggle="modal" onclick="finishFicha(' . $ficha->id . ')"><i
                                        class="fa fa-times"></i></button>' : '';

                    $dado[] = ' <button class="btn btn-sm btn-info" title="Motorista" data-toggle="modal" data-target="#mot-profile" data-id="' . $ficha->id_mot . '"
                                    ><i class="fa fa-user"></i></button> <button title="Informações da viatura" class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $ficha->id_vtr . '"><i
                                        class="fa fa-car"></i></button> ' . $btns;

                    break;
                case 4:
                    $btn = $ficha->status == 3 ? ' <button title="Autorizar ficha" class="btn btn-sm btn-success" onclick="return authFicha(' . $ficha->id . ')"><i
                                        class="fa fa-check"></i></button>' : '';
                    $btnclose = $ficha->status == 1 ? ' <button title="Encerrar ficha" class="btn btn-sm btn-danger" onclick="return finishFicha(' . $ficha->id . ')"><i
                                        class="fs-18 fa fa-times"></i></button>' : '';

                    $dado[] = ' <button class="btn btn-sm btn-info" title="Motorista" data-toggle="modal" data-target="#mot-profile" data-id="' . $ficha->id_mot . '"
                                    ><i class="fa fa-user"></i></button> <button title="Informações da viatura" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-vtr" data-id="' . $ficha->id_vtr . '"><i
                                        class="fa fa-car"></i></button> ' . $btn . $btnclose;

                    break;
                case 5:
                    $dado[] = ' <button class="btn btn-sm btn-info" title="Motorista" data-toggle="modal" data-target="#mot-profile" data-id="' . $ficha->id_mot . '"
                                    ><i class="fa fa-user"></i></button> <button title="Informações da viatura" class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $ficha->id_vtr . '"><i
                                        class="fa fa-car"></i></button> ';

                    break;
                case 6:
                    $btn = $ficha->status == 3 ? ' <button title="Autorizar ficha" class="btn btn-sm btn-success" onclick="return authFicha(' . $ficha->id . ')"><i
                                        class="fa fa-check"></i></button>' : ' <button title="Fechar ficha" class="btn btn-sm btn-danger" data-toggle="modal" onclick="finishFicha(' . $ficha->id . ')"><i
                                        class="fa fa-times"></i></button>';

                    $btns = $ficha->status == 1 || $ficha->status == 3 ? '<button title="Editar ficha" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-ficha" data-id="' . $ficha->id . '"><i
                                        class="fa fa-edit"></i></button>' . $btn : '';

                    $dado[] = ' <button class="btn btn-sm btn-info" title="Motorista" data-toggle="modal" data-target="#mot-profile" data-id="' . $ficha->id_mot . '"
                                    ><i class="fa fa-user"></i></button> <button title="Informações da viatura" class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $ficha->id_vtr . '"><i
                                        class="fa fa-car"></i></button> ' . $btns;

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
