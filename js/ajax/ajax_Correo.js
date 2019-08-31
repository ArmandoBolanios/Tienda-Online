function leerTablaCorreo() {
    $.ajax({
        type: 'POST',
        url: 'php/tabla_correo.php',
        //data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            $('.lecturaTablaCorreo').html(data);
        },
        error: function(){
            alert("Algo ha fallado");
        }
    });
}

// ----------------------------------------------------------------------------------------
$(document).ready(function(){
    leerTablaCorreo();

    $('#editCorreo').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            correoElectronico: {
                validators: {
                    notEmpty: {
                        message: 'El correo electronico es requerido y no puede estar vacío'
                    },
                    emailAddress: {
                        message: 'El correo electrónico no es válido'
                    },
                    regexp:{
                        regexp: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,
                        message: 'El correo no cumple con el estandar'
                    }
                }
            }
        } //termina fields
    });
});

function editarCorreo(id){
    $('input[name=numeroFilaCorreo]').val(id);
    $("#editCorreo").modal("show");
}


//-----------------------------------------------------------
$(document).ready(function(){
    //editar datos de direccion
    $("#FormularioCorreo").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'funciones/update_new_correo.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(html){
                if(html==1) {
                    $("#editCorreo").modal("hide");
                    leerTablaCorreo();
                    //vaciar los inputs***
                }else alert('Inténtalo más tarde');
            },
            error: function(){
                alert("Algo ha fallado");
            }
        });

        return false;
    });
});

