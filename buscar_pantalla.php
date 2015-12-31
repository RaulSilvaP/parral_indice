<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Indice Tactil</title>
    <!-- carga Jquery -->
    <script src="js/jquery-1.11.1.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <!-- Personal css -->
    <link href="css2/estilos.css" rel="stylesheet">

 	<link rel="stylesheet" type="text/css" href="css2/keyboard.css" />

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

<?php 
	include("conexion/conexion.php");
    $sql1="SELECT * FROM REGISTRO "; //consulta sql
    $result1 = $conexion->query($sql1); //usamos la conexion para dar un resultado a la variable


?>

 
<br/>
<div class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend class="text-center">Sistema índices CBR Parral</legend>

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

<div id="form_buscar_pantalla">
<?php 
	include('buscar_registro.php');
 ?>
</div>
</fieldset>
</div>

	<div class="fTab">
		<span class="icon-android-keyboard"></span>&nbsp;&nbsp;TECLADO
	</div>
	<footer>
	<div id="teclado" class="container">
	<!--  Aquí va el contenido del teclado virtual -->

<br/>
<br/>
<br/>

<?php 
	include('teclado.html');

 ?>


	</div>
	</footer>
	<script>

jQuery(function($) {  





	//MUESTRA TECLADO
	function footer() {
	  var footerH = $('footer');
	  var fH = footerH.height();

	  $('.fTab').on('click', function() {
	      $(this).toggleClass('current');
	      $('footer').slideToggle(500);
	      cuenta=0;
	  });
	}
	footer();



/*
    $('#registro').change(function(){  // ACTIVA AUTOMÁTICAMENTE EL TECLADO VIRTUAL
	  var footerH = $('footer');
	  var fH = footerH.height();
      $('.fTab').toggleClass('current');
      $('footer').slideToggle(500);
    });
*/
var cuenta =0;
    $('#registro').change(function(){      // ACTIVA AUTOMÁTICAMENTE EL TECLADO VIRTUAL
    if ($('#registro').val()=="Seleccione el Registro" && cuenta==1) {  // ACTIVA AUTOMÁTICAMENTE EL TECLADO VIRTUAL
	  var footerH = $('footer');
	  var fH = footerH.height();
      $('.fTab').toggleClass('current');
      $('footer').slideToggle(500);  
      cuenta=0;	
  	}else{
  		if (cuenta==0) {
  	  var footerH = $('footer');
	  var fH = footerH.height();
      $('.fTab').toggleClass('current');
      $('footer').slideToggle(500);  
      cuenta=1;
  		}

  	}
    });

    //CARGA PLUGIN DEL TECLADO VIRTUAL
//	$('#teclado').keypad({
//		keypadOnly: false, 
//    	layout: $.keypad.qwertyLayout
//	});
//	$.keypad.insertValue(input, value)



});// fin jquery



</script>

</body>
</html>


