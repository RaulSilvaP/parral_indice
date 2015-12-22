<?php 
	include("conexion/conexion.php");
    $sql1="SELECT * FROM REGISTRO "; //consulta sql
    $result1 = $conexion->query($sql1); //usamos la conexion para dar un resultado a la variable


?>

 

<div class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend class="text-center">Modificación de índices</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="registro">Registro</label>
  <div class="col-md-4">
    <select id="registro_ingreso" name="registro_ingreso" class="form-control">
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
<div id="form_buscar"></div>
</fieldset>
</div>