$(document).ready(function() {
    $('#editNombreUsuario').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            ps_1: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida y no debe ser vacía'
                    },
                    regexp:{
                        regexp: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
                        message: 'La contraseña no es segura'
                    },
                    stringLength: {
                        min: 8,
                        message: 'La contraseña debe tener más de 8 caracteres'
                    }
                }
            },
            cps_1: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida y no debe ser vacía'
                    },
                    regexp:{
                        regexp: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
                        message: 'La contraseña no es segura'
                    },
                    identical: {
                        field: 'ps_1',
                        message: 'Las contraseñas no coinciden'
                    },
                    stringLenght: {
                        min: 8,
                        message: 'La contraseña debe tener más de 8 caracteres'
                    }
                }
            },
            new_name_user: {
                message: 'El nombre de usuario no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 4,
                        max: 15,
                        message: 'El nombre debe ser más de 4 a 15 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-z\d_-]{4,15}$/,
                        message: 'El nombre sólo puede consistir de minúsculas y números'
                    },
                    different: {
                        field: 'cps_1',
                        message: 'El nombre de usuario no puede ser igual a la contraseña'
                    }
                }
            }
        } //termina fields
    });
}); //end document

// ------------------------------------------- VERIFICA QUE LA FIRMA DIGITAL EXISTE
$(document).ready(function() {
    // ------------------------------------- VERIFICA QUE SU CONTRASEÑA EXISTE
    $('#ps_1').on('keyup',function() {
        $('#Infops_1').html('<img src="img/gif/load.gif" alt="">').fadeOut(1000);

        var idCliente1	= $('#idCliente1').val();
        var password1	= $('#ps_1').val();
        $.ajax( {
            type: "POST",
            url: 'php/existencia_password.php',
            data:{
                idCliente:          idCliente1,
                passwordUsuario:    password1
            },
            success: function(data) {
                $('#Infops_1').fadeIn(0).html(data);
            }
        });
    });

    // ----------------------------------- VERIFICA QUE EL NOMBRE DE USUARIO NO SE REPITA
    $('#new_name_user').keyup(function() {
        $('#Infonew_name_user').html('<img src="img/gif/load.gif" alt="">').fadeOut(1000);

        var new_name_user = $(this).val();
        var dataString = 'new_name_user='+new_name_user;

        $.ajax( {
            type: "POST",
            url: 'php/existencia_usuario.php',
            data: dataString,
            success: function(data) {
                $('#Infonew_name_user').fadeIn(1000).html(data);
            }
        });
    });

}); //end document

// ----------------------------------- HACER SUBMIT PARA CAMBIAR EL NOMBRE DE USUARIO
$(document).ready(function() {
    // -----------------
    $("#FormularioNombreUsuario").on('submit', function(e){
        e.preventDefault();
        var pass1     = $('input[name=ps_1]').val();
        var cpass1    = $('input[name=cps_1]').val();
        var nmuser    = $('input[name=new_name_user]').val();
        if(pass1==''||cpass1==''||nmuser==''){
            alert("Debe rellenar todos los campos");
        } else {
            $.ajax({
                type: 'POST',
                url: 'funciones/update_new_user.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(html){
                    if(html==1) {
                        $('#mensaje1').html('<br/><label class="text-success">El nombre de usuario se ha modificado</label>');
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

