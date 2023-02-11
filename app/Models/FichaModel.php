<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FichaModel extends Model
{
    public function motinfo()
    {
        return $this->hasOne('App\Models\MotModel', 'id', 'id_mot')->withTrashed();
    }
    public function fuelinfo()
    {
        return $this->hasOne('App\Models\FuelModel', 'id_ficha', 'id')->where('status', 3)->withTrashed();
    }
    public function vtrinfo()
    {
        return $this->hasOne('App\Models\VtrModel', 'id', 'id_vtr')->withTrashed();
    }
    public function missioninfo()
    {
        return $this->hasOne('App\Models\MissionModel', 'id', 'id_mission')->withTrashed();
    }
    public function relgda()
    {
        return $this->hasOne('App\Models\RelGdaModel', 'id_ficha', 'id')->where('status', 1)->withTrashed();
    }
    use HasFactory;
    use SoftDeletes;
    protected $table = 'fichas';
    protected $primarykey = 'id';

}
