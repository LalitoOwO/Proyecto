<?php 

#Conexion a BD
require_once('conex.php');

#Eliminar
if(isset($_GET['idEliminar'])){
$borrarFila= "DELETE FROM datos WHERE id = ".$_GET['idEliminar'];
	
	if($conexion->query($borrarFila)){
		echo "Eliminado correctamente :) <br />";
	}
	else {
		echo "Error al eliminar";
		echo $borrarFila."<br />";
	}
}

#Buscar valores de BD

$verDatos= "SELECT id, stats, fecha, hora   
	FROM datos
	ORDER BY  id;";

$resultadoDatos=$conexion->query($verDatos);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Datos recopilados</title>
 </head>
 <body>
 	<h1>Datos</h1>
 
<table>
	
	<tr>
		<td>ID</td>
		<td>DATOS</td>
		<td>FECHA</td>
		<td>HORA</td>
		
	</tr>
	<?php while($r=$resultadoDatos->fetch_object()){ ?>

	<tr>
		<td><?php echo $r->id; ?></td>
		<td><?php echo $r->stats; ?></td>
		<td><?php echo $r->fecha; ?></td>
		<td><?php echo $r->hora; ?></td>
		
		<td><a href="verDatos.php?idEliminar= <?php echo $r->id; ?>">Eliminar</a></td>
	</tr>
  
</table>
<br />
   <br />
<a href="verDatos.php?salir=1">Cerrar sesión</a>

 </body>
 </html>
 
