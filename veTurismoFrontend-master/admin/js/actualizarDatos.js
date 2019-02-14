$("#actualizarAgencia").click(function(event) {

	var idAgencia = $("#inputAgencia").val();

	var cadenaHTML;
	// $.ajax({

	// 	url : "",
	// 	type : "post",
	// 	dataType : "json",
	// 	success : function(json){

	// 		if(json.response)
	// 		{
	// 			//llenar cadena
	// 		}

	// 	},
	// 	error : funtion(xhr){

	// 		alert("Ocurrio un error: " + xhr.status + " " + xhr.statusText);
	// 	}


	// });
	cadenaHTML='<div class="form-group row">'+
                '<div  class="col-sm-2">Nombre: </div>'+
                '<div class="col-sm-10">'+
                   'El paseo'+
                '</div>'+
               '</div>'+
               '<div class="form-group row">'+
                '<div  class="col-sm-2">Rif: </div>'+
                '<div class="col-sm-10">'+
                   'J-25789644122'+
                '</div>'+
               '</div>'+
               '<div class="form-group row">'+
                '<div  class="col-sm-2">Direccion: </div>'+
                '<div class="col-sm-10">'+
                   'P. Sherman, calle Wallaby, 42, Sydney'+
                '</div>'+
               '</div>'+
               '<div class="form-group row">'+
                '<div  class="col-sm-2">Telefono: </div>'+
                '<div class="col-sm-10">'+
                   '0424- 857 45 47'+
                '</div>'+
               '</div>';

       $("#PonerRegistro").html(cadenaHTML);
       $('#modalActualizarRegistro').modal('show');



});
$("#actualizarViaje").click(function(event) {

	alert("hola viaje");


});
$("#actualizarRuta").click(function(event) {

	alert("hola ruta");


});
$("#actualizarUnidad").click(function(event) {

	alert("hola unidad");


});