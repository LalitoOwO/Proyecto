<?php

$user = "root";
$pass = "";
$host = "localhost";
$bd = "proyectofinal";


$conexion = new mysqli($host, $user, $pass, $bd);

if($conexion -> connect_errno){
  echo "Error D. Conexion".$conexion->connect_error ."<br />";
}

?>
