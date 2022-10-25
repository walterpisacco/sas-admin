<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class listaBlancaVehiculos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'mysql_ingresos';
    protected $table = "listaBlancaVehiculos";

    protected $casts = [
        'fechaDesde' => 'datetime',
        'fechaHasta' => 'datetime',
    ];

    public function tipoSector(){
        return $this->hasOne(tipoSector::class,'id','destino');
    }
}
