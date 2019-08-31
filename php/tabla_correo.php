<?php
session_start();
require_once '../connections/conexion.php';
$idCliente = $_SESSION['user_id'];

$data = '<table class="table table-bordered table-striped">
            <thead class="negrita">
                <tr>
                    <th>Correo electrónico</th>
                    <th>Editar</th>
                </tr>
            </thead>
        ';
$query = "SELECT * FROM cliente_correo WHERE idCliente = '$idCliente'";

if (!$result = mysqli_query($ConexionBD, $query)) {
    exit(mysqli_error());
}

if(mysqli_num_rows($result) > 0) {
    $number = 1;
    while($row = mysqli_fetch_assoc($result)) {
        $data .=    '<tbody>
                        <tr>
				            <td>'.$row['correoElectronico'].'</td>
				            <td>
                                <button onclick="editarCorreo('.$row['idClienteCorreo'].')" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
				            </td>';
        $data .= '      </tr>';
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