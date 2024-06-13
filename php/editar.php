<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $puesto = $_POST["puesto"];
 
    if(isset($_POST["editar2"])){
        include("conexion.php");
        $getmysql=new mysqlconex();
        $getconex=$getmysql->conex();

        $query="UPDATE empleados SET nombre=?,apellido=?,puesto=? WHERE id=?";
        $sentencia=mysqli_prepare($getconex,$query);
        mysqli_stmt_bind_param($sentencia,"sssi",$nombre,$apellido,$puesto,$id);
        mysqli_stmt_execute($sentencia);
        $afectado=mysqli_stmt_affected_rows($sentencia);
        if($afectado==1){
            echo "<script> alert('El empleado $nombre se edito correctamente :) '); location.href='../index.php'; </script>";
        }else{
            echo "<script> alert('El empleado $nombre no se edito :( '); location.href='../index.php'; </script>";
        }
        mysqli_stmt_close($sentencia);
        mysqli_close($getconex);
    }

    ?>

    <form action="editar.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>">
        <label for="apellido">Apellido: </label><input type="text" name="apellido" id="apellido" value="<?php echo $apellido ?>">
        <label for="puesto">Puesto: </label>
        <select name="puesto" id="puesto">
            <option value="<?php echo $puesto ?>" hidden selected><?php echo $puesto ?></option>
            <option value="Desarrollador">Desarrollador</option>
            <option value="Tester">Tester</option>
        </select>
        <input type="submit" name="editar2" value="editar">
    </form>
</body>

</html>