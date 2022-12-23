<?php

namespace App\Http\Controllers;

use App\Classes\Tools;
use App\Http\Controllers\Controller;
use App\Http\Requests\MotRequest;
use App\Models\FichaModel;
use App\Models\MotModel;
use Illuminate\Http\Request;

class MotController extends Controller
{
    private $Tools;
    public function __construct()
    {
        $this->Tools = new Tools();
    }
    // INFORMAÇÕES DO MOTORISTA
    public function infoMot($id)
    {
        return MotModel::find($id);
    }

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
        $driver->contact = str_replace([' ', '(', ')', '-'], '', $data['contactMot']);
        $driver->cnh = $data['cnhMot'];
        $driver->val_cnh = date('Y-m-d', strtotime($data['ValCnhMot']));
        $driver->idt_mil = $data['idtMot'];
        $driver->mopp = $data['mopp'] == null ? 0 : 1;
        $driver->tc = $data['tc'] == null ? 0 : 1;
        $driver->cve = $data['cve'] == null ? 0 : 1;
        $driver->ci = $data['ci'] == null ? 0 : 1;
        $driver->save();

    }
    public function editMot(MotRequest $request)
    {
        $data = $request->all();
        if (MotModel::where('cnh', $data['cnhMot'])->where('id', '!=', $data['id_mot'])->first()) {
            return 'cnh';
        }
        if (MotModel::where('idt_mil', $data['idtMot'])->where('id', '!=', $data['id_mot'])->first()) {
            return 'idt';
        }

        $driver = MotModel::find($data['id_mot']);
        $driver->pg = $data['pgMot'];
        $driver->name = $data['nameMot'];
        $driver->cat = $data['catMot'];
        $driver->full_name = $data['fullNameMot'];
        $driver->contact = str_replace([' ', '(', ')', '-'], '', $data['contactMot']);
        $driver->cnh = $data['cnhMot'];
        $driver->val_cnh = date('Y-m-d', strtotime($data['ValCnhMot']));
        $driver->idt_mil = $data['idtMot'];
        $driver->mopp = $data['mopp'] == null ? 0 : 1;
        $driver->tc = $data['tc'] == null ? 0 : 1;
        $driver->cve = $data['cve'] == null ? 0 : 1;
        $driver->ci = $data['ci'] == null ? 0 : 1;

        $driver->save();

    }

    public function deleteMot($id)
    {
        if (FichaModel::where('id_mot', $id)->where('status', 1)->first()) {
            return 'ficha';
        }
        MotModel::find($id)->delete();
    }
    // TABELA LISTA DE MOTORISTA
    public function listMot(Request $request)
    {

        //Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'name',
            1 => 'full_name',
            2 => 'cnh',
            3 => 'cat',
            4 => 'val_cnh',
            5 => 'idt_mil',
            6 => 'contact',
            7 => 'id',
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
            $dado[] = $driver->pg;
            $dado[] = $driver->name;
            $dado[] = $driver->full_name;
            $dado[] = $driver->cnh;
            $dado[] = $driver->cat;
            $dado[] = date('d-m-Y', strtotime($driver->val_cnh));
            $dado[] = $driver->idt_mil;
            $dado[] = $this->Tools->mask('(##) # ####-####', $driver->contact) . " <a href='https://api.whatsapp.com/send?phone=55" . $driver->contact . "' target='_blank' title='WhatsApp' class='float-r btn btn-sm btn-success'><i class='fab fa-whatsapp'></i></a>";
            if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 6) {
                $dado[] = '
                         <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mot-profile" data-id="' . $driver->id . '"
                                    ><i class="fa fa-user"></i></button>
                         <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit-drive" data-id="' . $driver->id . '"
                                    ><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"  onclick="deleteMot(' . $driver->id . ')"><i
                                        class="fa fa-trash"></i></button>';
            } else if (session('CESV')['profileType'] == 5) {
                $dado[] = '
                         <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#mot-profile" data-id="' . $driver->id . '"
                                    ><i class="fa fa-user"></i></button>';
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
