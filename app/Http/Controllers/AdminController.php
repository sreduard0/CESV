<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MissionModel;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getGraphicMissions()
    {

        $min_config = config('admin.min_months_to_display');
        $labels = config('admin.months');
        $months = [];
        for ($i = 1; $i <= $min_config; $i++) {
            $months[$labels[$i]] = 0;
        }

        $data = MissionModel::select('class', DB::raw('COUNT(id) as class'))
            ->where('status', '3')
            ->where('type_mission', 'OP')
            ->groupBy('class')
            ->orderBy('class', 'desc')
            ->get();

        foreach ($data as $res) {
            $months[$res['month']] = $res['visits'];
        }

        return $months;

        // $data = MissionModel::select('class', DB::raw('COUNT(id) as class'))
        //     ->where('status', '3')
        //     ->where('type_mission', 'OP')

        //     ->groupBy('created_at')
        //     ->groupBy('class')
        //     ->orderBy('class', 'desc')
        //     ->get();

        // echo ($data . '<br>');

        // foreach ($data as $val) {
        //     echo ($val->class . '<br>');

        // }
        // return [
        //     [
        //         'type' => 'line',
        //         'data' => [10, 12, 17, 10, 18, 17, 3, 17, 17, 17, 17, 17],
        //         'backgroundColor' => 'transparent',
        //         'borderColor' => '#28a745 ',
        //         'pointBorderColor' => '#28a745 ',
        //         'pointBackgroundColor' => '#28a745 ',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [9, 10, 7, 6, 6, 2, 10, 10, 10, 10, 10, 10],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => '#007bff',
        //         'pointBorderColor' => '#007bff',
        //         'pointBackgroundColor' => '#007bff',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [10, 40, 7, 77, 8, 20, 10, 10, 10, 10, 10],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => '#6c757d ',
        //         'pointBorderColor' => '#6c757d ',
        //         'pointBackgroundColor' => '#6c757d ',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [10, 32, 70, 67, 65, 19, 12],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => '#ffc107',
        //         'pointBorderColor' => '#ffc107',
        //         'pointBackgroundColor' => '#ffc107',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [15, 2, 25, 97, 65, 59, 12],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => '#17a2b8 ',
        //         'pointBorderColor' => '#17a2b8 ',
        //         'pointBackgroundColor' => '#17a2b8 ',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [10, 32, 70, 67, 65, 19, 12],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => '#dc3545 ',
        //         'pointBorderColor' => '#dc3545 ',
        //         'pointBackgroundColor' => '#dc3545 ',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [10, 32, 70, 150, 65, 19, 12],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => 'blueviolet',
        //         'pointBorderColor' => 'blueviolet',
        //         'pointBackgroundColor' => 'blueviolet',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [10, 32, 70, 67, 350, 19, 12],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => 'rgb(250, 4, 151)',
        //         'pointBorderColor' => 'rgb(250, 4, 151)',
        //         'pointBackgroundColor' => 'rgb(250, 4, 151)',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [10, 32, 70, 67, 65, 19, 12],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => 'rgb(11, 2, 112)',
        //         'pointBorderColor' => 'rgb(11, 2, 112)',
        //         'pointBackgroundColor' => 'rgb(11, 2, 112)',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [10, 32, 70, 67, 85, 19, 12],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => 'rgb(7, 42, 20)',
        //         'pointBorderColor' => 'rgb(7, 42, 20)',
        //         'pointBackgroundColor' => 'rgb(7, 42, 20)',
        //         'fill' => false,
        //     ],
        //     [
        //         'type' => 'line',
        //         'data' => [10, 32, 70, 67, 65, 529, 12],
        //         'backgroundColor' => 'tansparent',
        //         'borderColor' => 'rgb(25, 8, 41)',
        //         'pointBorderColor' => 'rgb(25, 8, 41)',
        //         'pointBackgroundColor' => 'rgb(25, 8, 41)',
        //         'fill' => false,
        //     ],
        // ];

    }
}
