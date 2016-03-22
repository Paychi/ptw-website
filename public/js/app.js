function MostrarContPromotor()
{
	$("#contDefPromotor").toggle("slow");
}

function MostrarContPromotorHidden()
{
	$("#contDefPromotorHidden").toggle("slow");
}

/*$(document).ready(function(){
    
});*/

var MaxInputs  = 3; //Número Maximo de Campos
var FieldCount = 0; //para el seguimiento de los campos

//Este string contiene una imagen de 1px*1px color blanco
window.imagenVacia = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);  
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }		
    });	

    //Vista previa 

    $('#load_img').on('change', '#archivo', function(e) {
        window.mostrarVistaPrevia();
    });

    $('#loadimg').on('change', '#archivo', function(e) {
        window.mostrarVistaPrevia2();
    });

    //Fin vista previa 

    $('#selected_perfil').on('change', '#lista_perfiles', function(e) {
        if ($('#lista_perfiles').val() == 3) {
            $('#fieldhidden').show();
        } else{
            $('#list').val(0);
            $('#fieldhidden').hide();
        };
        if ($('#lista_perfiles').val() == 2) {
            $('#fieldhidden2').show();
        } else{
            $('#fieldhidden2').hide();
            $('#isadmin').removeProp('checked');
            $('#isadminHide').val('0');
        };
        
    });


    $('.navbar-header a').hover(function() {
       // $('.tooltipinicio').toggle("slow");
    });

    // Navegacion de menus del sitio

    var urlActual = window.location.href;

    if ((urlActual.indexOf('waslala') != -1)) {
            $("#tag_waslala").addClass("active");
    }

    if ((urlActual.indexOf('about') != -1)) {
            $("#tag_about").addClass("active");
    }

    if ((urlActual.indexOf('colaboradores') != -1)) {
            $("#tag_colaboradores").addClass("active");
    }

    if ((urlActual.indexOf('contactus') != -1)) {
            $("#tag_contactus").addClass("active");
    }

    if ((urlActual.indexOf('simsiv') != -1)) {
            $("#tag_simsiv").addClass("active");
    }

    if ((urlActual.indexOf('noticias') != -1) || (urlActual.indexOf('addnoticia') != -1) || (urlActual.indexOf('editnoticia/') != -1) || (urlActual.indexOf('upload/') != -1)) {
        if ($('#perf').val() === 'adis' && (urlActual.indexOf('addnoticia') != -1) ) 
            $(".menu-addnoticia").addClass("active");        
        else
            $(".menu-noticia").addClass("active");
    }

    if ((urlActual.indexOf('colaboradores') != -1) || (urlActual.indexOf('addcolaborador') != -1) || (urlActual.indexOf('editcolaborador/') != -1)) {
            $(".menu-colaborador").addClass("active");
    }

    if ((urlActual.indexOf('usuarios') != -1) || (urlActual.indexOf('addusuario') != -1) || (urlActual.indexOf('editusuario/') != -1)) {
            $(".menu-usuario").addClass("active");
    }

    if ((urlActual.indexOf('contactos') != -1) || (urlActual.indexOf('addcontacto') != -1) || (urlActual.indexOf('editcontacto/') != -1)) {
            $(".menu-contacto").addClass("active");
    }

    if ((urlActual.indexOf('perfiles') != -1) || (urlActual.indexOf('editperfil/') != -1)) {
            $(".menu-perfil").addClass("active");
    }

    if ((urlActual.indexOf('confbanners') != -1)) {
            $(".menu-confbanner").addClass("active");
    }

    if ((urlActual.indexOf('lideres') != -1) || (urlActual.indexOf('addlider') != -1) || (urlActual.indexOf('editlider/') != -1)) {
            $(".menu-lider").addClass("active");
    }

    if ((urlActual.indexOf('comunidades') != -1) || (urlActual.indexOf('editcomunidad/') != -1)) {
            $(".menu-comunidad").addClass("active");
    }

    if ((urlActual.indexOf('ajustes') != -1)) {
            $(".menu-perfilcolaborador").addClass("active");
    }

    if ((urlActual.indexOf('sisadm') != -1)) {
            $("#tag_admin").addClass("active");
    }

    if ((urlActual.indexOf('adis') != -1)) {
            $("#tag_adis").addClass("active");
    }

    if ((urlActual.indexOf('colaborador') != -1)) {
        if($('#perf').val() === 'col' &&  (urlActual.indexOf('ajustes') == -1))
            $("#tag_perfilcolaborador").addClass("active");
    }

    // Fin de la navegacion de menus del sitio

    setTimeout(function() {$(".alert").fadeOut(1500); }, 5000);

});



window.mostrarVistaPrevia = function mostrarVistaPrevia() {

    var Archivos, Lector;

    //Para navegadores antiguos
    if (typeof FileReader !== "function") {
        $('#infoNombre').text('[Vista previa no disponible]');
        $('#infoTamaño').text('(su navegador no soporta vista previa!)');
        return;
    }

    Archivos = $('#archivo')[0].files;
    if (Archivos.length > 0) {

        Lector = new FileReader();
        Lector.onloadend = function(e) {
            var origen, tipo;

            //Envia la imagen a la pantalla
            origen = e.target; //objeto FileReader
            //Prepara la información sobre la imagen
            tipo = window.obtenerTipoMIME(origen.result.substring(0, 30));

            $('#text_file').val(Archivos[0].name);
            //Si el tipo de archivo es válido lo muestra, 
            //sino muestra un mensaje 
            if (tipo !== 'image/jpeg' && tipo !== 'image/png') {
                alert('El formato de imagen no es válido: debe seleccionar una imagen JPG o PNG.');
                var objeto = $('#archivo');
                objeto.replaceWith(objeto.val('').clone());
                objeto.val(null);
                $('#text_file').val(null);
                $('#img_banner').attr('src', window.imagenVacia);
            } else {
                $('#img_banner').attr('src', origen.result);
                window.obtenerMedidas();
            }

        };
        Lector.onerror = function(e) {
            console.log(e)
        }
        Lector.readAsDataURL(Archivos[0]);

    } else {
        var objeto = $('#archivo');
        objeto.replaceWith(objeto.val('').clone());
};

window.obtenerTipoMIME = function obtenerTipoMIME(cabecera) {
    return cabecera.replace(/data:([^;]+).*/, '\$1');
}

window.obtenerMedidas = function obtenerMedidas() {

    $('<img/>').bind('load', function(e) {

        if (this.width >= 1300 && this.width <= 4500 && this.height >= 250 && this.height <= 600) {
            //alert('paso');
        } else{
            alert('Dimenciones de la imagen no validas');
            var objeto = $('#archivo');
            objeto.replaceWith(objeto.val('').clone());
            objeto.val(null);
            $('#text_file').val(null);
            $('#img_banner').attr('src', window.imagenVacia);
        };        

    }).attr('src', $('#img_banner').attr('src'));
}}


window.mostrarVistaPrevia2 = function mostrarVistaPrevia2() {

    var Archivos, Lector;

    //Para navegadores antiguos
    if (typeof FileReader !== "function") {
        $('#infoNombre').text('[Vista previa no disponible]');
        $('#infoTamaño').text('(su navegador no soporta vista previa!)');
        return;
    }

    Archivos = $('#archivo')[0].files;
    if (Archivos.length > 0) {

        Lector = new FileReader();
        Lector.onloadend = function(e) {
            var origen, tipo;

            //Envia la imagen a la pantalla
            origen = e.target; //objeto FileReader
            //Prepara la información sobre la imagen
            tipo = origen.result.substring(0, 30).replace(/data:([^;]+).*/, '\$1');
            $('#text_file').val(Archivos[0].name);
            //Si el tipo de archivo es válido lo muestra, 
            //sino muestra un mensaje 
            if (tipo !== 'image/jpeg' && tipo !== 'image/png') {
                alert('El formato de imagen no es válido: debe seleccionar una imagen JPG o PNG.');
                var objeto = $('#archivo');
                objeto.replaceWith(objeto.val('').clone());
                objeto.val(null);
                $('#text_file').val(null);
                $('#img_logo').attr('src', window.imagenVacia);
            } else {
                $('#img_logo').attr('src', origen.result);
                window.obtenerMedidas2();
            }

        };
        Lector.onerror = function(e) {
            console.log(e)
        }
        Lector.readAsDataURL(Archivos[0]);

    } else {
        var objeto = $('#archivo');
        objeto.replaceWith(objeto.val('').clone());
};

window.obtenerMedidas2 = function obtenerMedidas2() {

    $('<img/>').bind('load', function(e) {

        if (this.width >= 64 && this.width <= 470 && this.height >= 64 && this.height <= 440) {
            //alert('paso');
        } else{
            alert('Dimenciones de la imagen no validas');
            var objeto = $('#archivo');
            objeto.replaceWith(objeto.val('').clone());
            objeto.val(null);
            $('#text_file').val(null);
            $('#img_logo').attr('src', window.imagenVacia);
        };        

    }).attr('src', $('#img_logo').attr('src'));
}}