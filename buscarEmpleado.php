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
        table,th,td{
            border: 1px solid #B68562;
            border-collapse:collapse;
        }
        th{
            background-color:#B68562;
        }
        td{
        background-color:white;

        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <h1>Buscar</h1><br><br>
<form method=POST>
        <select name=opcion>
            <option value=dni>DNI</option>
            <option value=fecha>Fecha de atención</option>
    </select>
    <input type=text name=buscado required>
        <input type=submit value="Buscar"><br><br>
    <h3>Para fechas, ingresar: año/mes/día </h3>
</form>

<?php
if(isset($_POST['buscado'])){
$opcion=$_POST['opcion'];
$buscado=$_POST['buscado'];

if($opcion=="dni"){
    $sql="select*from clientes where cli_dni=$buscado;";
}
if($opcion=="fecha"){
    $sql="select*from clientes where cli_fecha_atencion='$buscado';";
}

require "conexion.php";

$resultset=mysqli_query($conexion,$sql);

if(mysqli_affected_rows($conexion)>0){
    ?>
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

    <?php
    while($registro=mysqli_fetch_assoc ($resultset)){
        ?>
        <tr>
        <td><?php echo $registro['cli_nombre'];?></td>
        <td><?php echo $registro['cli_apellido'];?></td>
        <td><?php echo $registro['cli_dni'];?></td>
        <td><?php echo $registro['cli_telefono'];?></td>
        <td><?php echo $registro['cli_fecha_atencion'];?></td>
        <td><?php echo $registro['cli_forma_pago'];?></td>
       
       <td><?php if($registro['usu_id']==2){
                echo "Mara Alfano";
                }if($registro['usu_id']==3){
                 echo "Federico Duarte";
                }?></td>

        <td><?php if($registro['serv_id']==1){
                echo "Manicura";
                }if($registro['serv_id']==2){
                echo "Pedicura";
                }if($registro['serv_id']==3){
                echo "Lash Lifting";
                }if($registro['serv_id']==4){
                echo "Depilación Definitiva";
                }?></td>
        
        </tr>
        <?php
    } 
        ?>

    </table>
   
<?php
}else{
    echo "no se encontró el registro";
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
<br><br><a href=emple.php><button id="volver">volver</button></a>
</body>
</html>