@extends('layouts.head')
@extends('layouts.footer')
@extends('layouts.menu-top')
@extends('centinela.layouts.menu-left')

@section('title')
    @lang('Lectura de Patentes')
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                {{ csrf_field() }}
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">@lang('Cámara')</th>
                                <th width="20%">@lang('Patente')</th>
                                <th width="20%">@lang('Lista')</th>
                                <th width="10%">@lang('Fecha')</th>
                                <th width="20%">@lang('Destino')</th>
                                <th width="20%"></th>
                            </tr>
                        </thead>
                            @foreach ($lecturas as $lectura)
                                <tr>
                                    <th>{{$lectura->camara}}</th>
                                    <th>{{$lectura->patente}}</th>
                                    <th>{{$lectura->tipolista->descripcion}}</th>
                                    <th>{{$lectura->fecha->format('d/m/Y H:i')}}</th>
                                    <th>
                                        @isset($lectura->lista->tipoSector)
                                            {{$lectura->lista->tipoSector->descripcion}}
                                        @endisset
                                    </th>
                                    <th>
                                        <button id="btnEditar" data-info="{{$lectura->id}},{{$lectura->patente}}" class="btn btn-secondary btn-icon-split shadow">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">@lang('Editar')</span>
                                        </button>
                                        <button id="btnDestino" data-info="
                                        {{$lectura->patente}},
                                        @isset($lectura->lista)
                                            {{$lectura->lista->destino}}
                                        @endisset
                                        " class="btn btn-primary btn-icon-split shadow">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text">@lang('Destino')</span>
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

    </div>

<div class="modal" id="modalEdit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header card-header">
        <h5 class="modal-title">Modificar</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" readonly class="form-control" id="id">
        </div>
        <div class="form-group">  
          <input type="text" class="form-control" id="patente">
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'> @lang('Cancelar')</span> 
            </button>            
            <button type="button" id="btnModifica" class="btn btn-success" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> @lang('Modificar')</span>
            </button>
          </div>
    </div>
  </div>
</div>
</div>

<div class="modal" id="modalDestino" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header card-header">
        <h5 class="modal-title">Destino</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" readonly class="form-control" id="patentedest">
        </div>
        <div class="form-group">  
            <select class="form-control" id="destino" name="destino" required>
                    @foreach ($sectores as $sector)
                        <option value="{{$sector->id}}">{{$sector->descripcion}}</option>
                    @endforeach
                    <option value="">Ningún Sector</option>
            </select>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'> @lang('Cancelar')</span> 
            </button>            
            <button type="button" id="btnModificaDestino" class="btn btn-success" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> @lang('Asignar')</span>
            </button>
          </div>
        </div>
    </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<script>
    $(document).on('click', '#btnEditar', function() {
        var stuff = $(this).data('info').split(',');
        $('#id').val(stuff[0]);
        $('#patente').val(stuff[1]);
        $('#modalEdit').modal('show');
    });

    $(document).on('click', '#btnDestino', function() {
        var stuff = $(this).data('info').split(',');
        $('#patentedest').val(stuff[0]);
        $('#destino').val(stuff[1]);
        $('#modalDestino').modal('show');
    });    

    $(document).on('click', '#btnModifica', function() {
        let url = "{{route('centinela.ingresosv.update')}}";
        let id = $('#id').val();
        let patente = $('#patente').val();

        toggleGifLoad();
        $.ajax({
            method: 'POST',
            type: 'json',
            url: url,
            data:{id:id,patente:patente},
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
    });

    $(document).on('click', '#btnModificaDestino', function() {
        let url = "{{route('centinela.destinov.update')}}";
        let patente = $('#patentedest').val();
        let destino = $('#destino').val();

        toggleGifLoad();
        $.ajax({
            method: 'POST',
            type: 'json',
            url: url,
            data:{patente:patente,destino:destino},
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
                }else{
                    Swal.fire({
                      icon: 'warning',
                      title: response.texto,
                      showConfirmButton: false,
                      timer: 2500
                    });
                }
            })
            .always(toggleGifLoad)
            .fail((error) => {
                Swal.fire("Oops!... tuvimos un problema", "", "error");
            }).always();
    });


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