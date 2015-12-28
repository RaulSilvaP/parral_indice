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
	$nombre=utf8_decode($_POST['nombre']);
	$fojas=$_POST['fojas'];
	$numero=$_POST['numero'];
	$ano=$_POST['ano'];


    $res = $conexion->query("select * from $registro WHERE 
                SOCIEDAD LIKE '%$nombre%' AND
                FOJAS LIKE '%$fojas%' AND
                NUM LIKE '%$numero%' AND
                ANO LIKE '%$ano%' 
                ORDER BY SOCIEDAD, ANO, NUM"); //TRAE LOS DATOS DE LA CONSULTA DE BUSQUEDA



?>
<legend class="text-center">Busqueda Registro: <?php echo $registro; ?></legend>

<div class="form-inline col-md-12">
    <div class="icon-addon addon-md">
    <input type="text" id="kwd_search" value="" class="form-control label-search" placeholder="Filtrar..." />
        <label for="filtrar" class="glyphicon glyphicon-search label-search" rel="tooltip" title="filtrar la tabla"></label>
        &nbsp;&nbsp;&nbsp;&nbsp;
<!--        <a href="index.php" class="btn btn-primary btn-info"> Regresar</a>   -->
        <button type="button" class="btn btn-primary" onclick="volver();">Volver</button>

  </div>
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
   <td><?php echo utf8_encode($row['TIPO']); ?></td>
   <td><?php echo utf8_encode($row['SOCIEDAD']); ?></td>
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



