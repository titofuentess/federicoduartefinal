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
#volver{
    background-color: red;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}
h1{
    text-aling:center;
}
    </style>
</head>
<body>
    <h1>Clientes</h1><br><br>
    <?php
   require "conexion.php" ;
   $sql="select*from clientes;";

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

    </table><br>
<?php
   }else{
    echo "No hay datos cargados aún";
   }
   ?>
    
    <button id="volver" onclick="history.back()">Volver</button>
</body>
</html>