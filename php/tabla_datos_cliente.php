<?php
session_start();
require_once '../connections/conexion.php';
$idCliente = $_SESSION['user_id'];

$data = '<table class="table table-bordered table-striped">
            <thead class="negrita">
                <tr>
                    <th>Denominación</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>RFC</th>
                    <th>Editar</th>
                </tr>
            </thead>
        ';
$query = "SELECT * FROM cliente WHERE idCliente = '$idCliente'";

if (!$result = mysqli_query($ConexionBD, $query)) {
    exit(mysqli_error());
}

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $data .=    '<tbody>
                        <tr>
				            <td>'.$row['denominacion'].'</td>
                            <td>'.$row['nombre'].'</td>
                            <td>'.$row['apellidoPaterno'].'</td>
                            <td>'.$row['apellidoMaterno'].'</td>
                            <td>'.$row['rfc'].'</td>
				            <td>
                                <button data-toggle="modal" data-target="#editDatosCliente" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
				            </td>';
        $data .= '      </tr>';
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