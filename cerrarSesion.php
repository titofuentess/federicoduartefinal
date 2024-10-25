<?php
session_start();
$_SESSION["HoraFin"]=date('Y-m-d H:i:s');
$tiempoConectado = strtotime($_SESSION["HoraFin"]) - strtotime($_SESSION["HoraInicio"]);
$minutosConectado = round($tiempoConectado / 60);

$_SESSION["acceso"] = "USUARIO: {$_SESSION["usuario"]} ~ FECHA/HORA ACCESO: {$_SESSION["HoraInicio"]} ~ MINUTOS CONECTADO: $minutosConectado";

file_put_contents('accesos.txt', $_SESSION["acceso"] . PHP_EOL, FILE_APPEND | LOCK_EX);
session_destroy();
header("Location: index.php");

?>