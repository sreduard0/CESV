<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MotRequest;
use App\Models\MotModel;
use Illuminate\Http\Request;

class MotController extends Controller
{
    // CRUD
    public function registerMot(MotRequest $request)
    {
        $data = $request->all();
        if (MotModel::where('cnh', $data['cnhMot'])->first()) {
            return 'cnh';
        }
        if (MotModel::where('idt_mil', $data['idtMot'])->first()) {
            return 'idt';
        }

        $driver = new MotModel();
        $driver->pg = $data['pgMot'];
        $driver->name = $data['nameMot'];
        $driver->cat = $data['catMot'];
        $driver->full_name = $data['fullNameMot'];
        $driver->contact = $data['contactMot'];
        $driver->cnh = $data['cnhMot'];
        $driver->val_cnh = date('Y-m-d', strtotime($data['ValCnhMot']));
        $driver->idt_mil = $data['idtMot'];
        $driver->save();

    }
    // TABELA LISTA DE MOTORISTA
    public function listMot(Request $request)
    {

        //Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'name',
            1 => 'cnh',
            2 => 'cat',
            3 => 'val_cnh',
            4 => 'contact',
            5 => 'id',
        );

        //Obtendo registros de número total sem qualquer pesquisa
        $rows = count(MotModel::all());

        //Se há pesquisa ou não
        if ($requestData['columns'][3]['search']['value']) {
            $drivers = MotModel::where('cat', $requestData['columns'][3]['search']['value'])->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($drivers);
        } else {
            $drivers = MotModel::orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])->offset($requestData['start'])->take($requestData['length'])->get();
            $filtered = count($drivers);
        }

        // Ler e criar o array de dados
        $dados = array();
        foreach ($drivers as $driver) {
            $dado = array();
            $dado[] = $driver->pg . ' ' . $driver->name;
            $dado[] = $driver->cnh;
            $dado[] = $driver->cat;
            $dado[] = date('d-m-Y', strtotime($driver->val_cnh));
            $dado[] = $driver->contact;
            $dado[] = '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info-driver" data-id="' . $driver->id . '"
                                    ><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit-driver" data-id="' . $driver->id . '"
                                    ><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete" onclick="deletedriver(' . $driver->id . ')"><i
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
