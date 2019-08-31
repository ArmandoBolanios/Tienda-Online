function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
           	url:'../aplicacion/credenciales.php',
			 data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src=' http://localhost/Montecarlo05/styles/logos/loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}

$( "#guardarCredenciales" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosCredenciales/agregarCredenciales.php",
					data: parametros,
				    beforeSend: function(objeto){
						$("#datos_ajax_credencial").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_credencial").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
 