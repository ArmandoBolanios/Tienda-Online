function leerTabla() {
    $.ajax({
        type: 'POST',
        url: 'php/tabla_telefono.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            $('.lecturaTablaTelefono').html(data);
        },
        error: function(){
            alert("Algo ha fallado");
        }
    });
}

// --------------------------- para editar Telefono
$(document).ready(function() {
    leerTabla();

    $('#editTelefono').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            update_telefono: {
                validators: {
                    notEmpty: {
                        message: 'El teléfono es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 10,
                        max: 15,
                        message: 'El teléfono debe ser más de 10 a 15 caracteres'
                    },
                    regexp: {
                        regexp: /^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,
                        message: 'El teléfono solo puede consistir de números'
                    }
                }
            }
        } //termina fields
    }); //bootstrap validator

});

// ---------------------------para nuevo telefono
$(document).ready(function() {
    $('#add_new_telefono_modal').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            new_telefono: {
                validators: {
                    notEmpty: {
                        message: 'El teléfono es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 10,
                        max: 15,
                        message: 'El teléfono debe ser más de 10 a 15 caracteres'
                    },
                    regexp: {
                        regexp: /^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,
                        message: 'El teléfono solo puede consistir de números'
                    }
                }
            }
        } //termina fields
    }); //bootstrap validator
});
// ----------------------------------------------------------------------------------

function editarTelefono(id) {
    $("#numeroFila").val(id);
    $("#editTelefono").modal("show");
}

// --------------------------------------- actualizar numero de telefono
$(document).ready(function() {
    // -----------------
    $("#FormularioTelefono").on('submit', function(e){
        e.preventDefault();

        var telefono    = $('input[name=update_telefono]').val();
        var numeroFila  = $('input[name=numeroFila]').val();

        if(telefono == '') {
            alert("El campo no debe estar vacío");
        } else {
            $.ajax({
                type: 'POST',
                url: 'funciones/update_new_telefono.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(html){
                    if(html==1) {
                        $("#editTelefono").modal("hide");
                        leerTabla();
                        $('input[name=new_telefono]').val("");
                    }else alert('Inténtalo más tarde');
                },
                error: function(){
                    alert("Algo ha fallado");
                }
            });
        }
        return false;
    });
});

//------------------------------------   agregar nuevo telefono
$(document).ready(function() {
    // -----------------
    $("#agregaOtroTelefono").on('submit', function(e){
        e.preventDefault();

        var telefono    = $('input[name=new_telefono]').val();
        if(telefono == '') {
            alert("El campo no debe estar vacío");
        } else {
            $.ajax({
                type: 'POST',
                url: 'funciones/add_new_telefono.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(html){
                    if(html==1) {
                        $("#add_new_telefono_modal").modal("hide");
                        leerTabla();
                        $('input[name=new_telefono]').val("");
                    }else alert('Inténtalo más tarde');
                },
                error: function(){
                    alert("Algo ha fallado");
                }
            });
        }
        return false;
    });
});

function eliminarTelefono(id) {
    var formData = 'numeroFilaTel='+id;

    swal({
        title: "¿Estas seguro?",
        text: "Se removerá de los datos de contacto!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Sí",
        cancelButtonText:  "Cancelar", 
        closeOnConfirm: false
    },
         function(){
        //swal("¡Hecho!", "Artículo removido del carrito.", "success");
        swal({
            title: "¡Hecho!",
            //text: "Removido",
            timer: 400,
            showConfirmButton: false
        });
        $.ajax({
            type: 'POST',
            url: 'funciones/delete_new_telefono.php',
            data: formData,
            cache: false,
            success: function(html){
                leerTabla();
            },
            error: function(){
                alert("Algo ha fallado");
            }
        });
    });
}



