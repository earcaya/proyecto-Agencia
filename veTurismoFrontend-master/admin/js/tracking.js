$("#buscar_agencias_viajes").click(function(event) {

	var cadenaHTML=	'<div class="card" >' +
					      '<div class="card-body" id="divAgencia">' +
					        '<span class="badge badge-success">Nombre:</span> TurismoYa |' +
					        '	<span class="badge badge-success">RIF:</span> J-4578962156 |'+
					        '	<span class="badge badge-success">Telefono:</span> 0412-8793652'+ 
					      '</div>' +
					      '<div class="container"  >' +
					      	'<div class="row" >' +
					      	'<span class="badge badge-success">Viajes:</span>' +
					      	'</div>' +
					      '</div>' +

					      '<div class="card" style="margin: 1rem;" >' +
					      	'<div class="card-body" id="divAgencia">' +
								'<span class="badge badge-info">Fecha:</span> 01/05/2018 |' +
					       		'<span class="badge badge-info">Origen:</span> Venezuela Aragua Maracay |'+
					       		'<span class="badge badge-info">Destino:</span> Venezuela Carabobo Naguanagua'+ 
					       		'<span class="badge badge-info">Unidad:</span> 4578'+ 
					       		'<button type="button" style="margin-left: 1rem;" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modalTracking">Tracking</button>' +

					      	'</div>' +
					      '</div>' +
					      '<div class="card" style="margin: 1rem;" >' +
					      	'<div class="card-body" id="divAgencia">' +
								'<span class="badge badge-info">Fecha:</span> 04/12/2019 |' +
					       		'<span class="badge badge-info">Origen:</span> Venezuela Carabobo valencia |'+
					       		'<span class="badge badge-info">Destino:</span> Venezuela Carabobo Campo'+ 
					       		'<span class="badge badge-info">Unidad:</span> 1478'+ 
					       		'<button type="button" style="margin-left: 1rem;" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modalTracking">Tracking</button>' +

					      	'</div>' +
					      '</div>' +
					      '<div class="card" style="margin: 1rem;" >' +
					      	'<div class="card-body" id="divAgencia">' +
								'<span class="badge badge-info">Fecha:</span> 01/03/2018 |' +
					       		'<span class="badge badge-info">Origen:</span> venezuela Aragua Cagua|'+
					       		'<span class="badge badge-info">Destino:</span> Venezuela Merida Merida'+ 
					       		'<span class="badge badge-info">Unidad:</span> 1478'+ 
					       		'<button type="button" style="margin-left: 1rem;" class="btn btn-default btn-sm"  data-toggle="modal" data-target="#modalTracking">Tracking</button>' +

					      	'</div>' +
					      '</div>' +


					 '</div>';


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

	$("#divAgenciayViajes").html(cadenaHTML);
	$("#cardAgencia").css('display','block');
});
$("#agregarLatLog").click(function(event) {

	var lat = $("#idLatitud").val();
	var log = $("#idLongitud").val();
	var cadenaHTML;


	cadenaHTML='<div class="form-group row">' +
					' <span class="badge badge-warning col-sm-2 col-form-label">Locacion:</span>' +
                    
                    '<div class="col-sm-10">' +
                    'Longitud: ' + log + ' |' + ' Latitud: ' + lat + 
                    '</div>' +
                '</div>';

	$("#coordenadastracking").append(cadenaHTML);

});