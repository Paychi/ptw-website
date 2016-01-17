
$(document).ready(function(){


    $.ajax({
        type: "POST",
        url: $('#mapa_form').attr('action') + "/ImagenesAMostrar",
        data: {"idComunidad": 1},
            beforeSend: function(){
        },
            complete: function(data){
        },
            success: function (data) {
                var comunidadesEncontradas = [];
                var comunidadesResultantes = [];

                comunidadesEncontradas = JSON.stringify(data[0].id_comunidad);

                //alert(data)

                for(var i = 0 ; i < data.length ; i++)
                {
                    comunidadesResultantes.push(data[i].id_comunidad);
                }

                for(var j = 1; j <= 77; j++)
                {
                    $('#celular'+ j).attr('visibility','hidden');//'visible');// 'hidden');
                }

                for(var i = 0; i < comunidadesResultantes.length; i++)
                {
                    for(var j = 1; j <= 77; j++)
                    {
                        if(j == comunidadesResultantes[i] )
                            $('#celular'+ j).attr('visibility', 'visible');
                    }                    

                    //alert(comunidadesResultantes[j]);
                }

           // alert(comunidadesEncontradas);//(JSON.stringify(data));
        },
            error: function(errors){
            alert('Error en el Servidor - Inténtelo luego, Gracias')
        }
    });

    $('.Waslala').click(function(){
        ComunidadInfo(1);
    });

    $('.ZinicaUno').click(function(){
        ComunidadInfo(2);
    });

    $('.Kaskita').click(function(){
        ComunidadInfo(3);
    });

    $('.SanRamonLasVallas').click(function(){
        ComunidadInfo(4);
    });

    $('.VallasElPastal').click(function(){
        ComunidadInfo(5);
    });

    $('.VallasCentral').click(function(){
        ComunidadInfo(6);
    });

    $('.SantaMariaKubali').click(function(){
        ComunidadInfo(7);
    });

    $('.BuenosAiresKubali').click(function(){
       ComunidadInfo(8);
    });

    $('.GuayaboKubali').click(function(){
       ComunidadInfo(9);
    });

    $('.KubaiCentral').click(function(){
        ComunidadInfo(10);
    });

    $('.PiedrasBlancas').click(function(){
        ComunidadInfo(11);
    });

    $('.SectorKum').click(function(){
       ComunidadInfo(12);
    });

    $('.LasDelicias').click(function(){
       ComunidadInfo(13);
    });

    $('.NaranjoArriba').click(function(){
       ComunidadInfo(14);
    });

    $('.WaslalitaElNaranjo').click(function(){
        ComunidadInfo(15);
    });

    $('.AguasCalientes').click(function(){
       ComunidadInfo(16);
    });

    $('.ElNaranjo').click(function(){
       ComunidadInfo(17);
    });

    $('.LasTorrez').click(function(){
        ComunidadInfo(18);
    });

    $('.LosMilagros').click(function(){
        ComunidadInfo(19);
    });

    $('.LasNuevesDos').click(function(){
        ComunidadInfo(20);
    });

    $('.LasNuevesUno').click(function(){
        ComunidadInfo(21);
    });

    $('.ElPijibay').click(function(){
        ComunidadInfo(22);
    });

    $('.ElPuyus').click(function(){
        ComunidadInfo(23);
    });

    $('.ElKiawa').click(function(){
        ComunidadInfo(24);
    });

    $('.Sofana').click(function(){
        ComunidadInfo(25);
     });

    $('.BuenosAiresDudu').click(function(){
        ComunidadInfo(26);
    });

    $('.Dipina').click(function(){
        ComunidadInfo(27);
    });

    $('.CanoSucio').click(function(){
        ComunidadInfo(28);
    });

    $('.SnAntonioYaro').click(function(){
        ComunidadInfo(29);
    });

    $('.YaroCentral').click(function(){
        ComunidadInfo(30);
    });

    $('.SnJuanYaro').click(function(){
        ComunidadInfo(31);
    });

    $('.OcoteTuma').click(function(){
        ComunidadInfo(32);
     });

    $('.ChileTres').click(function(){
        ComunidadInfo(33);
     });

    $('.OcoteYaosca').click(function(){
        ComunidadInfo(34);
    });

    $('.VallasAbajo').click(function(){
        ComunidadInfo(35);
    });

    $('.SnPedroLasVallas').click(function(){
        ComunidadInfo(36);
     });

    $('.SnRafaelKum').click(function(){
        ComunidadInfo(37);
    });

    $('.SnFranciscoPtoViejo').click(function(){
        ComunidadInfo(38);
    });

    $('.GuayaboAbajo').click(function(){
        ComunidadInfo(39);
    });

    $('.LaLimonera').click(function(){
        ComunidadInfo(40);
    });

    $('.LasJawas').click(function(){
        ComunidadInfo(41);
    });

    $('.Kusuli').click(function(){
        ComunidadInfo(42);
    });

    $('.SanBenito').click(function(){
        ComunidadInfo(43);
    });

    $('.StaRosaDudu').click(function(){
        ComunidadInfo(44);
    });

    $('.ZapoteDudu').click(function(){
        ComunidadInfo(45);
    });

    $('.ArenasBlancas').click(function(){
        ComunidadInfo(46);
    });

    $('.CeibaDudu').click(function(){
        ComunidadInfo(47);
    });

    $('.OcoteDudu').click(function(){
        ComunidadInfo(48);
    });

    $('.SnMiguelDudu').click(function(){
        ComunidadInfo(49);
    });

    $('.ElSombrero').click(function(){
        ComunidadInfo(50);
    });

    $('.SnPabloLasVallas').click(function(){
        ComunidadInfo(51);
    });

    $('.LasFlores').click(function(){
        ComunidadInfo(52);
    });

    $('.LaPosolera').click(function(){
        ComunidadInfo(53);
    });

    $('.ElCipres').click(function(){
        ComunidadInfo(54);
    });

    $('.HierbaBuena').click(function(){
        ComunidadInfo(55);
    });

    $('.ChileUno').click(function(){
        ComunidadInfo(56);
    });

    $('.ChileDos').click(function(){
        ComunidadInfo(57);
    });

    $('.ElAchioteWaslala').click(function(){
        ComunidadInfo(58);
    });

    $('.ElCorozal').click(function(){
        ComunidadInfo(59);
    });

    $('.LosPotrerios').click(function(){
        ComunidadInfo(60);
    });

    $('.CanoDeLosMartinez').click(function(){
        ComunidadInfo(61);
    });

    $('.Waslalita').click(function(){
        ComunidadInfo(62);
    });

    $('.CanoLaCeiba').click(function(){
        ComunidadInfo(63);
    });

    $('.CiudadWaslala').click(function(){
        ComunidadInfo(64);
    });

    $('.PapayoDos').click(function(){
        ComunidadInfo(65);
    });

    $('.BarrialColorado').click(function(){
        ComunidadInfo(66);
    });

    $('.ElGuabo').click(function(){
        ComunidadInfo(67);
    });

    $('.GuayaboArriba').click(function(){
        ComunidadInfo(68);
    });

    $('.ZinicaDos').click(function(){
        ComunidadInfo(69);
    });

    $('.OcoteKubali').click(function(){
        ComunidadInfo(70);
    });

    $('.ElBarillal').click(function(){
        ComunidadInfo(71);
    });

    $('.LosMangos').click(function(){
        ComunidadInfo(72);
    });

    $('.PtoViejo').click(function(){
        ComunidadInfo(73);
    });

    $('.SanPabloKubali').click(function(){
        ComunidadInfo(74);
    });

    $('.EsperanzaKubali').click(function(){
        ComunidadInfo(75);
    });

    $('.BocaDePiedra').click(function(){
        ComunidadInfo(76);
    });

    $('.ElGarrobo').click(function(){
        ComunidadInfo(77);
    });

     ///OBTENER INFORMACIÓN DE LA COMUNIDAD POR ID

    function ComunidadInfo(idComunidad)
    {
        $('#myModalLabel').text("");
        $('#ContenidoModal').text("");
        
        var url=$('#mapa_form').attr('action') + "/GetInfoComunidad";

        $.ajax({
            type: "POST",
            url: url,
            data: {"idComunidad": idComunidad},
            beforeSend: function(){
            },
            complete: function(data){
            },
            success: function (data) {
                var nombreComunidadAMostrar= JSON.stringify(data[0].nombreComunidad);
                var contenidoComunidadAMostrar= JSON.stringify(data[0].descripcion);

                $('#myModalLabel').text(nombreComunidadAMostrar.split("\"").join(""));
                $('#ContenidoModal').text(contenidoComunidadAMostrar.split("\"").join(""));                   
            },
            error: function(errors){
                alert('Error en el Servidor - Inténtelo luego, Gracias')
            }
        });
        $('#myModal').modal('show');
    }

});
