/*------------------------CARGAR COMBOX ANIO---------------------------*/
$(document).ready(function(){
    document.getElementById('buscarAvanzado').disabled=true;
    document.getElementById('cbx_anio').disabled=true;
    document.getElementById('cbx_Armadora').disabled=true;
    document.getElementById('cbx_Modelo').disabled=true;
    document.getElementById('cbx_Cilindro').disabled=true;
    document.getElementById('cbx_Litro').disabled=true;


    $("#cbx_Region").change(function () {

        $('#cbx_Armadora').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        $('#cbx_Modelo').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        $('#cbx_Cilindro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        $('#cbx_Litro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#cbx_Region option:selected").each(function () {

            id_Regions = $(this).val();

            $.post("php/buscador/getAnio.php", { id_region: id_Regions }, function(data){
                $("#cbx_anio").html(data);
                document.getElementById('cbx_anio').disabled=false;


            });            
        });
    })
});

/*------------------------CARGAR COMBOX ARMADORA---------------------------*/
$(document).ready(function(){
    $("#cbx_anio").change(function () {

        $('#cbx_Modelo').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');       
        $('#cbx_Cilindro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        $('#cbx_Litro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#cbx_anio option:selected").each(function () {

            id_Anios = $(this).val();

            $.post("php/buscador/getArmadora.php", { id_anio: id_Anios, id_region: id_Regions }, function(data){
                $("#cbx_Armadora").html(data);
                document.getElementById('cbx_Armadora').disabled=false;
            });            
        });
    })
});



/*------------------------CARGAR COMBOX MODELO---------------------------*/
$(document).ready(function(){
    $("#cbx_Armadora").change(function () {

        $('#cbx_Cilindro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        $('#cbx_Litro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#cbx_Armadora option:selected").each(function () {

            id_armadoras = $(this).val();
            $.post("php/buscador/getModelo.php", { id_armadora:id_armadoras,  id_anio: id_Anios, id_region: id_Regions   }, function(data){
                $("#cbx_Modelo").html(data);
                document.getElementById('cbx_Modelo').disabled=false;
            });            
        });
    })
});




/*------------------------CARGAR COMBOX CILINDRO---------------------------*/
$(document).ready(function(){
    $("#cbx_Modelo").change(function () {

        $('#cbx_Litro').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

        $("#cbx_Modelo option:selected").each(function () {

            id_modelos = $(this).val();

            $.post("php/buscador/getCilindro.php", {id_modelo: id_modelos, id_armadora:id_armadoras,  id_anio: id_Anios, id_region: id_Regions   }, function(data){
                $("#cbx_Cilindro").html(data);
                document.getElementById('cbx_Cilindro').disabled=false;
            });            
        });
    })
});



/*------------------------CARGAR COMBOX Litro---------------------------*/
$(document).ready(function(){

    $("#cbx_Cilindro").change(function () {
        $("#cbx_Cilindro option:selected").each(function () {

            id_cilindros = $(this).val();

            $.post("php/buscador/getLitro.php", {id_cilindro: id_cilindros, id_modelo: id_modelos, id_armadora:id_armadoras,  id_anio: id_Anios, id_region: id_Regions   }, function(data){
                $("#cbx_Litro").html(data);
                document.getElementById('cbx_Litro').disabled=false;

            });            
        });
    })
});



/*------------------------enviar articulos Avanzado---------------------------*/
$(document).ready(function(){

    $("#cbx_Litro").change(function () {
        $("#cbx_Litro option:selected").each(function () {
            document.getElementById('buscarAvanzado').disabled=false;

        });
    })
});




