<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MissionModel;
use App\Models\RelGdaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getGraphicMissionsOp()
    {
        $TotalMissionsOp = MissionModel::where('status', 3)->where('type_mission', 'OP')->count();
        $classes = ['I', 'II', 'III', 'IV', 'V-arm', 'V-mun', 'VI', 'VII', 'VIII', 'IX', 'X'];

        foreach ($classes as $class) {
            $months = [];
            $data = MissionModel::select('created_at', DB::raw('COUNT(id) as date'))
                ->whereYear('created_at', date('Y'))
                ->where('class', $class)
                ->groupBy('created_at')
                ->orderBy('date', 'asc')
                ->get()->toArray();

            for ($i = 0; $i <= date('n') - 1; $i++) {
                $months[$i] = 0;
            }

            foreach ($data as $res) {
                $months[date('n', strtotime($res['created_at'])) - 1] = $res['date'];
            }

            $statistics[$class] = $months;
        }

        return [
            'TotalMissionsOp' => $TotalMissionsOp,
            'statisticsMission' => [
                [
                    'type' => 'line',
                    'data' => $statistics['I'],
                    'backgroundColor' => 'transparent',
                    'borderColor' => '#28a745 ',
                    'pointBorderColor' => '#28a745 ',
                    'pointBackgroundColor' => '#28a745 ',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['II'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => '#007bff',
                    'pointBorderColor' => '#007bff',
                    'pointBackgroundColor' => '#007bff',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['III'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => '#6c757d ',
                    'pointBorderColor' => '#6c757d ',
                    'pointBackgroundColor' => '#6c757d ',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['IV'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => '#ffc107',
                    'pointBorderColor' => '#ffc107',
                    'pointBackgroundColor' => '#ffc107',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['V-arm'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => '#17a2b8 ',
                    'pointBorderColor' => '#17a2b8 ',
                    'pointBackgroundColor' => '#17a2b8 ',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['V-mun'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => '#dc3545 ',
                    'pointBorderColor' => '#dc3545 ',
                    'pointBackgroundColor' => '#dc3545 ',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['VI'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => 'blueviolet',
                    'pointBorderColor' => 'blueviolet',
                    'pointBackgroundColor' => 'blueviolet',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['VII'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => 'rgb(250, 4, 151)',
                    'pointBorderColor' => 'rgb(250, 4, 151)',
                    'pointBackgroundColor' => 'rgb(250, 4, 151)',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['VIII'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => 'rgb(11, 2, 112)',
                    'pointBorderColor' => 'rgb(11, 2, 112)',
                    'pointBackgroundColor' => 'rgb(11, 2, 112)',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['IX'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => 'rgb(7, 42, 20)',
                    'pointBorderColor' => 'rgb(7, 42, 20)',
                    'pointBackgroundColor' => 'rgb(7, 42, 20)',
                    'fill' => false,
                ],
                [
                    'type' => 'line',
                    'data' => $statistics['X'],
                    'backgroundColor' => 'tansparent',
                    'borderColor' => 'rgb(25, 8, 41)',
                    'pointBorderColor' => 'rgb(25, 8, 41)',
                    'pointBackgroundColor' => 'rgb(25, 8, 41)',
                    'fill' => false,
                ],
            ],

        ];

    }
    public function getGraphicMissionsOmOp()
    {
        $totalOmOp = MissionModel::where('status', 3)->count();
        $type = ['OM', 'OP'];

        foreach ($type as $t) {
            $months = [];
            $data = MissionModel::select('created_at', DB::raw('COUNT(id) as type'))
                ->whereYear('created_at', date('Y'))
                ->where('type_mission', $t)
                ->groupBy('created_at')
                ->orderBy('type', 'asc')
                ->get()->toArray();

            for ($i = 0; $i <= date('n') - 1; $i++) {
                $months[$i] = 0;
            }

            foreach ($data as $res) {
                $months[date('n', strtotime($res['created_at'])) - 1] = $res['type'];
            }

            $statistics[$t] = $months;
        }

        return [
            'totalOmOp' => $totalOmOp,
            'statistics' => [
                [
                    'backgroundColor' => '#6c757d ',
                    'borderColor' => '#6c757d ',
                    'data' => $statistics['OP'],
                ],
                [
                    'backgroundColor' => '#ffc107 ',
                    'borderColor' => '#ffc107 ',
                    'data' => $statistics['OM'],
                ],

            ],

        ];

    }
    public function getGraphicRelGda()
    {

        $currentmonth['civil'] = 0;
        $currentmonth['oom'] = 0;
        $currentmonth['adm'] = 0;
        $currentmonth['op'] = 0;
        // MÊS ATUAL
        $datacurrentmonth = RelGdaModel::select('type_veicle', DB::raw('COUNT(id) as type'))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->where('status', 2)
            ->groupBy('type_veicle')
            ->orderBy('type', 'asc');

        foreach ($datacurrentmonth->get()->toArray() as $res) {
            $currentmonth[$res['type_veicle']] = $res['type'];
        }

        // MÊS ANTERIOR
        $lastmonth = [];
        $datalastmonth = RelGdaModel::select('type_veicle', DB::raw('COUNT(id) as type'))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m', strtotime('-1 month')))
            ->where('status', 2)
            ->groupBy('type_veicle')
            ->orderBy('type', 'asc');

        foreach ($datalastmonth->get()->toArray() as $res) {
            $lastmonth[$res['type_veicle']] = $res['type'];
        }

        $civilCurrent = isset($currentmonth['civil']) ? $currentmonth['civil'] : 0;
        $civilLast = isset($lastmonth['civil']) ? $lastmonth['civil'] : 0;
        $calcCivil = $civilLast == 0 ? 0 : ($civilCurrent - $civilLast) / $civilLast * 100;
        $percentage['civil'] = round($calcCivil, 2, PHP_ROUND_HALF_DOWN);

        $oomCurrent = isset($currentmonth['oom']) ? $currentmonth['oom'] : 0;
        $oomLast = isset($lastmonth['oom']) ? $lastmonth['oom'] : 0;
        $calcOom = $oomLast == 0 ? 0 : ($oomCurrent - $oomLast) / $oomLast * 100;
        $percentage['oom'] = round($calcOom, 2, PHP_ROUND_HALF_DOWN);

        $vtradmC = isset($currentmonth['adm']) ? $currentmonth['adm'] : 0;
        $vtropC = isset($currentmonth['op']) ? $currentmonth['op'] : 0;
        $vtradmL = isset($lastmonth['adm']) ? $lastmonth['adm'] : 0;
        $vtropL = isset($lastmonth['op']) ? $lastmonth['op'] : 0;
        $omCurrent = $vtradmC + $vtropC;
        $omLast = $vtradmL + $vtropL;
        $calcOm = $omLast == 0 ? 0 : ($omCurrent - $omLast) / $omLast * 100;
        $percentage['om'] = round($calcOm, 2, PHP_ROUND_HALF_DOWN);

        return [
            'percentage' => $percentage,
            'statistics' => [$currentmonth['civil'], $currentmonth['oom'], $currentmonth['adm'] + $currentmonth['op']],

        ];

    }

    public function rankVtr(Request $request)
    {
        // Receber a requisão da pesquisa
        $requestData = $request->all();

        //Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
        $columns = array(
            0 => 'mod_vtr',
            1 => 'vtr_type',
            2 => 'ebplaca',
            3 => 'id',
        );

        //Obtendo registros de número total sem qualquer pesquisa
        $rows = count(RelGdaModel::where('status', 2)->get());
        $rankVtrs = RelGdaModel::select('placaeb', DB::raw('COUNT(id) as count'))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->where('status', 2)
            ->where('om', '3º B Sup')
            ->with('vtrinfo')
            ->groupBy('type_veicle')
            ->orderBy('count', $requestData['order'][0]['dir'])
            ->get();

        $filtered = count($rankVtrs);

        $dados = array();
        foreach ($rankVtrs as $rankVtr) {
            $dado = array();
            $dado[] = $rankVtr->count;
            $dado[] = $rankVtr->vtrinfo->mod_vtr;
            $dado[] = $rankVtr->vtrinfo->type_vtr;
            $dado[] = $rankVtr->vtrinfo->ebplaca;
            $dado[] = '<button title="Informações da viatura" class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr" data-id="' . $rankVtr->vtrinfo->id . '"><i
                                        class="fa fa-car"></i></button> ';

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
