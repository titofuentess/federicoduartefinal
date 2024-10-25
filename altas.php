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
            width: 40%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow:  2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
       
        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        </style>
</head>
<body>
<h1>Ingrese los datos del turno</h1><br><br>
    <form method=POST>
        
        Nombre: <input type=text name=nom maxlenght=20 required><br><br>
        Apellido: <input type=text name=ape maxlenght=30 required> <br><br>
        DNI: <input type=number name=dni min=0 required> <br><br>
        Teléfono: <input type=number name=tel min=1000000000 required> <br><br>
        Fecha del servicio: <input type=date name=fecha required> <br><br>
        Forma de pago: <br>
        <input type=radio name=formp value='E'>Efectivo<br>
        <input type=radio name=formp value='T'>Transferencia<br><br>
        Empleado: <select name=emple>
            <option value=2>Mara Alfano</option>
            <option value=3>Federico Duarte</option>
        </select><br><br>
        Servicio: <select name=serv>
            <option value=1>Manicura</option>
            <option value=2>Pedicura</option>
            <option value=3>Lash Lifting</option>
            <option value=4>Depilación Definitiva</option>
        </select><br><br>

         <input type=submit value="Guardar">
    </form>
<?php
if (isset ($_POST['nom'])){
$nom=$_POST['nom'];
$ape=$_POST['ape'];
$dni=$_POST['dni'];
$tel=$_POST['tel'];
$fecha=$_POST['fecha'];
$formp=$_POST['formp'];
$emple=$_POST['emple'];
$serv=$_POST['serv'];

require "conexion.php";
$sql="insert into clientes(cli_nombre,cli_apellido,cli_dni,cli_telefono,cli_fecha_atencion,cli_forma_pago,usu_id,serv_id) values('$nom','$ape',$dni,$tel,'$fecha','$formp',$emple,$serv);";

mysqli_query ($conexion,$sql);

if(mysqli_affected_rows ($conexion) >0){
?>
<br><h4>el turno de <?php echo $nom." ".$ape ; ?> fue cargado con éxito</h4>
<?php
}else{
    ?>
<br><h4>el turno de <?php echo $nom." ".$ape ; ?> no pudo ser cargado</h4>
<?php
}
}
?>

<a href=admin.php><button>volver</button></a>
</body>
</html>
