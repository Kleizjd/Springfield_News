<?php getModal('modalVerNoticia'); ?>

<div class="card text-center">
	<div class="card-header">
		<h4>Noticia</h4>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="row" id="latest_new">
				<?php $count = 5; $i=0; foreach ($listNoticia as $list) : ?>
				<?php  if( $i == $count) { echo '</div><div class="row">'; $count = $count + 5;}  $i++;?>
					
					<div class="col-sm-2 mx-auto">
						<form name="formNoticia">
							<div class="card" style="height: 10rem;">
								<img style="height: 5rem;" src="../../public/img/uploads/<?= $list['portada']; ?>" class="card-img-top" alt="...">
								<div class="card-body">
								<h5 class="card-title"><?= $list['titulo']; ?></h5>

								</div>
							</div>
							<div class="row pb-3">
								<div class="col-sm-12">
									<button type="button" class="btn btn-primary " data-toggle="modal" id="verN" title="Ver" data-target="#modalVerNoticia" href="javascript:void(0)">Ver Noticia</button>
								</div>
							</div>
							<!-- <input type="hidden" id="verNorticia" name="verNorticia" class="numeroCantidadProducto" value="<?= $list['id']; ?>" ReadOnly>
							<a onclick="openNoticia(this)" class="btn btn-primary" data-target="#modalVerNoticia">Ver Noticia</a>
							
							 -->
						</form>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>


<script>
	// 	/****Abrir MODAL BUSCAR VerNoticia**
	$(function openNoticia(element) {
		$(document).on("click", "#verN", function () {
			var form = element.parentNode;


		$.ajax({
			url: '../../app/lib/ajax.php',
			method: "post",
			dataType: "JSON",
			data: {
				modulo: "noticia",
				controlador: "noticia",
				funcion: "openNoticia",
				id: form.verNorticia.value,
			},
		}).done((res) => {
			$('#successForm').modal('show');
			// $("#modalVerNoticia .modal-body").html(res);
			// $("#modalVerNoticia").modal({
			// 	backdrop: "static",
			// 	keyboard: false
			// });
		});
		})
		});
		


	// }


	// $(document).ready(function() {
	// 	// 	//________________________IMAGEN USUARIO DE PERFIL_______________________________
	// 	$(function loadNoticias() {
	// 		$.ajax({
	// 			url: '../../app/lib/ajax.php',
	// 			method: "post",
	// 			dataType: "JSON",
	// 			data: {
	// 				modulo: "noticia",
	// 				controlador: "noticia",
	// 				funcion: "loadNoticias",
	// 			},
	// 		}).done((res) => {
	// 			// alert(res)
	// 			$('#latest_new').html(res);
	// 		});
	// 	});

	// });

	//_________________________________________FIN______________________________________________
</script>