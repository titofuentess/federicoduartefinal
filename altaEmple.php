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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
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
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        h4{
            background-color: black;
        color: white;
       
        }
        form {
            width: 20%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow:  2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
      
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c82333;
        }
        </style>
</head>
<body>
    <h1>ALTA EMPLEADOS</h1>
    <form method=POST>
        <h3>Email:</h3><input type=text name="email" required>
        <h3>Contraseña:</h3><input type=password name="contra" required>
        <br><br><input type=submit value="Guardar">
    </form>

<?php
if (isset ($_POST['email'])){
$email=$_POST['email'];
$contra=$_POST['contra'];

require "conexion.php";
$sql="insert into usuarios(usu_email, usu_contra, rol_id) values('$email','$contra',2);";

mysqli_query ($conexion,$sql);

if(mysqli_affected_rows ($conexion) >0){
    ?>
    <br><br><h4>el empleado fue cargado con éxito</h4>
    <?php
}else{
    ?>
    <br><br><h4>el empleado no pudo ser cargado</h4>
    <?php
}
}
?>

<br><br><a href=admin.php><button>volver</button></a>
</body>
</html>
