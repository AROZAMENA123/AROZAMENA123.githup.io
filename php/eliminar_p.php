
<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconext = $getmysql->conex();


if (isset($_POST["eliminar"])) {
    $id = $_POST["id_p"];
    $nombre_p = $_POST["nombre_p"];

    $query = "DELETE FROM comentarios WHERE id_p=?";
    $sentencia = mysqli_prepare($getconext, $query);
    mysqli_stmt_bind_param($sentencia, "i", $id);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('El cliente [$nombre_p] se elimino correctamente'); location.href='../index.php'; </script>";
    } else {
        echo "<script> alert('El cliente [$nombre_p] no elimino correctamente :( '); location.href='../index.php'; </script>";
    }
}
?>