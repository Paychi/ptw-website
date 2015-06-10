
		window.onload = function(){
			$('#BackColor').hide();

			var oyeSi = '';

			$('#CerrarVisor').click(function(){
				$('#BackColor').fadeOut();				
			});

			$('#SiguienteFoto').click(function(){
				var nextt = $(oyeSi).closest('.article').next('.article').find('image');

				if(nextt.length > 0)
				{
					$('#cuadro_imagen').html("");
					var img = document.createElement("img");
					img.style.width = '100%';

					oyeSi = nextt;
						
					img.src = '/ptw-website/public/img/About/'+nextt[0].id;
					$('#cuadro_imagen').append(img);
				}
				else
					$('#BackColor').fadeOut();
			});

			$('#FotoAnterior').click(function(){
				var anterior = $(oyeSi).closest('.article').prev('.article').find('image');

				if(anterior.length > 0)
				{
					$('#cuadro_imagen').html("");
					var img = document.createElement("img");
					img.style.width = '100%';

					oyeSi = anterior;
						
					img.src = '/ptw-website/public/img/About/'+anterior[0].id;
					$('#cuadro_imagen').append(img);
				}
				else
					$('#BackColor').fadeOut();
			});


			

			$('.article').on("click", "image", function () {
				$('#BackColor').fadeIn();
				$('#BackColor').css('z-index','1');

				$('#cuadro_imagen').html("");
				var img = document.createElement("img");
				img.style.width = '100%';

				oyeSi = this;

				img.src = '/ptw-website/public/img/About/'+this.id;
				$('#cuadro_imagen').append(img);
			});			
		};
	