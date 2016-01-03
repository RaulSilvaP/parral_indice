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
  <script src="js/jquery.keyboard.js"></script>
  <!-- Personal css -->
  <link href="css2/estilos.css" rel="stylesheet">
  <link href="css2/keyboard-dark.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css2/keyboard.css" />

  <!-- Personal js 
  <script src="js/funciones.js"></script>  -->
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
  $registro="Seleccione el Registro";
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
            <select id="registro1" name="registro1" class="form-control">
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
      <!-- campo oculto para enviar el nombre del registro -->
      <input type="text" id="registro2">
      <div id="form_buscar_pantalla"> 
        <div id="comercio">
          <form name="formulario" class="form-horizontal" method="post" action="buscar_registro_comercio.php">

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Nombre</label>  
              <div class="col-md-6">
                <input id="nombre" name="nombre" type="text" placeholder="Nombre de la sociedad" class="form-control input-md teclado" >

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Fojas</label>  
              <div class="col-md-2">
                <input id="fojas" name="fojas" type="text" placeholder="Fojas" class="form-control input-md teclado">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Número</label>  
              <div class="col-md-2">
                <input id="numero" name="numero" type="text" placeholder="Número" class="form-control input-md teclado">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textinput">Año</label>  
              <div class="col-md-2">
                <input id="ano" name="ano" type="text" placeholder="Año" class="form-control input-md teclado">

              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Buscar"></label>
              <div class="col-md-4">
                <input type="submit" id="Buscar" value="Buscar" class="btn btn-primary" />
              </div>
            </div>
          </form>
        </div>

          <div id="otroregistro">
            <form name="formulario" class="form-horizontal" method="post" action="buscar_registro_general.php">

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Comprador</label>  
                <div class="col-md-6">
                  <input id="nombre" name="nombre" type="text" placeholder="Nombre del comprador" class="form-control input-md teclado">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Rut</label>  
                <div class="col-md-2">
                  <input id="rut" name="rut" type="text" placeholder="Rut" class="form-control input-md teclado">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Fojas</label>  
                <div class="col-md-2">
                  <input id="fojas" name="fojas" type="text" placeholder="Fojas" class="form-control input-md teclado">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Número</label>  
                <div class="col-md-2">
                  <input id="numero" name="numero" type="text" placeholder="Número" class="form-control input-md teclado">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Año</label>  
                <div class="col-md-2">
                  <input id="ano" name="ano" type="text" placeholder="Año" class="form-control input-md teclado">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Dirección</label>  
                <div class="col-md-6">
                  <input id="propiedad" name="propiedad" type="text" placeholder="Dirección" class="form-control input-md teclado">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-inline">
                <label class="control-label col-md-4" for="textinput">Rol&nbsp;&nbsp;</label>&nbsp;&nbsp;  
                <input id="rol" name="rol" type="text" placeholder="Rol avalúo" class="form-control input-md teclado">
                <label class="control-label" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;Comuna&nbsp;&nbsp;</label>  
                <input id="comuna" name="comuna" type="text" placeholder="Comuna" class="form-control input-md teclado">
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
              </div>

            </form>
          </div>

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
//	include('teclado.html');

         ?>
         <ul id="keyboard">
          <li class="symbol"><span class="off">`</span><span class="on">~</span></li>
          <li class="symbol"><span class="off">1</span><span class="on">!</span></li>
          <li class="symbol"><span class="off">2</span><span class="on">@</span></li>
          <li class="symbol"><span class="off">3</span><span class="on">#</span></li>
          <li class="symbol"><span class="off">4</span><span class="on">$</span></li>
          <li class="symbol"><span class="off">5</span><span class="on">%</span></li>
          <li class="symbol"><span class="off">6</span><span class="on">^</span></li>
          <li class="symbol"><span class="off">7</span><span class="on">&amp;</span></li>
          <li class="symbol"><span class="off">8</span><span class="on">*</span></li>
          <li class="symbol"><span class="off">9</span><span class="on">(</span></li>
          <li class="symbol"><span class="off">0</span><span class="on">)</span></li>
          <li class="symbol"><span class="off">-</span><span class="on">_</span></li>
          <li class="symbol"><span class="off">=</span><span class="on">+</span></li>
          <li class="delete lastitem">delete</li>
          <li class="tab">tab</li>
          <li class="letter">q</li>
          <li class="letter">w</li>
          <li class="letter">e</li>
          <li class="letter">r</li>
          <li class="letter">t</li>
          <li class="letter">y</li>
          <li class="letter">u</li>
          <li class="letter">i</li>
          <li class="letter">o</li>
          <li class="letter">p</li>
          <li class="symbol"><span class="off">[</span><span class="on">{</span></li>
          <li class="symbol"><span class="off">]</span><span class="on">}</span></li>
          <li class="symbol lastitem"><span class="off">\</span><span class="on">|</span></li>
          <li class="capslock">caps lock</li>
          <li class="letter">a</li>
          <li class="letter">s</li>
          <li class="letter">d</li>
          <li class="letter">f</li>
          <li class="letter">g</li>
          <li class="letter">h</li>
          <li class="letter">j</li>
          <li class="letter">k</li>
          <li class="letter">l</li>
          <li class="letter">ñ</li>
          <li class="symbol"><span class="off">;</span><span class="on">:</span></li>
          <li class="return lastitem">return</li>
          <li class="left-shift">shift</li>
          <li class="letter">z</li>
          <li class="letter">x</li>
          <li class="letter">c</li>
          <li class="letter">v</li>
          <li class="letter">b</li>
          <li class="letter">n</li>
          <li class="letter">m</li>
          <li class="symbol"><span class="off">,</span><span class="on">&lt;</span></li>
          <li class="symbol"><span class="off">.</span><span class="on">&gt;</span></li>
          <li class="symbol"><span class="off">/</span><span class="on">?</span></li>
          <li class="right-shift lastitem">shift</li>
          <li class="space lastitem">&nbsp;</li>
        </ul>
      </div>


    </div>
  </footer>
  <script>

jQuery(function($) {  

    $('#form_buscar_pantalla').hide();

  //MUESTRA FORMULARIO BUSQUEDA
    $('#registro1').change(function(){  // Valida que un folio no esté repetido
        var registro = $('#registro1').val();        
        if (registro=="Seleccione el Registro") {
            $('#form_buscar_pantalla').hide();
        }else{
          if (registro=="COMERCIO") {
            $('#otroregistro').hide();
            $('#comercio').show();
            $('#form_buscar_pantalla').show();
            seleccion_campo();
          }else{
            $('#comercio').hide();
            $('#otroregistro').show();
            $('#form_buscar_pantalla').show();
            seleccion_campo();
          }
//                    $('#nombre').focus();
        }
    });




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
    $('#registro1').change(function(){      // ACTIVA AUTOMÁTICAMENTE EL TECLADO VIRTUAL
    if ($('#registro1').val()=="Seleccione el Registro" && cuenta==1) {  // ACTIVA AUTOMÁTICAMENTE EL TECLADO VIRTUAL
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






/*

function seleccion_campo() { } //fin funcion otro registro
  
  var character="";
      var x="";
    $('.teclado').focusIn(function() {
          x =  $(document.activeElement);
     console.log("campo : "+x);


      var $nombre = $(x),
        shift = false,
        capslock = false;
  $('#keyboard li').click(function(){
    var $this = $(this),
      character = $this.html(); // If it's a lowercase letter, nothing happens to this variable
    // Shift keys
    if ($this.hasClass('left-shift') || $this.hasClass('right-shift')) {
      $('.letter').toggleClass('uppercase');
      $('.symbol span').toggle();
      
      shift = (shift === true) ? false : true;
      capslock = false;
      return false;
    }
    
    // Caps lock
    if ($this.hasClass('capslock')) {
      $('.letter').toggleClass('uppercase');
      capslock = true;
      return false;
    }
    
    // Delete
    if ($this.hasClass('delete')) {
      var html = $(x).val();
      
      $(x).val(html.substr(0, html.length - 1));
      return false;
    }
    
    // Special characters
    if ($this.hasClass('symbol')) character = $('span:visible', $this).html();
    if ($this.hasClass('space')) character = ' ';
    if ($this.hasClass('tab')) character = "\t";
    if ($this.hasClass('return')) character = "\n";
    
    // Uppercase letter
    if ($this.hasClass('uppercase')) character = character.toUpperCase();
    
    // Remove shift once a key is clicked.
    if (shift === true) {
      $('.symbol span').toggle();
      if (capslock === false) $('.letter').toggleClass('uppercase');
      
      shift = false;
    }
    
    // Add the character
    $(x).val($(x).val() + character);
    console.log(character);
    return false;

});

});



*/



$('.teclado').keyboard({
    usePreview: false,
    position: {
        of: '#keyboard-wrapper',
        my: 'center top',
        at: 'center bottom',
        offset: '0 40'
    }
});





});// fin jquery



</script>

</body>
</html>


