@extends('layouts.head')
@extends('layouts.menu-top')
@extends('admin.layouts.menu-left')
@extends('layouts.footer')

@section('title')
    @lang('Editar Cliente')
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
        <form action="{{route('usuario.cliente.update', $cliente->id)}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group mt-4">
                <label for="full_name_id" class="control-label">@lang('CUIT')</label>
                <input type="text" class="form-control" id="cuit" name="cuit" placeholder="" value="{{$cliente->cuit}}"> 
            </div>    

            <div class="form-group">
                <label for="nombre" class="control-label">@lang('Nombre completo')</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder=" " value="{{$cliente->nombre}}">
            </div>                    
            <div class="form-group">
                <label for="razon_social" class="control-label">@lang('Razón Social')</label>
                <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder=" " value="{{$cliente->razon_social}}">
            </div>    

            <div class="form-group">
                <label for="street2_id" class="control-label">Dirección</label>
                <div class="row form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{$cliente->direccion}}">
                    </div>
                </div>
            </div>                                        
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn100" value="Aceptar">
            </div>     
        </form>
    </div>
</div>

@endsection