<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginApplicationModel extends Model
{
    public function app()
    {
        return $this->hasOne('App\Models\ApplicationsModel', 'id', 'applications_id');
    }
    public function apps()
    {
        return $this->hasMany('App\Models\ApplicationsModel', 'id', 'applications_id');
    }

    use HasFactory;
    protected $connection = 'sistao';
    protected $table = 'login_application';
    protected $primarykey = 'login_id';
}
