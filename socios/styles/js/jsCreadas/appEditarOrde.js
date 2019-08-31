$(document).on('ready',function(){       
    $('#btnActualizarCliente').click(function(){
        var url = "../funciones/datosServicio/actualizar_Cliente.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#validarForm").serialize(), 
           success: function(data)             
           { 
             $('#respu').html(data);               
           }
       });
    });
});     
        
  $(document).on('ready',function(){       
    $('#btnActualizar').click(function(){
        var url = "../funciones/datosServicio/actualizar_descripcion.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#vehiculo").serialize(), 
           success: function(data)             
           { 
             $('#resp').html(data);               
           }
       });
    });
});  
        
     $(document).on('ready',function(){       
    $('#btnAgregarS').click(function(){
        var url = "../funciones/datosServicio/actualizar_Servicio.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#servicio").serialize(), 
           success: function(data)             
           { 
          $('#respu').html(data);   
          $('#div_User').load("../aplicacion/editar_orden.php #div_User " );
           }
       });
    });
}); 
 



 
