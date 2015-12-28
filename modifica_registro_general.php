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
	$propiedad=utf8_decode($_POST['propiedad']);
	$rut=$_POST['rut'];
	$rol=$_POST['rol'];
  $comuna=$_POST['comuna'];
//  $repertorio=$_POST['repertorio'];
  $vendedor=utf8_decode($_POST['vendedor']);
  $mensaje=" Eliminar";

  	$resp = $conexion->query("select * from REGISTRO WHERE nombre_corto='$registro' LIMIT 1");  //TRAE EL NOMBRE LARGO DEL REGISTRO
  	$row1 = $resp->fetch_assoc();
	$nombre_largo=$row1['nombre_largo'];


  	$res = $conexion->query("select * from $registro WHERE 
  							COMPRADOR LIKE '%$nombre%' AND
                PROPIEDAD LIKE '%$propiedad%' AND
                VENDEDOR LIKE '%$vendedor%' AND
  							FJS LIKE '%$fojas%' AND
  							NUM LIKE '%$numero%' AND
  							ANO LIKE '%$ano%' AND
  							RUT LIKE '%$rut%' AND
  							ROL LIKE '%$rol%' AND
  							COMUNA LIKE '%$comuna%' 
  							ORDER BY COMPRADOR, ANO, NUM"); //TRAE LOS DATOS DE LA CONSULTA DE BUSQUEDA

/*
$query_Recordset1 = "SELECT * from $tipo WHERE 
                    propietario LIKE '%$varnombre%' 
                    AND ((ubicación LIKE '%$ubicacion%')  OR (ubicación IS NULL))
                    AND fojas LIKE '%$fojas' 
                    AND número LIKE '%$numero' 
                    AND año LIKE '%$ano' ORDER BY propietario, año "; 
*/




?>
<legend class="text-center">Modifica Registro: <?php echo $nombre_largo; ?></legend>

<div class="form-inline col-md-12">
    <div class="icon-addon addon-md">
		<input type="text" id="kwd_search" value="" class="form-control label-search" placeholder="Filtrar..." />
        <label for="filtrar" class="glyphicon glyphicon-search label-search" rel="tooltip" title="filtrar la tabla"></label>
        &nbsp;&nbsp;&nbsp;&nbsp;
<!--        <a href="index.php" class="btn btn-primary btn-info"> Regresar</a>   -->
        <button type="button" class="btn btn-primary" onclick="volver();">Volver</button>

	</div>
</div>	
<div id="info"></div>
<div id="viewdata"></div>

<table id="my-table" border="1" style="border-collapse:collapse" class="table table-bordered table-hover ">
	<thead>
   <tr>
     <th>Tipo</th>
     <th>Nombre</th>
     <th>Fojas</th>
     <th>Número</th>
     <th>Año</th>
     <th>Dirección/Detalle</th>
     <th>Acción</th>
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
   <td><?php echo utf8_encode($row['COMPRADOR']); ?></td>
   <td><?php echo $row['FJS'] ?></td>
   <td><?php echo $row['NUM']; ?></td>
   <td><?php echo $row['ANO']; ?></td>
   <td><?php echo utf8_encode($row['PROPIEDAD']); ?></td>
   <td>
   	

     <a title="Editar" id="editar" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
     <a title="<?php echo $mensaje; ?>" class="btn btn-danger btn-sm" <?php echo $desabilitar; ?> onclick="deletedata_general2('<?php echo $row['id']; ?>','<?php echo $mensaje; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span><?php echo $mensaje; ?></a>
     <!-- Modal -->
     <div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel<?php echo $row['id']; ?>">Datos:</h4>
          </div>
          <div class="modal-body">

            <form>
              <div class="form-inline">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo<?php echo $row['id']; ?>" value="<?php echo utf8_encode($row['TIPO']); ?>">
                <label for="rep">&nbsp;&nbsp;&nbsp;&nbsp;Repertorio</label>
                <input type="text" class="form-control" id="repertorio<?php echo $row['id']; ?>" value="<?php echo $row['REP']; ?>">
              </div>
              <div class="form-group">
              </div>

              <div class="form-group">
                <label for="nombre">Comprador</label>
                <input type="text" class="form-control" id="nombre<?php echo $row['id']; ?>" value="<?php echo utf8_encode($row['COMPRADOR']); ?>">
              </div>

              <div class="form-group">
                <label for="rut">Rut</label>
                <input type="text" class="form-control" id="rut<?php echo $row['id']; ?>" value="<?php echo $row['RUT']; ?>">
                <span class="help-block btn-xs">Ejem. 01.234.567-8</span>
              </div>

              <div class="form-group">
                <label for="vendedor">Vendedor/Acreedor</label>
                <input type="text" class="form-control" id="vendedor<?php echo $row['id']; ?>" value="<?php echo utf8_encode($row['VENDEDOR']); ?>">
              </div>

              <div class="form-group">
                <label for="propiedad">Propiedad</label>
                <input type="text" class="form-control" id="propiedad<?php echo $row['id']; ?>" value="<?php echo utf8_encode($row['PROPIEDAD']); ?>">
              </div>


              <div class="form-inline">
                <label for="fojas">Fojas</label>
                <input type="text" class="form-control" id="fojas<?php echo $row['id']; ?>" value="<?php echo $row['FJS']; ?>" style="width:75px;">
                <label for="numero">&nbsp;&nbsp;&nbsp;&nbsp;Número</label>
                <input type="text" class="form-control" id="numero<?php echo $row['id']; ?>" value="<?php echo $row['NUM']; ?>" style="width:75px;">
                <label for="ano">&nbsp;&nbsp;&nbsp;&nbsp;Año</label>
                <input type="text" class="form-control" id="ano<?php echo $row['id']; ?>" value="<?php echo $row['ANO']; ?>" style="width:75px;">
               </div>

              <div class="form-group">
              </div>


               <div class="form-inline">
                <label for="rol">Rol</label>
                <input type="text" class="form-control" id="rol<?php echo $row['id']; ?>" value="<?php echo $row['ROL']; ?>">
                <label for="comuna">&nbsp;&nbsp;&nbsp;&nbsp;Comuna</label>
                <input type="text" class="form-control" id="comuna<?php echo $row['id']; ?>" value="<?php echo $row['COMUNA']; ?>">
                <input id="registro" name="registro" type="hidden" value="<?php echo $registro; ?>">
              </div>




            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="updatedata_general2('<?php echo $row['id']; ?>','<?php echo $mensaje; ?>')" class="btn btn-primary">Grabar</button>
          </div>
        </div>
      </div>
    </div>





   </td>
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



