<!-- 
<style>
    div.dataTables_wrapper {
        margin: 0 auto;
        width: 80%;
    }
</style> -->
<!-- Modal BUSCAR -->
<div class="modal fade" id="modalVerNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<!-- <div class="modal fade" id="modalSearchProduct"> -->
	<div class="modal-dialog modal-lg" role="document"   style="max-width: 80%;">
		<div class="modal-content">

			<div class="text-center modal-header">
				<h3 class="w-100 modal-title">Noticia</h3>
				<button type="button" class="close" data-dismiss="modal" title="Cerrar">
					<i class="fa fa-window-close fa-2x text-danger"></i>
				</button>
			</div>

			<div class="card-body">
		<input type="hidden" name="email" id="email" value="<?= $_SESSION["correo_login"]; ?>">
		<input type="hidden" name="id_noticia" id="id_noticia" value="">

				<div class="row">
					<div class="col">
						<div class="row">
							<div class="col">
								<img class="img__img" id="img_notice" src="../../public/img/svg/upload-user.svg" width="178" height="178" />
							</div>
							<div class="col">
								<h1 id="titulo_notice">Titulo</h1>
								<p class="text-muted" id="categoria_notice">categoria_noticia</p>
								<p class="" id="descripcion">descripcion</p>
								<p><input type="checkbox" name="" id="me_gusta"><b id="n_likes">0</b> Me gusta</p>

							</div>
						</div>
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="Realice un comentario">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on("change", "#me_gusta", function (e) {
		// alert("hola");
		$.ajax({
			url: '../../app/lib/ajax.php',
			method: "post",
			dataType: "JSON",
			data: {
				modulo: "noticia",
				controlador: "noticia",
				funcion: "likeNoticia",
				email: $("#email").val(),
				id_noticia: $("#id_noticia").val(),
			},
		}).done((res) => {
			if(res['tipoRespuesta'] == true) {
				var me_gusta = $("#n_likes").text();
				var suma = parseInt(me_gusta) + 1;
				$("#n_likes").text(suma);
			} else if(res['tipoRespuesta'] == false)  {
				var me_gusta = $("#n_likes").text();
				var suma = me_gusta - 1;
				$("#n_likes").text(suma);
			}
			// var likes = $("#n_likes").text();
			// var op = $("#n_likes").text();

		});
	});
	</script>