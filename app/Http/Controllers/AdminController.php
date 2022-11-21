<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MissionModel;
use App\Models\RelGdaModel;
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

        $response = [];
        $data = RelGdaModel::select('type_veicle', DB::raw('COUNT(id) as type'))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->where('status', 2)
            ->groupBy('type_veicle')
            ->orderBy('type', 'asc');

        foreach ($data->get()->toArray() as $res) {
            $response[$res['type_veicle']] = $res['type'];
        }

        $valN = 500;
        $valA = 180;
        $val = ($valN - $valA) / $valA * 100;

        echo ($val . ' %');
        // return [
        //     // 'totalOmOp' => $totalOmOp,
        //     'statistics' => [$response['civil'], $response['oom'], $response['adm'] + $response['op']],

        // ];

    }

}
