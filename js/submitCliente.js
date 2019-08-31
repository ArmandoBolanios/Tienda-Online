/*--------------------*/
$(document).ready(function(e){
    $("#submitFormUsuario").on('submit', function(e){
        e.preventDefault();

        // -
        var usuario = $('input[name=nomusuario]').val();
        var ps      = $('input[name=password]').val();
        var cps     = $('input[name=cpassword]').val();
        //elemento    = document.getElementById("acepto");
        // Returns successful data submission message when the entered information is stored in database.
        if (usuario==''|| ps=='' || cps=='' || ps!=cps) {
            alert("Por favor, rellena los datos");
        } else {
            //-
            $.ajax({
                type: 'POST',
                url: 'funciones/insert_cliente.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(html){
                    if(html==1) {
                        swal({
                            title: "¡Registro en proceso!",
                            imageUrl: "img/index/success.jpg",
                            text: "Te hemos enviado un correo electrónico para activar tu cuenta",
                            timer: 2000,
                            showConfirmButton: false
                        }, function () {
                            setTimeout(function () {
                                window.location="cliente_login.php";
                            }, 300);
                        });
                    }else alert('Inténtalo más tarde');
                    //console.log(html);
                },
                error: function(){
                    alert("Algo ha fallado");
                }
            });
        }
        return false;
    });
});