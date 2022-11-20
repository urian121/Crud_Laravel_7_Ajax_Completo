$(document).ready(function () {
    
/**script para eliminar Registro de Profesores */
$('#contenMsjs').hide();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(".btn-delete").click(function (e) {
    e.preventDefault();
    var id = $(this).attr("id");

    var form    = $(this).parents('form');
    var url     = form.attr('action');

        $.ajax({
            type: "DELETE", //para borrar
            //type: "GET", //para obtener
            //type: "POST", //para guardar
            //type: "PUT", //para modificar 
            url: url,
            data: $("#form-data").serialize(),
            success: function(data)
            {
                $("#contenMsjs").show();
                $('#msj').html(data.mensaje);
                $("#registro" + id).hide('slow');
            setTimeout(function () {
                $("#contenMsjs").fadeOut("slow");
            }, 4000);
            }
        }); 

    });
/**Fin del script para eliminar registro de Profesor */




});