<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelGdaModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rel_gda';
    protected $primarykey = 'id';
}
