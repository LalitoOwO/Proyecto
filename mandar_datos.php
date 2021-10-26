<?php 

#Conexion a BD
require_once('conex.php');

if(isset($_POST['status'])){

$status= $_POST['status'];

$sql = "INSERT INTO datos VALUES (
null, '{$status}', curdate(), curtime());";

    if($conexion -> query($sql)){
            echo "Ok";
        } else {
            echo "Okn't";
            echo $sql;
        }
}


 ?>

