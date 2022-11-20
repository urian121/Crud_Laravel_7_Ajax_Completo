@extends('home.home')
@section('TokenFormAjax')
@section('title', 'Nuevo Profesor')
@section('cuerpo')



    <div class="col-lg-12" id="msj" style="display: none">
        <div class="alert alert-success alert-success-style1 alert-success-stylenone">
            <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                <span class="icon-sc-cl" aria-hidden="true">&times;</span>
            </button>
            <span class="adminpro-icon adminpro-checked-pro admin-check-sucess admin-check-pro-none"></span>
            <p class="message-alert-none" id="total"> </p>
        </div>
    </div>


<form id="form-data" method="post" action="{{ route('boyData') }}"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    
    <div class="col-lg-12">
        <div class="login-bg">
            <a href="{{ url('/') }}" title="Volver">
                <i class="zmdi zmdi-mail-reply" ></i> <!---boton volver-->
            </a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-title">
                        <h1 class="text-center">REGISTRAR NIÑO</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <span>Nombre</span>
                        <div class="login-input-area register-mg-rt">
                            <input type="text" name="nombre" id="nombre" require="true"/>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <span>Edad</span>
                        <div class="login-input-area register-mg-rt">
                            <input type="text" name="edad" id="edad" require="true"/>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4 mt-5">
                        <input class="with-gap" type="radio" name="sexo" id="sexo" value="Masculino" checked>
                        <label class="form-check-label" for="Radios1">Masculino</label>
        
                        <input class="with-gap" type="radio" name="sexo" id="sexo" value="Femenino">
                        <label class="form-check-label" for="Radios2">Femenino</label>
                    </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="login-button-pro">
                        <a href="{{ url('/') }}" class="login-button login-button-rg">Volver </a>
                        <button class="login-button login-button-lg" type="submit" id="btnEnviar">Guardar Registro</button>
                    </div>
                </div>
            </div>

    </div>
</form>


<div id="aa"> 
@if($boys->count())    
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
                    <th>Edad</th>
                    <th>Sexo</th>
                </tr>
            </thead>
            <tbody id="capaboys">
            @php
                $i = 0;
            @endphp
            @foreach ($boys as $boy)    
                <tr id="registro{{ $boy->id }}">
                    <td>
                        {{ ++$i }}
                    </td>
                    <td>{{ $boy->nombre }}</td>
                    <td>{{ $boy->edad }}</td>
                    <td>{{ $boy->sexo }}</td>
                </tr>
               
            @endforeach      
            </tbody>
        </table>

    </div>
</div>

@else
<p> No se han encontrado ningún Registro </p>
@endif
</div>



@endsection


@section('script')

<script type="text/javascript">
$(document).ready(function(){
    $("#btnEnviar").click(function(e){ 
        e.preventDefault();  //evita recargar la pagina

        var route = $('#form-data').data('route');
        var form  = $("#form-data").attr("action");

        var formValues = $(this).serialize();
        var dataString = $("#form-data").serialize();
    
         $.ajax({
            type:'POST',
            url:form,
            data:dataString,
            //data:formValues,
            success:function(Response){
            
              $('#total').html(Response.mensaje);

/*
var boys = JSON.stringify(Response.boys);
console.log(chicos);
*/
/*
$.each(Response.boys, function(idx, opt) {
    $('#capaboys').append('<tr><td>' + opt.id + '</td><td>' + opt.nombre + '</td><td>' + opt.edad + '</td><td>' + opt.sexo + '</td></tr>');
});
*/

        var html = '';
         $(Response.boys).each(function(key, value) {
           html += '<tr>' +
             '<td>' + value.id + '</td>' +
             '<td>' + value.nombre + '</td>' +
             '<td>' + value.edad + '</td>' +
             '<td>' + value.sexo + '</td>' +
             '</tr>';
            }); 
         $('#capaboys').html(html); 


            $("#form-data")[0].reset(); //limpiar Formulario

              $("#msj").show(250);
            setTimeout(function () {
                $("#msj").fadeOut(1500);
            }, 5000);

               // console.log(Response);
            }
        });
});


// program to display a text using setTimeout method
function greet() {
    console.log('Hello world');
}

setTimeout(greet, 3000);
console.log('This message is shown first');

function refresh(){
    setInterval(function(){ 
        console.log('----');
        $("#aa").show();
     }, 1000);

    setTimeout(function () {
        $("#aa").show();
    }, 1500); 
}

});
</script>

@endsection