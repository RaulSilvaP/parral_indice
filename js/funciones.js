jQuery(function($) {  


    //FUNCION PARA IMPRIMIR LA PAGINA ANUAL
    $('#imprimir_anual').click(function(){
      var registro = $('#registro').val();
      var ano = $('#ano').val();
      $("#imprimir_anual").printPage({
        type: "GET",
        url: "imprime_anual2.php?registro="+registro+"&ano="+ano,
        message: "Su documento está siendo generado..."
      });
    });


	//MUESTRA FORMULARIO INGRESO
    $('#registro_ingreso').change(function(){  // Valida que un folio no esté repetido
        var registro = $('#registro_ingreso').val();        
        var dataString = 'registro='+registro;
        if (registro=="Seleccione el Registro") {
            $('#form_buscar').html('');
        }else{
	        $.ajax({
	            type: "POST",
	            url: "ingresar_registro.php",
	            data: dataString,
	            success: function(data) {
	                  $('#form_buscar').html(data);
	                  $('#tipo').focus();


	            }
	        });
	    }
    });

  //MUESTRA FORMULARIO MODIFICAR
    $('#registro_modifica').change(function(){  // Valida que un folio no esté repetido
        var registro = $('#registro_modifica').val();        
        var dataString = 'registro='+registro;
        if (registro=="Seleccione el Registro") {
            $('#form_buscar').html('');
        }else{
          $.ajax({
              type: "POST",
              url: "modifica_registro.php",
              data: dataString,
              success: function(data) {
                    $('#form_buscar').html(data);
                    $('#nombre').focus();
              }
          });
      }
    });
  
  //MUESTRA FORMULARIO BUSQUEDA
    $('#registro').change(function(){  // Valida que un folio no esté repetido
        var registro = $('#registro').val();        
        var dataString = 'registro='+registro;
        if (registro=="Seleccione el Registro") {
            $('#form_buscar').html('');
        }else{
          $.ajax({
              type: "POST",
              url: "buscar_registro.php",
              data: dataString,
              success: function(data) {
                    $('#form_buscar').html(data);
                    $('#nombre').focus();
              }
          });
      }
    });
  


	//funcion tabla BUSCAR
	// When document is ready: this gets fired before body onload <img src="http://blogs.digitss.com/wp-includes/images/smilies/simple-smile.png" alt=":)" class="wp-smiley" style="height: 1em; max-height: 1em;" />

	// Write on keyup event of keyword input element
	$("#kwd_search").keyup(function(){
		// When value of the input is not blank
		if( $(this).val() != "")
		{
			// Show only matching TR, hide rest of them
			$("#my-table tbody>tr").hide();
			$("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
		}
		else
		{
			// When there is no input or clean again, show everything back
			$("#my-table tbody>tr").show();
		}
	});



// GENERAR LISTADO ANUAL
    $('#imprime_anual1').click(function(){
      alert("hola");
      return
       var registro = $('#registro').val();
       var ano = $('#ano').val();
//       var bien_familiar = $('input:radio[name=bien_familiar]:checked').val();
       if(ano=="") {   //valida que estos campos no esten vacios
          data='<div id="Error" class="text-danger"><span class="glyphicon glyphicon-remove"></span> Error, algunos datos estan vacios</div>'
          $('#respuesta').html(data).fadeIn(1000);
          $('#respuesta').html(data).delay(4000).fadeOut(2000);
          return
       }
       var datas="registro="+registro+"&ano="+ano;
       $.ajax({
        type: "POST",
        url: "imprime_anual2.php",
        data: datas
      }).done(function( data ) {
        $('#respuesta').html(data).fadeIn(1000);
        $('#respuesta').html(data).delay(4000).fadeOut(2000);
        $('#ano').focus();
      });
    });





});// fin jquery


// jQuery expression for case-insensitive filter (filtrado de datos en la tabla desplegada de la busueda)
$.extend($.expr[":"], 
{
    "contains-ci": function(elem, i, match, array) 
	{
		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
});


function volver() {
  //location.href = "index.php";
  window.history.back();
}	



// GRABA NUEVO REGISTRO DE COMERCIO
    $('#grabar_comercio').click(function(){
       var registro = $('#registro').val();
       var tipo = $('#tipo').val();
       var nombre = $('#nombre').val();
       var repertorio = $('#repertorio').val();
       var fojas = $('#fojas').val();
//       var vuelta = $('input:checkbox[name=vuelta]:checked').val();
       var numero = $('#numero').val();
       var ano = $('#ano').val();
       var rol = "";
       var comuna = "";
//       var bien_familiar = $('input:radio[name=bien_familiar]:checked').val();
       if(tipo=="" || nombre=="" || fojas=="" || numero=="" || ano=="" || repertorio=="") {   //valida que estos campos no esten vacios
          data='<div id="Error" class="text-danger"><span class="glyphicon glyphicon-remove"></span> Error, algunos datos estan vacios</div>'
          $('#respuesta').html(data).fadeIn(1000);
          $('#respuesta').html(data).delay(4000).fadeOut(2000);
          return
       }
       var datas="registro="+registro+"&tipo="+tipo+"&nombre="+nombre+"&fojas="+fojas+"&numero="+numero+"&ano="+ano+"&repertorio="+repertorio+"&rol="+rol+"&comuna="+comuna;
       $.ajax({
        type: "POST",
        url: "newdata_comercio.php",
        data: datas
      }).done(function( data ) {
        $('#respuesta').html(data).fadeIn(1000);
        $('#respuesta').html(data).delay(4000).fadeOut(2000);
        $('#tipo').val(""); // vacia el contenido del campo
        $('#repertorio').val(""); // vacia el contenido del campo
        $('#nombre').val(""); // vacia el contenido del campo
        $('#fojas').val(""); // vacia el contenido del campo
        $('#numero').val(""); // vacia el contenido del campo
//        $('#rol').val(""); // vacia el contenido del campo
//        $('#comuna').val(""); // vacia el contenido del campo
        $('#tipo').focus();
        viewdata_comercio("Eliminar");
      });
    });


// GRABA NUEVO REGISTRO GENERAL
    $('#grabar_registro').click(function(){
       var registro = $('#registro').val();
       var tipo = $('#tipo').val();
       var nombre = $('#nombre').val();
       var rut = $('#rut').val();
       var vendedor = $('#vendedor').val();
       var propiedad = $('#propiedad').val();
       var repertorio = $('#repertorio').val();
       var fojas = $('#fojas').val();
//       var vuelta = $('input:checkbox[name=vuelta]:checked').val();
       var numero = $('#numero').val();
       var ano = $('#ano').val();
       var rol = $('#rol').val();;
       var comuna = $('#comuna').val();;
//       var bien_familiar = $('input:radio[name=bien_familiar]:checked').val();
       if(tipo=="" || nombre=="" || fojas=="" || numero=="" || ano=="" || repertorio=="") {   //valida que estos campos no esten vacios
          data='<div id="Error" class="text-danger"><span class="glyphicon glyphicon-remove"></span> Error, algunos datos estan vacios</div>'
          $('#respuesta').html(data).fadeIn(1000);
          $('#respuesta').html(data).delay(4000).fadeOut(2000);
          return
       }
       var datas="registro="+registro+"&tipo="+tipo+"&nombre="+nombre+"&rut="+rut+"&vendedor="+vendedor+"&propiedad="+propiedad+"&fojas="+fojas+"&numero="+numero+"&ano="+ano+"&repertorio="+repertorio+"&rol="+rol+"&comuna="+comuna;
       $.ajax({
        type: "POST",
        url: "newdata_general.php",
        data: datas
      }).done(function( data ) {
        $('#respuesta').html(data).fadeIn(1000);
        $('#respuesta').html(data).delay(4000).fadeOut(2000);
        $('#tipo').val(""); // vacia el contenido del campo
        $('#repertorio').val(""); // vacia el contenido del campo
        $('#nombre').val(""); // vacia el contenido del campo
        $('#rut').val(""); // vacia el contenido del campo
        $('#vendedor').val(""); // vacia el contenido del campo
        $('#propiedad').val(""); // vacia el contenido del campo
        $('#fojas').val(""); // vacia el contenido del campo
        $('#numero').val(""); // vacia el contenido del campo
        $('#rol').val(""); // vacia el contenido del campo
        $('#comuna').val(""); // vacia el contenido del campo
        $('#tipo').focus();
        viewdata_general("Eliminar");
      });
    });



//  FUNCIONES DE CRUD DEL REGISTRO DE COMERCIO
      function viewdata_comercio(mensaje){
        var registro = $('#registro').val();
       $.ajax({ 
       type: "POST",
       url: "getdata_comercio.php?mensaje="+mensaje,
       data: "registro="+registro
        }).done(function( data ) {
      $('#viewdata').html('');
      $('#viewdata').html(data);
        });
      }

      function viewdata_comercio2(mensaje,id,registro){
       $.ajax({ 
       type: "POST",
       url: "modifica_registro_comercio2.php?mensaje="+mensaje,
       data: "registro="+registro+"&id="+id
        }).done(function( data ) {
//      $('#my-table').remove();
      $('#my-table').html(data);
//      $('#viewdata').html('');
//      $('#viewdata').html(data);
        });
      }


      function updatedata_comercio(str,mensaje){
        var id = str;
        var registro = $('#registro').val();
        var tipo = $('#tipo'+id).val();
        var repertorio = $('#repertorio'+id).val();
        var nombre = $('#nombre'+id).val();
        var fojas = $('#fojas'+id).val();
//        var vuelta = $('#vuelta'+id+':checked').val();

        var numero = $('#numero'+id).val();
        var ano = $('#ano'+id).val();
        var rol = $('#rol'+id).val();
        var comuna = $('#comuna'+id).val();
        var datas="id="+id+"&registro="+registro+"&tipo="+tipo+"&nombre="+nombre+"&fojas="+fojas+"&numero="+numero+"&ano="+ano+"&repertorio="+repertorio+"&rol="+rol+"&comuna="+comuna;
        $.ajax({
           type: "POST",
           url: "updatedata_comercio.php",
           data: datas
        }).done(function( data ) {
          $('#info').html(data).fadeIn(1000);
          $('#info').html(data).delay(3000).fadeOut(1000);
          $('body').css('overflow', 'visible');  // HABILITAR EL SCROLL DE LA PÁGINA (BODY) el modal lo desabilitaba
            viewdata_comercio(mensaje);
        });
      }


      function updatedata_comercio2(str,mensaje){
        var id = str;
        var registro = $('#registro').val();
        var tipo = $('#tipo'+id).val();
        var repertorio = $('#repertorio'+id).val();
        var nombre = $('#nombre'+id).val();
        var fojas = $('#fojas'+id).val();
//        var vuelta = $('#vuelta'+id+':checked').val();

        var numero = $('#numero'+id).val();
        var ano = $('#ano'+id).val();
        var rol = $('#rol'+id).val();
        var comuna = $('#comuna'+id).val();
        var datas="id="+id+"&registro="+registro+"&tipo="+tipo+"&nombre="+nombre+"&fojas="+fojas+"&numero="+numero+"&ano="+ano+"&repertorio="+repertorio+"&rol="+rol+"&comuna="+comuna;
        $.ajax({
           type: "POST",
           url: "updatedata_comercio.php",
           data: datas
        }).done(function( data ) {
          $('#info').html(data).fadeIn(1000);
          $('#info').html(data).delay(3000).fadeOut(1000);
          $('body').css('overflow', 'visible');  // HABILITAR EL SCROLL DE LA PÁGINA (BODY) el modal lo desabilitaba
            viewdata_comercio2(mensaje,id,registro);
        });
      }


      function deletedata_comercio(str,mensaje){
          if (confirm("¿Esta seguro de eliminar el registro?") == true) {
            var id = str;
	        var registro = $('#registro').val();
	        var datas="registro="+registro+"&id="+id;
            $.ajax({
               type: "POST",
               url: "deletedata_comercio.php",
               data:datas
            }).done(function( data ) {
              $('#info').html(data).fadeIn(1000);
              $('#info').html(data).delay(2000).fadeOut(1000);
              viewdata_comercio(mensaje);
            });
          } else {
            var id = str;
            var data ='<br/><br/><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Eligió no eliminar el registro.</div>';
              $('#info').html(data).fadeIn(1000);
              $('#info').html(data).delay(2000).fadeOut(1000);
              viewdata_comercio(mensaje);
          }
      }


      function deletedata_comercio2(str,mensaje){
          if (confirm("¿Esta seguro de eliminar el registro?") == true) {
            var id = str;
          var registro = $('#registro').val();
          var datas="registro="+registro+"&id="+id;
            $.ajax({
               type: "POST",
               url: "deletedata_comercio.php",
               data:datas
            }).done(function( data ) {
              $('#info').html(data).fadeIn(1000);
              $('#info').html(data).delay(2000).fadeOut(1000);
              viewdata_comercio2(mensaje,id,registro);
              setTimeout (location.reload(), 5000);
            });
          } else {
            var id = str;
            var data ='<br/><br/><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Eligió no eliminar el registro.</div>';
              $('#info').html(data).fadeIn(1000);
              $('#info').html(data).delay(2000).fadeOut(1000);
//              viewdata_comercio2(mensaje,id,registro);
//              setTimeout (location.reload(), 5000);
          }
      }

// FIN FUNCIONES CRUD DE COMERCIO



//  FUNCIONES DE CRUD DEL REGISTRO EN GENERAL
      function viewdata_general(mensaje){
        var registro = $('#registro').val();
       $.ajax({ 
       type: "POST",
       url: "getdata_general.php?mensaje="+mensaje,
       data: "registro="+registro
        }).done(function( data ) {
      $('#viewdata').html(data);
        });
      }


      function viewdata_general2(mensaje,id,registro){
       $.ajax({ 
       type: "POST",
       url: "modifica_registro_general2.php?mensaje="+mensaje,
       data: "registro="+registro+"&id="+id
        }).done(function( data ) {
//      $('#my-table').remove();
      $('#my-table').html(data);
//      $('#viewdata').html('');
//      $('#viewdata').html(data);
        });
      }


      function updatedata_general(str,mensaje){
        var id = str;
        var registro = $('#registro').val();
        var tipo = $('#tipo'+id).val();
        var comprador = $('#comprador'+id).val();
        var rut = $('#rut'+id).val();
        var vendedor = $('#vendedor'+id).val();
        var propiedad = $('#propiedad'+id).val();
        var repertorio = $('#repertorio'+id).val();
        var nombre = $('#nombre'+id).val();
        var fojas = $('#fojas'+id).val();
//        var vuelta = $('#vuelta'+id+':checked').val();

        var numero = $('#numero'+id).val();
        var ano = $('#ano'+id).val();
        var rol = $('#rol'+id).val();
        var comuna = $('#comuna'+id).val();
        var datas="id="+id+"&registro="+registro+"&tipo="+tipo+"&nombre="+nombre+"&rut="+rut+"&vendedor="+vendedor+"&propiedad="+propiedad+"&fojas="+fojas+"&numero="+numero+"&ano="+ano+"&repertorio="+repertorio+"&rol="+rol+"&comuna="+comuna;
        $.ajax({
           type: "POST",
           url: "updatedata_general.php",
           data: datas
        }).done(function( data ) {
          $('#info').html(data).fadeIn(1000);
          $('#info').html(data).delay(3000).fadeOut(1000);
          $('body').css('overflow', 'visible');  // HABILITAR EL SCROLL DE LA PÁGINA (BODY) el modal lo desabilitaba
          viewdata_general(mensaje);
        });
      }


      function updatedata_general2(str,mensaje){
        var id = str;
        var registro = $('#registro').val();
        var tipo = $('#tipo'+id).val();
        var comprador = $('#comprador'+id).val();
        var rut = $('#rut'+id).val();
        var vendedor = $('#vendedor'+id).val();
        var propiedad = $('#propiedad'+id).val();
        var repertorio = $('#repertorio'+id).val();
        var nombre = $('#nombre'+id).val();
        var fojas = $('#fojas'+id).val();
//        var vuelta = $('#vuelta'+id+':checked').val();

        var numero = $('#numero'+id).val();
        var ano = $('#ano'+id).val();
        var rol = $('#rol'+id).val();
        var comuna = $('#comuna'+id).val();
        var datas="id="+id+"&registro="+registro+"&tipo="+tipo+"&nombre="+nombre+"&rut="+rut+"&vendedor="+vendedor+"&propiedad="+propiedad+"&fojas="+fojas+"&numero="+numero+"&ano="+ano+"&repertorio="+repertorio+"&rol="+rol+"&comuna="+comuna;
        $.ajax({
           type: "POST",
           url: "updatedata_general.php",
           data: datas
        }).done(function( data ) {
          $('#info').html(data).fadeIn(1000);
          $('#info').html(data).delay(3000).fadeOut(1000);
          $('body').css('overflow', 'visible');  // HABILITAR EL SCROLL DE LA PÁGINA (BODY) el modal lo desabilitaba
          viewdata_general2(mensaje,id,registro);
        });
      }


       function deletedata_general(str,mensaje){
          if (confirm("¿Esta seguro de eliminar el registro?") == true) {
            var id = str;
          var registro = $('#registro').val();
          var datas="registro="+registro+"&id="+id;
            $.ajax({
               type: "POST",
               url: "deletedata_general.php",
               data:datas
            }).done(function( data ) {
              $('#info').html(data).fadeIn(1000);
              $('#info').html(data).delay(2000).fadeOut(1000);
              viewdata_general(mensaje);
            });
          } else {
            var id = str;
            var data ='<br/><br/><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Eligió no eliminar el registro.</div>';
              $('#info').html(data).fadeIn(1000);
              $('#info').html(data).delay(2000).fadeOut(1000);
              viewdata_general(mensaje);
          }
      }

       function deletedata_general2(str,mensaje){
          if (confirm("¿Esta seguro de eliminar el registro?") == true) {
            var id = str;
          var registro = $('#registro').val();
          var datas="registro="+registro+"&id="+id;
            $.ajax({
               type: "POST",
               url: "deletedata_general.php",
               data:datas
            }).done(function( data ) {
              $('#info').html(data).fadeIn(1000);
              $('#info').html(data).delay(2000).fadeOut(1000);
              viewdata_general2(mensaje,id,registro);
              setTimeout (location.reload(), 5000);
            });
          } else {
            var id = str;
            var data ='<br/><br/><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Eligió no eliminar el registro.</div>';
              $('#info').html(data).fadeIn(1000);
              $('#info').html(data).delay(2000).fadeOut(1000);
//              viewdata_general2(mensaje);
          }
      }      
// FIN FUNCIONES CRUD DE REGISTRO EN GENERAL




