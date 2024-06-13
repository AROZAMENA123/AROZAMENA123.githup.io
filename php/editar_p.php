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
    $id_p = $_POST["id_p"];
    $nombre_p = $_POST["nombre_p"];
    $gmail = $_POST["gmail"];
    $mensaje = $_POST["mensaje"];
 
    if(isset($_POST["editar2"])){
        include("conexion.php");
        $getmysql=new mysqlconex();
        $getconex=$getmysql->conex();

        $query="UPDATE comentarios SET nombre_p=?,gmail=?,mensaje=? WHERE id_p=?";
        $sentencia=mysqli_prepare($getconex,$query);
        mysqli_stmt_bind_param($sentencia,"sssi",$nombre_p,$gmail,$mensaje,$id_p);
        mysqli_stmt_execute($sentencia);
        $afectado=mysqli_stmt_affected_rows($sentencia);
        if($afectado==1){
            echo "<script> alert('El cliente $nombre_p se edito correctamente :) '); location.href='../index.php'; </script>";
        }else{
            echo "<script> alert('El cliente $nombre_p no se edito :( '); location.href='../index.php'; </script>";
        }
        mysqli_stmt_close($sentencia);
        mysqli_close($getconex);
    }

    ?>

    <form action="editar_p.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id_p">
        <label for="nombre_p">Nombre: </label><input type="text" name="nombre_p" id="nombre_p" value="<?php echo $nombre_p ?>">
        <label for="gmail">Gmail: </label><input type="text" name="gmail" id="gemail" value="<?php echo $gmail ?>">
        <label for="mensaje">Mensaje: </label>
        <label for="mensaje">Mensaje: </label><input style="height: 100px;"type="text" class="form-control bg-light border-0 px-4" name="mensaje" id="mensaje">
     
        <input type="submit" name="editar2" value="editar">
    </form>
</body>

</html>