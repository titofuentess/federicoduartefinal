<?php
session_start();
require "conexion.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
if (isset($_POST['id'])){
$id=$_POST['id'];

$sql="select * from clientes where cli_id=$id;";


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
        th{
            background-color:#B68562;
            color:white;
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
<h2>MODIFICAR TURNO</h2> 
<form>
<table>
<tr>
        <th>nombre</th>
        <th>apellido</th>
        <th>dni</th>
        <th>telefono</th>
        <th>fecha de atencion</th>
        <th>forma de pago</th>
        <th>empleado</th>
        <th>servicio</th>
</tr>
<tr>
    
    <input name="id" type=hidden value="<?php echo $registro['cli_id'];?>">
    <td>
        <input name="nom" type=text maxlenght=20 value="<?php echo $registro['cli_nombre'];?>"required>
</td>
    <td>
        <input name="ape" type=text maxlenght=30 value="<?php echo $registro['cli_apellido'];?>" required>
        <td>
        <input name="dni" type=number  min=0 value="<?php echo $registro['cli_dni'];?>" required>
    </td>
    <td>
        <input name="tel" type=number  min=1000000000 value="<?php echo $registro['cli_telefono'];?>" required>
    </td>
    <td>
        <input name="fecha" type=date  value="<?php echo $registro['cli_fecha_atencion'];?>" required>
    </td>
    <td>
    <?php 
        if($registro['cli_forma_pago']=='E'){
        ?>
        <select name=formap>
            <option value='E'>Efectivo</option>
            <option value='T'>Transferencia</option>
        </select>
        <?php
        }if($registro['cli_forma_pago']=='T'){
        ?>
            <select name=formap>
            <option value='T'>Transferencia</option>
            <option value='E'>Efectivo</option>
        </select>
        <?php
        }
        ?>
        
    </td>
    <td>
        <?php 
        if($registro['usu_id']==2){
        ?>
        <select name=usu>
            <option value=2>Mara Alfano</option>
            <option value=3>Federico Duarte</option>
        </select>
        <?php
        }if($registro['usu_id']==3){
        ?>
            <select name=usu>
            <option value=3>Federico Duarte</option>
            <option value=2>Mara Alfano</option>
        </select>
        <?php
        }
        ?>
    </td>
    <td>
    <?php 
        if($registro['serv_id']==1){
        ?>
        <select name=serv>
            <option value=1>Manicura</option>
            <option value=2>Pedicura</option>
            <option value=3>Lash Lifting</option>
            <option value=4>Depilación Definitiva</option>
        </select>
        <?php
        }if($registro['serv_id']==2){
        ?>
            <select name=serv>
            <option value=2>Pedicura</option>
            <option value=1>Manicura</option>
            <option value=3>Lash Lifting</option>
            <option value=4>Depilación Definitiva</option>
        </select>
        <?php
        }if($registro['serv_id']==3){
            ?>
                <select name=serv>
                <option value=3>Lash Lifting</option>
                <option value=2>Pedicura</option>
                <option value=1>Manicura</option>
                <option value=4>Depilación Definitiva</option>
            </select>
            <?php
            }if($registro['serv_id']==4){
                ?>
                    <select name=serv>
                    <option value=4>Depilación Definitiva</option>
                    <option value=2>Pedicura</option>
                    <option value=1>Manicura</option>
                    <option value=3>Lash Lifting</option>
                </select>
                <?php
                }
                ?>
    </td>

</tr>
</table>

<input type=submit value="guardar cambios" formaction="#" formmethod=post>
</form>
<a href=buscar.php><button id="cancelar">Cancelar</button></a>

</body>
</html>
<?php
if(isset($_POST['nom'])){
$id=$_POST['id'];
$nom=$_POST['nom'];
$ape=$_POST['ape'];
$dni=$_POST['dni'];
$tel=$_POST['tel'];
$fecha=$_POST['fecha'];
$formp=$_POST['formap'];
$usu=$_POST['usu'];
$serv=$_POST['serv'];

require "conexion.php";
$sql="update clientes set cli_nombre='$nom',cli_apellido='$ape',cli_dni=$dni,cli_telefono=$tel,cli_fecha_atencion='$fecha',cli_forma_pago='$formp',usu_id=$usu,serv_id=$serv where cli_id=$id;";
mysqli_query($conexion,$sql);

if (mysqli_affected_rows($conexion)>0){
    header("Location: buscar.php?modSI");
}
else{
    header("Location: buscar.php?modNO");
}
}
?>