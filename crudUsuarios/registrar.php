<?php
// validacion para que no se registren usuarios con informacion faltante
if (empty($_POST["oculto"]) ||  empty($_POST["txtNombre"]) ||  empty($_POST["txtIdentificacion"]) ||  empty($_POST["txtCiudadOrigen"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once './model/connection.php'; /* Conexion a la Base de Datos */
$nombre = $_POST["txtNombre"];
$identificacion = $_POST["txtIdentificacion"];
$ciudad = $_POST["txtCiudadOrigen"];

// sentencia SQL que inserta los valores en la tabla 'usuario' existente
$sentencia = $bd->prepare("INSERT INTO usuario(nombre,identificacion,ciudad) VALUES (?,?,?);");
$resultado = $sentencia->execute([$nombre, $identificacion, $ciudad]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
