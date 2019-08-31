$(document).ready(function() {
    $('#editPasswordUsuario').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            ps_2: {
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
            new_password: {
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
            c_new_password: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida y no debe ser vacía'
                    },
                    regexp:{
                        regexp: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
                        message: 'La contraseña no es segura'
                    },
                    identical: {
                        field: 'new_password',
                        message: 'Las contraseñas no coinciden'
                    },
                    stringLenght: {
                        min: 8,
                        message: 'La contraseña debe tener más de 8 carcteres'
                    }
                }
            }
        } //termina fields
    });
});

/* -------------------------------------   VERIFICA QUE LA CONTRASEÑA EXISTE --------------------------- */
$(document).ready(function() {
    // ------------------------------------------------------------
    $(document).ready(function() {
        $('#ps_2').on('keyup',function() {
            $('#Infops_2').html('<img src="img/gif/load.gif" alt="">').fadeOut(1000);

            var idCliente	= $('#idCliente2').val();
            var password2	= $('#ps_2').val();
            $.ajax( {
                type: "POST",
                url: 'php/existencia_password.php',
                data:{
                    idCliente: idCliente,
                    password2:	password2
                },
                success: function(data) {
                    $('#Infops_2').fadeIn(0).html(data);
                }
            });
        });
    });
});

// ----------------------------------- HACER SUBMIT PARA CAMBIAR LA CONTRASEÑA DE USUARIO
$(document).ready(function() {
    $("#FormularioContraseniaUsuario").on('submit', function(e){
        e.preventDefault();
        var pass2     = $('input[name=ps_2]').val();
        var ps    = $('input[name=new_password]').val();
        var cps    = $('input[name=c_new_password]').val();

        if(pass2==''||ps==''||cps==''){
            alert("Debe rellenar todos los campos");
        } else {
            $.ajax({
                type: 'POST',
                url: 'funciones/update_new_password.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(html){
                    if(html==1) {
                        $('#mensaje2').html('<br/><label class="text-success">La contraseña se ha modificado</label>');
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