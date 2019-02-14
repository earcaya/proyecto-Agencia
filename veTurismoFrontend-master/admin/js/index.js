$(document).ready(function(){
    //cerrar sesion
    $("#cerrar-sesion-admin").click(function () {
        window.location.href = api;
    });

    //se carga por defecto
    //carga el contenido de la pagina
    $("#contenido").load('dashboard.html div#cargar');
    //carga el primer script que necesita el contenido
    $.getScript("vendor/chart.js/Chart.min.js")
    //el siguiente script depende del primero, por eso se espera que se carge el primero par pasar al segundo
        .done(function (script, textStatus) {
            $.getScript("js/sb-admin-charts.min.js");
        })
        //si no se pudo cargar el script
        .fail(function (jqxhr, settings, exception) {
            alert('No se pudo cargar el script');
        });

    //selecciona el boton
    $("#dashboard").click(function(event) {
        //carga el contenido de la pagina
        $("#contenido").load('dashboard.html div#cargar');
        //carga el primer script que necesita el contenido
        $.getScript("vendor/chart.js/Chart.min.js")
            //el siguiente script depende del primero, por eso se espera que se carge el primero par pasar al segundo
            .done(function (script, textStatus) {
                $.getScript("js/sb-admin-charts.min.js");
            })
            //si no se pudo cargar el script
            .fail(function (jqxhr, settings, exception) {
                alert('No se pudo cargar el script');
            });
    });

    //selecciona el boton
    $("#charts").click(function(event) {
        //carga el contenido de la pagina
        $("#contenido").load('charts.html div#cargar');
        //carga el primer script que necesita el contenido
        $.getScript("vendor/chart.js/Chart.min.js")
            //el siguiente script depende del primero, por eso se espera que se carge el primero par pasar al segundo
            .done(function (script, textStatus) {
                $.getScript("js/sb-admin-charts.min.js");
            })
            //si no se pudo cargar el script
            .fail(function (jqxhr, settings, exception) {
                alert('No se pudo cargar el script');
            });
    });

    //selecciona el boton
    $("#tables").click(function(event) {
        //carga el contenido de la pagina
        $("#contenido").load('actualizarDatos.html div#cargar');


        $.getScript("js/actualizarDatos.js")
            
            //si no se pudo cargar el script
            .fail(function (jqxhr, settings, exception) {
                alert('No se pudo cargar el script');
            });
        //carga el primer script que necesita el contenido
        //este no requiere otro script
    });

    //selecciona el boton
    $("#navbar").click(function(event) {
        //carga el contenido de la pagina
        $("#contenido").load('navbar.html div#cargar');
        //carga el primer script que necesita el contenido
        //este no requiere otro script
    });

    //selecciona el boton
    $("#cards").click(function(event) {
        //carga el contenido de la pagina
        $("#contenido").load('cards.html div#cargar');
        //carga el primer script que necesita el contenido
        //este no requiere otro script
    });

    //selecciona el boton
    $("#guardar-agencia").click(function(event) {
        //carga el contenido de la pagina
        $("#contenido").load('guardar-agencia.html div#cargar');
        //carga el primer script que necesita el contenido
        $.getScript("js/bootstrap-timepicker.min.js")
            //el siguiente script depende del primero, por eso se espera que se carge el primero par pasar al segundo
            .done(function (script, textStatus) {
                $.getScript("js/guardar-agencia.js");
            })
            //si no se pudo cargar el script
            .fail(function (jqxhr, settings, exception) {
                alert('No se pudo cargar el script');
            });
    });
    //selecciona el boton
    $("#guardar-rutas-transporte").click(function(event) {
        //carga el contenido de la pagina
        $("#contenido").load('asociar_ruta_transporte_agencia.html div#cargar');
        //carga el primer script que necesita el contenido
        
        $.getScript("js/asociar_ruta_transporte_agencia.js")
            
            //si no se pudo cargar el script
            .fail(function (jqxhr, settings, exception) {
                alert('No se pudo cargar el script');
            });
    });
    $("#guardar-rastreos").click(function(event) {
        //carga el contenido de la pagina
        $("#contenido").load('tracking.html div#cargar');
        //carga el primer script que necesita el contenido
        
        $.getScript("js/tracking.js")
            
            //si no se pudo cargar el script
            .fail(function (jqxhr, settings, exception) {
                alert('No se pudo cargar el script');
            });
    });



});
