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
    background-color: #B68562;
    }
td{
    background-color:white;

}

h4{
    background-color: black;
    color: white;
    width: 23%;
}
#tabla{
    align-items: center;
}
#volver{
    background-color: red;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type=submit] {
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>Empleados</h1><br><br>
    <?php
   require "conexion.php" ;
   $sql="select*from usuarios where rol_id=2;";

   $resultset=mysqli_query($conexion,$sql);
   if(mysqli_affected_rows($conexion)>0){
   ?>
   <div id="tabla">
   <table>
    <tr> 
        
        <th>Email</th>
        <th>Clave</th>
        
    </tr>
    <form>
    <?php
    while($registro=mysqli_fetch_assoc ($resultset)){
        ?>
        <tr>
        <td><?php echo $registro['usu_email'];?></td>
        <td><?php echo $registro['usu_contra'];?></td>
        <td><input type=radio name="id" value="<?php echo $registro['usu_id'];?>"></td>
        </tr>
        <?php
    } 
        ?>

    </table>
    <input type=submit value="Eliminar" formaction="eliminarEmple.php" formmethod=post>
    <input type=submit value="Modificar" formaction="modificarEmple.php" formmethod=post><br><br>
    </form>
    <br>
<?php
   }else{
    echo "No hay datos cargados aún";
   }
   ?>
   </div>
    
    <a href=admin.php><button id="volver">volver</button></a>

    <?php
    if(isset ($_GET['ModEmpleOK'])){
?>
        <h4> Se realizaron los cambios exitosamente</h4>
       <?php
     }if(isset ($_GET['ModEmpleNO'])){
        ?>
         <h4>No se realizaron los cambios</h4>
         <?php
     }if(isset ($_GET['EliEmpleOK'])){
        ?>
         <h4>El empleado se eliminó</h4>
         <?php
      
    }if(isset ($_GET['EliEmpleNO'])){
        ?>
        <h4>El empleado NO se eliminó</h4>
        <?php
    }
     ?>
</body>
</html>
