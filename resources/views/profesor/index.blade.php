@extends('home.home')
@section('title', 'Nuevo Profesor')
@section('cuerpo')


<div class="col-lg-12" id="contenMsjs">
    <div class="alert alert-success alert-success-style1 alert-success-stylenone">
        <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
            <span class="icon-sc-cl" aria-hidden="true">&times;</span>
        </button>
        <span class="adminpro-icon adminpro-checked-pro admin-check-sucess admin-check-pro-none"></span>
        <p class="message-alert-none" id="msj"> 
            {{ session('mensaje') }}
        </p>
    </div>
</div>





<div class="col-lg-12">
    <div class="sparkline13-list shadow-reset">
        <div class="sparkline13-hd">
            <a href="{{ url('/') }}" title="Volver" title="Volver">
                <i class="zmdi zmdi-mail-reply" ></i> <!---boton volver-->
            </a>


            <div class="main-sparkline13-hd">
                <h1 class="text-center">TODOS MIS PROFESORES <strong>( {{ $totalProfes->count() }})</strong></h1>
                <div class="sparkline13-outline-icon">
                    <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                    <span><i class="fa fa-wrench"></i></span>
                    <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                    <span title="Eliminar Múltiples Registros">
                        <button style="float: right;" class="btn btn-danger btn-sm borrarAll" data-url="{{ url('DeleteMultiple') }}">Borrar</button>
                    </span>
                </div>
            </div>
        </div>
    
    @if($profesores->count())    
        <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">
                <div id="toolbar">
                    <select class="form-control">
                        <option value="">Export Basic</option>
                        <option value="all">Export todo</option>
                        <option value="selected">Export Selección</option>
                    </select>
                </div>
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre y Apellido</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th data-field="action">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($profesores as $profesor)    
        
                        <tr id="registro{{ $profesor->id }}">
                            <td>
                                <input type="checkbox" class="delete_checkbox" data-id="{{ $profesor->id }}">
                                {{ ++$i }}
                            </td>
                            <td>{{ $profesor->nombre }}</td>
                            <td>{{ $profesor->profesion }}</td>
                            <td>{{ $profesor->telefono }}</td>
                            <td>
                                <ul class="flex">
                                    <li>
                                        <a  href="{{ route('detalleProfe',$profesor->id) }}" title="Ver Detalles">
                                            <i class="zmdi zmdi-search-in-file"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('actualizarProfe', $profesor->id) }}" title="Actualizar">
                                            <i class="zmdi zmdi-edit zmdi-hc-2x"></i>
                                        </a>

                                    </li>
                                    <li>
                                        <form name="form-data" id="form-data" action="{{ route('eliminarProfe',$profesor->id) }}" method="POST">
                                            {{ method_field('DELETE') }} 
                                            {{ csrf_field() }}  
                                            <a href="#" class="btn-delete" title="Eliminar" id="{{ $profesor->id }}">
                                                <i class="zmdi zmdi-delete zmdi-hc-2x"></i>
                                            </a>
                                        </form>
                                    </li>
                                </ul>

                            </td>
                        </tr>
                    @endforeach      
                    </tbody>
                </table>

                {!! $profesores->links() !!}

            </div>
        </div>

    @else
    <p> No se han encontrado ningún Registro </p>
    @endif

    </div>
</div>

@endsection




@section('script')
<script src="{{ asset('js/script.js') }}"></script>
<script>
$(document).ready(function () {
    $('.borrarAll').on('click', function(e) {
    
        var idsArray = [];
        $("input:checkbox[class=delete_checkbox]:checked").each(function () {
            idsArray.push($(this).attr('data-id'));
        });
    
        console.log(idsArray);
    
        var unir_arrays_seleccionados = idsArray.join(",");
        console.log(unir_arrays_seleccionados);
    
        if(idsArray.length > 0){
        $.ajax({
            url: $(this).data('url'),
            type: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+unir_arrays_seleccionados,
            success: function (data) {
                $.each(idsArray,function(indice,id) {
                    var fila = $("#registro" + id).remove(); //Oculto las filas eliminadas
                });
            },
            error: function (data) {
            alert(data.responseText);
        }
           
        });
        }
    });
    
});
</script>
@endsection
