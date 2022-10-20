@extends('admin.layouts.template')
@section('title')
    @lang('Crear Nuevo Cliente')
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
        <form action="{{route('usuario.cliente.store')}}" method="POST">
         {{ csrf_field() }}
            <div class="form-group mt-4">
                <label for="cuit" class="control-label">@lang('CUIT')</label>
                <input type="text" class="form-control" id="cuit" name="cuit" placeholder="">
            </div>    

            <div class="form-group">
                <label for="nombre" class="control-label">@lang('Nombre')</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
            </div>

            <div class="form-group">
                <label for="razon_social" class="control-label">@lang('Razón Social')</label>
                <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="">
            </div>

            <div class="form-group">
                <label for="street2_id" class="control-label">Direccion</label>
                <input type="text" class="form-control" id="street2_id" name="direccion" placeholder="">
            </div>
            <div class="form-group" style="display:none">
                <label for="razon_social" class="control-label">@lang('Pais')</label>
                <input type="hidden" class="form-control" id="id_pais" name="id_pais" value="1" placeholder="">
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