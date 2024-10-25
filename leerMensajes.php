<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
$archivo = fopen("mensajes.txt", "r");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes de Empleados</title>
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
            height: 100vh;
            flex-direction: column;
            color: white; /* Color del texto blanco */
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7); /* Fondo negro semitransparente */
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            text-align: left;
        }
        h2 {
            color:black;
            margin-top: 0;
        }
        #volver {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<h2>Mensajes de Empleados</h2>
<div class="container">
    <?php
   
    if ($archivo) {
        
        while (!feof($archivo)) { // Se fija si llego al final del archivo
            $mensaje = fgets($archivo);
            echo nl2br(htmlspecialchars($mensaje)); // Convierte los saltos de línea y escapa caracteres especiales
        }
        fclose($archivo);
    } else {
        echo "<p>Error al abrir el archivo.</p>";
    }
    ?>
    <br><br>
   
</div>
<a href="admin.php"><button id="volver">Volver</button></a>
</body>
</html>