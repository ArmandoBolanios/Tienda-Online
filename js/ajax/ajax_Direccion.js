function leerTablaDireccion() {
    $.ajax({
        type: 'POST',
        url: 'php/tabla_direccion.php',
        //data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            $('.lecturaTablaDireccion').html(data);
        },
        error: function(){
            alert("Algo ha fallado");
        }
    });
}
//--------------------------------------------------------

function editarDireccion(id) {
    $('input[name=numeroFilaDireccion]').val(id);
    $("#editDireccion").modal("show");
}

//--------------------------------------------------------
function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode;
    return ((key >= 48 && key <= 57) ||(key==8))
}

//--------------------------------------------------------
$(document).ready(function() {
    leerTablaDireccion();

    $('#editDireccion').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            codigoPostal: {
                validators: {
                    notEmpty: {
                        message: 'El código postal es requerido y no puede estar vacío'
                    },
                    stringLength: {
                        min: 5,
                        max: 5,
                        message: 'El código postal debe ser a 5 caracteres'
                    },
                    regexp:{
                        regexp: /^([1-9]{2}|[1-9][1-9]|[1-9][0-9])[0-9]{3}$/,
                        message: 'El código postal no cumple con el estándar'
                    }
                }
            },
            estado: {
                validators: {
                    notEmpty: {
                        message: 'El campo no debe estar vacío'
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                        message: 'El nombre de estado debe ser más de 5 caracteres'
                    },
                    regexp:{
                        regexp: /^[A-Za-záéíóúäëïöüñÑÁÉÍÓÚÄËÏÖÜ ]+$/,
                        message: 'El nombre del estado no es válido'
                    }
                }
            },
            delegacion: {
                validators: {
                    notEmpty: {
                        message: 'El campo no debe estar vacío'
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                        message: 'El nombre de la delegación debe ser más de 5 caracteres'
                    },
                    regexp:{
                        regexp: /^[A-Za-záéíóúäëïöüñÑÁÉÍÓÚÄËÏÖÜ ]+$/,
                        message: 'El nombre de la delegación no es válido'
                    }
                }
            },
            colonia: {
                message: 'Nombre de la colonia no es válida',
                validators: {
                    notEmpty: {
                        message: 'El nombre de la colonia es requerida y no debe estar vacío'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'El nombre debe ser más de 4 a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[A-Za-zäëïöüáéíóúñÑÁÉÍÓÚÄËÏÖÜ ]+$/,
                        message: 'El nombre sólo puede consistir de alfabeto'
                    }
                }
            },
            calle: {
                message: 'Nombre de la calle no es válida',
                validators: {
                    notEmpty: {
                        message: 'El nombre de la calle es requerida y no debe estar vacía'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'El nombre debe ser más de 4 a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[A-Za-záéíóúäëïöüñÑÁÉÍÓÚÄËÏÖÜ ]+$/,
                        message: 'El nombre sólo puede consistir de alfabeto'
                    }
                }
            },
            numeroInterior: {
                message: 'Número Interior no es válida',
                validators: {
                    notEmpty: {
                        message: 'El número es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 2,
                        max: 5,
                        message: 'Debe ser mayor a 1 caracter'
                    },
                    regexp: {
                        regexp: /^([1-9]{1}|[1-9][1-9]|[1-9][0-9])[0-9]*|([SsNn]{1})$/,
                        message: 'Número interior no válido'
                    }
                }
            },
            numeroExterior: {
                message: 'Número Exterior no es válida',
                validators: {
                    notEmpty: {
                        message: 'El número es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 1,
                        max: 5,
                        message: 'El número debe ser más de 1 a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^([1-9]{1}|[1-9][1-9]|[1-9][0-9])[0-9]*$/,
                        message: 'No cumple el estándar'
                    }
                }
            }
        } //termina fields
    }); //bootstrapValidator
});

//-----------------------------------------------------------
$(document).ready(function(){
    //editar datos de direccion
    $("#FormularioDireccion").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'funciones/update_new_direccion.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(html){
                if(html==1) {
                    $("#editDireccion").modal("hide");
                    leerTablaDireccion();
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
