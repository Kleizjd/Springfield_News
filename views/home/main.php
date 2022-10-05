<div class="container-fluid bg-dark">
<!-- <div class="row">
	<div class="col">
		<img src="public/img/carousel/NOTICE0.jpg">
	</div>
	<div class="col">
		<img src="public/img/carousel/NOTICE3.jpg">
	</div>
</div>[ pb-3 ]-->
<div class="row" id="latest_new">
				<?php foreach ($listNoticia as $list) : ?>
					<div class="col-sm-2 mx-auto">
						<form name="formNoticia">
							<input type="hidden" name="email" id="email" value="<?= $_SESSION["correo_login"]; ?>">

						<div class="card" style="width: 9rem;">
						<ul class="list-group list-group-flush">
							<li class="list-group">
							<img style="height: 5rem;" src="../../public/img/uploads/<?= $list['portada']; ?>" class="card-img-top" alt="...">
							</li>
							<li class="list-group-item">
							<h5 class="card-title"><?= $list['titulo']; ?></h5>
							</li>
							<li class="list-group-item">
							<a type="button" class="btn btn-primary " data-toggle="modal" id="verN" title="Ver" onclick="openNoticia(<?= $list['id']; ?>)">Ver Noticia</a>
							</li>
						</ul>
						</div>
						</form>
					</div>
				<?php endforeach; ?>
			</div>
</div>



<!-- Iframe google maps-->
<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.705547779504!2d-76.54817868605355!3d3.4217247523726786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a6a1a0473b67%3A0xcc0b0dff71b70350!2sCorporaci%C3%B3n%20Universitaria%20Aut%C3%B3noma%20de%20Nari%C3%B1o!5e0!3m2!1ses!2sco!4v1663697060761!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- //Iframe google maps-->

<!-- Footer pie de pagina -->
<div class="footer">
	<div class="container">
		<br>
		<div class="row footer-info">
			<div class="col-md-4 col-sm-4 footer-info-grid links">
				<h4>ENLACES RÁPIDOS</h4>
				<ul>
					<li><a href="#about">Acerca</a></li>
					<li><a href="#features">Caracteristicas</a></li>
					<li><a href="#skills">Habilidades</a></li>
					<li><a href="#team">Equipo</a></li>
					<li><a href="#">Inicio</a></li>
				</ul>
			</div>
			<div class="col-md-4 col-sm-4 footer-info-grid address">
				<h4>Direccion</h4>
				<address>
					<ul>
						<li>TEQUENDAMA</li>
						<li>Cali Valle</li>
						<li>Colombia</li>
						<li>Telefono : +5 (314) 707-2792</li>
						<li>Email : <a class="mail" href="mailto:jose.dgo97@gmail.com">info jose.dgo97@gmail.com</a></li>
					</ul>
				</address>
			</div>
			<div class="col-md-4 col-sm-4 footer-info-grid email">
				<h4>Boletin</h4>
				<p>Suscríbase a nuestro boletín y le informaremos sobre los proyectos y promociones más recientes.
				</p>

				<form class="newsletter">
					<input class="email" type="email" placeholder="Tu email...">
					<input type="submit" class="submit" value="">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="connect">
			<div class="connect-social">
				<h4>CONECTATE CON NOSOTROS</h4>
				<ul>
					<li><a href="#" class="facebook" title="Go to Our Facebook Page"></a></li>
					<li><a href="#" class="twitter" title="Go to Our Twitter Account"></a></li>
					<li><a href="#" class="googleplus" title="Go to Our Google Plus Account"></a></li>
					<li><a href="#" class="linkedin" title="Go to Our Linkedin Page"></a></li>
					<li><a href="#" class="blogger" title="Go to Our Blogger Account"></a></li>
					<li><a href="#" class="tumblr" title="Go to Our Tumblr Page"></a></li>
					<li><a href="#" class="rss" title="Go to Our RSS Feed"></a></li>
					<li><a href="#" class="youtube" title="Go to Our Youtube Channel"></a></li>
					<li><a href="#" class="vimeo" title="Go to Our Vimeo Channel"></a></li>
					<li><a href="#" class="deviantart" title="Go to Our Deviantart Page"></a></li>
				</ul>
			</div>
		</div>

		<div class="copyright">
			<p>Copyright &copy; <?= date("Y"); ?> Empresa. All Rights Reserved | Design by Aunar Developers </a></p>
		</div>

	</div>
</div>
<!-- //Footer pie de pagina -->