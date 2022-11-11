<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FichaModel extends Model
{
    public function vtrinfo()
    {
        return $this->hasOne('App\Models\VtrModel', 'id', 'id_vtr');
    }
    public function missioninfo()
    {
        return $this->hasOne('App\Models\MissionModel', 'id', 'id_mission');
    }
    public function relgda()
    {
        return $this->hasOne('App\Models\RelGdaModel', 'id_ficha', 'id')->where('status', 1);
    }
    use HasFactory;
    use SoftDeletes;
    protected $table = 'fichas';
    protected $primarykey = 'id';

}
