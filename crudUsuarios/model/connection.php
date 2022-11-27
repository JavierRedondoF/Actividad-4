<?php
/*
    En este archivo se manejara la conexion a la base de datos,
    sin password y usuario root, estos son los valores por defectos
    al crear un proyecto nuevo utilizando la bd en XAMMP
*/
$password = "";
$usuario = "root";
$nombre_bd = "crud_usuarios";

/* Manejo de Excepciones */
try {
    $bd = new PDO(
        'mysql:host=localhost;
		dbname=' . $nombre_bd,
        $usuario,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (Exception $e) {
    echo "Problema con la conexion: " . $e->getMessage();
}
