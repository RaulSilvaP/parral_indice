	

<?php 
	include("conexion/conexion.php");
    $sql1="SELECT * FROM REGISTRO "; //consulta sql
    $result1 = $conexion->query($sql1); //usamos la conexion para dar un resultado a la variable


?>
 
 
<form class="form-horizontal" >
<fieldset>


<!-- Form Name -->
<legend class="text-center">Imprime índice por TOMO</legend>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="registro">Registro</label>
  <div class="col-md-4">
    <select id="registro" name="registro" class="form-control">
			<option value="Seleccione el Registro" selected>Seleccione el Registro...</option>

		<?php
		while ($row1 = $result1->fetch_array()) 
		{
		?>
			<option value="<?php echo $row1['nombre_corto']; ?>"><?php echo $row1['nombre_largo']; ?></option>
		<?php
		}
		?>
    </select>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Año</label>  
  <div class="col-md-4">
  <input id="ano" name="ano" placeholder="Año del Registro" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Desde N°</label>  
  <div class="col-md-4">
  <input id="desde" name="desde" placeholder="Desde N° de inscripción" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Hasta N°</label>  
  <div class="col-md-4">
  <input id="hasta" name="hasta" placeholder="Hasta N° de Inscripción" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Tomo N°</label>  
  <div class="col-md-4">
  <input id="tomo" name="tomo" placeholder="N° del tomo (vacío = Sin N° de Tomo)" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="imprime_tomo"></label>
  <div class="col-md-4">
<!--    <button type="button" value="Generar informe" class="btn btn-primary"> -->
    <button type="button" id="imprimir_tomo" class="btn btn-primary">Generar informe</button>
  </div>
</div>




</fieldset>
</form>




<div id="respuesta"></div>
</fieldset>
</div>

