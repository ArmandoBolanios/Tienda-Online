$(document).ready(function (data) {
    $('.add_to_cart').click(function () {
        var product_id = $(this).attr("id");
        var product_image = $('#urlImagen' + product_id).val();
        var product_codArticulo = $('#codArticulo' + product_id).val();
        var product_codAlterno = $('#codAlterno' + product_id).val();
        var product_descrip = $('#descrip' + product_id).val();
        var product_price = $('#price' + product_id).val();
        var product_quantity = $('#quantity' + product_id).val();

        var action = "add";
        if (product_quantity > 0) {
            $.ajax({
                url: "php/action_cart_2.php",
                method: "POST",
                dataType: "json",
                data: {
                    product_id: product_id,
                    product_image: product_image,
                    product_codArticulo: product_codArticulo,
                    product_codAlterno: product_codAlterno,
                    product_descrip: product_descrip,
                    product_price: product_price,
                    product_quantity: product_quantity,
                    action: action
                },
                success: function (data) {
                    $('#order_table').html(data.order_table);
                    $('.badge').text(data.cart_item);
                    //swal("¡Muy bien!", "Artículo agregado al carrito!", "success")
                    swal({
                        title: "¡Muy bien!",
                        text: "Agregado al carrito",
                        timer: 600,
                        showConfirmButton: false,
                    });
                }
            });
        } else {
            swal("¡Advertencia!", "Por favor, elija la cantidad de artículos!", "info")
            //input con valor por defecto = 1
            document.getElementById("quanti").value = 1;
            document.getElementById("quantity"+product_id).value = 1;
        }
    });

    //eliminar articulos de la tabla
    $(document).on('click', '.delete', function () {
        var product_id = $(this).attr("id");
        var action = "remove";

        swal({
            title: "¿Estás seguro?",
            text: "¡Se removerá de tu carrito de compras!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Sí",
            cancelButtonText:  "Cancelar", 
            closeOnConfirm: false
        },
             function(){
            //swal("¡Hecho!", "Artículo removido del carrito.", "success");
            swal({
                title: "¡Hecho!",
                text: "Artículo removido del carrito",
                timer: 1000,
                showConfirmButton: false
            });
            $.ajax({
                url: "php/action_cart_2.php",
                method: "POST",
                dataType: "json",
                data: {
                    product_id: product_id,
                    action: action
                },
                success: function (data) {
                    $('#order_table').html(data.order_table);
                    $('.badge').text(data.cart_item);
                }
            });
        });
    });

    //para el tipo number, enviando valores por teclado
    $(document).on('keyup', '.quantity', function () {
        var product_id = $(this).data("product_id");
        var quantity = $(this).val();
        var product_quantity = $('#quantity' + product_id).val();
        var action = "quantity_change";

        if (quantity != '') {
            if (product_quantity > 0) {
                $.ajax({
                    url: "php/action_cart_2.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                        action: action
                    },
                    success: function (data) {
                        $('#order_table').html(data.order_table);
                    }
                });
            } else {
                swal("¡Advertencia!", "Por favor, elija la cantidad de artículos!", "info")
                //input con valor por defecto = 1
                document.getElementById("quantity"+product_id).value = 1;
            }
        }

        //verificar el stock en marcha
        $('#Inform').html('<img src="img/gif/load.gif" alt="">').fadeOut(1000);
        $.ajax( {
            type: "POST",
            url: 'php/stock_2.php',
            data:{
                product_id:	      product_id,   
                product_quantity: product_quantity
            },
            success: function(data) {
                $('#Inform').fadeIn(1000).html(data);
            }
        });

        //validar para on aceptar negativos

    });

    //para el tipo number, enviando valores por clicks
    /*$(document).on('change', '.quantity', function () {
		var product_id = $(this).data("product_id");
		var quantity = $(this).val();
		var product_quantity = $('#quantity' + product_id).val();
		var action = "quantity_change";

		if (quantity != '') {
			if (product_quantity > 0) {
				$.ajax({
					url: "php/action_cart_2.php",
					method: "POST",
					dataType: "json",
					data: {
						product_id: product_id,
						quantity: quantity,
						action: action
					},
					success: function (data) {
						$('#order_table').html(data.order_table);
					}
				});
			} else {
				swal("Advertencia!", "Profavor, elija la cantidad de articulos!", "info")
			}
		}

		//verificar el stock en marcha
		$('#Inform').html('<img src="img/gif/load.gif" alt="">').fadeOut(1000);
		$.ajax( {
			type: "POST",
			url: 'php/stock_2.php',
			data:{
				product_id:	      product_id,   
				product_quantity: product_quantity
			},
			success: function(data) {
				$('#Inform').fadeIn(1000).html(data);
			}
		});
	});*/


});

