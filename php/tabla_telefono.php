<?php
session_start();
require_once '../connections/conexion.php';
$idCliente = $_SESSION['user_id'];

// ----
$count_query   = mysqli_query($ConexionBD,"SELECT count(*) AS numrows FROM cliente_telefono 
                 WHERE idCliente='$idCliente' ");
if ($fila= mysqli_fetch_array($count_query)){$numrows = $fila['numrows'];}

$data = '<table class="table table-bordered table-striped ">
            <thead class="negrita">
                <tr>
                    <th>No.</th>
                    <th>Teléfono</th>
                    <th>Editar</th>                    
                    ';
if($numrows<=2) {
    $data .= '
                    <th>Agregar <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_new_telefono_modal">+</button></th>
                </tr>
            </thead>
    ';
} else {
    $data .= '
                    <th><span class="fa fa-ban"></span></th>
                </tr>
            </thead>
    ';
}
$query = "SELECT * FROM cliente_telefono WHERE idCliente = '$idCliente'";

if (!$result = mysqli_query($ConexionBD, $query)) {
    exit(mysqli_error());
}


if(mysqli_num_rows($result) > 0) {
    $number = 1;
    while($row = mysqli_fetch_assoc($result)) {
        $data .=    '<tbody>
                        <tr>
				            <td>'.$number.'</td>
				            <td>'.$row['telefono'].'</td>
				            <td>
                                <button onclick="editarTelefono('.$row['idClienteTelefono'].')" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
				            </td>';
        if($number==1){
            $data .= '<td><span class="fa fa-ban"></span></td>';
        }
        //eliminar telefono
        if($number==2 || $number==3){
            $data .= '<td><button onclick="eliminarTelefono('.$row['idClienteTelefono'].')" class="btn btn-danger"><span class="fa fa-close"></span></button></td>';
        }

        $data .= '</tr>';
        $number++;
    }
}
else {
    // si no hay datos 
    $data .= '<tr><td colspan="6">Records not found!</td></tr>';
}

$data .= '</tbody>
        </table>';

echo $data;
?>