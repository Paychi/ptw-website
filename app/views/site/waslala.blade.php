@extends('layouts.home')

@section('titulo')
Waslala
@stop

@section('imagenes')
  <div class="container-img_header">
    {{HTML::image('uploads/header_site/banner_waslala.png','waslala',array("class"=>"img-header"))}}
  </div>
@stop

@section('css')
  <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/css/mapa.css">
@stop

@section('javascript')
  <script src="{{URL::to('/')}}/js/hidden_menu_left.js"></script>
  <script src="{{URL::to('/')}}/js/InfoPlaces.js"></script>       
  <!--<script src="{{URL::to('/')}}/js/jquery-1.3.2.min.js"></script>-->
@stop

@section('content')
  <section>

    <h1 class = "text-center tituloinfo">Waslala</h1>
    <hr />
    <div class="row">
      <div class="col-lg-6">
          <h4>Munucipio de Nicaragua</h4>
          <p>Waslala es una municipalidad de la Región Autónoma de la Costa Caribe Norte, en la República de Nicaragua; 
          el término waslala es una palabra indígena que significa "río de plata".
          {{HTML::Link('http://es.wikipedia.org/wiki/Waslala','Wikipedia')}}</p>
          <p><strong>Superficie:</strong>  1.330 km²</p>
          <p><strong>Altitud:</strong>  329 msnm</p>
          <p><strong>Coordenadas:</strong>  <a href="http://tools.wmflabs.org/geohack/geohack.php?language=es&pagename=Waslala&params=13.233333333333_N_-85.383333333333_E_type:city">13°14′00″N 85°23′00″O</a></p>
      </div>
      <div class="col-lg-6">
          <h4>L&iacute;mites Geogr&aacute;ficos</h4>
          <p><strong>Norte:</strong> Con el municipio de Siuna y San Jos&eacute; de Bocay</p>
          <p><strong>Sur:</strong> Con R&iacute;o Blanco y Rancho Grande</p>
          <p><strong>Este:</strong> Con el municipio de Siuna y Mulukuku</p>
          <p><strong>Oeste:</strong> Con Rancho Grande, El Cu&aacute; y Bocay</p>
      </div>
    </div>

    <hr />

    <div class="row">
      <div class="col-lg-6">
          <h4>Posici&oacute;n Geogr&aacute;fica</h4>
          <p>Se localiza en las coordenadas 13°20` de Latitud Norte y 85°22` de Longitud Oeste.</p>
          <h4>Distancia a Managua</h4>
          <p>Se localiza a 241 Km y a Puerto Cabezas 315 Km.</p>
      </div>
      <div class="col-lg-6">
          <h4>Nombre y Distancia a la cabecera departamental</h4>
          <p>
            Región Autónoma de la Costa Caribe Norte (RACCN), no obstante, 
            por decreto administrativo el municipio es atendido por
            Matagalpa y se encuentra a una distancia de 118 km.
          </p>
      </div>       
    </div>
        
    <h1 class = "text-center tituloinfo">Cobertura del Proyecto en el Municipio</h1>
    <!--{{ HTML::image('img/SegundaWaslala.png', $alt="DRCSports", $attributes = array()) }}-->
      <!--<img src="img\SegundaWaslala.png" alt="" usemap="#map" style="position:absolute;z-index:-1;"/>-->
            
    <svg viewBox="0 0 800 720" preserveAspectRatio="xMinYMin" style="margin-left:5%;" >

                    <!--id: 4-->
        <polygon class="Municipio SanRamonLasVallas" 
                    points="13,359  10,354  12,345   13,338   18,327  37,271  63,255
                          68,259  73,261  83,262  93,265  97,268  98,278  97,286
                          104,299   105,306  102,310  97,318  93,325  90,331  85,325  76,327
                          69,329   58,338   48,344  37,342  31,351  26,357  13,359" 
                    style="fill:#fcf9c2;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular4" class="ImgMapa SanRamonLasVallas" x="50" y="280" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--<text x="30" y="305" style="font-size:8px;">SanRamonLasVallas</text>-->

                    <!--id: 5-->
          <polygon class="Municipio VallasElPastal" 
                    points="13,358  14,361  11,363  17,369  13,369  8,369  5,373  
                          7,377  3,380  8,385  6,391  10,394  9,400  15,403  18,411  24,412  31,415
                          35,409  46,409  69,399  84,394  92,388  85,379  83,371  88,361  82,349  89,330  
                          85,323  76,327  70,327  58,338  48,344  37,342  31,351  26,357  13,358" 
                    style="fill:#fcf7d7;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular5" class="ImgMapa VallasElPastal" x="35" y="360" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 3-->
          <polygon class="Municipio Kaskita"
                    points="98,267  98,274  96,279  98,282  95,286  102,296  105,306    93,326  90,331  96,333  
                          103,334  110,331  117,327  121,325  130,316  130,311  133,307  133,303  133,291  133,284  
                          122,269  123,262  109,263  98,267" 
                    style="fill:#e6cafb;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular3" class="ImgMapa Kaskita" x="98" y="268" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 6-->
          <polygon class="Municipio VallasCentral"
                    points="89,331  82,349  88,361  84,369  84,375  86,379  92,387  94,392  95,404  106,397  108,400  116,398  121,390  134,364 
                          138,356  125,342  120,325  110,331  103,334  89,331" 
                    style="fill:#dbb6fc;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular6" class="ImgMapa VallasCentral" x="93" y="350" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>                    

                      <!--id: 2-->
          <polygon class="Municipio ZinicaUno"
                    points="122,262  112,263  105,263  97,267  87,263  74,261  62,255  88,224  112,195  127,188  128,182  140,173  146,175  
                          150,186  147,195  150,204  160,217  168,215  170,207  185,200  192,195  197,205  210,211  210,220  210,229 
                          209,243  205,243  205,249  189,264  176,253  165,250  156,253  144,245  132,244  124,238  123, 251" 
                    style="fill:#cafcc1;stroke:gray;stroke-width:2; z-index:1;" />

                    <image id="celular2" class="ImgMapa ZinicaUno" x="128" y="210" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 1-->
          <polygon class="Municipio Waslala"
                    points="124,239  123,263  124,269  133,285  134,299  133,307  129,315  140,316  151,322  161,328  170,322  178,326  187,324 
                        195,317  187,311  183,300  171,293  167,286  172,279  181,275  186,269  190,264  179,255  166,251  158,254  151,252  
                        142, 246, 132, 244" 
                     style="fill:#fce7d4;stroke:gray;stroke-width:2; z-index:1;"   />

                     <image id="celular1" class="Waslala"  x="135" y="270" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 7-->
           <polygon class="Municipio SantaMariaKubali"
                    points="146,174  149,171  153,173  150,165  164,168  174,170  182,173  187,181  190,189  192,195  184,202  169,207   
                        168,215  159,216   150,203   147,193   149,186" 
                    style="fill:#b7b7fd;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular7" class="SantaMariaKubali" x="152" y="172" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 8-->
            <polygon class="Municipio BuenosAiresKubali" 
                      points="181,171  151,165  157,157  156,150  161,144  163,139  173,129  173,123  176,121  181,123  185,118  191,117  
                        195,115  202,116  207,124  204,130  205,138  193,147   194,156" 
                      style="fill:#b4fcbc;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular8" class="BuenosAiresKubali" x="165" y="132" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 9-->
            <polygon class="Municipio GuayaboKubali"
                      points="194,156  193,147  205,137  204,130  206,125  214,119  226,122  234,115  237,117  244,101  247,106  244,119  247,124 
                         255,125  261,125  265,129  271,129  279,134  276,142  274,149  272,156  275,162  260,164  239,163  232,166  221,163  199, 162" 
                       style="fill:#fcc7c1;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular9" class="GuayaboKubali" x="220" y="127" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 10-->
             <polygon class="Municipio KubaiCentral"
                      points="239,162  232,165  214,163  200,162  194,157  185,167  181,172  193,194  197,205  211,210  224,217  239,217
                       256,201  258,190  248,173" 
                       style="fill:#fcd4f7;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular10" class="KubaiCentral" x="205" y="172" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 11-->
             <polygon class="Municipio PiedrasBlancas"
                      points="243,101  252,83  256,85  262,85  265,82  269,88  276,85  279,88  291,84  301,96  317,104  327,111  334,121
                       301,127   292,134  279,133  265,128  262,126  258,125   248,125  244,120   248,106" 
                       style="fill:#d7fcc8;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular11" class="PiedrasBlancas" x="265" y="95" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 12-->
             <polygon class="Municipio SectorKum"
                      points="291,83  295,75  301,72  308,74  313,66  320,63  328,57  330,51  334,47  332,41  335,36  331,33  336,28  
                      334,19  350,19  368,18  379,16  375,28  367,31  366,38  360,43  360,51  358,59  360,66  353,74  344,80  333,80
                       328,86  318,91  317,103   300,96" 
                       style="fill:#ccedfc;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular12" class="SectorKum" x="320" y="40" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 13-->
              <polygon class="Municipio LasDelicias"
                      points="379,16   375,29  366,31  366,39  360,44  359,61  360,67  366,73  367,78  381,90  387,91  392,86  397,71  
                        398,64  404,62  409,52  409,43  406,33  406,26  408,13" 
                        style="fill:#dcfcb3;stroke:gray;stroke-width:2; z-index:1;"/>

                        <image id="celular13" class="LasDelicias" x="370" y="35" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 14-->
              <polygon class="Municipio NaranjoArriba"
                    points="408,13  407,23  406,31  408,38  410,45   409,55  416,57  422,56  426,51  432,50  438,44 
                     433,39  433,29  431,26  440,15" 
                     style="fill:#fdd7ee;stroke:gray;stroke-width:2; z-index:1;"/>

                     <image id="celular14" class="NaranjoArriba" x="405" y="15" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 15-->
              <polygon class="Municipio WaslalitaElNaranjo"
                    points="439,16  431,28  434,31  433,39  439,45  451,47  462,48  472,43  476,43  487,31  496,24  490,15  
                      490,9  482,10   476,11   470,17   462,18" 
                      style="fill:#fccad5;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular15" class="WaslalitaElNaranjo" x="445" y="10" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 16-->
              <polygon class="Municipio AguasCalientes" 
                    points="495,25  476,43  468,45  462,52  465,59  482,75  489,65  494,55  503,51  504,45  509,43  504,35  498,32"
                     style="fill:#fbcaf9;stroke:gray;stroke-width:2; z-index:1;"/>

                     <image id="celular16" class="AguasCalientes" x="467" y="38" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 17-->
              <polygon class="Municipio ElNaranjo"
                    points="463,49  438,45  432,51  424,51  421,58  414,57  408,55  404,63  416,70  432,76  443,85  464,91  475,83 
                      482,75   466,59" 
                      style="fill:#b5bdfc;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular17" class="ElNaranjo" x="430" y="48" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 18-->
              <polygon class="Municipio LasTorrez"
                     points="463,91  443,85  432,76  403,63  398,64  396,76  392,87  386,91  397,98  403,101  414,109  426,113  
                      441,114  450,113  451, 101" 
                      style="fill:#fcc0c8;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular18" class="LasTorrez" x="408" y="77" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 19-->
              <polygon class="Municipio LosMilagros"
                    points="503,52  495,54  483,75  460,95  451,102  462,111  474,109  487,114  500,106  514,103  512,92  508,88 
                        510,83  507,81  507,70  500,68  502,58  506,57" 
                      style="fill:#fdd9cb;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular19" class="LosMilagros" x="475" y="75" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 20-->
              <polygon class="Municipio LasNuevesDos"
                        points="514,103  517,123  514,141  506,148  503,128  494,124  494,119  487,114  500,106  514,103" 
                        style="fill:#fce4be;stroke:gray;stroke-width:2; z-index:1;"/>

                        <image id="celular20" class="LasNuevesDos" x="500" y="110" width="25" height="25" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 21-->
              <polygon class="Municipio LasNuevesUno"
                      points="506,148  503,128  493,124   494,119  473,109  462,111  451,104  452,118  479,128  486,135  486,159  496,160" 
                      style="fill:#e6fdd3;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular21" class="LasNuevesUno" x="481" y="128" width="25" height="25" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 22-->
              <polygon class="Municipio ElPijibay"
                       points="496,160  486,160  487,136  479,128  451,119  438,138  429,176  410,171  410,185  408,190  400,196  405,202 
                         406,209  413,227  421,221  422,209  426,203  433,205  445,199  458,201  466,201  480,215  486,217  503,201" 
                       style="fill:#f3fccf;stroke:gray;stroke-width:2; z-index:1;"  />

                       <image id="celular22" class="ElPijibay" x="445" y="155" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 23-->
              <polygon class="Municipio ElPuyus"
                        points="501,201  487,218  488,237  494,254  500,261  510,263  524,275  530,266  538,265  534,260  541,259 
                          537,250  537,245   535,241  542,242   539,237   537,233    532,233   526,230  520,225  514,224  509,219 515, 204" 
                        style="fill:#c7dbfc;stroke:gray;stroke-width:2; z-index:1;"  />

                        <!--<image x="495" y="220" width="30" height="30" xlink:href="http://imageshack.com/a/img661/6610/VoWyVP.png"/>-->
                        <image id="celular23" class="ElPuyus" x="495" y="227" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}" />

                          <!--id: 24-->
              <polygon class="Municipio ElKiawa"
                      points="486,217  480,215  465,201  443,199  431,205  426,203    423,207   421,221  409,230  422,242  432,246  440,256  
                          457,271  461,279  471,268  481,255  493,253  487,236" 
                          style="fill:#ccfce6;stroke:gray;stroke-width:2; z-index:1;"/>

                          <image id="celular24" class="ElKiawa" x="440" y="215" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>                          

                            <!--id: 25-->
              <polygon class="Municipio Sofana"
                      points="523,273   510,264   500,261   493,253   481,255   461,279    457,270   439,256   428,277   429,285  
                         435,293   436,315   448,311   458,320   482,319   490,311    498,311   512,319   510,309   515,301   522,304  
                          523,297  528,297   525,285   532,277   528,275   524,278" 
                        style="fill:#cabbfc;stroke:gray;stroke-width:2; z-index:1;"/>

                        <image id="celular25" class="Sofana" x="462" y="275" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 26-->
              <polygon class="Municipio BuenosAiresDudu"
                      points="513,416  518,422  511,426  499,419  458,419  451,413  442,395  435,370  439,353  439,337  428,323  
                          436,315  448,311  458,320  482,319  490,311  498,311  512,319  509,328  512,336  504,340  510,347  501,356 
                           505,365  503,377  498,384  507,397" 
                         style="fill:#d7fceb;stroke:gray;stroke-width:2; z-index:1;"/>

                         <image id="celular26" class="BuenosAiresDudu" x="455" y="350" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 27-->
             <polygon class="Municipio Dipina"
                      points="511,425  496,419  455,419  450,411  441,419  423,410  393,412  403,415  412,423  410,446  401,457 
                       399,473  418,490  424,499  424,515  438,516  445,523  454,546  470,544  488,545  509,530  523,506 
                        513,504  512,491  520,483  519,461  516,453  518,449  523,441  520,428  526,425  532,428  532,424 
                         526,419  516,421" 
                       style="fill:#cdfdb3;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular27" class="Dipina" x="445" y="460" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 28-->
              <polygon class="Municipio CanoSucio"
                      points="461,579  453,595  443,586  431,584  424,578  416,576  416,571  419,565  419,555  421,547  416,539  
                      420,533  422,527  423,522  424,516  438,517  445,524  454,547  470,545  488,546  494,552  495,559  497,569 
                       495,571  496,574  497,582  502,584  501,588  499,593  496,588  490,591  486,587  483,582  478,585  468,578" 
                       style="fill:#fcc5c8;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular28" class="CanoSucio" x="430" y="545" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 29-->
              <polygon class="Municipio SnAntonioYaro"
                        points="449,606  453,595  443,586  431,584  424,578  416,576  404,573  394,578  394,586  396,595 
                         397,601  391,610  384,617  379,621  379,627  373,637  381,646  380,653  382,660  386,663 
                          399,663  412,666  421,665  431,663  441,664  454,667  456,662  452,657  452,654 
                           448,649  443,642  440,635  445,629  443,624  446,615" 
                         style="fill:#d1fccf;stroke:gray;stroke-width:2; z-index:1;"/>

                         <image id="celular29" class="SnAntonioYaro" x="400" y="610" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 30-->
              <polygon class="Municipio YaroCentral"
                       points="362,563  371,569  378,569  387,575  393,569  398,569  405,574  396,578  395,586  398,595  398,601 
                        392,610  386,617  381,621  380,627  375,637  382,646  381,652  383,659  330,654  315,648  305,657 
                         296,652  298,644  302,639  304,629  312,624  311,613  319,607  324,601  325,590  330,584 
                          330,577  343,564  354,561" 
                      style="fill:#f1d7fc;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular30" class="YaroCentral" x="337" y="600" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>


                        <!--id: 31-->
              <polygon class="Municipio SnJuanYaro"
                      points="394,702  406,687  414,688  422,689  430,683  438,680  443,675  447,675  452,667  442,665  
                      433,663  426,663  413,666  406,665  400,664  395,663  391,662  387,662  383,659  330,654 
                       322,659  318,665  320,670  327,670  332,672  337,680  342,680  348,677  354,677  
                       352,683  352,693  358,699  368,692  375,695  383,704" 
                      style="fill:#e1c2fd;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular31" class="SnJuanYaro" x="360" y="660" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 32-->
              <polygon class="Municipio OcoteTuma"
                      points="341,564  329,578  330,584  324,591  324,602  311,613  312,625  304,631  301,642 
                       287,641  284,628  268,626  264,609  247,605  244,608  237,596  240,591  240,581 
                        254,565  268,562  286,563  296,557  318,564" 
                      style="fill:#ccc5fb;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular32" class="OcoteTuma" x="270" y="575" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
                      
                        <!--id: 33-->
              <polygon class="Municipio ChileTres"
                      points="233,525  231,537  227,536  218,524  195,522  182,525  160,520  154,532  154,549  175,582  199,611 
                       213,619  228,614  238,613  244,608  237,596  240,591  240,581  254,565  258,554  263,544  
                       268,539  260,531"
                       style="fill:#f0cffc;stroke:gray;stroke-width:2; z-index:1;" />

                       <image id="celular33" class="ChileTres" x="190" y="550" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 34-->
              <polygon class="Municipio OcoteYaosca"
                      points="132,483  152,503  163,500  179,508  174,515  176,524  162,522  154,532  154,541  156,548  152,548 
                       147,544  145,543  141,541  135,537  128,533  120,530  115,532  111,530  109,515  95,493  106,481  114,485" 
                       style="fill:#f9c2fc;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular34" class="OcoteYaosca" x="118" y="495" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 35-->
               <polygon class="Municipio VallasAbajo"
                       points="106,466  111,459  109,452  116,446  113,438  106,438  105,434  102,431  98,428  95,419  91,421  85,424 
                        76,438  70,444  68,450  54,452  73,475  81,483  90,485  94,489  96,493  107,483  109,472" 
                        style="fill:#fcb3e0;stroke:gray;stroke-width:2; z-index:1;"/>

                        <image id="celular35" class="VallasAbajo" x="75" y="440" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 36-->
              <polygon class="Municipio SnPedroLasVallas"
                       points="53,451  67,451  70,443  79,436  92,422  94,419  96,403  96,394  91,390  85,394  42,410  34,410 
                        31,415  37,423  42,431  48,439" 
                        style="fill:#edb8fc;stroke:gray;stroke-width:2; z-index:1;"/>

                        <image id="celular36" class="SnPedroLasVallas" x="50" y="406" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 37-->
              <polygon class="Municipio SnRafaelKum"
                       points="360,67  355,72  342,80  333,80  328,87  318,91  317,105  328,111  336,122  355,129  366,136 
                        376,127  381,121  399,119  400,106  396,98  387,91  380,90  367,78  365,73" 
                        style="fill:#c0fcd6;stroke:gray;stroke-width:2; z-index:1;"/>

                        <image id="celular37" class="SnRafaelKum" x="340" y="85" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 38-->
              <polygon class="Municipio SnFranciscoPtoViejo"
                        points="296,165  287,165  283,164  275,162  271,156  279,133  293,134  302,127  336,122  355,127  366,136 
                         372,151  373,169  355,172  345,171  331,169  320,166  315,168  308,168  302,168" 
                       style="fill:#b3d5fb;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular38" class="SnFranciscoPtoViejo" x="315" y="130" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 39-->
             <polygon class="Municipio GuayaboAbajo"
                        points="298,175  297,180  299,186  286,197   293,208   303,218   312,209  338,208  346,199  355,201 
                         359,192  359,185  355,183  355,172  345,171  331,169  320,166  315,168  308,168  300,168" 
                       style="fill:#c7e5fd;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular39" class="GuayaboAbajo" x="308" y="172" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 40-->
              <polygon class="Municipio LaLimonera"
                       points="314,240  305,234  305,229  306,225  305,222  303,218  312,209  338,208  346,199  355,201  371,219  376,229 
                        378,241  369,248  355,247  346,251  336,256  329,252  322,254  319,248" 
                      style="fill:#b3dffc;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular40" class="LaLimonera" x="325" y="210" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 41-->
              <polygon class="Municipio LasJawas"
                        points="304,259  297,257  297,247  285,236  274,232  261,242  261,247  247,258  243,266  261,275  279,309 
                         293,312  296,310  321,310  323,297  321,283  315,271  316,261  324,250  313,259" 
                       style="fill:#d7f4fc;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular41" class="LasJawas" x="275" y="265" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 42-->
             <polygon class="Municipio Kusuli"
                        points="269,355  261,343  261,336  250,318  255,310  261,305  265,301  269,297  275,300  277,306  279,309 
                         293,312  296,310  321,310  322,317  318,327  316,331  314,340  308,346  300,356" 
                       style="fill:#cffbfc;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular42" class="Kusuli" x="269" y="317" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 43-->
             <polygon class="Municipio SanBenito"
                        points="314,356  316,360  320,364  326,368  333,371  345,371  355,351  357,325  361,312  359,299  347,297 
                         336,296  324,298  321,310  322,317  318,327  316,331  314,340  309,346  311,351" 
                       style="fill:#fbd4cf;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular43" class="SanBenito" x="320" y="320" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 44-->
             <polygon class="Municipio StaRosaDudu"
                        points="312,365  316,360  320,364  326,368  333,371  345,371  350,393  357,402  351,404  339,411  340,427 
                         321,445  318,440  309,433  313,425  303,423  282,419  274,411  304,390  308,373" 
                       style="fill:#b5fcec;stroke:gray;stroke-width:2; z-index:1;"/>

                       <image id="celular44" class="StaRosaDudu" x="305" y="380" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                          <!--id: 45-->
             <polygon class="Municipio ZapoteDudu"
                       points="390,413  402,411  425,411  442,419  452,413  449,405  441,395  435,369  438,353  438,335  429,325  421,323 
                        397,324  383,325  378,322  369,329  358,325  356,333  355,350  345,371  349,391  355,402  372,410" 
                      style="fill:#eafbb4;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular45" class="ZapoteDudu" x="380" y="355" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 46-->
             <polygon class="Municipio ArenasBlancas"
                      points="402,455  410,446  411,420  400,414  391,413  372,410  355,402  338,411  338,426  345,426  348,441  368,445 
                       381,446  378,453  379,464  388,463" 
                     style="fill:#b8cefd;stroke:gray;stroke-width:2; z-index:1;"/>

                     <image id="celular46" class="ArenasBlancas" x="360" y="413" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 47-->
             <polygon class="Municipio CeibaDudu"
                      points="354,560  362,562  370,567  378,569  386,575  396,567  404,574  415,575  418,567  419,564  418,551  421,545 
                       416,538  422,528  424,513  423,496  412,485  398,473  402,455  388,463  379,464  379,453  381,446  369,453 
                        365,464  355,466  352,476  353,495  357,503  354,514  353,540  356,545" 
                      style="fill:#fbbde2;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular47" class="CeibaDudu" x="368" y="497" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>


                        <!--id: 48-->
             <polygon class="Municipio OcoteDudu"
                      points="353,496  357,504  354,515  354,540  356,546  354,561  341,564  317,564  294,558  286,563  266,562  254,565 
                       260,545    267,540      261,532  270,523  267,512  289,499  298,506  319,504  325,492  334,485" 
                     style="fill:#d7d2fb;stroke:gray;stroke-width:2; z-index:1;"/>

                     <image id="celular48" class="OcoteDudu" x="290" y="515" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>


                      <!--id: 49-->
             <polygon class="Municipio SnMiguelDudu"
                      points="339,427  320,446  317,440  308,432  314,424  300,423  295,436  286,442  276,446  257,445  236,457  234,473 
                       235,484  244,485  256,491  261,496  267,513  288,499  299,505  320,505  326,493  335,486  354,496  352,476 
                        355,467  365,464  371,453  381,447  368,446  348,440  344,426" 
                      style="fill:#c0fdf8;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular49" class="SnMiguelDudu" x="290" y="455" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 50-->
            <polygon class="Municipio ElSombrero"
                      points="152,436  153,423  156,417  142,413  141,401  120,392  116,398  127,411  126,418  129,428" 
                     style="fill:#bfd5fc;stroke:gray;stroke-width:2; z-index:1;" />

                     <image id="celular50" class="ElSombrero" x="121" y="403" width="25" height="25" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 51-->
            <polygon class="Municipio SnPabloLasVallas"
                     points="129,428  126,420  127,411  116,399  110,400  106,397  95,406  95,419  96,428  104,432  106,437  112,437 
                      115,442  121,439" 
                    style="fill:#e3fcbb;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular51" class="SnPabloLasVallas" x="95" y="403" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 52-->
            <polygon class="Municipio LasFlores"
                     points="149,457  150,446  153,437  129,428  121,440  115,443  107,451  110,457  106,463  109,471  105,482  112,484  131,483  139,469" 
                   style="fill:#fcc7e3;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular52" class="LasFlores" x="113" y="442" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 53-->
            <polygon class="Municipio LaPosolera"
                    points="161,465  149,458  138,470  132,482  139,491  147,498  151,503  156,501  157,500  169,503  178,506  183,499  178,496 
                     169,489  160,479  155,474  158,470" 
                   style="fill:#c6fcef;stroke:gray;stroke-width:2; z-index:1;"/>

                   <image id="celular53" class="LaPosolera" x="140" y="470" width="25" height="25" xlink:href="{{ asset('/img/celular.png') }}"/>

                    <!--id: 54-->
            <polygon class="Municipio ElCipres"
                    points="198,462  188,456  172,454  157,470  156,475  160,479  169,490  178,496  183,500  188,504  193,492  193,484  196, 472" 
                  style="fill:#b2fcd7;stroke:gray;stroke-width:2; z-index:1;"/>

                  <image id="celular54" class="ElCipres" x="164" y="459" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                    <!--id: 55-->
            <polygon class="Municipio HierbaBuena"
                    points="234,484  234,476  233,470  237,455  234,446  222,434  213,430  205,438  197,441  198,462  196,474  194,486  192,494 
                     204,494  211,492  217,489  224,488" 
                   style="fill:#fbb3fd;stroke:gray;stroke-width:2; z-index:1;"/>

                   <image id="celular55" class="HierbaBuena" x="198" y="446" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                    <!--id: 56-->
            <polygon class="Municipio ChileUno"
                    points="219,523  221,502  214,497  211,491  204,495  192,494  188,504  183,501  178,507  173,512  175,522  181,525  194,521  213,523" 
                  style="fill:#fcbdce;stroke:gray;stroke-width:2; z-index:1;"/>

                  <image id="celular56" class="ChileUno" x="187" y="496" width="25" height="25" xlink:href="{{ asset('/img/celular.png') }}"/>

                    <!--id: 57-->
            <polygon class="Municipio ChileDos"
                    points="261,532  270,522  260,494  251,488  242,483  233,484  225,488  218,489  211,492  215,498  221,503  220,524  
                      223,537  230,537  232,525  240,527  252,529" 
                    style="fill:#befcb3;stroke:gray;stroke-width:2; z-index:1;"/>
                    
                    <image id="celular57" class="ChileDos" x="225" y="490" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                    <!--<image x="218" y="495" width="30" height="30" xlink:href="http://imageshack.com/a/img661/6610/VoWyVP.png"/>-->

                      <!--id: 58-->
            <polygon class="Municipio ElAchioteWaslala"
                    points="263,344  260,333  249,317  217,300  223,278  215,267  188,265  184,274  172,280  168,287  171,292  178,298  185,302 
                     187,310  194,316  198,319  200,330  208,338  217,340  224,343  236,342  248,352  255,344" 
                   style="fill:#bdfbc8;stroke:gray;stroke-width:2; z-index:1;"/>

                   <image id="celular58" class="ElAchioteWaslala" x="205" y="304" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                    <!--id: 59-->
            <polygon class="Municipio ElCorozal"
                    points="221,343  236,342  248,352  250,356  242,361  234,385  227,398  218,404  213,407  202,406  193,397  186,383  184,362 
                     202,373  210,365" 
                   style="fill:#fbe2c4;stroke:gray;stroke-width:2; z-index:1;"/>

                   <image id="celular59" class="ElCorozal" x="200" y="363" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>


                    <!--id: 60-->
            <polygon class="Municipio LosPotrerios"
                    points="159,330  171,322  177,326  188,324  195,318  200,321  199,331  209,338  218,340  222,344  211,365  202,373  185,363 
                     178,357  171,338" 
                   style="fill:#fbb3b6;stroke:gray;stroke-width:2; z-index:1;"/>

                   <image id="celular60" class="LosPotrerios" x="175" y="330" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                    <!--id: 61-->
            <polygon class="Municipio CanoDeLosMartinez"
                    points="186,384  185,364  178,358  172,339  158,328  140,316  129,314  126,320  119,327  125,341  136,354  133,363  157,390  179,391" 
                  style="fill:#fafcb4;stroke:gray;stroke-width:2; z-index:1;"/>

                  <image id="celular61" class="CanoDeLosMartinez" x="142" y="342" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                    <!--id: 62-->
            <polygon class="Municipio Waslalita" 
                    points="202,407  193,397  187,384  179,391  158,390  133,365  120,392  141,401  141,412  155,418  153,423  186,423  194,426  195,411" 
                  style="fill:#f1fcc0;stroke:gray;stroke-width:2; z-index:1;"/>

                  <image id="celular62" class="Waslalita" x="155" y="392" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                    <!--id: 63-->
            <polygon class="Municipio CanoLaCeiba"
                    points="197,442  197,460  171,454  160,465  147,458  153,437  154,423  187,424  192,427  194,433" 
                  style="fill:#d7e8fc;stroke:gray;stroke-width:2; z-index:1;"/>

                  <image id="celular63" class="CanoLaCeiba" x="155" y="425" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                    <!--id: 64-->
            <polygon class="Municipio CiudadWaslala"
                    points="225,403  224,400  212,407  202,407  194,412  192,422  193,434  194,440  197,442  205,438  215,429  213,424  216,418 
                     226,416  230,409" 
                   style="fill:#c7fcde;stroke:gray;stroke-width:2; z-index:1;"/>

                   <image id="celular64" class="CiudadWaslala" x="190" y="410" width="25" height="25" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                      <!--id: 65-->
            <polygon class="Municipio PapayoDos"
                     points="258,444  257,421  242,411  229,410  226,416  216,419  213,424  214,430  223,433  229,440  235,445  236,457" 
                   style="fill:#fccdb3;stroke:gray;stroke-width:2; z-index:1;"/>

                   <image id="celular65" class="PapayoDos" x="223" y="412" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            

                      <!--id: 66-->
            <polygon class="Municipio BarrialColorado"
                      points="291,399  279,394  269,394  257,395  241,400  232,402  230,410  242,411  257,421  259,445  275,446  288,441 
                       296,435  302,422  280,419  273,411" 
                     style="fill:#fcd7df;stroke:gray;stroke-width:2; z-index:1;"/>

                     <image id="celular66" class="BarrialColorado" x="255" y="410" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            

                      <!--id: 67-->
            <polygon class="Municipio ElGuabo"
                      points="263,344  255,343  249,353  250,357  242,362  235,385  228,397  225,404  230,410  232,403  241,401  258,396 
                       270,395  280,395  292,400  306,390  308,371  316,359  308,346  298,357  267,354" 
                     style="fill:#fcd8b8;stroke:gray;stroke-width:2; z-index:1;"/>

                     <image id="celular67" class="ElGuabo" x="255" y="360" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                      <!--id: 68-->
            <polygon class="Municipio GuayaboArriba"
                      points="285,196  300,185  297,177  300,175  300,167  294,165  287,165  278,161  270,164  257,164  240,163  258,190  278,188" 
                    style="fill:#d8fcd8;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular68" class="GuayaboArriba" x="265" y="165" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                        <!--id: 69-->
            <polygon class="Municipio ZinicaDos"
                     points="264,239  275,232  285,236  297,246  298,258  314,259  325,250  303,232  306,221  293,207  284,195  278,188  256,192 
                      254,205  239,216" 
                      style="fill:#b9e9fd;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular69" class="ZinicaDos" x="265" y="200" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                        <!--id: 70-->
            <polygon class="Municipio OcoteKubali"
                      points="242,264  248,256  261,246  261,241  265,239  239,217  225,217  209,209  209,241  215,245  229,248  233,261" 
                      style="fill:#fdeaca;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular70" class="OcoteKubali" x="220" y="223" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                        <!--id: 71-->
            <polygon class="Municipio ElBarillal"
                    points="250,316  216,299  222,277  215,267  190,265  207,247  207,243  213,244  228,249  234,260  243,264  260,273  271,295" 
                    style="fill:#fcb3ce;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular71" class="ElBarillal" x="223" y="270" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>

                        <!--id: 72-->                        
            <polygon class="Municipio LosMangos"
                    points="438,136  452,120  452,112  431,114  415,111  404,100  396,98  401,105  401,111  398,120  414,127  421,126" 
                    style="fill:#bcc9fd;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular72" class="LosMangos" x="420" y="108" width="25" height="25" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                        <!--id: 73-->
            <polygon class="Municipio PtoViejo"
                    points="409,184  412,169  423,175  430,175  438,137  421,126  413,128  399,120  379,120  373,130  365,135  370,141  372,161 
                     374,165  384,167  400,171  404,179" 
                     style="fill:#b6f7fb;stroke:gray;stroke-width:2; z-index:1;"/>

                     <image id="celular73" class="PtoViejo" x="385" y="130" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                        <!--id: 74-->
            <polygon class="Municipio SanPabloKubali"
                    points="400,195  409,189  410,184  405,179  401,172  385,167  375,166  357,173  355,177  355,184  361,185  357,192  363,196  
                          381,189" 
                      style="fill:#dccafc;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular74" class="SanPabloKubali" x="370" y="165" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                        <!--id: 75-->
            <polygon class="Municipio EsperanzaKubali"
                    points="412,226  405,208  406,200  400,195  380,190  364,196  358,191  356,201  364,213  373,219  378,239  384,240  409,232" 
                    style="fill:#fcf3b8;stroke:gray;stroke-width:2; z-index:1;"/>

                    <image id="celular75" class="EsperanzaKubali" x="373" y="200" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                        <!--id: 76-->
            <polygon class="Municipio BocaDePiedra"
                    points="358,299  338,296  322,298  322,283  315,270  316,259  326,250  333,255  352,247  367,249  380,240  384,241  410,231 
                     423,243  432,245  440,257  428,276  402,267  397,272  396,282  388,285  381,278  369,279  362,293"
                      style="fill:#fcf1c4;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular76" class="BocaDePiedra" x="365" y="248" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
            
                        <!--id: 77-->
            <polygon class="Municipio ElGarrobo"
                    points="358,299  361,311  358,325  369,329  379,322  382,326  422,323  429,327  436,315 
                      435,291  429,285  428,276  403,267  397,272  396,283  388,285  382,279  370,279  363,294" 
                      style="fill:#fce6b4;stroke:gray;stroke-width:2; z-index:1;"/>

                      <image id="celular77" class="ElGarrobo" x="380" y="290" width="30" height="30" xlink:href="{{ asset('/img/celular.png') }}"/>
          
        </svg>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
                <h4 class="modal-title" id="myModalLabel">

                </h4>

              </div>
              <div class="modal-body">

                <p id="ContenidoModal">

                </p>

                <br />

                <p id="tituloLideres">
                
                </p>

                <p id="ContenidoModalLider" style="margin-left: 20px;">

                </p>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                
              </div>
            </div>
          </div>
        </div>

        <form id="mapa_form" method="POST" action="{{ URL::to('Comunidad') }}">

        </form>

  </section>


    
    <!--<script src="{{URL::to('/')}}/js/jquery.js"></script>
    <script src="{{URL::to('/')}}/js/bootstrap.min.js"></script>-->

@stop

@section('content-der')
@stop

