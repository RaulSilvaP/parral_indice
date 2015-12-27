	

<?php 
	include("conexion/conexion.php");
    $sql1="SELECT * FROM REGISTRO "; //consulta sql
    $result1 = $conexion->query($sql1); //usamos la conexion para dar un resultado a la variable


?>
 
 
<form class="form-horizontal" >
<fieldset>


<!-- Form Name -->
<legend class="text-center">Imprime índice ANUAL</legend>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="registro">Registro</label>
  <div class="col-md-4">
    <select id="registro" name="registro" class="form-control">
			<option value="Seleccione el Registro" selected>Selecciones el Registro...</option>

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

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="imprime_anual"></label>
  <div class="col-md-4">
<!--    <button type="button" value="Generar informe" class="btn btn-primary"> -->
    <button type="button" id="imprimir_anual" class="btn btn-primary">Generar informe</button>
  </div>
</div>




</fieldset>
</form>




<div id="respuesta"></div>
</fieldset>
</div>

