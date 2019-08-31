function load(page){
		var parametros = {"action":"ajax","page":page};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'../aplicacion/datosCuentaSocios.php',
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
 
	$('#dataUpdateSocio').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal 
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var denomi = button.data('denominacion')  
		  var nombre = button.data('nombre') 
          var paterno = button.data('apepaterno') 
          var materno = button.data('apematerno')
          var alias = button.data('alias') 
          var rfc = button.data('rfc')
          var observacion = button.data('observacion')
		  
		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar Socio: '+nombre) 
          modal.find('.modal-body #id').val(id)
		  modal.find('.modal-body #denominacion').val(denomi)
		  modal.find('.modal-body #nombre').val(nombre)  
		  modal.find('.modal-body #paterno').val(paterno)  
		  modal.find('.modal-body #materno').val(materno)  
		  modal.find('.modal-body #alias').val(alias)  
		  modal.find('.modal-body #rfc').val(rfc)  
		  modal.find('.modal-body #observacion').val(observacion)   
		  $('.alert').hide();//Oculto alert
		})


	$( "#actualidarDatosSocio" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosSocio/modificarSocio.php",
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


 
	$('#dataUpdateSEmail').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal 
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var tipo = button.data('tipo') // Extraer la información de atributos de datos          
		  var correo = button.data('correo') // Extraer la información de atributos de datos  
		  
		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar correo: '+correo) 
          modal.find('.modal-body #id').val(id)
		  modal.find('.modal-body #tipoc').val(tipo)
		  modal.find('.modal-body #email').val(correo)  
		  $('.alert').hide();//Oculto alert
		})


	$( "#actualidarDatosEmail" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosSocio/modificarCorreo.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajaxE").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});

 
 
 
	$('#dataUpdatePhone').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal 
		  var id = button.data('id') // Extraer la información de atributos de datos
		  var tipot = button.data('tipot') // Extraer la información de atributos de datos          
		  var telefono = button.data('telef') // Extraer la información de atributos de datos  
		  
		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar teléfono: '+telefono) 
          modal.find('.modal-body #id').val(id)
		  modal.find('.modal-body #tipot').val(tipot)
		  modal.find('.modal-body #phone').val(telefono)  
		  $('.alert').hide();//Oculto alert
		})


	$( "#actualidarDatosPhone" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosSocio/modificarTel.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajaxT").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});

 

$('#dataUpdateDir').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal 
		  var id = button.data('id') // Extraer la información de atributos de datos
          var estado = button.data('estado')  
		  var deleg = button.data('deleg')  
          var colonia = button.data('colonia')  
          var numi = button.data('numi')           
		  var nume = button.data('nume')  
          var calle = button.data('calle')  
		  
		  var modal = $(this)
          modal.find('.modal-body #id').val(id)
		  modal.find('.modal-body #jmr_contacto_estado').val(estado)
		  modal.find('.modal-body #jmr_contacto_municipio').val(deleg)  
		  modal.find('.modal-body #colonia').val(colonia)
		  modal.find('.modal-body #numeroi').val(numi)
		  modal.find('.modal-body #numeroe').val(nume)
		  modal.find('.modal-body #calle').val(calle)      
    
		  $('.alert').hide();//Oculto alert
		})


	$( "#actualidarDatosDir" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosSocio/modificarDirS.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajaxD").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajaxD").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});




		$( "#guardarCorreo" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosSocio/agregarCorreoS.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_registerCorreo").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_registerCorreo").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});
 

$( "#guardarTel" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosSocio/agregarTelefonoS.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax_registerTel").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax_registerTel").html(datos);
					
					load(1);
				  }
			});
		  event.preventDefault();
		});




$('#dataDeleteC').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id') // Extraer la información de atributos de datos
          var correo = button.data('correo')
		  var modal = $(this)
          modal.find('.modal-title').text('Se eliminara el correo: '+ correo) 
		  modal.find('#id_correo').val(id)
		})
 
			$( "#eliminarCorreo" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosSocio/eliminarCorreoS.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_deleteCorreo").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_deleteCorreo").html(datos);
					
					$('#dataDeleteC').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
		});
 


$('#dataDeleteT').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id') // Extraer la información de atributos de datos
          var telefono = button.data('telefono')
		  var modal = $(this)
          modal.find('.modal-title').text('Se eliminara el teléfono: '+ telefono) 
		  modal.find('#id_telefono').val(id)
		})
 
			$( "#eliminarTel" ).submit(function( event ) {
		var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "../funciones/datosSocio/eliminarTelefonoS.php",
					data: parametros,
					 beforeSend: function(objeto){
						$(".datos_ajax_deleteTel").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$(".datos_ajax_deleteTel").html(datos);
					
					$('#dataDeleteT').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
		});
 