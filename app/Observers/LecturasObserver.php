<?php

namespace App\Observers;
use App\Models\lecturaPatentes;
use App\Models\listaBlancaVehiculos;
use Carbon\Carbon;

class LecturasObserver
{
    public function created(lecturaPatentes $lecturaPatentes)
    {
        $data = [
            'idCliente' => 1,
            'patente' => 'aa',
            'fechaDesde' => Carbon::today(),
            'fechaHasta' => Carbon::today(),
            'fecha' => Carbon::today(),
            'estado' => 1,
            'lista' => 1,
            'idUsuario' => 0
        ];
        $listaBlancaVehiculos->store($data);

    }
}
