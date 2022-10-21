@extends('layouts.head')
@extends('layouts.menu-top')
@extends('admin.layouts.menu-left')
@extends('layouts.footer')

@section('title')
    @lang('Gestionar Tipos de Documentos')
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('admin.tiposT.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">@lang('Crear nuevo tipo')</span>
            </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="70%">@lang('Nombre')</th>
                                <th width="30%"></th>
                                
                            </tr>
                        </thead>
                            @foreach ($tipos as $tipo)
                                <tr>
                                    <th>{{$tipo->nombre}}</th>
                                    <th>
                                        <a href="{{route('admin.tiposT.edit',$tipo->id)}}" class="btn btn-secondary btn-icon-split shadow">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">@lang('Editar')</span>
                                        </a>

                                            {{ csrf_field() }}
                                            <button onClick="btnEliminar({{$tipo}})" class="btn btn-danger btn-icon-split shadow">
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

    function eliminar($tipo){
        let url = "{{route('admin.tiposT.delete',$tipo->id)}}";
        toggleGifLoad();
        $.ajax({
            method: 'POST',
            type: 'json',
            url: url,
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