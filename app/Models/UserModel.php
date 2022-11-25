<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    public function login()
    {
        return $this->hasOne('App\Models\LoginModel', 'users_id', 'id');
    }
    use HasFactory;
    protected $connection = 'sistao';
    use SoftDeletes;
    protected $table = 'users';
    protected $primarykey = 'id';
}
