function leerTablaDatosCliente() {
    $.ajax({
        type: 'POST',
        url: 'php/tabla_datos_cliente.php',
        //data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            $('.lecturaTablaDatosCliente').html(data);
        },
        error: function(){
            alert("Algo ha fallado");
        }
    });
}

// ---------------------------------------------------
$(document).ready(function(){
    leerTablaDatosCliente();
    
    $('#editDatosCliente').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            denominacion: {
                message: 'Denominación no es válida',
                validators: {
                    notEmpty: {
                        message: 'La denominación es requerida y no debe estar vacía'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'La denominación debe ser más de 6 a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9äëïöüñÁÉÍÓÚÄËÏÖÜÑ ]+$/,
                        message: 'La denominación sólo puede consistir de alfabeto y número'
                    }
                }
            },
            nombre: {
                message: 'Nombre no es válida',
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El nombre debe ser más de 3 a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[A-Za-zäëïöüáéíóúñÑÁÉÍÓÚÄËÏÖÜ ]+$/,
                        message: 'El nombre sólo puede consistir de alfabeto'
                    }
                }
            },
            apellidopaterno: {
                message: 'Apellido no es válido',
                validators: {
                    notEmpty: {
                        message: 'El apellido paterno es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'El apellido paterno debe ser más de 4 a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[A-Za-zäëïöüáéíóúñÑÁÉÍÓÚÄËÏÖÜ ]+$/,
                        message: 'El apellido paterno  sólo puede consistir de alfabeto'
                    }
                }
            },
            apellidomaterno: {
                message: 'Apellido no es válido',
                validators: {
                    notEmpty: {
                        message: 'El apellido materno es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'El apellido materno debe ser más de 4 a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[A-Za-zäëïöüáéíóúñÑÁÉÍÓÚÄËÏÖÜ ]+$/,
                        message: 'El apellido materno sólo puede consistir de alfabeto'
                    }
                }
            },
            rfc: {
                message: 'RFC no es válido',
                validators: {
                    notEmpty: {
                        message: 'El RFC es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 13,
                        max: 13,
                        message: 'El RFC debe tener 13 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9äëïöüñáéíóúñÑÄËÏÖÜÁÉÍÓÚ ]+/,
                        message: 'El RFC sólo puede consistir de alfabeto'
                    }
                }
            }
        } //termina fields

    });
});


//--------------------------------------------------------------------
$(document).ready(function(){
    //editar datos de direccion
    $("#FormularioDatosCliente").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'funciones/update_new_datos_cliente.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(html){
                if(html==1) {
                    $("#editDatosCliente").modal("hide");
                    leerTablaDatosCliente();
                    //vaciar los inputs***
                }else alert('Inténtalo más tarde');
                //console.log(html);
            },
            error: function(){
                alert("Algo ha fallado");
            }
        });

        return false;
    });
});




























