<?php getModal('modalVerNoticia'); ?>

<div class="card text-center">
	<div class="card-header">
		<h4>Noticia</h4>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="row pb-3" id="latest_new">
				<?php $count = 5; $i = 0; foreach ($listNoticia as $list) : ?>
					<?php if ($i == $count) {echo '</div><div class="row">';$count = $count + 5;} $i++; ?>
					<div class="col-sm-2 mx-auto">
						<form name="formNoticia">
		<input type="hidden" name="email" id="email" value="<?= $_SESSION["correo_login"]; ?>">

						<div class="card" style="width: 10rem;">
						<ul class="list-group list-group-flush">
							<li class="list-group">
							<img style="height: 5rem;" src="../../public/img/uploads/<?= $list['portada']; ?>" class="card-img-top" alt="...">
							</li>
							<li class="list-group-item">
							<h6 class="card-title"><?= $list['titulo']; ?></h6>
							</li>
							<li class="list-group-item">
							<a type="button" class="btn btn-primary " data-toggle="modal" id="verN" data-target="#modalNoticia"title="Ver" onclick="openNoticia(<?= $list['id']; ?>)">Ver Noticia</a>
							</li>
						</ul>
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
				id_Notice: element,
				email: $("#email").val(),

			},
		}).done((res) => {
			if (res.tipoRespuesta == true) {
				$("#titulo_notice").text(res.titulo);
				$("#descripcion").text(res.descripcion);
				$("#categoria_notice").text(res.categoria);
				$("#id_noticia").val(res.id_noticia);
				// alert(res.cantidad);
				$("#n_likes").text(res.total);
				// alert(res.id);
				var imagen_url = "../../public/img/uploads/"+res.portada;
				// var imagen_url = `../../public/img/uploads/${res.portada}`;
				if(res.like === true){$( "#me_gusta" ).prop( "checked", true );} else {$( "#me_gusta" ).prop( "checked", false );}
				$("#img_notice").attr("src",imagen_url);
				$("#img_notice").attr("src",imagen_url);
				$('#modalVerNoticia').modal('show');
				$("#comentar").html("");
				if(res.usuario != undefined){
				$("#comentar").html(`<p><b>${res.usuario} : </b>${res.comentarios}</b>`);
				}
				document.getElementById("form_comment").reset();
			}
		});
	}
</script>