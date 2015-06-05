//Este string contiene una imagen de 1px*1px color blanco
window.imagenVacia = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';

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
}

$(document).ready(function() {

    $('#load_img').on('change', '#archivo', function(e) {
        window.mostrarVistaPrevia();
    });

});
}