<?php
$servidorBD="localhost";
$usuarioBD="root";
$contraseñaBD='';
$bd="clientes";

$conexion=mysqli_connect($servidorBD,$usuarioBD,$contraseñaBD,$bd) or die("no se pudo conectar");
?>