<!DOCTYPE html>

<html lang="es">

<head>

<?php 
	include("header.html");
?>
</head>

<body>

<?php 
	include('conexion/conexion.php');
	$registro=$_POST['registro'];
	$nombre=$_POST['nombre'];
	$fojas=$_POST['fojas'];
	$numero=$_POST['numero'];
	$ano=$_POST['ano'];

  	$res = $conexion->query("select * from $registro WHERE SOCIEDAD LIKE '%$nombre%' ORDER BY SOCIEDAD");




?>
<legend class="text-center">Busqueda Registro: <?php echo $registro; ?></legend>
<div class="form-inline">
	<label for="kwd_search">Filtrar:</label>
	<input type="text" id="kwd_search" value=""/>
	<a id="volver" class="btn btn-default" href="javascript:volver()">Regresar</a> 
</div>
<table id="my-table" border="1" style="border-collapse:collapse" class="table table-bordered table-hover ">
	<thead>
   <tr>
     <th>Tipo</th>
     <th>Nombre</th>
     <th>Fojas</th>
     <th>Número</th>
     <th>Año</th>
   </tr>
 </thead>
 <tbody>
<?php 
while ($row = $res->fetch_assoc()) {
  ?>
 
  <tr>
   <td><?php echo $row['TIPO']; ?></td>
   <td><?php echo $row['SOCIEDAD']; ?></td>
   <td><?php echo $row['FOJAS'] ?></td>
   <td><?php echo $row['NUM']; ?></td>
   <td><?php echo $row['ANO']; ?></td>
</tr>
<?php
}
?>
</tbody>
</table>




</body>

<div class="container col-md-12 text-center">
<?php 

	
	include("footer.html");

 ?>
</div>
</html>



