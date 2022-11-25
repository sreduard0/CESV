<?php

return [

    /*
    |------------------------------------------------- -------------------------
    | Padrões de autenticação
    |------------------------------------------------- -------------------------
    |
    | Esta opção controla o "guard" de autenticação padrão e a senha
    | opções de redefinição para seu aplicativo. Você pode alterar esses padrões
    | conforme necessário, mas são um começo perfeito para a maioria dos aplicativos.
    |
     */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |------------------------------------------------- -------------------------
    | Guardas de Autenticação
    |------------------------------------------------- -------------------------
    |
    | Em seguida, você pode definir cada proteção de autenticação para seu aplicativo.
    | Claro, uma ótima configuração padrão foi definida para você
    | aqui que usa armazenamento de sessão e o provedor de usuário Eloquent.
    |
    | Todos os drivers de autenticação têm um provedor de usuário. Isso define como o
    | os usuários são realmente recuperados de seu banco de dados ou outro armazenamento
    | mecanismos usados por este aplicativo para manter os dados do seu usuário.
    |
    | Suportado: "sessão"
    |
     */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'profile',
        ],
    ],

/*
|------------------------------------------------- -------------------------
| Provedores de usuários
|------------------------------------------------- -------------------------
|
| Todos os drivers de autenticação têm um provedor de usuário. Isso define como o
| os usuários são realmente recuperados de seu banco de dados ou outro armazenamento
| mecanismos usados por este aplicativo para manter os dados do seu usuário.
|
| Se você tiver várias tabelas ou modelos de usuário, poderá configurar vários
| fontes que representam cada modelo/tabela. Estas fontes podem então
| ser atribuído a qualquer proteção de autenticação extra que você definiu.
|
| Suportado: "banco de dados", "eloquente"
|
 */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\UserModel::class,
        ],

        'profile' => [
            'driver' => 'eloquent',
            'model' => App\Models\ProfileModel::class,
        ],
    ],

    /*
    |------------------------------------------------- -------------------------
    | Redefinindo senhas
    |------------------------------------------------- -------------------------
    |
    | Você pode especificar várias configurações de redefinição de senha se tiver mais
    | mais de uma tabela ou modelo de usuário no aplicativo e você deseja ter
    | configurações de redefinição de senha separadas com base nos tipos de usuário específicos.
    |
    | O tempo de expiração é o número de minutos que cada token de redefinição será
    | considerado válido. Esse recurso de segurança mantém os tokens de curta duração, portanto
    | eles têm menos tempo para serem adivinhados. Você pode alterar isso conforme necessário.
    |
     */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |------------------------------------------------- -------------------------
    | Tempo Limite de Confirmação de Senha
    |------------------------------------------------- -------------------------
    |
    | Aqui você pode definir a quantidade de segundos antes de uma confirmação de senha
    | expira e o usuário é solicitado a digitar novamente sua senha por meio do
    | tela de confirmação. Por padrão, o tempo limite dura três horas.
    |
     */

    'password_timeout' => 10800,

];
