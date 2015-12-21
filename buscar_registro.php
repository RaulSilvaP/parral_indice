<?php 
	include("conexion/conexion.php");
	$registro=$_POST['registro'];

	if ($registro=="COMERCIO") {
	?>

<form name="formulario" class="form-horizontal" method="post" action="buscar_registro_comercio.php">

<!-- campo oculto para enviar el nombre del registro -->
<input id="registro" name="registro" type="hidden" value="<?php echo $registro; ?>">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nombre</label>  
  <div class="col-md-6">
  <input id="nombre" name="nombre" type="text" placeholder="Nombre de la sociedad" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Fojas</label>  
  <div class="col-md-2">
  <input id="fojas" name="fojas" type="text" placeholder="Fojas" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Número</label>  
  <div class="col-md-2">
  <input id="numero" name="numero" type="text" placeholder="Número" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Año</label>  
  <div class="col-md-2">
  <input id="ano" name="ano" type="text" placeholder="Año" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Buscar"></label>
  <div class="col-md-4">
    <input type="submit" id="Buscar" value="Buscar" class="btn btn-primary" />
</div>

</form>




	<?php 
	} else {


	?>

<form name="formulario" class="form-horizontal" method="post" action="buscar_registro_general.php">

<!-- campo oculto para enviar el nombre del registro -->
<input id="registro" name="registro" type="hidden" value="<?php echo $registro; ?>">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Comprador</label>  
  <div class="col-md-6">
  <input id="nombre" name="nombre" type="text" placeholder="Nombre del comprador" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Rut</label>  
  <div class="col-md-2">
  <input id="rut" name="rut" type="text" placeholder="Rut" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Fojas</label>  
  <div class="col-md-2">
  <input id="fojas" name="fojas" type="text" placeholder="Fojas" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Número</label>  
  <div class="col-md-2">
  <input id="numero" name="numero" type="text" placeholder="Número" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Año</label>  
  <div class="col-md-2">
  <input id="ano" name="ano" type="text" placeholder="Año" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Dirección</label>  
  <div class="col-md-6">
  <input id="propiedad" name="propiedad" type="text" placeholder="Dirección" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-inline">
  <label class="control-label col-md-4" for="textinput">Rol&nbsp;&nbsp;</label>&nbsp;&nbsp;  
  <input id="rol" name="rol" type="text" placeholder="Rol avalúo" class="form-control input-md">
  <label class="control-label" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;Comuna&nbsp;&nbsp;</label>  
  <input id="comuna" name="comuna" type="text" placeholder="Comuna" class="form-control input-md">
</div>

<!-- Text input-->
<div class="form-group">
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Buscar"></label>
  <div class="col-md-4">
    <input type="submit" id="Buscar" value="Buscar" class="btn btn-primary" />
</div>

</form>




	<?php 







	}












?>