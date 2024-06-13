
<?php

class mysqlconex
{
    public function conex()
    {
        $servidor = "localhost";
        $user ="root";
        $password = "";
        $bd ="empresa";
        $enlace = mysqli_connect($servidor, $user, $password,$bd);
        return $enlace;
    }
}
?>