<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'cuit',
        'nombre',
        'razon_social',
        'direccion',
        'id_pais',
        'estado'
    ];
}
