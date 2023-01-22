<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuelModel extends Model
{
    public function motinfo()
    {
        return $this->hasOne('App\Models\MotModel', 'id', 'id_mot')->withTrashed();
    }
    public function vtrinfo()
    {
        return $this->hasOne('App\Models\VtrModel', 'id', 'id_vtr')->withTrashed();
    }
    public function missioninfo()
    {
        return $this->hasOne('App\Models\MissionModel', 'id', 'id_mission')->withTrashed();
    }
    public function fichainfo()
    {
        return $this->hasOne('App\Models\FichaModel', 'id', 'id_ficha')->withTrashed();
    }
    use HasFactory;
    use SoftDeletes;
    protected $table = 'fuel';
    protected $primarykey = 'id';
}
