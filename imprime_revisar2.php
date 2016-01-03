<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Indice para revisión</title>
    <!-- carga Jquery -->
    <script src="js/jquery-1.11.1.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.printPage.js"></script>
    <!-- Personal css -->
    <link href="css2/estilos.css" rel="stylesheet">

    <!-- Personal js -->
    <script src="js/funciones.js"></script>  
<div id="container-fluid col-md-12">
    <div id="form-inline">
      <span id="logo" class="col-md-3">
        <img id="logo1" src="images/logo_1.jpg" alt="Cbr Parral" > 
      </span>
    </div>  
</div>  <br/>  

</head>
<body>
<button type="button" class="btn btn-sm" name="imprimir" onclick="window.print();">Imprimir</button>

<?php 
	include('conexion/conexion.php');
	$registro=$_POST['registro'];
  $ano=$_POST['ano'];
  $desde=$_POST['desde'];
  $hasta=$_POST['hasta'];

if ($registro=="COMERCIO") {
    $res = $conexion->query("select * from $registro WHERE ANO = '$ano' AND (NUM >= '$desde' AND NUM <= '$hasta')
                ORDER BY NUM, SOCIEDAD"); //TRAE LOS DATOS DE LA CONSULTA DE BUSQUEDA
}else{
    $res = $conexion->query("select * from $registro WHERE ANO = '$ano' AND (NUM >= '$desde' AND NUM <= '$hasta')
                ORDER BY NUM, COMPRADOR"); //TRAE LOS DATOS DE LA CONSULTA DE BUSQUEDA
}
      //TRAE EL NOMBRE LARGO DEL REGISTRO
    $resp = $conexion->query("select * from REGISTRO WHERE nombre_corto='$registro' LIMIT 1");  
    $row1 = $resp->fetch_assoc();
    $nombre_largo=$row1['nombre_largo'];


?>
<legend class="text-center">Revisión Registro de <?php echo $nombre_largo." año ".$ano." desde N° :".$desde." Hasta N° :".$hasta ?></legend>
<table id="my-table" border="1" style="border-collapse:collapse; font-size:10px;" class="table table-bordered table-hover" NOWRAP>
	<thead>
   <tr>
     <th>Tipo</th>
<?php 
if ($registro=="COMERCIO") {
  echo "<th>Nombre</th>";
}else{
  echo "<th>Comprador</th>";
  echo "<th>Rut</th>";
  echo "<th>Vendedor</th>";
  echo "<th>Propiedad</th>";
  echo "<th>Rol</th>";
  echo "<th>Comuna</th>";
} ?>     
     <th>Fojas</th>
     <th>Número</th>
   </tr>
 </thead>
 <tbody>
<?php 
$total= $res->num_rows;
//if($total==1 ) {     //CONDICIONAL PARA DESABILITAR EL BOTÓN ELIMINAR CUANDO QUEDA UN SÓLO REGISTRO EN EL FOLIO
//  $desabilitar="disabled";
//}else{
  $desabilitar="";
//}
while ($row = $res->fetch_assoc()) {
  ?>
 
  <tr>
   <td><?php echo utf8_encode($row['TIPO']); ?></td>
   <?php 
  if ($registro=="COMERCIO") {
    echo "<td>".utf8_encode($row['SOCIEDAD'])."</td>";
    echo "<td>".$row['FOJAS']."</td>";
  }else{
    echo "<td>".utf8_encode($row['COMPRADOR'])."</td>";
    echo "<td>".$row['RUT']."</td>";
    echo "<td>".utf8_encode($row['VENDEDOR'])."</td>";
    echo "<td>".utf8_encode($row['PROPIEDAD'])."</td>";
    echo "<td>".$row['ROL']."</td>";
    echo "<td>".$row['COMUNA']."</td>";
    echo "<td>".$row['FJS']."</td>";
  } ?>     
   <td><?php echo $row['NUM']; ?></td>
  </tr>
<?php
}
?>
</tbody>
</table>

</body>
</html>


