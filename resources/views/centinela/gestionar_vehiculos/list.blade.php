@extends('layouts.head')
@extends('layouts.footer')
@extends('layouts.menu-top')
@extends('centinela.layouts.menu-left')

@section('title')
    @lang('Gestionar Vehículos')
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
               <a href="{{route('centinela.vehiculos.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">@lang('Incorporar Vehiculo a una Lista')</span>
            </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">@lang('Patente')</th>
                                <th width="20%">@lang('Marca')</th>
                                <th width="15%">@lang('Modelo')</th>
                                <th width="10%">@lang('Desde')</th>
                                <th width="10%">@lang('Hasta')</th>
                                <th width="10%">@lang('Destino')</th>
                                <th width="20%"></th>
                            </tr>
                        </thead>
                            @foreach ($listaBlanca as $vehiculo)
                                <tr>
                                    <th>{{$vehiculo->id}}</th>
                                    <th>{{$vehiculo->patente}}</th>
                                    <th>{{$vehiculo->marca}}</th>
                                    <th>{{$vehiculo->modelo}}</th>
                                    <th>{{$vehiculo->fechaDesde->format('d/m/Y H:i')}}</th>
                                    <th>
                                        @isset($vehiculo->fechaHasta)
                                            {{$vehiculo->fechaHasta->format('d/m/Y H:i')}}
                                        @endisset
                                    </th>
                                    <th>
                                        @isset($vehiculo->tipoSector)
                                            {{$vehiculo->tipoSector->descripcion}}
                                        @endisset
                                    </th>
                                    <th>
                                        <a href="{{route('centinela.vehiculos.edit', $vehiculo->id)}}" class="btn btn-secondary btn-icon-split shadow">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">@lang('Editar')</span>
                                        </a>
                                            {{ csrf_field() }}
                                            <button onClick="btnEliminar({{$vehiculo->id}})" class="btn btn-danger btn-icon-split shadow">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">@lang('Eliminar')</span>
                                            </button>
                                    </th>
                                </tr>
                            @endforeach
                        <tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
<script>
    function btnEliminar($id){
        Swal.fire({
          title: 'Estás seguro que deseas eliminar?',
          text: "No podrás revertir esta acción!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
          if (result.isConfirmed) {
            eliminar($id);
          }
        })
    }

    function eliminar($id){
        let url = "{{route('centinela.vehiculos.delete')}}";
        toggleGifLoad();
        $.ajax({
            method: 'POST',
            type: 'json',
            url: url+'?id='+$id,
            headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            }).done(function(response) {
                response = JSON.parse(response);
                if(response.success == 'true'){ 
                    Swal.fire({
                      icon: 'success',
                      title: response.texto,
                      showConfirmButton: false,
                      timer: 1500
                    });

                   window.location.reload();
                }
            })
            .always(toggleGifLoad)
            .fail((error) => {
                Swal.fire("Oops!... tuvimos un problema", "", "error");
            }).always();
    }

</script>

@endsection