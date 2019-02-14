$(document).ready(function(){
    //Valida el formulario antes de enviar y muestra los mensajes emergentes
    $("#btn-iniciar-sesion-enviar").click(function(){
        //event.preventDefault();
        validateForm('#form-iniciar-sesion');
    });

    //animate css
    $.fn.extend({
        animateCss: function(animationName, callback) {
            var animationEnd = (function(el) {
                var animations = {
                    animation: 'animationend',
                    OAnimation: 'oAnimationEnd',
                    MozAnimation: 'mozAnimationEnd',
                    WebkitAnimation: 'webkitAnimationEnd'
                };

                for (var t in animations) {
                    if (el.style[t] !== undefined) {
                        return animations[t];
                    }
                }
            })(document.createElement('div'));

            this.addClass('animated ' + animationName).one(animationEnd, function() {
                $(this).removeClass('animated ' + animationName);

                if (typeof callback === 'function') callback();
            });

            return this;
        }
    });

    var $formjumbotron = $('#form-jumbotron');
    $formjumbotron.css('display','');
    $formjumbotron.animateCss('fadeInLeft');

    $('.jumbotron').animateCss('fadeIn');
    //$('.jumbotron').css('background-image', "url(../src/images/playa.jpg)").animateCss('fadeIn');
});

//funcion que muestra un popover con el mensaje de error en el input
function validateForm(formId, erPlacement, validRules) {
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
                url: api_be + 'Usuario/usuario_controller.php',
                //
                method: "POST",
                async: true,
                dataType: "json",
                crossDomain: true,
                data: $("#form-iniciar-sesion").serialize(),
                cache: false,
                success: function (json) {
                    if (json.response) {
                        if ((JSON.parse(json.data)).tipo === 'usuario'){
                            window.location.href = api + "public/menuUsuario.phtml";
                        } else {
                            window.location.href = api + "admin";
                        }
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