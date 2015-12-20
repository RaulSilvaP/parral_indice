jQuery(function($) {  
	//MUESTRA FORMULARIO COMERCIO
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


});// fin jquery


// jQuery expression for case-insensitive filter
$.extend($.expr[":"], 
{
    "contains-ci": function(elem, i, match, array) 
	{
		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
});


function volver() {
	location.href = "index.php";

}	
