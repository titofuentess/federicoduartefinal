<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(imagenes/fondo.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        #btnCerrarSesion {
            background-color: #dc3545; /* Cambiar color de fondo a rojo */
            color: #fff; /* Cambiar color del texto a blanco */
        }
    </style>
</head>
<body>
    <h1>Hola administrador</h1><br><br>
<a href=altaEmple.php><button>Alta empleados</button></a>
<a href=listarEmple.php><button>Listar empleados</button></a>
<a href=altas.php><button>Alta turnos</button></a>
<a href=listar.php><button>Listar turnos</button></a>
<a href=buscar.php><button>Buscar turnos</button></a>
<a href=leerMensajes.php><button>Ver mensajes</button></a><br><br>
<a href=cerrarSesion.php><button id="btnCerrarSesion">Cerrar sesion</button></a>
</body>
</html>
<?php


?>