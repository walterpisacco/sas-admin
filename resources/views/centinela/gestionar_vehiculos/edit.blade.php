@extends('layouts.head')
@extends('layouts.footer')
@extends('layouts.menu-top')
@extends('centinela.layouts.menu-left')

@section('title')
    @lang('Editar Vehículo')
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
 @endif
<div class="row">
    <div class="card shadow col-md-4 offset-md-4">
        <form action="{{route('centinela.vehiculos.update', $vehiculo->id)}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" class="form-control" id="id" name="id" value="{{$vehiculo->id}}">
            <div class="form-group mt-4">
                <label for="patente" class="control-label">@lang('Patente')</label>
                <input type="text" class="form-control" id="patente" name="patente" placeholder="ej:AB123CD"
                value="{{$vehiculo->patente}}">
            </div> 
            <div class="form-group">
                <label for="destino" class="control-label">@lang('Destino')</label>
                <select class="form-control" id="destino" name="destino" required>
                    @isset($vehiculo->tipoSector)
                    <option value="{{$vehiculo->tipoSector->id}}">{{$vehiculo->tipoSector->descripcion}}</option>
                    @endisset
                    @foreach ($sectores as $sector)
                        <option value="{{$sector->id}}">{{$sector->descripcion}}</option>
                    @endforeach
                    <option value="">Ningún Sector</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">            
                    <div class="form-group">
                        <label for="fechaDesde" class="control-label">@lang('Desde')</label>
                        <input class="form-control" type="date" id="fechaDesde" name="fechaDesde"  placeholder=""
                        value="{{$vehiculo->fechaDesde->format('Y-m-d')}}">
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fechaHasta" class="control-label">@lang('Hasta')</label>
                        <input  type="date" class="form-control" id="fechaHasta" name="fechaHasta"  placeholder=""
                        value="@isset($vehiculo->fechaHasta){{$vehiculo->fechaHasta->format('Y-m-d')}}@endisset">
                    </div> 
                </div>
            </div>                               
            <div class="row">
                <div class="col-md-6">  
                    <div class="form-group">
                        <label for="marca" class="control-label">@lang('Marca')</label>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="ej:Chevrolet"
                        value="{{$vehiculo->marca}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="modelo" class="control-label">@lang('Modelo')</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="ej:Corsa"
                        value="{{$vehiculo->modelo}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="anio" class="control-label">Año</label>
                        <input type="text" class="form-control" id="anio" name="anio" placeholder="ej:2021"
                        value="{{$vehiculo->anio}}">
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="color" class="control-label">@lang('Color')</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="ej:Blanco"
                        value="{{$vehiculo->color}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="lista" class="control-label">@lang('Lista')</label>
                <select class="form-control" id="lista" name="lista" required>
                        @foreach ($tipoLista as $lista)
                            <option value="{{$lista->id}}">{{$lista->descripcion}}</option>
                        @endforeach
                </select>
            </div> 
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn100" value="Aceptar">
            </div>     
        </form>
    </div>
</div>

@endsection