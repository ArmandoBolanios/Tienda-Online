
function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'../aplicacion/datos_Empleado.php',
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

	$('#dataUpdate').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal 
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var nombre = button.data('nombre') // Extraer la información de atributos de datos          
		  var apellidoP = button.data('apepaterno') // Extraer la información de atributos de datos 
		  var apellidoM = button.data('apematerno') // Extraer la información de atributos de datos 
		  
		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar Empleado: '+nombre) 
          modal.find('.modal-body #id').val(id)
		  modal.find('.modal-body #nombre').val(nombre)
		  modal.find('.modal-body #apellidoP').val(apellidoP) 
		  modal.find('.modal-body #apellidoM').val(apellidoM) 
		  $('.alert').hide();//Oculto alert
		})


	$( "#actualidarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosEmpleado/modificarEmpleado.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});

 
 	$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#id_empleado').val(id)
		})
 
			$( "#eliminarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosEmpleado/eliminarEmpleado.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_delete").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_delete").html(datos);
					$('#dataDelete').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
		});


		$( "#guardarDatos" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosEmpleado/agregarEmpleado.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_register").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_register").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
 