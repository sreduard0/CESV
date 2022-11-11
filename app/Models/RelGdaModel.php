<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelGdaModel extends Model
{
    public function ficha()
    {
        return $this->hasMany('App\Models\FichaModel', 'id', 'id_ficha')->with('missioninfo', 'vtrinfo');
    }
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rel_gda';
    protected $primarykey = 'id';
}
