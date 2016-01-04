@extends('layouts.home')

@section('titulo')
About
@stop

@section('css')
	{{ HTML::style('css/baseVisor.css'); }}
@stop

@section('imagenes')
	<div class="container-img_header">
		{{HTML::image('uploads/header_site/banner_about.png','about',array("class"=>"img-header"))}}
	</div>
@stop

@section('content-izq')
	<div>
		<ul class="nav nav-pills nav-stacked">									
			<li><a href='#telemedicina'><span>Proyecto Telemedicina</span></a></li>
			<li class="dropdown"><a href='#' class="dropdown-toggle" data-toggle="dropdown"><span>ADIS <b class="caret"></b></span></a>
				<ul class="dropdown-menu">
					<li><a href="#adis">ASOCIASION</a></li>
					<li><a href="#adis_vision">VISION</a></li>
					<li><a href="#adis_mision">MISION</a></li>
					<li><a href="#adis_perfil">PERFIL</a></li>
                </ul>
			</li>
			<li><a href='#actividades'><span>Actividades</span></a></li>
			<li><a href='#fotos'><span>Fotos</span></a></li>
		</ul>
	</div>
@stop

@section('content')
	<div id="telemedicina">
		<h1 class="text-center tituloinfo">Proyecto Telemedicina</h1>
		
		<p>Desde 2010, este equipo interdisciplinario, dirigido por el Dr. Pritpal Singh, Profesor y 
		Presidente del Departamento de Ingeniería Eléctrica y Computación, ha venido desarrollando 
		una solución para ayudar a conectar mejor los residentes de las aldeas remotas de Waslala con 
		el hospital más cercano, que en algunos casos pueden ser días de viaje para comunicarse con 
		las comunidades distantes, con el fin de mejorar la atención al paciente.</p>

		<p>El sistema requiere tanto de la tecnología y parte humana para su éxito. El sistema de 
		mensajería de texto se ejecuta en los teléfonos celulares de base local, una conexión de 
		servidor y servicio confiable a Internet para la transmisión de datos. Los trabajadores 
		comunitarios de salud locales, entrenados por los estudiantes de enfermería en Villanova en 
		philadelphia, utilizan el sistema para comunicar datos o preguntas acerca de las condiciones 
		del paciente a personal del hospital, quienes se comunican los diagnósticos o 
		recomendaciones de tratamiento de vuelta a la comunidad.</p>

		<p>El equipo incluye ahora los estudiantes y profesores de la UNI (Universidad Nacional de 
		Ingeniería) en Nicaragua, profesional de la salud en Nicaragua, profesores de enfermería 
		Villanova en philadelphia, y profesores de ingeniería Villanova en philadelphia y estudiantes 
		(University, Waslala, Nicaragua Telehealth Project, 2010).</p>

		<p>En viaje realizado por el equipo, los estudiantes de ingeniería de Villanova instalaron un panel 
		solar, energía de respaldo y el cargador para el operador central. Mientras tanto un equipo de 
		enfermería liderado por la doctora Elizabeth Keech Profesora Asistente de enfermería en 
		Villanova, entreno a 15 trabajadores de la salud de la comunidad a utilizar el nuevo sistema, 
		también desarrollaron un modelo de negocio para que el programa sea sostenible en el 
		tiempo.</p>
	</div>
	<hr/>
	<div id="adis">
		<h1 class="text-center tituloinfo">Asociaci&oacute;n de  Desarrollo  Integral y Sostenible.(ADIS)</h1>
		
		<p>En el año 1986 se inicio como pastoral de salud,  luego en 1995 se le da el nombre de Programa Integral en 
		Salud y en el año 2009 el 29 de junio es aprobada en la Asamblea Nacional la personería jurídica como: 
		ASOCIASION DE DESARROLLO INTEGRAL Y    SOSTENIBLE.</p>

		<p>ADIS  se legaliza, por idea del equipo técnico y del Sacerdote   de la Iglesia  Católico de este periodo, 
		debido a que se necesitaba ser una organización reconocida legalmente ya con una larga trayectoria  como 
		programa de  salud ligado a la Iglesia. </p>

		<p>Además de la asamblea de los socios y de una Junta Directiva, la asociación cuenta con la colaboración  de  
		una directiva de los agentes comunitarios de salud, conformada por algunos de los líderes con más experiencia.</p>
		
		<h3 id="adis_vision">VISION</h3>
		
		<p>La Asociación de Desarrollo Integral y Sostenible  (ADIS) en el año 2025 será una Asociación ,unida, 
		Fortalecida actuando y funcionando para mejorar la salud comunitaria tomando en cuenta la organización y 
		capacitación proporcionando un estado de vida saludable , Atraves de la Auto sostenibilidad ,con reconocimiento 
		Nacional e Internacional.</p>
		
		<h3 id="adis_mision">MISION</h3>
		
		<p>Somos una Asociación sin fines de lucro Apolítica que gestiona y promueve un ambiente de paz y Justicia, Valores y 
		respeto a la vida, protección del medio ambiente, Equidad de Género, derechos sexuales y reproductivos  a través de la 
		educación continua y directa con agentes comunitarios y población en general.</p>
		
		<h3 id="adis_perfil">PERFIL</h3>
		
		<p>Es de carácter social sin fines de lucro.</p>  
		
		<p>Nuestro principal objetivo es fortalecer las capacidades técnicas Y organizativas de   la población con la que trabajamos, 
		particularmente en el campo de la salud  comunitaria preventiva, valores Sociales, Medio ambiente y la Equidad de género.</p>

		<p>Comunidades con las que trabajamos  90.</p>
		
		<p>Proyectos que actualmente ejecutamos.</p>
		<ul style="margin-left:50px">
			<li>
				<p>Educación e información en VIH/SIDA se trabaja  1500  adolescentes  de 40 Centros escolares en el área  rural, 
				bridando información  sobre prevención, realización de pruebas rápidas  para diagnostico de VIH.</p>
			</li>
			<li>
				<p>Capacitación a Maestros ,padres y madres de familia, consejos escolares y lideres  de salud.</p>
			</li>
			<li>
				<p>Telesalud. Se Trabaja en 90 comunidades se capacita a 90 líderes de salud ,40 parteras  sobre la 
				accesibilidad de la salud a la población a través de la tecnología celular.</p>
			</li>
			<li>
				<p>Agua para Waslala,  Trabajamos en la construcción de proyectos de agua potable en las comunidades 
				con mayor necesidad pero que tienen buena organización comunitaria,  directivas organizadas y funcionando 
				cuentas de ahorro y beneficiarios consientes de la importancia de ingerir agua limpia.</p>
			</li>
		</ul>
	</div>
	<hr/>
	<div id="actividades">
		<h1 class="text-center tituloinfo">Actividades</h1>
		
		<p>1. Se les capacita en temáticas de salud, cumpliendo el siguiente pensum de estudio en un periodo de  2 años.</p>
		
		<table class="table">
			<tr>
				<td>
					<ul style="margin-left:50px">
						<li>
							<p>Medicamentos esenciales</p>
						</li>
						<li>
							<p>Vías de administración de los medicamentos</p>
						</li>
						<li>
							<p>Canalización</p>
						</li>
						<li>
							<p>Evaluación escrita de aprendizaje</p>
						</li>
					</ul>
				</td>
					
				<td>
					<p>Responsables de la capacitación: UNAN y ADIS</p>
				</td>
			</tr>
			
			<tr>
				<td>
					<ul style="margin-left:50px">
						<li>
							<p>Signos vitales</p>
						</li>
						<li>
							<p>Señales de peligro en  el embarazo, parto y puerperio</p>
						</li>
						<li>
							<p>Señales de peligro en el recién nacido</p>
						</li>
						<li>
							<p>Planificación familiar</p>
						</li>
						<li>
							<p>Escritura y envío de  sms</p>
						</li>
						<li>
							<p>Evaluación escrita de aprendizaje</p>
						</li>
					</ul>
				</td>
					
				<td>
					<p>Responsables de la  capacitación: ADIS, UNAN</p>
				</td>
			</tr>
			
			<tr>
				<td>
					<ul style="margin-left:50px">
						<li>
							<p>Crecimiento y desarrollo de un Niño sano</p>
						</li>
						<li>
							<p>Esquema de vacunación</p>
						</li>
						<li>
							<p>Examen físico</p>
						</li>
						<li>
							<p>Practica de signos vitales</p>
						</li>
						<li>
							<p>Evaluación escrita de aprendizaje</p>
						</li>
					</ul>
				</td>
					
				<td>
					<p>ADIS UNAN</p>
				</td>
			</tr>
			
			<tr>
				<td>
					<ul style="margin-left:50px">
						<li>
							<p>AIEPI comunitario</p>
						</li>
						<li>
							<p>Enfermedades crónicas</p>
						</li>
						<li>
							<p>Enfermedades de Transmisión Sexual</p>
						</li>
						<li>
							<p>Evaluación escrita de aprendizaje</p>
						</li>
					</ul>
				</td>
					
				<td>
					<p>ADIS UNAN</p>
				</td>
			</tr>
			
			<tr>
				<td>
					<ul style="margin-left:50px">
						<li>
							<p>Control prenatal (maniobras de Leopold)</p>
						</li>
						<li>
							<p>Cuidados del recién nacido</p>
						</li>
						<li>
							<p>Signos vitales</p>
						</li>
						<li>
							<p>Elaboración  de productos medicinales</p>
						</li>
					</ul>
				</td>
					
				<td>
					<p>ADIS y MINSA</p>
				</td>
			</tr>
			
			<tr>
				<td>
					<ul style="margin-left:50px">
						<li>
							<p>Primeros auxilios </p>
						</li>
						<li>
							<p>Sutura </p>
						</li>
						<li>
							<p>Sistema urinario</p>
						</li>
						<li>
							<p>Sistema gastrointestinal</p>
						</li>
						<li>
							<p>Evaluación escrita de aprendizaje</p>
						</li>
					</ul>
				</td>
					
				<td>
					<p>UNAN, ADIS y MINSA</p>
				</td>
			</tr>
			
			<tr>
				<td>
					<ul style="margin-left:50px">
						<li>
							<p>Asamblea de evaluación de las actividades realizadas, logros y dificultades encontradas en el año </p>
						</li>
					</ul>
				</td>
					
				<td>
					<p>Equipo ADIS</p>
				</td>
			</tr>
			
		</table>

		<p>2. Realización de visitas de  acompañamiento y supervisión  de manera directa en su casa o comunidad para reforzar   
		conocimiento en cuanto a  medición  de signos vitales, escritura y envío de mensajes,  medidas antropométricas,  maniobras para 
		realizar un control prenatal a las embarazadas de la comunidad y consejería sobre planificación familiar, estos líderes son 
		atendidos por 3 enfermeras  técnicas de campo, cada líder recibe una visita cada 2 meses.</p>

		<p>3. Se realizan charlas con la población participante sobre temas de salud preventiva.</p>

		<p>4. Pesajes para el control de crecimiento y desarrollo de los niños.</p>
		
		<p>5. Pasantías  en el hospital   Fidel Ventura de Waslala, donde tienen la oportunidad de conocer de 
		manera directa la atención a pacientes y a la vez ponen en práctica sus conocimientos  en medición de 
		signos  vitales, pesaje,  aplicación de vacunas, tomas  de gota gruesa para detección  de malaria y 
		controles prenatales.</p>
		
		<p><strong>Estos  90  líderes han recibido del proyecto material básico para trabajo comunitario en salud como:</strong></p>
		<?php
			$material = "1.	Teléfono celular
			2.	Panel solar con todos sus accesorios para cargar teléfonos
			3.	Equipo completo  para toma de  presión arterial
			4.	Termómetro  digital
			5.	Botas de hule
			6.	Carpeta  
			7.	Lápiz y cuaderno
			8.	Foco con batería
			9.	Pesa pediátrica
			10.	Mochila
			11.	Camiseta
			12.	1 manual de  atención  a las enfermedades prevalentes de la infancia.
			13.	Centímetro
			14.	Pinza
			15.	Tijera";
		?>
		<p style="padding-left: 40px;">	{{ nl2br($material)}}	</p>
		
		<p>El proyecto ha invertido en cada líder en estos materiales la cantidad de:C$ 5,612.92 córdobas, más los costos de capacitación.</p>
	</div>
	<hr/>

	<div id="fotos">
		<h1 class="text-center tituloinfo">Fotos del Proyecto de Telemedicina en Waslala-Nicaragua</h1>
		
		<section class="section" id="sec">
			<center><h4 class="colortexto_galeria" >Primeros Líderes en capacitación, aprendiendo a escribir mensajes</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_01.jpg" src="{{ asset('/img/About/about_01.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>					
					<img width="194.031" height="148" id="about_02.jpg" src="{{ asset('/img/About/about_02.jpg') }}" />		
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_03.jpg" src="{{ asset('/img/About/about_03.jpg') }}" />			
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>				
			<center><h4 class="colortexto_galeria">50 primeros lideres capacitados con telesalud</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_04.jpg" src="{{ asset('/img/About/about_04.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_05.jpg" src="{{ asset('/img/About/about_05.jpg') }}" />
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>	
			<center><h4 class="colortexto_galeria">Visitas de  Pali y estudiantes de Villanova  a las comunidades</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_06.jpg" src="{{ asset('/img/About/about_06.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_07.jpg" src="{{ asset('/img/About/about_07.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_08.jpg" src="{{ asset('/img/About/about_08.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_09.jpg" src="{{ asset('/img/About/about_09.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_10.jpg" src="{{ asset('/img/About/about_10.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_11.jpg" src="{{ asset('/img/About/about_11.jpg') }}" />
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>	
			<center><h4 class="colortexto_galeria">Líderes tomando signos vitales  en sus comunidades</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_12.jpg" src="{{ asset('/img/About/about_12.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_13.jpg" src="{{ asset('/img/About/about_13.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_14.jpg" src="{{ asset('/img/About/about_14.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_15.jpg" src="{{ asset('/img/About/about_15.jpg') }}" />
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>	
			<center><h4 class="colortexto_galeria">En visitas de supervisión y seguimiento</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_16.jpg" src="{{ asset('/img/About/about_16.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_17.jpg" src="{{ asset('/img/About/about_17.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_18.jpg" src="{{ asset('/img/About/about_18.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_19.jpg" src="{{ asset('/img/About/about_19.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_20.jpg" src="{{ asset('/img/About/about_20.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_21.jpg" src="{{ asset('/img/About/about_21.jpg') }}" />
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>	
			<center><h4 class="colortexto_galeria">Líderes de Villa el Carmen</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_22.jpg" src="{{ asset('/img/About/about_22.jpg') }}" />
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>	
			<center><h4 class="colortexto_galeria">Lideres de Cua y Bocay</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_23.jpg" src="{{ asset('/img/About/about_23.jpg') }}" />
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>	
			<center><h4 class="colortexto_galeria">Lideres  practicando  y editando mensajes para  enviarlos al sistema</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_24.jpg" src="{{ asset('/img/About/about_24.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_25.jpg" src="{{ asset('/img/About/about_25.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_26.jpg" src="{{ asset('/img/About/about_26.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_27.jpg" src="{{ asset('/img/About/about_27.jpg') }}" />
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>	
			<center><h4 class="colortexto_galeria">Líderes en pasantía en el Hospital Fidel Ventura</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_28.jpg" src="{{ asset('/img/About/about_28.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_29.jpg" src="{{ asset('/img/About/about_29.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_30.jpg" src="{{ asset('/img/About/about_30.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_31.jpg" src="{{ asset('/img/About/about_31.jpg') }}" />
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>	
			<center><h4 class="colortexto_galeria">Primeras visitas  de  Villanova  a Waslala</h4></center>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_32.jpg" src="{{ asset('/img/About/about_32.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_33.jpg" src="{{ asset('/img/About/about_33.jpg') }}" />
				</figure>
			</article>
			<article class="article">
				<figure>
					<img width="194.031" height="148" id="about_34.jpg" src="{{ asset('/img/About/about_34.jpg') }}" />
				</figure>
			</article>
			<p class="colortexto_galeria">
				
			<p>	
		</section>
	</div>

<script src="{{URL::to('/')}}/js/jquery-1.10.2.js"></script>	
<script src="{{URL::to('/')}}/js/visorImagenes.js"></script>	

@stop

@section('content-der')
@stop
