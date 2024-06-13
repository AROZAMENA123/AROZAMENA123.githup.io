
<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconext = $getmysql->conex();


if (isset($_POST["eliminar"])) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];

    $query = "DELETE FROM empleados WHERE id=?";
    $sentencia = mysqli_prepare($getconext, $query);
    mysqli_stmt_bind_param($sentencia, "i", $id);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('El empleado [$nombre] se elimino correctamente'); location.href='../index.php'; </script>";
    } else {
        echo "<script> alert('El empleado [$nombre] no elimino correctamente :( '); location.href='../index.php'; </script>";
    }
}
?>