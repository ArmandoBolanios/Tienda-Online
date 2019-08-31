<?php
session_start();
require_once '../connections/conexion.php';
$idCliente = $_SESSION['user_id'];

$data = '<table class="table table-bordered table-striped ">
            <thead class="negrita">
                <tr>
                    <th>Calle</th>
                    <th>Número Interior</th>
                    <th>Número Exterior</th>
                    <th>Colonia</th>
                    <th>Estado</th>
                    <th>Delegación</th>
                    <th>Código Postal</th>
                    <th>Editar</th>
                </tr>
            </thead>
    ';

$query = "SELECT * FROM cliente_direccion WHERE idCliente = '$idCliente'";

if (!$result = mysqli_query($ConexionBD, $query)) {
    exit(mysqli_error());
}


if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $data .=    '<tbody>
                        <tr>
				            <td>'.$row['calle'].'</td>
				            <td>'.$row['numeroInterior'].'</td>
                            <td>'.$row['numeroExterior'].'</td>
                            <td>'.$row['colonia'].'</td>
                            <td>'.$row['estado'].'</td>
                            <td>'.$row['delegacion'].'</td>
                            <td>'.$row['codigoPostal'].'</td>
				            <td>
                                <button onclick="editarDireccion('.$row['idClienteDireccion'].')" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
				            </td>';
        $data .= '</tr>';
        
    }
} else {
    // si no hay datos 
    $data .= '<tr><td colspan="6">Records not found!</td></tr>';
}

$data .= '</tbody>
        </table>';

echo $data;
?>