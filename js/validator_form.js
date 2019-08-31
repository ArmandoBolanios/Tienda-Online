
/*------------------------------------------------------------*/
$(document).ready(function() {
    $('#FormularioEmailPwd').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password_email: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida y no debe ser vacía'
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
            cpassword_email: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es requerida y no debe ser vacía'
                    },
                    identical: {
                        field: 'password_email',
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

/*------------------------------------------------------------*/

$(document).ready(function() {
    $('#validaEnvioCorreo').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombreRemitente: {
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
            correo: {
                validators: {
                    notEmpty: {
                        message: 'El correo electronico es requerido y no puede estar vacío'
                    },
                    emailAddress: {
                        message: 'El correo electrónico no es válido'
                    },
                    regexp:{
                        regexp: /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/,
                        message: 'El correo no cumple con el estándar'

                    }
                }
            },
            asunto: {
                message: 'El asunto no es válido',
                validators: {
                    notEmpty: {
                        message: 'El asunto es requerido y no debe estar vacío'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'El asunto debe ser más de 3 a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[A-Za-zäëïöüáéíóúñÑÁÉÍÓÚÄËÏÖÜ ]+$/,
                        message: 'El nombre sólo puede consistir de alfabeto'
                    }
                }
            },
            cuerpo: {
                validators: {
                    notEmpty: {
                        message: 'El campo es requerido y no puede estar vacío'
                    },
                    stringLenght: {
                        min: 8,
                        max: 30,
                        message: 'El mensaje no soporta demasiado texto'
                    }
                }
            }
        } //termina fields
    });
});




