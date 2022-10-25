<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecturaPatentes extends Model
{
    use HasFactory;

    protected $connection = 'mysql_ingresos';
    protected $table = "lecturaPatentes";

    protected $casts = [
        'fecha' => 'datetime',
        'fechaRegistro' => 'datetime',
    ];  

    public function tipolista() {
        return $this->hasOne(tipoLista::class,'id','idListaBlanca');
    }

    public function lista() {
        return $this->hasOne(listaBlancaVehiculos::class,'patente','patente');
    }
}
