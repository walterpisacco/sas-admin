@extends('admin.layouts.template')
@section('title')
    @lang('Crear Nuevo Usuario')
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
        <form action="{{route('admin.usuario.store')}}" method="POST">
         {{ csrf_field() }}
            <div class="form-group mt-4">
                <label for="id_client" class="control-label">@lang('Cliente')</label>
                <select class="form-control" id="id_client" name="id_client" required>
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}" >{{$cliente->nombre}}</option>
                    @endforeach
                </select>
            </div>   

            <div class="form-group mt-4">
                <label for="full_name_id" class="control-label">@lang('Nombre Completo')</label>
                <input type="text" class="form-control" id="full_name_id" name="name" placeholder="">
            </div>    

            <div class="form-group">
                <label for="street1_id" class="control-label">@lang('Email')</label>
                <input type="email" class="form-control" id="street1_id" name="email" placeholder="">
            </div>                    
                                    
            <div class="form-group">
                <label for="street2_id" class="control-label">@lang('Password')</label>
                <input type="password" class="form-control" id="street2_id" name="password" placeholder="">
            </div>                                       
                                    
            <div class="form-group">
                <label for="rol" class="control-label">@lang('Perfil')</label>
                <select class="form-control" id="rol" name="rol">
                    <option value="Admin">@lang('Admin')</option>
                    <option value="User">@lang('User')</option>
                </select>                    
            </div>   
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn100" value="Agregar">
            </div>     
        </form>
    </div>
</div>
@endsection