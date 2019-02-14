$(document).ready(function(){
    $("#buscar_agencias").click(function(event) {
        event.preventDefault();
        $.ajax({
            url: api + 'admin/php/asociar_ruta_transporte_agencia.php',
            method: "POST",
            async: true,
            dataType: "json",
            crossDomain: true,
            data: $("#form-buscar-agencia-asociar-ruta").serialize(),
            cache: false,
            success: function (json) {
                if (json.response) {
                    cargarCadenaHtml(json.data);
                    $("input[name='id_agencia']").prop('value',json.data['id_agencia']);
                } else {
                    alert(json.msg);
                }
            },
            error: function (xhr) {
                alert('ocurrio un error ' + xhr.statusText);
            }
        });
    });

    $("#btn-guardar-ruta").click(function(event) {
        //event.preventDefault();
        validateForm('#form-guardar-ruta','admin/php/añadir_ruta.php',cargarIdAgencia);
    });
	
    $("#btn-guardar-viaje").click(function(event) {
        //event.preventDefault();
        validateForm('#form-guardar-viaje','admin/php/añadir_viaje.php', cargarIdAgencia);
    });
});

function cargarCadenaHtml(datos) {
    var cadenaHTML='<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAsociarUnidad">Añadir unidad</button>' +
        '<button type="button" class="btn btn-secondary btn-sm" style="margin: 1rem" data-toggle="modal" data-target="#modalAsociarRuta">Añadir ruta</button>' +
        '<button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#modalAddViaje">Añadir Viaje</button>' +

        '<div class="card" >' +
        '<div class="card-body" id="divAgencia">' +
        '<span class="badge badge-info">Nombre:</span> ' + datos['nombre_agencia'] + ' | ' +
        '	<span class="badge badge-info">RIF:</span> ' + datos['rif'] +' | '+
        '	<span class="badge badge-info">Telefono 1:</span> ' + datos['telefono_1'];
	if(datos['telefono_2'] === ''){
        cadenaHTML += ' |	<span class="badge badge-info">Telefono 2:</span> ' + datos['telefono_1'];
	}
    cadenaHTML += '</div>' +
        '</div>';

    $("#divAgencia").html(cadenaHTML);
    $("#cardAgencia").css('display','block');
}

function cargarIdAgencia(data) {
	$('input[name="id_agencia"]').prop('value', 1);
}

//funcion que muestra un popover con el mensaje de error en el input
function validateForm(formId, uri, func,  erPlacement, validRules) {
    validateMenssages();

    erPlacement = erPlacement || 'bottom';
    validRules = validRules || {};

    /* Validation message with the twitter's popover */
    /* http://d.hatena.ne.jp/hipsrinoky/20120329/1333035926 */
    var eClass = 'error'; // for bootstrap
    var sClass = 'success'; // for bootstrap
    var wClass = 'warning'; // for bootstrap (not in used)
    $(formId).validate({
        errorElement:"span", //not required.
        errorClass:"help-inline", //result is <span class="help-inline">xxx</span>
        validClass:"help-inline", //not required.
        rules: validRules,
        unhighlight: function(element, errorClass, validClass) {
            if (element.type === 'radio') {
                this.findByName(element.name).parent("div").parent("div").removeClass(eClass).addClass(sClass);
            } else {
                $(element).parent("div").parent("div").removeClass(eClass).addClass(sClass);
                $(element).popover('hide'); //hide popover.
            }
        },
        highlight: function(element, errorClass, validClass) {
            if (element.type === 'radio') {
                this.findByName(element.name).parent("div").parent("div").addClass(eClass).removeClass(sClass);
            } else {
                $(element).parent("div").parent("div").addClass(eClass).removeClass(sClass);
            }
        },
        errorPlacement: function(error, element) {
            // For invalid messages in popover.
            $(element).attr('rel','popover');
            var erMsg = error.html();
            $(element).attr('data-content', erMsg);
            $(element).popover({
                placement: erPlacement,
                offset: 20,
                trigger: 'manual'
            });
            $(element).popover('show'); //Show by manual.
        },
        onfocusout: function() {
            $(this.currentElements).popover('hide');
        },
        onkeyup: false,
        onclick: false,
        onsubmit: true,
        submitHandler: function(){
            $.ajax({
                url: api + uri,
                method: "POST",
                async: true,
                dataType: "json",
                crossDomain: true,
                data: $(formId).serialize(),
                cache: false,
                success: function (json) {
                    if (json.response) {
                        alert('Datos guardados');
                        $(formId)[0].reset();
                        func(json.data);
                    } else {
                        alert(json.msg);
                    }
                },
                error: function (xhr) {
                    alert('ocurrio un error ' + xhr.statusText);
                }
            });
        }
    });
}

//funcion que cambia el mensaje de ingles a español
function validateMenssages() {
    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        remote: "Por favor, rellena este campo.",
        email: "Por favor, escribe una dirección de correo válida",
        url: "Por favor, escribe una URL válida.",
        date: "Por favor, escribe una fecha válida.",
        dateISO: "Por favor, escribe una fecha (ISO) válida.",
        number: "Por favor, escribe un número entero válido.",
        digits: "Por favor, escribe sólo dígitos.",
        creditcard: "Por favor, escribe un número de tarjeta válido.",
        equalTo: "Por favor, escribe el mismo valor de nuevo.",
        accept: "Por favor, escribe un valor con una extensión aceptada.",
        maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
        range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
        max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
        min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
    });
}