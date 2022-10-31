<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GdaController extends Controller
{
    // public function vtrList(Request $request){

    //    //Receber a requisão da pesquisa
    //    $requestData = $request->all();

    //     //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
    //     $columns = array(
    //         0=> 'id',
    //         1=> 'id',
    //         2 =>'login',
    //         3 => 'login',
    //         4 => 'created_at',
    //         5 => 'created_at',
    //         6=> 'created_at',
    //         7=> 'created_at',
    //     );

    //    //Obtendo registros de número total sem qualquer pesquisa
    //    $rows = count(LoginModel::where('status', 3)->get());

    //    //Se há pesquisa ou não
    //     if( $requestData['search']['value'] )
    //     {
    //        $requests = LoginModel::with('data')->orWhere('login', 'LIKE', '%'.$requestData['search']['value'] .'%')->where('status', 3)->get();
    //         $filtered = count($requests);
    //     }
    //     else
    //     {
    //         $requests = LoginModel::with('data')->where('status', 3)->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'] )->offset( $requestData['start'])->take($requestData['length'])->get();
    //         $filtered = count($requests);
    //     }

    //     // Ler e criar o array de dados
    //     $dados = array();
    //     $i = 1;
    //     foreach ($requests as $request){
    //         $dado = array();
    //         $dado[] = $i++;
    //         $dado[] = $request->data->rank->rankAbbreviation;
    //         $dado[] = $request->data->professionalName;
    //         $dado[] = $request->data->name;
    //         $dado[] = $request->data->departament->name;
    //         $dado[] = $request->data->company->name;
    //            if ($request->email == '') {
    //                $dado[] = '-';
    //            }else{
    //                $dado[] = $request->email;
    //            }
    //         $dado[] = "
    //                     <button class='btn btn-success btn-md' title='Aceitar' data-toggle='modal' data-target='#confirm_request'
    //                      data-id='".$request->data->id."'>
    //                         <i class='fas fa-check'></i>
    //                     </button>
    //                     <button class='btn btn-danger btn-md' title='Excluir' onclick='return cancel_request(".$request->data->id.",".'"'.$request->data->professionalName.'"'.")'>
    //                         <i class='fas fa-times'></i>
    //                     </button>";
    //         $dados[] = $dado;
    //     }


    //     //Cria o array de informações a serem retornadas para o Javascript
    //     $json_data = array(
    //         "draw" => intval($requestData['draw']),//para cada requisição é enviado um número como parâmetro
    //         "recordsTotal" => intval( $filtered ),  //Quantidade de registros que há no banco de dados
    //         "recordsFiltered" => intval($rows ), //Total de registros quando houver pesquisa
    //         "data" => $dados   //Array de dados completo dos dados retornados da tabela
    //     );

    //     return json_encode($json_data);  //enviar dados como formato json

    // }
}
