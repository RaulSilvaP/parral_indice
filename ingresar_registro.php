<div class="container">  

<?php 
	include("conexion/conexion.php");
	$registro=$_POST['registro'];

	if ($registro=="COMERCIO") {

  // FORMULARIO PARA INGRESO DE COMERCIO
	?>
    <script src="js/funciones.js"></script>   <!-- se recarga funciones.js porque no se reconocia las funciones jquery -->

<form name="formulario" class="form-horizontal">

<!-- campo oculto para enviar el nombre del registro -->
<input id="registro" name="registro" type="hidden" value="<?php echo $registro; ?>">

<!-- Text input-->
<div class="form-inline">
  <label class="control-label col-md-4" for="textinput">Tipo&nbsp;&nbsp;</label>&nbsp;&nbsp;  
  <input id="tipo" name="tipo" type="text" placeholder="Tipo inscripción comercio" class="form-control input-md" style="width: 190px;">
  <label class="control-label" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;Repertorio&nbsp;&nbsp;</label>  
  <input id="repertorio" name="repertorio" type="text" placeholder="Nº de Repertorio" class="form-control input-md">
</div>

<!-- Text input (grupo vacio solo para espaciar con el campo de más abajo)-->
<div class="form-group">
</div>

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
  <label class="col-md-4 control-label" for="Grabar"></label>
  <div class="col-md-4">
    <button type="button" id="grabar_comercio" name="grabar_comercio" class="btn btn-success" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Grabar</button><div id="respuesta"></div>
</div>




</form>




	<?php 
	} else {
    // FORMULARIO PARA INGRESO DE LOS OTROS REGISTROS

	?>
<script src="js/funciones.js"></script>   <!-- se recarga funciones.js porque no se reconocia las funciones jquery -->

<form name="formulario" class="form-horizontal">

<!-- campo oculto para enviar el nombre del registro -->
<input id="registro" name="registro" type="hidden" value="<?php echo $registro; ?>">

<!-- Text input-->
<div class="form-inline">
  <label class="control-label col-md-4" for="textinput">Tipo&nbsp;&nbsp;</label>&nbsp;&nbsp;  
  <input id="tipo" name="tipo" type="text" placeholder="Tipo inscripción" class="form-control input-md" style="width: 190px;">
  <label class="control-label" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;Repertorio&nbsp;&nbsp;</label>  
  <input id="repertorio" name="repertorio" type="text" placeholder="Nº de Repertorio" class="form-control input-md">
</div>

<!-- Text input (grupo vacio solo para espaciar con el campo de más abajo)-->
<div class="form-group">
</div>

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
  <span class="help-block btn-xs">Ejem. 01.234.567-8</span>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Vendedor/Acreedor</label>  
  <div class="col-md-6">
  <input id="vendedor" name="vendedor" type="text" placeholder="Nombre vendedor, acreedor o beneficiario" class="form-control input-md">
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
    <button type="button" id="grabar_registro" name="grabar_registro" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Grabar</button><div id="respuesta"></div>
</div>

</form>


<?php 
}
?>

    <div id="info"></div>
    <div id="viewdata"></div>

</div> <!-- /container -->
