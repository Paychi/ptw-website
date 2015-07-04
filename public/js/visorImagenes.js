
		window.onload = function(){
			$('#BackColor').hide();

			var oyeSi = '';

			$('#CloseXD').click(function(){
				$('#BackColor').fadeOut();				
			});

			$('#SiguienteFoto').click(function(){
				var nextt = $(oyeSi).closest('.article').next('.article').find('img');

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
				var anterior = $(oyeSi).closest('.article').prev('.article').find('img');

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


			

			$('.article').on("click", "img", function () {
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
	