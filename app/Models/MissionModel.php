<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionModel extends Model
{
    public function vtrinfo(){
        return $this->hasOne('App\Models\VtrModel','id' , 'vtr');
    }
    use HasFactory;
    protected $table = 'missions';
    protected $primarykey = 'id';
}
