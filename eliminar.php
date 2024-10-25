<?php
session_start();
require "conexion.php";
if(!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
if(isset($_POST['id'])){
$id=$_POST['id'];

$sql="select*from clientes where cli_id=$id;";
$resultset=mysqli_query($conexion,$sql);

$registro=mysqli_fetch_assoc ($resultset);

echo "Se va a eliminar el turno de ".$registro['cli_nombre']." ".$registro['cli_apellido']; 
echo ".Está seguro que desea continuar?";
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
    </style>
</head>
<body>
<form action="#">
        <input type=radio name=confirma value="si">SI<br>
        <input type=radio name=confirma value="no">NO<br><br>
        <input type=submit value="continuar">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
</form>
</body>
</html>
<?php
}
if(isset($_GET['confirma'])){
$id=$_GET['id'];
if($_GET['confirma']=="si"){
require "conexion.php";
$sql="delete from clientes where cli_id=$id;";
mysqli_query($conexion,$sql);
if(mysqli_affected_rows($conexion)>0) {
    header("Location: buscar.php?si");
}else{
    header("Location: buscar.php?no");
}
}
if($_GET['confirma']=="no"){
    header("Location: buscar.php");
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href=buscar.php><button>volver</button></a>
</body>
</html>
