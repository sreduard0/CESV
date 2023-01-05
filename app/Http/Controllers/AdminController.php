<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\LoginApplicationModel;
use App\Models\LoginModel;
use App\Models\MissionModel;
use App\Models\ProfileModel;
use App\Models\RelGdaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function getGraphicMissionsOp()
    {
        $TotalMissionsOp = MissionModel::where('status', 3)->where('type_mission', 'OP')->whereYear('created_at', date('Y'))->count();
        $classes = ['I', 'II', 'III', 'IV', 'V-arm', 'V-mun', 'VI', 'VII', 'VIII', 'IX', 'X'];

        foreach ($classes as $class) {
            $months = [];
            $data = MissionModel::select('created_at', DB::raw('COUNT(id) as date'))
                ->whereYear('created_at', date('Y'))
                ->where('class', $class)
                ->where('type_mission', 'OP')
                ->where('status', 3)
                ->groupBy('created_at')
                ->get()->toArray();

            for ($i = 0; $i <= date('n') - 1; $i++) {
                $months[$i] = 0;
            }

            foreach ($data as $res) {
                $months[date('n', strtotime($res['created_at'])) - 1] += $res['date'];
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
        $totalOmOp = MissionModel::where('status', 3)->whereYear('created_at', date('Y'))->count();
        $type = ['OM', 'OP'];

        foreach ($type as $t) {
            $months = [];
            $data = MissionModel::select('created_at', DB::raw('COUNT(id) as type'))
                ->whereYear('created_at', date('Y'))
                ->where('type_mission', $t)
                ->where('status', 3)
                ->groupBy('created_at')
                ->get()->toArray();

            for ($i = 0; $i <= date('n') - 1; $i++) {
                $months[$i] = 0;
            }

            foreach ($data as $res) {
                $months[date('n', strtotime($res['created_at'])) - 1] += $res['type'];
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

        //Obtendo registros de número total sem qualquer pesquisa
        $rows = count(RelGdaModel::where('status', 2)->get());
        $rankVtrs = RelGdaModel::select('placaeb', DB::raw('COUNT(id) as count'))
            ->whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->where('status', 2)
            ->where('om', '3º B Sup')
            ->with('vtrinfo')
            ->groupBy('placaeb')
            ->orderBy('count', $requestData['order'][0]['dir'])
            ->limit(10)
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

    // GERENCIAMENTO DE USUÁRIOS

    // AÇÕES DE LOGIN
    //======={ LOGIN SUBMIT }=======//
    public function loginSubmit(LoginRequest $request)
    {
        $data = $request->all();
        //Verificar dados de login
        $login = trim($data['login']);
        $password = trim($data['password']);

        $user = LoginModel::with('data')->where('login', $login)->first();

        // Retorna mensagem de erro
        if (empty($user)) {
            session()->flash('erro', 'Este usuário não existe.');
            return redirect()->route('login');
        }

        if ($user->status == 3) {
            session()->flash('erro', 'Aguarde até que um administrador aceite seu cadastro.');
            return redirect()->route('login');
        }

        //Verifica se a senha ta correta
        if (!Hash::check($password, $user->password)) {
            session()->flash('erro', 'Usuário ou senha incorreto.');
            return redirect()->route('login');
        }

        $loginSistao = LoginApplicationModel::where('applications_id', 6)->where('login_id', $user->users_id)->first(); // buscando permissoes do usuario
        $loginCesv = LoginApplicationModel::where('id_ext', 'CES Vtr')->where('login_id', $user->users_id)->first(); // buscando permissoes do usuario
        if (!$loginSistao || !$loginCesv) {
            session()->flash('erro', 'Este usuário não tem permissão para acessar esta aplicação.');
            return redirect()->route('login');
        }

        $cesv = ProfileModel::where('id_user', $user->users_id)->first();
        if (!$cesv) {
            session()->flash('erro', 'Este usuário ainda não tem funçâo no CES Vtr.');
            return redirect()->route('login');
        }

        $rank = [1 => 'Gen', 2 => 'Cel', 3 => 'TC', 4 => 'Maj', 5 => 'Cap', 6 => '1º Ten', 7 => '2º Ten', 8 => 'Asp', 9 => 'ST', 10 => '1º Sgt', 11 => '2º Sgt', 12 => '3º Sgt', 13 => 'Cb', 14 => 'Sd'];
        $company = [1 => 'EM', 2 => 'CCSv', 3 => '1ª Cia', 4 => '2ª Cia', 5 => '3ª Cia'];

        // Inserindo permissoes na sessionecho $login;
        session()->put([
            'SisTAO' => [
                'profileType' => $loginSistao->profileType,
                'notification' => $loginSistao->notification,
                'loginID' => $loginSistao->login_id,
            ],
            'CESV' => [
                'profileType' => $cesv->profile,
                'notification' => $loginCesv->notification,
                'loginID' => $loginCesv->login_id,
            ],

            'user' => [
                'id' => $user->data->id,
                'name' => $user->data->name,
                'departament_id' => $user->data->departament_id,
                'photo' => $user->data->photoUrl,
                'professionalName' => $user->data->professionalName,
                'email' => $user->data->email,
                'rank' => $rank[$user->data->rank_id],
                'company' => [
                    'id' => $user->data->company_id,
                    'name' => $company[$user->data->company_id],
                ],
            ],

            'theme' => $user->theme,

        ]);

        return redirect()->route('home');
    }

    public function loginSistao()
    {
        if (session('CES Vtr') == '') {
            return redirect()->route('login');
        }
        $cesv = ProfileModel::where('id_user', session('user')['id'])->first();

        if (session('CES Vtr')['profileType'] == 1 && !$cesv) {
            session()->pull('CES Vtr');
            session()->put([
                'CESV' => [
                    'profileType' => 5,
                ],
            ]);

            return redirect()->route('home');
        }

        if (!$cesv) {
            session()->flash('erro', 'Este usuário ainda não tem funçâo.');
            return redirect()->back();
        }

        session()->pull('CES Vtr');
        session()->put([
            'CESV' => [
                'profileType' => $cesv->profile,
            ],
        ]);

        return redirect()->route('home');
    }

    public function userPerm($iduser, $profile = '', $id = '')
    {
        if ($id) {
            $perm = ProfileModel::find($id);
            if ($profile == 6) {
                $perm->delete();
            } else {
                $perm->profile = $profile;
                $perm->save();
            }
        } else {
            $perm = new ProfileModel();
            $perm->profile = $profile;
            $perm->id_user = $iduser;
            $perm->save();
        }

    }

    public function listUsers(Request $request)
    {
        // Receber a requisão da pesquisa
        $requestData = $request->all();
        $columns = array(
            0 => 'id',
            1 => 'profileType',
            2 => 'profileType',
        );

        $rows = count(LoginApplicationModel::where('id_ext', 'CES Vtr')->get());

        //Obtendo registros de número total sem qualquer pesquisa
        $users = LoginApplicationModel::select('login_id')->where('id_ext', 'CES Vtr')
            ->with('user_data', 'permission')
            ->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir'])
            ->offset($requestData['start'])
            ->take($requestData['length'])
            ->get();
        $filtered = count($users);
        $rank = [1 => 'Gen', 2 => 'Cel', 3 => 'TC', 4 => 'Maj', 5 => 'Cap', 6 => '1º Ten', 7 => '2º Ten', 8 => 'Asp', 9 => 'ST', 10 => '1º Sgt', 11 => '2º Sgt', 12 => '3º Sgt', 13 => 'Cb', 14 => 'Sd'];
        $profile = [0 => 'CMT GDA', 1 => 'TRNP', 2 => 'ADJ / OF ', 3 => 'COST', 4 => 'FISC ADM', 5 => 'ADT', 6 => 'ADM'];

        $dados = array();
        foreach ($users as $user) {
            $id = $user->permission ? $user->permission->id : "''";
            $prof = $user->permission ? $user->permission->profile : "''";
            $dado = array();
            $dado[] = $rank[$user->user_data->rank_id] . ' ' . $user->user_data->professionalName;
            $dado[] = $user->permission ? $profile[$user->permission->profile] : 'Sem permissão';
            if (session('CESV')['profileType'] == 6) {
                $dado[] = '<button title="Editar permissão" class="btn btn-sm btn-success" onclick="altPermission(' . $user->user_data->id . ',' . $prof . ',' . $id . ',\'' . $rank[$user->user_data->rank_id] . ' ' . $user->user_data->professionalName . '\')" ><i
                                        class="fa fa-edit"></i></button> ';

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
