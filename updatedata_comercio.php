<?php 
include ("conexion/conexion.php");

$registro = $_POST['registro'];
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$repertorio = $_POST['repertorio'];
$fojas = $_POST['fojas'];
//if($_POST['vuelta']=="v") {
//	$vuelta="v";
//}else{ 
//	$vuelta = ' ';
//}
$numero = $_POST['numero'];
$ano = $_POST['ano'];
$rol = $_POST['rol'];
$comuna = $_POST['comuna'];

$id = $_POST['id'];


/*
     //MUESTRA DATOS PARA DEPURAR LA RECEPCION DE DATOS DESDE AJAX
echo $id."<br/>";
echo $tipo."<br/>";
echo $nombre."<br/>";
echo $fojas."<br/>";
echo $repertorio."<br/>";
echo $numero."<br/>";
echo $ano."<br/>";
echo $rol."<br/>";
echo $comuna."<br/>";
exit;
*/


if(isset($_POST['id'])){
$stmt = $conexion->prepare("update $registro set TIPO=?, SOCIEDAD=?, REP=?, FOJAS=?, NUM=?, ANO=?, ROL=?, COMUNA=? where id=?");
$stmt->bind_param('sssssssss', $tipo, $nombre, $repertorio, $fojas, $numero, $ano, $rol, $comuna, $id);


  

 

if($stmt->execute()){


	?>
	<br/><br/>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Exito!</strong> Se han modificado los datos.
	</div>
	<?php
} else{
	?>
	<br/><br/>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Error!</strong> No se ha podido modificar la información.
	</div>
	<?php
}
}
?>