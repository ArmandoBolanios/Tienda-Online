
	$(document).ready(function(){
		load(1,$('input:radio[name=mostrar]:checked').val());
	});

	function load(page,orden){
		var parametros = {"action":"ajax","page":page, "orden":$('input:radio[name=mostrar]:checked').val()};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'php/articulos2.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='loader.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
