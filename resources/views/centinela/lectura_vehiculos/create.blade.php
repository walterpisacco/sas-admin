@extends('layouts.head')
@extends('layouts.footer')
@extends('layouts.menu-top')
@extends('centinela.layouts.menu-left')

@section('title')
    @lang('Ingresar Vehiculo en Lista')
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
        <form action="{{route('centinela.vehiculos.store')}}" method="POST">
         {{ csrf_field() }}
            <div class="form-group mt-4">
                <label for="patente" class="control-label">@lang('Patente')</label>
                <input type="text" class="form-control" id="patente" name="patente" placeholder="ej:AB123CD">
            </div>    
            <div class="row">
                <div class="col-md-6">  
                    <div class="form-group">
                        <label for="marca" class="control-label">@lang('Marca')</label>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="ej:Chevrolet">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="modelo" class="control-label">@lang('Modelo')</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="ej:Corsa">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="anio" class="control-label">Año</label>
                        <input type="text" class="form-control" id="anio" name="anio" placeholder="ej:2021">
                    </div>
                </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="color" class="control-label">@lang('Color')</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="ej:Blanco">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="tipo" class="control-label">@lang('Tipo')</label>
                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="ej:Sedan">
            </div> 
            <div class="row">
                <div class="col-md-6">            
                    <div class="form-group">
                        <label for="fechaDesde" class="control-label">@lang('Desde')</label>
                        <input  type="date" class="form-control" id="fechaDesde" name="fechaDesde"  placeholder="">
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fechaHasta" class="control-label">@lang('Hasta')</label>
                        <input  type="date" class="form-control" id="fechaHasta" name="fechaHasta"  placeholder="">
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
                <input type="submit" class="btn btn-primary btn100" value="Agregar">
            </div>     
        </form>
    </div>
</div>

<!--script type="text/javascript">
    $(".tag").select2({tags: true});
</script-->

@endsection