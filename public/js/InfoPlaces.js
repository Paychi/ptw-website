
        $(document).ready(function(){
            $('#SanRamonLasVallas').click(function(){
                var url=$('#mapa_form').attr('action') + "/SanRamonLasVallas";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#VallasElPastal').click(function(){
                var url=$('#mapa_form').attr('action') + "/VallasElPastal";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#Kaskita').click(function(){
                kaskitaInfo();
            });

            function kaskitaInfo()
            {
                var url=$('#mapa_form').attr('action') + "/Kaskita";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgKaskita').click(function(){
                kaskitaInfo();
            });


            $('#VallasCentral').click(function(){
                var url=$('#mapa_form').attr('action') + "/VallasCentral";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#ZinicaUno').click(function(){
                zinicaUnoInfo();
            });

            function zinicaUnoInfo()
            {
                var url=$('#mapa_form').attr('action') + "/ZinicaUno";

                $.post(url, {idComunidad: "2" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgZinicaUno').click(function(){
                zinicaUnoInfo();               
            });

            $('#Waslala').click(function(){
                waslalaInfo();
            });

            function waslalaInfo()
            {
                //$('#myModalLabel').text('WASLALA');
                //$('#ContenidoModal').text('El nombre Waslala proviene de una lengua indígena y traducida al español significa Río de Plata');
                
                var url=$('#mapa_form').attr('action') + "/Waslala";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgWaslala').click(function(){
                waslalaInfo();
            });

            

            $('#SantaMariaKubali').click(function(){
                var url=$('#mapa_form').attr('action') + "/SantaMariaKubali";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#BuenosAiresKubali').click(function(){
                var url=$('#mapa_form').attr('action') + "/BuenosAiresKubali";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#GuayaboKubali').click(function(){
                var url=$('#mapa_form').attr('action') + "/GuayaboKubali";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#KubaiCentral').click(function(){
                kubaiCentralInfo();
            });

            function kubaiCentralInfo()
            {
                var url=$('#mapa_form').attr('action') + "/KubaiCentral";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgKubaiCentral').click(function(){
                kubaiCentralInfo();
            });

            $('#PiedrasBlancas').click(function(){
                piedrasBlancasInfo();
            });

            function piedrasBlancasInfo()
            {
                var url=$('#mapa_form').attr('action') + "/PiedrasBlancas";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgPiedrasBlancas').click(function(){
                piedrasBlancasInfo();
            });

            $('#SectorKum').click(function(){
                var url=$('#mapa_form').attr('action') + "/SectorKum";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#LasDelicias').click(function(){
                lasDeliciasInfo();
            });

            function lasDeliciasInfo()
            {
                var url=$('#mapa_form').attr('action') + "/LasDelicias";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgLasDelicias').click(function(){
                lasDeliciasInfo();
            });

            $('#NaranjoArriba').click(function(){
                var url=$('#mapa_form').attr('action') + "/NaranjoArriba";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#WaslalitaElNaranjo').click(function(){
                waslalitaInfo();
            });

            function waslalitaInfo()
            {
                var url=$('#mapa_form').attr('action') + "/WaslalitaNaranjo";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgWaslalitaElNaranjo').click(function(){
                waslalitaInfo();
            });

            $('#AguasCalientes').click(function(){
                var url=$('#mapa_form').attr('action') + "/AguasCalientes";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#ElNaranjo').click(function(){
                var url=$('#mapa_form').attr('action') + "/ElNaranjo";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#LasTorrez').click(function(){
                lasTorrezInfo();
            });

            function lasTorrezInfo()
            {
                var url=$('#mapa_form').attr('action') + "/LasTorrez";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgLasTorrez').click(function(){
                lasTorrezInfo();
            });

            $('#LosMilagros').click(function(){
                var url=$('#mapa_form').attr('action') + "/LosMilagros";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#LasNuevesDos').click(function(){
                var url=$('#mapa_form').attr('action') + "/LasNuevesDos";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#LasNuevesUno').click(function(){
                var url=$('#mapa_form').attr('action') + "/LasNuevesUno";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

            $('#ElPijibay').click(function(){
                elPijibayInfo();
            });

            function elPijibayInfo()
            {
                var url=$('#mapa_form').attr('action') + "/ElPijibay";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgElPijibay').click(function(){
                elPijibayInfo();
            });

            $('#ElPuyus').click(function(){
                elPuyusInfo();
            });

            function elPuyusInfo()
            {
                var url=$('#mapa_form').attr('action') + "/ElPuyus";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgElPuyus').click(function(){
                elPuyusInfo();
            });

            $('#ElKiawa').click(function(){
                elKiawaInfo();
            });

            function elKiawaInfo()
            {
                var url=$('#mapa_form').attr('action') + "/ElKiawa";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

            $('.imgElKiawa').click(function(){
                elKiawaInfo();                
            });

             $('#Sofana').click(function(){
                sofanaInfo();
             });

             function sofanaInfo()
             {
                var url=$('#mapa_form').attr('action') + "/Sofana";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgSofana').click(function(){
                sofanaInfo();
             });             

             $('#BuenosAiresDudu').click(function(){
                var url=$('#mapa_form').attr('action') + "/BuenosAiresDudu";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#Dipina').click(function(){
                dipinaInfo();
            });

            function dipinaInfo()
            {
               var url=$('#mapa_form').attr('action') + "/Dipina";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
            }

             $('.imgDipina').click(function(){
                dipinaInfo();
             });

             $('#CanoSucio').click(function(){
                var url=$('#mapa_form').attr('action') + "/CanoSucio";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#SnAntonioYaro').click(function(){
                var url=$('#mapa_form').attr('action') + "/SnAntonioYaro";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#YaroCentral').click(function(){
                yaroCentralInfo();
            });

             function yaroCentralInfo()
             {
                var url=$('#mapa_form').attr('action') + "/YaroCentral";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgYaroCentral').click(function(){
                yaroCentralInfo();
            });

             $('#SnJuanYaro').click(function(){
                snJuanYaroInfo();
            });

             function snJuanYaroInfo()
             {
                var url=$('#mapa_form').attr('action') + "/SnJuanYaro";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgSnJuanYaro').click(function(){
                snJuanYaroInfo();
             });

             $('#OcoteTuma').click(function(){
                ocoteTumaInfo();
             });

             function ocoteTumaInfo()
             {
                var url=$('#mapa_form').attr('action') + "/OcoteTuma";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgOcoteTuma').click(function(){
                ocoteTumaInfo();
             });

             $('#ChileTres').click(function(){
                chileTresInfo();
             });

             function chileTresInfo()
             {
                var url=$('#mapa_form').attr('action') + "/ChileTres";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgChileTres').click(function(){
                chileTresInfo();
             });

             $('#OcoteYaosca').click(function(){
                var url=$('#mapa_form').attr('action') + "/OcoteYaosca";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#VallasAbajo').click(function(){
                vallasAbajoInfo();
            });

             function vallasAbajoInfo()
             {
                var url=$('#mapa_form').attr('action') + "/VallasAbajo";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgVallasAbajo').click(function(){
                vallasAbajoInfo();
            });

             $('#SnPedroLasVallas').click(function(){
                snPedroVallasInfo();
             });

             function snPedroVallasInfo()
             {
                var url=$('#mapa_form').attr('action') + "/SnPedroLasVallas";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgSnPedroLasVallas').click(function(){
                snPedroVallasInfo();
            });

             $('#SnRafaelKum').click(function(){
                snRafaKumInfo();
            });

             function snRafaKumInfo()
             {
                var url=$('#mapa_form').attr('action') + "/SnRafaelKum";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgSnRafaelKum').click(function(){
                snRafaKumInfo();
            });

             $('#SnFranciscoPtoViejo').click(function(){
                snFranciscoPtoInfo();
            });

             function snFranciscoPtoInfo()
             {
                var url=$('#mapa_form').attr('action') + "/SnFranciscoPtoViejo";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgSnFranViejo').click(function(){
                snFranciscoPtoInfo();
            });


             $('#GuayaboAbajo').click(function(){
                var url=$('#mapa_form').attr('action') + "/GuayaboAbajo";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#LaLimonera').click(function(){
                var url=$('#mapa_form').attr('action') + "/LaLimonera";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#LasJawas').click(function(){
                var url=$('#mapa_form').attr('action') + "/LasJawas";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#Kusuli').click(function(){
                kusuliInfo();
            });

             function kusuliInfo()
             {
                var url=$('#mapa_form').attr('action') + "/Kusuli";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgKusuli').click(function(){
                kusuliInfo();
            });

             $('#SanBenito').click(function(){
                sanBenitoInfo();
            });

             function sanBenitoInfo()
             {
                var url=$('#mapa_form').attr('action') + "/SanBenito";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgSanBenito').click(function(){
                sanBenitoInfo();
            });

             $('#StaRosaDudu').click(function(){
                var url=$('#mapa_form').attr('action') + "/StaRosaDudu";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ZapoteDudu').click(function(){
                zapoteDuduInfo();
            });

             function zapoteDuduInfo()
             {
                var url=$('#mapa_form').attr('action') + "/ZapoteDudu";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgZapoteDudu').click(function(){
                zapoteDuduInfo();                
            });

             $('#ArenasBlancas').click(function(){
                arenasBlancasInfo();
            });

             function arenasBlancasInfo()
             {
                var url=$('#mapa_form').attr('action') + "/ArenasBlancas";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgArenasBlancas').click(function(){
                arenasBlancasInfo();
            });

             $('#CeibaDudu').click(function(){
                ceibaDuduInfo();
            });

             function ceibaDuduInfo()
             {
                var url=$('#mapa_form').attr('action') + "/CeibaDudu";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgCeibaDudu').click(function(){
                ceibaDuduInfo();
            });

             $('#OcoteDudu').click(function(){
                ocoteDuduInfo();
            });

             function ocoteDuduInfo()
             {
                var url=$('#mapa_form').attr('action') + "/OcoteDudu";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgOcoteDudu').click(function(){               
                ocoteDuduInfo();
            });

             $('#SnMiguelDudu').click(function(){
                var url=$('#mapa_form').attr('action') + "/SnMiguelDudu";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ElSombrero').click(function(){
                var url=$('#mapa_form').attr('action') + "/ElSombrero";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#SnPabloLasVallas').click(function(){
                snPabloVallasInfo();
            });

             function snPabloVallasInfo()
             {
                var url=$('#mapa_form').attr('action') + "/SnPabloLasVallas";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgSnPabloVallas').click(function(){
                snPabloVallasInfo();
            });

             $('#LasFlores').click(function(){
                lasFloresInfo();
            });

             function lasFloresInfo()
             {
                var url=$('#mapa_form').attr('action') + "/LasFlores";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgLasFlores').click(function(){
                lasFloresInfo();
            });

             $('#LaPosolera').click(function(){
                var url=$('#mapa_form').attr('action') + "/LaPosolera";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ElCipres').click(function(){
                var url=$('#mapa_form').attr('action') + "/ElCipres";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#HierbaBuena').click(function(){
                var url=$('#mapa_form').attr('action') + "/HierbaBuena";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ChileUno').click(function(){
                var url=$('#mapa_form').attr('action') + "/ChileUno";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ChileDos').click(function(){
                chileDosInfo();
            });

             function chileDosInfo()
             {
                var url=$('#mapa_form').attr('action') + "/ChileDos";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgChileDos').click(function(){
                chileDosInfo();
            });

             $('#ElAchioteWaslala').click(function(){
                var url=$('#mapa_form').attr('action') + "/ElAchioteWaslala";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ElCorozal').click(function(){
                var url=$('#mapa_form').attr('action') + "/ElCorozal";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#LosPotrerios').click(function(){
                var url=$('#mapa_form').attr('action') + "/LosPotrerios";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#CanoDeLosMartinez').click(function(){
                var url=$('#mapa_form').attr('action') + "/CanoDeLosMartinez";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#Waslalita').click(function(){
                var url=$('#mapa_form').attr('action') + "/Waslalita";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#CanoLaCeiba').click(function(){
                var url=$('#mapa_form').attr('action') + "/CanoLaCeiba";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#CiudadWaslala').click(function(){
                var url=$('#mapa_form').attr('action') + "/CiudadWaslala";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#PapayoDos').click(function(){
                var url=$('#mapa_form').attr('action') + "/PapayoDos";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#BarrialColorado').click(function(){
                var url=$('#mapa_form').attr('action') + "/BarrialColorado";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ElGuabo').click(function(){
                elGuaboInfo();
            });

             function elGuaboInfo()
             {
                var url=$('#mapa_form').attr('action') + "/ElGuabo";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgElGuabo').click(function(){
                elGuaboInfo();
            });

             $('#GuayaboArriba').click(function(){
                var url=$('#mapa_form').attr('action') + "/GuayaboArriba";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ZinicaDos').click(function(){
                var url=$('#mapa_form').attr('action') + "/ZinicaDos";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#OcoteKubali').click(function(){
                var url=$('#mapa_form').attr('action') + "/OcoteKubali";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ElBarillal').click(function(){
                elBarrillalInfo();
            });

             function elBarrillalInfo()
             {
                var url=$('#mapa_form').attr('action') + "/ElBarillal";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgElBarillal').click(function(){
                elBarrillalInfo();
            });

             $('#LosMangos').click(function(){
                var url=$('#mapa_form').attr('action') + "/LosMangos";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#PtoViejo').click(function(){
                ptoViejoInfo();
            });

             function ptoViejoInfo()
             {
                var url=$('#mapa_form').attr('action') + "/PtoViejo";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgPtoViejo').click(function(){
                ptoViejoInfo();
            });

             $('#SanPabloKubali').click(function(){
                var url=$('#mapa_form').attr('action') + "/SanPabloKubali";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#EsperanzaKubali').click(function(){
                var url=$('#mapa_form').attr('action') + "/EsperanzaKubali";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#BocaDePiedra').click(function(){
                var url=$('#mapa_form').attr('action') + "/BocaDePiedra";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');

            });

             $('#ElGarrobo').click(function(){
                elGarroboInfo();
            });

             function elGarroboInfo()
             {
                var url=$('#mapa_form').attr('action') + "/ElGarrobo";

                $.post(url, {idComunidad: "1" }, function(data){                    
                    $('#myModalLabel').text(JSON.stringify(data[0].nombreComunidad));
                    $('#ContenidoModal').text(JSON.stringify(data[0].descripcion));
                });

                $('#myModal').modal('show');
             }

             $('.imgElGarrobo').click(function(){
                elGarroboInfo();
            });

        });