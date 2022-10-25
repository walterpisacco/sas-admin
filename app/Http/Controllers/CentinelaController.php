<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\listaBlancaVehiculos;
use App\Models\lecturaPatentes;
use App\Models\tipoLista;
use App\Models\tipoSector;
use Illuminate\Support\Facades\Auth;

class CentinelaController extends Controller
{
    public function menu(){
        return view('centinela.menu');
    }

    public function vehiculos_list(){
        $listaBlanca = listaBlancaVehiculos::where('idCliente',auth()->user()->id_client)->get();
        return view('centinela.gestionar_vehiculos.list',compact('listaBlanca'));
    }

    public function vehiculos_create(){
        $tipoLista = tipoLista::where('cliente',auth()->user()->id_client)->get();
        $sectores = tipoSector::all();
        return view('centinela.gestionar_vehiculos.create',compact('tipoLista'),compact('sectores'));
    }

    public function store(){
        $listaBlanca = listaBlancaVehiculos::where('idCliente',auth()->user()->id_client)->get();
        return view('centinela.gestionar_vehiculos.list',compact('listaBlanca'));
    }

    public function vehiculos_edit(Request $request){
        $tipoLista = tipoLista::where('cliente',auth()->user()->id_client)->get();
        $vehiculo = listaBlancaVehiculos::where('idCliente',auth()->user()->id_client)->where('id',$request->id)->first();
        $sectores = tipoSector::where('cliente',auth()->user()->id_client)->get();
        $data=[
            'vehiculo' => $vehiculo,
            'tipoLista' => $tipoLista,
            'sectores'    => $sectores
        ];
        return view('centinela.gestionar_vehiculos.edit',$data);
    }    

    public function vehiculos_update(Request $request){
        $vehiculo= listaBlancaVehiculos::where('id',$request->id)->where('idCliente',auth()->user()->id_client)->first();
        $vehiculo->marca = strtoupper($request->marca);
        $vehiculo->modelo = strtoupper($request->modelo);
        $vehiculo->anio = strtoupper($request->anio);
        $vehiculo->color = strtoupper($request->color);
        $vehiculo->fechaDesde = ($request->fechaDesde);
        $vehiculo->fechaHasta = ($request->fechaHasta);
        $vehiculo->destino = ($request->destino);

        $vehiculo->update();

        $listaBlanca = listaBlancaVehiculos::where('idCliente',auth()->user()->id_client)->get();
        return view('centinela.gestionar_vehiculos.list',compact('listaBlanca'));
    }

    public function vehiculos_del(Request $request){
        $vehiculo = listaBlancaVehiculos::where('idCliente',auth()->user()->id_client)->where('id',$request->id)->first();
        $vehiculo->delete();

            $result = array();
            $result['success'] = 'true';
            $result['texto'] = 'Vehiculo eliminado con éxito!';
            
            return json_encode($result);
    }

    public function vehiculos_ing(){
        $lecturas = lecturaPatentes::where('idCliente',auth()->user()->id_client)->get();
        $sectores = tipoSector::where('cliente',auth()->user()->id_client)->get();
        return view('centinela.lectura_vehiculos.list',compact('lecturas'),compact('sectores'));
    }

    public function ingresos_update(Request $request){
        $lectura= lecturaPatentes::where('id',$request->id)->where('idCliente',auth()->user()->id_client)->first();
        $patenteAnt = strtoupper($lectura->patente);
        $lectura->patente = strtoupper($request->patente);
        $lectura->update();

        $lectura= listaBlancaVehiculos::where('patente',$patenteAnt)->where('idCliente',auth()->user()->id_client)->first();
        if(isset($lectura)){
            $lectura->patente = strtoupper($request->patente);
            $lectura->update();
        }

        $result = array();
        $result['success'] = 'true';
        $result['texto'] = 'Lectura actualiada con éxito!';
        
        return json_encode($result);
    }    

    public function destinov_update(Request $request){
        $lectura= listaBlancaVehiculos::where('patente',$request->patente)->where('idCliente',auth()->user()->id_client)->first();
        if(isset($lectura)){
            $lectura->destino = strtoupper($request->destino);
            $lectura->update();
        }

        $result = array();
        $result['success'] = 'true';
        $result['texto'] = 'Destino actualiado con éxito!';
        
        return json_encode($result);
    } 

    public function personas_list(){
        return view('centinela.menu');
    }
    public function personas_ing(){
        return view('centinela.menu');
    }


}
