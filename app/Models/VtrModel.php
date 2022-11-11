<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtrModel extends Model
{
    public function infoFicha()
    {
        return $this->hasOne('App\Models\FichaModel', 'id_vtr', 'id')->with('relgda')->where('status', 1);
    }
    use HasFactory;
    use SoftDeletes;
    protected $table = 'viatura';
    protected $primarykey = 'id';

}
