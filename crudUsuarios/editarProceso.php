<?php
if (!isset($_POST['codigo'])) {
    header('Location: index.php?mensaje=error');
}

include 'model/connection.php';
$codigo = $_POST['codigo'];
$nombre = $_POST['txtNombre'];
$identificacion = $_POST['txtIdentificacion'];
$ciudad = $_POST['txtCiudadOrigen'];

// Sentencia SQL que realiza la edicion con los valores nombre, identificacion y ciudad
$sentencia = $bd->prepare("UPDATE usuario SET nombre = ?, identificacion = ?, ciudad = ? where codigo = ?;");
$resultado = $sentencia->execute([$nombre, $identificacion, $ciudad, $codigo]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=editado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
