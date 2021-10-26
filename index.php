<?php 

#Iniciar sesión

require_once('conex.php');

if(isset($_POST['btnLogin'])){

#$userLogin=$_POST[‘userLogin’];
#$passLogin=$_POST[‘passLogin’];
$userLogin = $_POST['userLogin'];
$passLogin = $_POST['passLogin'];
	
$buscarUser= "SELECT id_user, usuario, pass FROM usuarios
				WHERE usuario='{$userLogin}' AND pass= md5('{$passLogin}');";

$resultadoUser =$conexion->query($buscarUser);

$user = $resultadoUser->fetch_object();

  if ($resultadoUser -> num_rows > 0){
    $_SESSION['id'] = $user -> id_user;
    #echo "id".$_SESSION['id'];
    header('Location: verDatos.php');
    }else{
    echo "Error, revisa tus datos .<br>"; }

}

#Registro
if(isset($_POST['btnRegistrar'])){
	$userReg= $_POST['userReg'];
	$pass1=$_POST['pass1'];
	$pass2=$_POST['pass2'];
	
	if($pass1 == $pass2 ){
	$insert = "INSERT INTO usuarios VALUES(null, '{$userReg}',md5('{$pass1}'));";
	
if($conexion -> query($insert)){
		echo "Registro correcto";
} 
else {
		echo "Algo salio mal";
		echo $insert."<br />";
	}
      }
}

?>




<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Proyecto Final</title>
 </head>
 <body>
 <h1>Inicia sesión</h1>

 <form action="#" method ="POST">
 	
	USUARIO: <input type="text" name="userLogin"> <br />
	PASS: <input type="password" name="passLogin"> <br />
	<input type="submit" name="btnLogin" value="Iniciar sesión">

 </form>

<br />

 <h1>Registrate</h1>
 <form action="#" method ="POST">
	USUARIO: <input type="text" name="userReg"> <br />
	PASS: <input type="password" name="pass1"> <br />
	Confirmar Pass: <input type="password" name="pass2"> <br />
	<input type="submit" name="btnRegistrar" value="Registrar"> <br />
</form>
 </body>
 </html>
