<?php 
include ("conexion/conexion.php");
$inicial="rsp";

$registro = $_POST['registro'];
$tipo = $_POST['tipo'];
$repertorio = $_POST['repertorio'];
$nombre = $_POST['nombre'];
$rut = $_POST['rut'];
$vendedor = $_POST['vendedor'];
$propiedad = $_POST['propiedad'];
$fojas = $_POST['fojas'];
//$vuelta = $_POST['vuelta'];
//if ($vuelta!="v") {$vuelta=" ";}
$numero = $_POST['numero'];
$ano = $_POST['ano'];
$rol=$_POST['rol'];
$comuna=$_POST['comuna'];

$id = $_POST['id'];



/*     //MUESTRA DATOS PARA DEPURAR LA RECEPCION DE DATOS DESDE AJAX
echo "id= ".$id."<br/>";
echo "tipo= ".$tipo."<br/>";
echo "nombre= ".$nombre."<br/>";
echo "fojas= ".$fojas."<br/>";
echo "repertorio= ".$repertorio."<br/>";
echo "numero= ".$numero."<br/>";
echo "ano= ".$ano."<br/>";
echo "rol= ".$rol."<br/>";
echo "comuna= ".$comuna."<br/>";
exit;
*/


if(isset($_POST['id'])){
$stmt = $conexion->prepare("update $registro set TIPO=?, COMPRADOR=?, RUT=?, VENDEDOR=?, PROPIEDAD=?, REP=?, FJS=?, NUM=?, ANO=?, ROL=?, COMUNA=?, INICIAL=? where id=?");
$stmt->bind_param('sssssssssssss', $tipo, $nombre, $rut, $vendedor, $propiedad, $repertorio, $fojas, $numero, $ano, $rol, $comuna, $inicial, $id);


  

 

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