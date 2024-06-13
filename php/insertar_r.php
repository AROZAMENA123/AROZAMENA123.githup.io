<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["reservar"])) {
    $nombre_r = $_POST["nombre_r"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];
    $nombre_m = $_POST["nombre_m"];
    $raza = $_POST["raza"];
    $tipo_servicio = $_POST["tipo_servicio"];

    $query = "INSERT INTO mascotas (nombre_r,direccion,celular,nombre_m,raza,tipo_servicio) VALUES (?,?,?,?,?,?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "ssssss", $nombre_r, $direccion, $celular, $nombre_m, $raza, $tipo_servicio);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('La reserva [$nombre_r] se envio correctamente'); location.href='../price.html'; </script>";
    } else {
        echo "<script> alert('La reserva [$nombre_r] no envio correctamente :( '); location.href='../price.html'; </script>";
    }
    mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
}
?>