$(document).ready(function() {
    $('#validar').bootstrapValidator({
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
                message: 'Nombre no es válido',
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
                        max: 18,
                        message: 'El RFC debe tener mínimo 15 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9äëïöüñáéíóúñÑÄËÏÖÜÁÉÍÓÚ ]+$/,
                        message: 'El RFC sólo puede consistir de alfabeto'
                    }
                }
            },
            correoElectronico: {
                validators: {
                    notEmpty: {
                        message: 'El correo electrónico es requerido y no puede estar vacío'
                    },
                    emailAddress: {
                        message: 'El correo electrónico no es válido'
                    },
                    regexp:{
                        regexp: /^[_a-zA-ZäëïöüñáéíóúñÑÄËÏÖÜÁÉÍÓÚ0-9-]+(\.[_a-zA-ZäëïöüñáéíóúñÑÄËÏÖÜÁÉÍÓÚ0-9-]+)*@[a-zA-ZäëïöüñáéíóúñÑÄËÏÖÜÁÉÍÓÚ0-9-]+(\.[a-zA-ZäëïöüñáéíóúñÑÄËÏÖÜÁÉÍÓÚ0-9-]+)*(\.[a-zA-ZäëïöüñáéíóúñÑÄËÏÖÜÁÉÍÓÚ]{2,3})$/,
                        message: 'El correo no cumple con el estándar'

                    }
                }
            },
            codigoPostal: {
                validators: {
                    notEmpty: {
                        message: 'El código postal es requerido y no puede estar vacío'
                    },
                    stringLength: {
                        min: 5,
                        max: 5,
                        message: 'El código postal debe tener 5 caracteres'
                    },
                    regexp:{
                        regexp: /^([1-9]{2}|[1-9][1-9]|[1-9][0-9])[0-9]{3}$/,
                        message: 'El código no cumple con el estándar'
                    }
                }
            },
            colonia: {
                message: 'Nombre de la colonia no es válida',
                validators: {
                    notEmpty: {
                        message: 'El nombre de la colonia es requerida y no debe estar vacía'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'El nombre debe ser más de 4 caracteres'
                    },
                    regexp: {
                        regexp: /^[A-Za-záéíóúäëïöüñÑÁÉÍÓÚÄËÏÖÜ0-9 ]+$/,
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
                        message: 'El nombre debe ser más de 4 caracteres'
                    },
                    regexp: {
                        regexp: /^[A-Za-záéíóúäëïöüñÑÁÉÍÓÚÄËÏÖÜ0-9 ]+$/,
                        message: 'El nombre sólo puede consistir de alfabeto'
                    }
                }
            },
            numerointerior: {
                message: 'Número Interior no es válido',
                validators: {
                    notEmpty: {
                        message: 'El número es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 1,
                        max: 5,
                        message: 'Debe ser mayor a 1 caracter'
                    },
                    regexp: {
                        regexp: /^([1-9]{1}|[1-9][1-9]|[1-9][0-9])[0-9]*|([SsNn]{1})$/,
                        //[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})
                        message: 'Número interior no válido'
                    }
                }
            },
            numeroexterior: {
                message: 'Número Exterior no es válido',
                validators: {
                    notEmpty: {
                        message: 'El número es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 1,
                        max: 5,
                        message: 'Debe ser mayor a 1 caracter'
                    },
                    regexp: {
                        regexp: /^([1-9]{1}|[1-9][1-9]|[1-9][0-9])[0-9]*$/,
                        message: 'Sólo se aceptan números'
                    }
                }
            },
            telefono: {
                validators: {
                    notEmpty: {
                        message: 'El teléfono es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 10,
                        max: 15,
                        message: 'El teléfono debe más de 10 caracteres'
                    },
                    regexp: {
                        regexp: /^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/,
                        message: 'El teléfono sólo puede consistir de números'
                    }
                }
            },
            nomusuario: {
                message: 'El nombre de usuario no es válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 4,
                        max: 15,
                        message: 'El nombre debe ser más de 3 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\d_-]{4,15}$/,
                        message: 'El nombre sólo puede consistir de minúsculas y números'
                    },
                    different: {
                        field: 'password',
                        message: 'El nombre de usuario no puede ser igual a la contraseña'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida y no debe ser vacía'
                    },
                    regexp:{
                        regexp: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
                        message: 'La contraseña no es segura'
                    },
                    different: {
                        field: 'nomusuario',
                        message: 'La contraseña no puede ser igual al nombre de usuario'
                    },
                    stringLength: {
                        min: 8,
                        message: 'La contraseña debe tener más de 8 caracteres'
                    }
                }
            },
            cpassword: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida y no debe ser vacía'
                    },
                    regexp:{
                        regexp: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
                        message: 'La contraseña no es segura'
                    },
                    identical: {
                        field: 'password',
                        message: 'Las contraseñas no coinciden'
                    },
                    stringLenght: {
                        min: 8,
                        message: 'La contraseña debe tener más de 8 caracteres'
                    }
                }
            },
            acepto:{
                notEmpty: {
                    message: 'Debes seleccionar la opción para poder registrarte'
                }
            }
        } //termina fields

    }); //bootstrapValidator

});

// ---------------------- VALIDA DENOMINACION -------------------------------------------
$(document).ready(function(){
    $('#denomin').keyup(function(){
        denom = document.getElementById("denomin").value;
        if(/^[a-zA-Z0-9záéíóúñÑÁÉÍÓÚ ]{3,}$/.test(denom)){
            document.getElementById('btnUno').disabled=false;
        } else {
            document.getElementById('btnUno').disabled=true;
        }
    });
    //------------------------ VALIDA NOMBRE --------------------------------------------------    
    $('#nombre').keyup(function(){
        nombreUser = document.getElementById("nombre").value;
        if(/^[A-Za-záéíóúñÑÁÉÍÓÚ ]{3,}$/.test(nombreUser)) {
            document.getElementById('btnUno').disabled=false;
        } else {
            document.getElementById('btnUno').disabled=true;
        }

    });
    //----------------------- VALIDA APELLIDO PATERNO --------------------------------
    $("#apat").keyup(function() {
        apepat = document.getElementById("apat").value;
        if(/^[A-Za-záéíóúñÑÁÉÍÓÚ ]{4,}$/.test(apepat)) {
            document.getElementById('btnUno').disabled=false;
        } else {
            document.getElementById('btnUno').disabled=true;
        }
    });
    //----------------------- VALIDA APELLIDO MATERNO --------------------------------
    $("#amat").keyup(function (key) {
        apemat = document.getElementById("amat").value;
        if(/^[A-Za-záéíóúñÑÁÉÍÓÚ ]{4,}$/.test(apemat)) {
            document.getElementById('btnUno').disabled=false;
        } else {
            document.getElementById('btnUno').disabled=true;
        }
    });

    // ---------------------- RFC  --------------------------------------------------
    $('#rfc').keyup(function(){
        rfc = document.getElementById("rfc").value;
        if(/^[a-zA-Z0-9ñáéíóúÑÁÉÍÓÚ]{13}$/.test(rfc)){
            document.getElementById('btnUno').disabled=false;
        } else {
            document.getElementById('btnUno').disabled=true;
        }
    });

    //------------------- VALIDA CÓDIGO POSTAL ----------------------------------
    $('#cp').keyup(function(){
        codigoPos = document.getElementById("cp").value;
        if(/^([1-9]{2}|[1-9][1-9]|[1-9][0-9])[0-9]{3}$/.test(codigoPos)) {
            document.getElementById('btnDos').disabled=false;
        } else {
            document.getElementById('btnDos').disabled=true;
        }
    });
    // --------------------------- VALIDAR QUE SE HA SELECCIONADO ESTADO --------------------->
    $('#numeroexterior').keyup(function(){
        var cmbSelector = document.getElementById('jmr_contacto_estado').selectedIndex;
        var cmbMunic    = document.getElementById('jmr_contacto_municipio').selectedIndex;

        if(cmbSelector == null || cmbSelector == 0){
            alert('ERROR: Debe seleccionar un estado');
            document.getElementById('btnDos').disabled=true;
            return false;
        }
        if(cmbMunic == null || cmbMunic == 0){
            alert('ERROR: Debe seleccionar un municipio');
            document.getElementById('btnDos').disabled=true;
            return false;
        }
    });
    
    // --------------------------- VALIDAR QUE SE HA SELECCIONADO ESTADO --------------------->
    $('#numerointerior').keyup(function(){
        var cmbSelector = document.getElementById('jmr_contacto_estado').selectedIndex;
        var cmbMunic    = document.getElementById('jmr_contacto_municipio').selectedIndex;

        if(cmbSelector == null || cmbSelector == 0){
            alert('ERROR: Debe seleccionar un estado');
            document.getElementById('btnDos').disabled=true;
            return false;
        }
        if(cmbMunic == null || cmbMunic == 0){
            alert('ERROR: Debe seleccionar un municipio');
            document.getElementById('btnDos').disabled=true;
            return false;
        }
    });
    //PRIMERA PARTE ESTADO ----
    $('#jmr_contacto_estado').change(function(){
        var cmbSelector = document.getElementById('jmr_contacto_estado').selectedIndex;

        if(cmbSelector == null || cmbSelector == 0){
            document.getElementById('btnDos').disabled=true;
        } else{
            if(cmbSelector !== null || cmbSelector !== 0){
                document.getElementById('btnDos').disabled=true;
            }
        }
    });
    //SEGUNDA PARTE MUNICIPIO
    $('#jmr_contacto_municipio').change(function(){
        var cmbMunic    = document.getElementById('jmr_contacto_municipio').selectedIndex;

        if(cmbMunic == null || cmbMunic == 0){
            document.getElementById('btnDos').disabled=true;
        } else {
            if(cmbMunic !== null || cmbMunic !== 0){
                document.getElementById('btnDos').disabled=false;
            }
        }    
    });

    //VALIDAR COLONIA
    $("#colonia").keyup(function (key) {
        coloniax = document.getElementById("colonia").value;
        if(/^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/.test(coloniax)) {
            document.getElementById('btnDos').disabled=false;
        } else {
            document.getElementById('btnDos').disabled=true;
        }
    });

    //VALIDAR CALLE
    $("#calle").keyup(function (key) {
        callex = document.getElementById("calle").value;
        if(/^[A-Za-záéíóúñÑÁÉÍÓÚ ]+$/.test(callex)) {
            document.getElementById('btnDos').disabled=false;
        } else {
            document.getElementById('btnDos').disabled=true;
        }
    });

    //VALIDAR NÚMERO EXTERIOR
    $('#numeroexterior').keyup(function() {
        numExter = document.getElementById("numeroexterior").value;
        if(/^([1-9]{1}|[1-9][1-9]|[1-9][0-9])[0-9]*$/.test(numExter)) {
            //document.getElementById('btnDos').disabled=false;
        } else {
            //document.getElementById('btnDos').disabled=true;
        }
        //-----
        codigoPostal = document.getElementById("cp").value;
        if(/^([1-9]{2}|[1-9][1-9]|[1-9][0-9])[0-9]{3}$/.test(codigoPostal)) {
            document.getElementById('btnDos').disabled=false;
        } else {
            document.getElementById('btnDos').disabled=true;
        }
    });
    
    //VALIDAR NÚMERO INTERIOR
    $('#numerointerior').keyup(function() {
        numInter = document.getElementById("numerointerior").value;
        // /^([1-9]{1}|[1-9][1-9]|[1-9][0-9])[0-9]*|([SsNn]{1})$/
        if(/^([1-9]{1}|[1-9][1-9]|[1-9][0-9])[0-9]*|([SsNn]{1})$/.test(numInter)) {
            //document.getElementById('btnDos').disabled=false;
        } else {
            //document.getElementById('btnDos').disabled=true;
        }
    });

    //VALIDAR TELÉFONO
    $('#telefono').keyup(function(){
        phone = document.getElementById("telefono").value;
        if(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/.test(phone)){
            document.getElementById('btnTres').disabled=false;
        } else {
            document.getElementById('btnTres').disabled=true;
        }
    });

    //VALIDAR E-MAIL
    $('#correoElectronico').keyup(function(){
        mail = document.getElementById("correoElectronico").value;
        if( /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(mail)) {
            document.getElementById('btnTres').disabled=false;
        } else {
            //document.getElementById('btnTres').disabled=true;
        }        
        if(/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/.test(phone)){
            document.getElementById('btnTres').disabled=false;
        } else {
            document.getElementById('btnTres').disabled=true;
        }
    });

    //VALIDAR FIRMA DIGITAL
    $('#firma').keyup(function(){
        firmdigital = document.getElementById("firma").value;
        if( /^[0-9]$/.test(firmdigital)) {
            document.getElementById('submit').disabled=false;
        } else {
            document.getElementById('submit').disabled=true;
        }
    });

    //VALIDAR NOMBRE DE USUARIO
    $('#nomusuario').keyup(function(){
        nameUsuario = document.getElementById("nomusuario").value;
        if( /^[a-z\d_-]{4,15}$/.test(nameUsuario)) {
            document.getElementById('submit').disabled=false;
        } else {
            document.getElementById('submit').disabled=true;
        }
    });

    // mostrar un alert de la firma digital y contraseña
    /*$('#acepto').click(function(){
       swal("¡Advertencia!", "No olvides tu contraseña, ya que no podrás realizar cambios en tu cuenta!", "info")
    });*/

}); //ready function() ...



//-----------------------COMPRUEBA SI EL CLIENTE TIENE DENOMINACION----------------------->
function mostrarReferencia() {
    if(document.formularioCliente.Conocido[1].checked == true) {
        document.getElementById('radioDENOM').style.display= 'block';
        document.formularioCliente.denominacion.value = 'NOMBRE DE TU NEGOCIO';
    }else {
        document.getElementById('radioDENOM').style.display= 'none';

    }
}
//------------------------COMPRUEBA SI EL CLIENTE TIENE RFC--------------------------------->
function mostrarReferencia2() {
    if(document.formularioCliente.Conocido2[1].checked == true) {
        document.getElementById('radioRFC').style.display= 'block';
        document.formularioCliente.rfc.value = 'RFCN0ASIGNAD0';
    }else {
        document.getElementById('radioRFC').style.display= 'none';
    }
}
//---------------------------ACEPTA SOLO NUMEROS------------------------------------------->
function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode;
    return ((key >= 48 && key <= 57) ||(key==8))
}

//----------------------PROCESAR TODOS LOS ESTADOS------------------------------------------->
$(document).ready(function() {
    // Obtener estados
    $.ajax({
        type: "POST",
        url: "php/procesar-estados.php",

        data: { estados : "Mexico" }
    }).done(function(data){
        $("#jmr_contacto_estado").html(data);
    });
    // Obtener municipios
    $("#jmr_contacto_estado").change(function(){
        var estado = $("#jmr_contacto_estado option:selected").val();
        $.ajax({
            type: "POST",
            url: "php/procesar-estados.php",
            data: { municipios : estado }
        }).done(function(data){
            $("#jmr_contacto_municipio").html(data);
            onkeyup="javascript:this.value=this.value.toUpperCase();"
        });
    });
});

//----------------------COMPRUEBA SI EL CORREO EXISTE---------------------------------------->
$(document).ready(function() {
    $('#correoElectronico').keyup(function() {
        $('#Info').html('<img src="img/gif/load.gif" alt="">').fadeOut(1000);

        var correoElectronico = $(this).val();
        var dataString = 'correoElectronico='+correoElectronico;

        $.ajax( {
            type: "POST",
            url: 'php/existencia_correo.php',
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });
    });
});

//---------------------------COMPRUEBA SI EL NOMBRE DE USUARIO EXISTE--------------------->
$(document).ready(function() {
    $('#nomusuario').keyup(function() {
        $('#Infor').html('<img src="img/gif/load.gif" alt="">').fadeOut(1000);

        var nomusuario = $(this).val();
        var dataString = 'nomusuario='+nomusuario;

        $.ajax( {
            type: "POST",
            url: 'php/existencia_usuario.php',
            data: dataString,
            success: function(data) {
                $('#Infor').fadeIn(1000).html(data);
            }
        });
    });
});
