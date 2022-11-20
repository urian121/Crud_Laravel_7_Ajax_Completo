@extends('home.home')
@section('TokenFormAjax')
@section('title', 'Nuevo Profesor')
@section('cuerpo')


<div class="col-lg-12" id="contenMsjs">
    <div class="alert alert-success alert-success-style1 alert-success-stylenone">
        <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
            <span class="icon-sc-cl" aria-hidden="true">&times;</span>
        </button>
        <span class="adminpro-icon adminpro-checked-pro admin-check-sucess admin-check-pro-none"></span>
        <p class="message-alert-none" id="msj"> </p>
    </div>
</div>




<form name="form-data" id="form-data" method="POST" class="adminpro-form" data-route="{{ route('updateProfe',$Profe->id) }}" enctype="multipart/form-data">
@method('PUT')
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<input type="hidden" name="id" value="{{ $Profe->id }}" id="id">
{{ method_field('PUT') }} 

<div class="col-lg-12">
    <div class="login-bg">
        <a href="{{ url('/') }}" title="Volver">
            <i class="zmdi zmdi-mail-reply" ></i> <!---boton volver-->
        </a>
        <div class="row">
            <div class="col-lg-12">
                <div class="login-title">
                    <h1 class="text-center">ACTUALIZAR DATOS DEL PROFESOR</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <span>Nombre</span>
                    <div class="login-input-area register-mg-rt">
                        <input type="text" name="nombre" id="nombre" value="{{  $Profe->nombre }}" require="true"/>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <span>Apellido</span>
                    <div class="login-input-area">
                        <input type="text" name="apellido" id="apellido" value="{{  $Profe->apellido }}" require="true"/>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <span>Profesión</span>
                    <div class="login-input-area">
                        <input type="text" name="profesion" id="profesion" value="{{  $Profe->profesion }}" require="true"/>
                    </div>
                </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <span>Teléfono</span>
                    <div class="input-mark-inner mg-b-22">
                        <input type="text" name="telefono" id="telefono" value="{{  $Profe->telefono }}" class="form-control" data-mask="(999) 999-9999" placeholder="">
                        <span class="help-block">(999) 999-9999</span>
                    </div>

                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <span>Edad</span>
                    <div class="input-mark-inner">
                        <input type="text" name="edad" id="edad" value="{{  $Profe->edad }}" class="form-control" data-mask="99" placeholder="">
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <span>direccion</span>
                    <div class="login-input-area">
                        <input type="text" name="direccion" id="direccion" value="{{  $Profe->direccion }}"/>
                    </div>
                </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <input class="with-gap" type="radio" name="sexo" id="sexo" value="Masculino" 
                            {{ $Profe->sexo == 'Masculino' ? 'checked' : '' }} >
                        <label class="form-check-label" for="Radios1">Masculino</label>
        
                        <input class="with-gap" type="radio" name="sexo" id="sexo" value="Femenino"
                            {{ $Profe->sexo == 'Femenino' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Radios2">Femenino</label> 
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <span>Foto de Perfil</span>
                        <div class="login-input-area register-mg-rt">
                        <div class='upload-field-customized'>
                            <input type="file" name="foto" id="foto">
                            <span>
                                <i class="zmdi zmdi-collection-image-o zmdi-hc-2x"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>




        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="login-button-pro">
                    <a href="{{ url('/') }}" class="login-button login-button-rg">Volver </a>
                    <button class="login-button login-button-lg" type="submit" id="btnUpdate">Guardar Cambios</button>
                </div>
            </div>
        </div>

</div>
</form>




@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function () {
$('#contenMsjs').hide();
/*/Para informa que envio el token atraves de Ajax**/
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});  

$("#btnUpdate").click(function (e) {
    e.preventDefault();  //evita recargar la pagina
    var formData = new FormData($(this).parents('form')[0]);
    var route =$('#form-data').data('route');
    var form_data = $(this);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            type:'POST', 
            url:route,
            xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
            },
            //data:form_data.serialize(),
            data: $("#form-data").serialize(), // Adjuntar los campos del formulario enviado.
        success:function(response){
            $("#contenMsjs").show();
            $('#msj').html(response.mensaje);
        setTimeout(function () {
            $("#contenMsjs").fadeOut("slow");
        }, 4000);

        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
        });
    return false;
    });
});
</script>  
 
@endsection