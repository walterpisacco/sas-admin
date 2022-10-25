<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoSector extends Model
{
    use HasFactory;
    protected $connection = 'mysql_ingresos';
    protected $table = "tipoSector";
}
