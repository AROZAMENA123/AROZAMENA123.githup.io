
<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["enviar"])) {
    $nombre_p = $_POST["nombre_p"];
    $gmail = $_POST["gmail"];
    $mensaje = $_POST["mensaje"];

    $query = "INSERT INTO comentarios (nombre_p,gmail,mensaje) VALUES (?,?,?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "sss", $nombre_p, $gmail, $mensaje);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('El cliente [$nombre_p] se agrego correctamente'); location.href='../contact.html'; </script>";
    } else {
        echo "<script> alert('El cliente [$nombre_p] no agrego correctamente :( '); location.href='../contact.html'; </script>";
    }
    mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
}
?>
