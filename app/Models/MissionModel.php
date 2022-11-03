<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MissionModel extends Model
{
    public function vtrinfo(){
        return $this->hasOne('App\Models\VtrModel','id' , 'vtr');
    }
    use HasFactory;
    use SoftDeletes;
    protected $table = 'missions';
    protected $primarykey = 'id';
}
