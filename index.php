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
            color: white;
        }
        h3{
            color: white;
        }
        form {
            width: 300px;
            margin: 0 auto;
            background-color: #B68562;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid white;
            background-color: #B68562;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Ingrese sus datos</h1>
    <form method=POST>
<h3>Email:</h3><input type=email name=email required><br><br>
<h3>Contraseña:</h3><input type=password name=contra required><br><br>
<input type=submit value="Iniciar"><br><br>

</form>
</body>
</html>
<?php
if(isset($_POST['email'])){
$email=$_POST['email'];
$contra=$_POST['contra'];


require "conexion.php";
$sql="select*from usuarios where usu_email='$email';";
$resultset=mysqli_query($conexion,$sql);

if(mysqli_affected_rows($conexion)>0){
    while($registro=mysqli_fetch_assoc ($resultset)){
        if($contra==$registro['usu_contra']){
            //Registro de acceso
            session_start();
    
            $_SESSION["HoraInicio"] = date('Y-m-d H:i:s');
         
            $_SESSION["usuario"]=$registro['usu_email'];

            

           if($registro['rol_id']=="1"){
           header("Location: admin.php");
        }  if($registro['rol_id']=="2"){
            header("Location: emple.php");
        }
        }else{
        echo "Contraseña incorrecta";
        }
        
    }
    
}else {
    echo "no se encontró el usuario $email";
}
}

?>
