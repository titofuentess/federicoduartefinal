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
            height: 100vh;
            flex-direction: column;
        }
        #volver{
             background-color: red;
             color: white;
             border: none;
             padding: 10px 20px;
             border-radius: 5px;
             cursor: pointer;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        h4{
        background-color: black;
        color: white;
        }
        #enviar{
        background-color: black;
        color: white;  
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Mensajes al Administrador</h1><br><br>
<form method=post>
    <textarea name="mensaje" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Enviar Mensaje" id="enviar">
</form>
<a href=emple.php><button id="volver">volver</button></a>
</body>
</html>
<?php
if(isset($_POST['mensaje'])){
$archivo=fopen("mensajes.txt","a");
$mensaje=$_POST['mensaje'];
if($archivo){
fwrite($archivo,$mensaje. "\n");
fclose($archivo);
?>
<h4>El mensaje se envió con exito</h4>
<?php
}else{
?>
<h4>No se pudo enviar el mensaje</h4>
<?php
}

}
?>