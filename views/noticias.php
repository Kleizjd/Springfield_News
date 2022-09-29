<div class="card text-center">
	<div class="card-header">
		<h4>Noticia</h4>
	</div>
	<div class="card-body">
		<form action="" id="frm_Noticia" method="POST" autocomplete="off">
			<div class="container-fluid">
				<div class="row" id="latest_new">
					

				
					<!-- <div class="col-sm">
						<div class="card" style="height: 20rem;">
							<img style="height: 7rem;" src="../../views/noticia/news/Explainer.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build </p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
					<div class="col-sm">
						<div class="card" style="height: 20rem;">
							<img style="height: 7rem;" src="../../views/noticia/news/fakenews.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build </p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
					<div class="col-sm">
						<div class="card" style="height: 20rem;">
							<img style="height: 7rem;" src="../../views/noticia/news/stock.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build </p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
					<div class="col-sm">
						<div class="card" style="height: 20rem;">
							<img style="height: 7rem;" src="../../views/noticia/news/whats_new.jpg" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build </p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function() {
		// 	//________________________IMAGEN USUARIO DE PERFIL_______________________________
		$(function loadNoticias() {
			$.ajax({
				url: '../../app/lib/ajax.php',
				method: "post",
				dataType: "JSON",
				data: {
					modulo: "noticia",
					controlador: "noticia",
					funcion: "loadNoticias",
				},
			}).done((res) => {
				// alert(res)
				$('#latest_new').html(res);
			});
		});
	});

	//_________________________________________FIN______________________________________________
</script>