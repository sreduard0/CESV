<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginApplicationModel extends Model
{
    public function user_data()
    {
        return $this->hasOne('App\Models\UserModel', 'id', 'login_id')->withTrashed();
    }
    public function permission()
    {
        return $this->hasOne('App\Models\ProfileModel', 'id_user', 'login_id');
    }
    use HasFactory;
    protected $connection = 'sistao';
    protected $table = 'login_application';
    protected $primarykey = 'login_id';
}
