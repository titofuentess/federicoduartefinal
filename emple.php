
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
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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
<h1>Hola empleado</h1><br><br>
<a href=listar.php><button>Listar turnos</button></a>
<a href=buscarEmpleado.php><button>Buscar turnos</button></a>
<a href=enviarMensajes.php><button>Enviar Mensajes</button></a><br><br>
<a href=cerrarSesion.php><button id="btnCerrarSesion">Cerrar sesion</button></a>

</body>
</html>