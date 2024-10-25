<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST['id'])){
$id=$_POST['id'];

$sql="select * from usuarios where usu_id=$id;";
require "conexion.php";

$resultado=mysqli_query($conexion,$sql);

$registro=mysqli_fetch_assoc($resultado);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        h2 {
            margin-bottom: 60px;
        }
        table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        input[type="text"], input[type="password"] {
           
            padding: 5px;
            width: 90%;
        }
        input[type="submit"] {
          background-color:#B6B4B4;
            padding: 10px 20px;
            margin:10px 5px;
        }
        a {
            text-decoration: none;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        table {
            margin: auto;
        }
        #cancelar{
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        
        </style>
</head>
<body>
<h2>MODIFICAR EMPLEADO</h2> 
<form>
<table>
    <tr>
    <th>email</th>
    <th>contraseña</th>
    </tr>
<tr>
    
    <input name="id" type=hidden value="<?php echo $registro['usu_id'];?>">
    <td>
        <input name="email" type=text value="<?php echo $registro['usu_email'];?>" required>
</td>
    <td>
        <input name="contra" type=text value="<?php echo $registro['usu_contra'];?>" required>
        <td>
</tr>
</table>

<input type=submit value="guardar cambios" id="guardar" formaction=# formmethod=post>
</form>
<a href=listarEmple.php><button id="cancelar">Cancelar</button></a>

</body>
</html>
<?php
if(isset($_POST['email'])){
    $id=$_POST['id'];
    $email=$_POST['email'];
    $contra=$_POST['contra'];

    $sql="update usuarios set usu_email='$email',usu_contra='$contra' where usu_id=$id;";
require "conexion.php";
mysqli_query($conexion,$sql);

if (mysqli_affected_rows($conexion)>0){
    header("location:listarEmple.php?ModEmpleOK");
}
else{
    header("location:listarEmple.php?ModEmpleNO");
}
}
?>