<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VtrModel extends Model
{
    use HasFactory;
    protected $table = 'viatura';
    protected $primarykey = 'id';
}