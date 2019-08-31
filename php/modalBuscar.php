<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Buscar por Vehiculo</h4>
            </div>

            <form class="form" method="POST" action="searchAvanzado.php"  name="formBuscarAvanzado">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6 col-md-2">Región

                                <?php include "connections/conexion.php";

           $query = "SELECT DISTINCT (idRegion) FROM region ORDER BY idRegion";
           $resultado=$ConexionBD->query($query); 
                                ?>

                                <select name="cbx_Region" id="cbx_Region" class="form-control" required >
                                    <option value="0">REGIÓN</option>

                                    <?php 
           while($row = $resultado->fetch_assoc()) {
               $obtenerReg = "select region from region where idRegion = '".$row['idRegion']."' ";
               $resultReg = $ConexionBD->query($obtenerReg);
               $resRegion = $resultReg->fetch_array(MYSQLI_ASSOC);
                                    ?>
                                    <option value="<?php echo $row['idRegion']; ?>"><?php echo $resRegion['region']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>

                            <div class="col-xs-6 col-md-2">Año
                                <select name="cbx_anio" id="cbx_anio" class="form-control" required>
                                    <option value='0'>AÑO</option>
                                </select>

                            </div>
                            <div class="col-xs-6 col-md-2">Armadora
                                <select name="cbx_Armadora" id="cbx_Armadora"  class="form-control block"  required>
                                    <option value='0'>ARMADORA</option>
                                </select>
                            </div>
                            <div class="col-xs-6 col-md-2">Modelo
                                <select name="cbx_Modelo" id="cbx_Modelo" class="form-control" required>
                                    <option value='0'>MODELO</option>
                                </select>

                            </div>
                            <div class="col-xs-6 col-md-2">Cilindro

                                <select name="cbx_Clindro" id="cbx_Cilindro" class="form-control" required>
                                    <option value='0'>CILINDRO</option>
                                </select>

                            </div>
                            <div class="col-xs-6 col-md-2">Litro
                                <select name="cbx_Litro" id="cbx_Litro" class="form-control" required>
                                    <option value='0' >LITRO</option>
                                </select>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="buscarAvanzado" id="buscarAvanzado" class="btn btn-warning">Buscar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
