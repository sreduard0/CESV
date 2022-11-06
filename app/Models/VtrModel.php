<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VtrModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'viatura';
    protected $primarykey = 'id';

}
