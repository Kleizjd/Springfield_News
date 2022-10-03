<?php getModal('modalVerNoticia'); ?>

<div class="card text-center">
	<div class="card-header">
		<h4>Noticia</h4>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="row" id="latest_new">
				<?php $count = 5; $i = 0; foreach ($listNoticia as $list) : ?>
					<?php if ($i == $count) {echo '</div><div class="row">';$count = $count + 5;} $i++; ?>
					<div class="col-sm-2 mx-auto">
						<form name="formNoticia">
							<div class="card" style="height: 10rem;">
								<img style="height: 5rem;" src="../../public/img/uploads/<?= $list['portada']; ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><?= $list['titulo']; ?></h5>

								</div>
							</div>
							<input type="hidden" name="verNorticia" class="numeroCantidadProducto" value="<?= $list['id']; ?>" ReadOnly>
							<div class="row pb-3">
								<div class="col-sm-12">
									<a type="button" class="btn btn-primary " data-toggle="modal" id="verN" title="Ver" onclick="openNoticia(<?= $list['id']; ?>)">Ver Noticia</a>
								</div>
							</div>
						</form>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>


<script>
	function openNoticia(element) {
		$.ajax({
			url: '../../app/lib/ajax.php',
			method: "post",
			dataType: "JSON",
			data: {
				modulo: "noticia",
				controlador: "noticia",
				funcion: "openNoticia",
				id: element,
			},
		}).done((res) => {
			if (res.tipoRespuesta == true) {
				$("#titulo_notice").text(res.titulo);
				$("#descripcion").text(res.descripcion);
				$("#categoria_notice").text(res.categoria);
				$("#img_notice").text(res.portada);
				$('#modalVerNoticia').modal('show');
			}
		});
	}
</script>