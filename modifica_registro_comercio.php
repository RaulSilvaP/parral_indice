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
  $mensaje=" Eliminar";

    $res = $conexion->query("select * from $registro WHERE 
                SOCIEDAD LIKE '%$nombre%' AND
                FOJAS LIKE '%$fojas%' AND
                NUM LIKE '%$numero%' AND
                ANO LIKE '%$ano%' 
                ORDER BY SOCIEDAD, ANO, NUM"); //TRAE LOS DATOS DE LA CONSULTA DE BUSQUEDA



?>
<legend class="text-center">Modifica Registro: <?php echo $registro; ?></legend>

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
   <td><?php echo $row['TIPO']; ?></td>
   <td><?php echo utf8_encode($row['SOCIEDAD']); ?></td>
   <td><?php echo $row['FOJAS'] ?></td>
   <td><?php echo $row['NUM']; ?></td>
   <td><?php echo $row['ANO']; ?></td>
   <td>
     <a title="Editar" id="editar" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
     <a title="<?php echo $mensaje; ?>" class="btn btn-danger btn-sm" <?php echo $desabilitar; ?> onclick="deletedata_comercio2('<?php echo $row['id']; ?>','<?php echo $mensaje; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span><?php echo $mensaje; ?></a>

     <!-- Modal -->
     <div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel<?php echo $row['id']; ?>">Editar datos</h4>
          </div>
          <div class="modal-body">

            <form>


              <!-- Text input-->
              <div class="form-inline ">
                <label class="control-label " for="textinput">Tipo&nbsp;&nbsp;</label>&nbsp;&nbsp;  
                <input name="tipo" type="text" id="tipo<?php echo $row['id']; ?>" value="<?php echo $row['TIPO']; ?>"placeholder="Tipo inscripción comercio" class="form-control input-md" style="width: 190px;">
                <label class="control-label" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;Repertorio&nbsp;&nbsp;</label>  
                <input name="repertorio" type="text" id="repertorio<?php echo $row['id']; ?>" value="<?php echo $row['REP']; ?>"placeholder="Nº de Repertorio" class="form-control input-md" >
              </div>

              <div class="form-group ">
                <label class="control-label input-md" for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre<?php echo $row['id']; ?>" value="<?php echo $row['SOCIEDAD']; ?>" >
              </div>

              <div class="form-group ">
                <label class="control-label input-md" for="fojas">Fojas</label>
                <input type="text" class="form-control" id="fojas<?php echo $row['id']; ?>" value="<?php echo $row['FOJAS']; ?>" >
              </div>

              <div class="form-group ">
                <label class="control-label input-md" for="numero">Número</label>
                <input type="text" class="form-control" id="numero<?php echo $row['id']; ?>" value="<?php echo $row['NUM']; ?>">
              </div>

              <div class="form-group ">
                <label class="control-label input-md" for="ano">Año</label>
                <input type="text" class="form-control" id="ano<?php echo $row['id']; ?>" value="<?php echo $row['ANO']; ?>">
                <!-- campo oculto para enviar el nombre del registro -->
                <input id="registro" name="registro" type="hidden" value="<?php echo $registro; ?>">
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" onclick="updatedata_comercio2('<?php echo $row['id']; ?>','<?php echo $mensaje; ?>')" class="btn btn-primary">Grabar</button>
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



