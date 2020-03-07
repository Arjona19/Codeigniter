
<?php
include_once 'C:\xampp\htdocs\OficialBlockCodes\application\views\Master\HeaderCot.php';
?>

	<section id="fh5co-contact" data-section="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">¿Tienes algun proyecto en mente?</h2>
					<div class="row">
							<div class="col-md-8 col-md-offset-2 subtext to-animate">
								<h3>Platicanos tus ideas</h3>
							</div>
						</div>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				<div class="col-md-6 to-animate">
					<form method="post" id="frmCotizacion"  action="BlockCodes/set_cotizacion" >
					<div class="form-group ">
						<label for="name" class="sr-only">Nombre</label>
						<input id="nombre" name="nombre" class="form-control" placeholder="Nombre completo" type="text">
					</div>
					<div class="form-group ">
						<label for="email" class="sr-only">Correo electronico</label>
						<input id="correo" require="" name="correo" class="form-control" placeholder="Correo electronico" type="email">
					</div>
				</div>
				<div class="col-md-6 to-animate">
						<div class="form-group ">
								<label for="phone" class="sr-only">Telefono</label>
								<input id="telefono" name="telefono" class="form-control" placeholder="Telefono" type="text">
							</div>
							<div class="form-group ">
							<select id="estado" name="estado" class="form-control">
								<option selected>Elija un Estado</option>
								
								<?php
								foreach($dao->result() as $fila){
									echo "<option value=".$fila->IDEstado.">".$fila->Nombre."</option>";
								}?>
											
								

								
							 
								
							</select>
							</div>

				</div>
				<div class="col-md-12 to-animate">
						
							<div class="form-group ">
								<label for="phone" class="sr-only">Nombre de la empresa</label>
								<input id="empresa" name="empresa" class="form-control" placeholder="Nombre de la empresa" type="text">
							</div>
							<div class="form-group ">
								<label for="message" class="sr-only">Escribe aqui tus ideas...</label>
								<textarea name="descripcion" id="descripcion" cols="50" rows="5" class="form-control" placeholder="Escribe aqui tus ideas..."></textarea>
							</div>

				</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="inputState">¿Por qué medio prefiere ser contactado?</label>
							<select name="medio" id="medio" class="form-control">
							  <option selected>Cualquiera</option>
							  <option>Email</option>
								<option>Telefono</option>
							</select>
						  </div>
					
				</div>
				<div class="form-group col-md-12">
					<label for="inputState">Servicios a elegir*</label>
			  <div class="form-check">
			 <input name="servicio1" class="form-check-input" type="checkbox" value="Página Web" id="paginaweb">
			 <label class="form-check-label" for="paginaweb">
			   Página Web
			 </label>
		   </div>
		   <div class="form-check">
			 <input name="servicio2" class="form-check-input" type="checkbox" value="Aplicación móvil" id="app">
			 <label class="form-check-label" for="app">
			  Aplicación móvil
			 </label>
		   </div>
		   <div class="form-check">
			<input name="servicio3" class="form-check-input" type="checkbox" value="Animación 2D Motion Graphics" id="animacion">
			<label class="form-check-label" for="animacion">
			 Animación 2D Motion Graphics
			</label>
		  </div>
		  <div class="form-check">
			<input name="servicio4" class="form-check-input" type="checkbox" value="Fotografía y vídeo" id="fotoyvideo">
			<label class="form-check-label" for="fotoyvideo">
			 Fotografía y vídeo
			</label>
		  </div>
		<div class="form-check">
			 <input name="servicio5" class="form-check-input" type="checkbox" value="Diseño Gráfico" id="diseño">
			 <label class="form-check-label" for="diseño">
			  Diseño Gráfico 
			 </label>
		   </div>
			 </div>
		<a onclick="set_cotizacion()" class="btn btn-primary">Enviar</a>
					<a href="#" class="gotop js-gotop"></a>

		</div>
		</form>
			</section>
		

			
		<?php
 include_once 'C:\xampp\htdocs\OficialBlockCodes\application\views\Master\Footer.php';
 ?>	 
