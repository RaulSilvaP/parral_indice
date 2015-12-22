<?php
$registro = $_POST['registro'];
$id = $_POST['id'];


include "conexion/conexion.php";
if(isset($_POST['id'])){
$stmt = $conexion->prepare("delete from $registro where id=?");
$stmt->bind_param('s', $id);


if($stmt->execute()){
?>
<br/><br/>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> El registro se ha eliminado.
</div>
<?php
} else{
?>
<br/><br/>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Algo salió mal.
</div>
<?php
}
} else{
?> 
<br/><br/>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> No se pudo borrar los datos.
</div>
<?php
}
?>