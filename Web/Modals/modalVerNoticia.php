<style>
	.rating {
		display: flex;
		margin-top: -10px;
		flex-direction: row-reverse;
		margin-left: -4px;
		float: left;
	}

	.rating>input {
		display: none
	}

	.rating>label {
		position: relative;
		width: 19px;
		font-size: 25px;
		color: #ff0000;
		cursor: pointer;
	}

	.rating>label::before {
		content: "\2605";
		position: absolute;
		opacity: 0
	}

	.rating>label:hover:before,
	.rating>label:hover~label:before {
		opacity: 1 !important
	}

	.rating>input:checked~label:before {
		opacity: 1
	}

	.rating:hover>input:checked~label:before {
		opacity: 0.4
	}
</style>
<!-- Modal BUSCAR -->
<div class="modal fade" id="modalVerNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
		<div class="modal-content">
			<div class="text-center modal-header">
				<h3 class="w-100 modal-title">Noticia</h3>
				<button type="button" class="close" data-dismiss="modal" title="Cerrar">
					<i class="fa fa-window-close fa-2x text-danger"></i>
				</button>
			</div>
			<div class="card-body">
				<input type="hidden" name="email" id="email" value="<?= $_SESSION["correo_login"]; ?>">
				<input type="hidden" name="nombre_user" id="nombre_user" value="<?= $_SESSION["nombres"]; ?>">
				<input type="hidden" name="id_noticia" id="id_noticia" value="">
				<div class="row">
					<div class="col-6 border">
						<div class="row">
							<div class="col-5">
								<img class="img__img" id="img_notice" src="../../public/img/svg/upload-user.svg" width="178" height="178" />
								<h4 id="titulo_notice">Titulo</h4>
								<p class="text-muted" id="categoria_notice">categoria_noticia</p>
								<p><input type="checkbox" name="option" id="me_gusta">
									<label for="check1">
										<span class="fa-stack">
											<!-- <i class="far fa-thumbs-up fa-stack-1x"></i> -->
											<i class="fa fa-thumbs-up fa-stack-1x"></i>
										</span>
									</label>
									<b id="n_likes"> 0</b> Me gusta
								</p>
							</div>
							<div class="col-7">
								<div class="row" style="height: 80%;">
									<div class="col">
										<p class="" id="descripcion">descripcion</p>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="rating" id="rating_number">
											<input type="radio" name="rating" value="5" id="5" onclick="califcacion(5)"><label for="5">☆</label>
											<input type="radio" name="rating" value="4" id="4"><label for="4" onclick="califcacion(4)">☆</label>
											<input type="radio" name="rating" value="3" id="3"><label for="3" onclick="califcacion(3)">☆</label>
											<input type="radio" name="rating" value="2" id="2"><label for="2" onclick="califcacion(2)">☆</label>
											<input type="radio" name="rating" value="1" id="1"><label for="1" onclick="califcacion(1)">☆</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-5">
						<div class="row">
							<div class="col">
								<form id="form_comment">
									<div class="input-group">
										<input type="text" class="form-control" name="comentario" id="comentario" placeholder="Realice un comentario" aria-label="Input group example" aria-describedby="btnGroupAddon">
										<div class="input-group-prepend ">
											<button class="btn btn-primary" id="btnGroupAddon" type="submit">
												<i class="far fa-paper-plane"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div class="row">
							<div class="col">
								<div class="border rounded" id="comentar">
									<!-- <p><b>${res.usuario} : </b>${res.comentarios}</b> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function deleteComentario(element) {
		var element = element.id;
		$.ajax({
			url: '../../app/lib/ajax.php',
			method: "post",
			dataType: "JSON",
			data: {
				modulo: "noticia",
				controlador: "noticia",
				funcion: "deleteComentario",
				idComent: element,
				email: $("#email").val(),
				id_noticia: $("#id_noticia").val(),

			},
		}).done((res) => {
			if (res['tipoRespuesta'] == true) {
				var comentario = res.id_comentario.toString();
				$(`[name=${comentario}]`).html("");
			}
		});
	}
	function califcacion(element) {
		$.ajax({url: '../../app/lib/ajax.php',
				method: "post",
				dataType: "JSON",
				data: {
					modulo: "noticia",
					controlador: "noticia",
					funcion: "ratingNoticia",
					email: $("#email").val(),
					id_noticia: $("#id_noticia").val(),
					calificacion: element},});
				}

	$(document).ready(function() {
		$(".modal").on("hidden.bs.modal", function() {
			document.getElementById("5").checked = false;
			document.getElementById("4").checked = false;
			document.getElementById("3").checked = false;
			document.getElementById("2").checked = false;
			document.getElementById("1").checked = false;
		});
		$(document).on("change", "#me_gusta", function(e) {
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
				if (res['tipoRespuesta'] == true) {
					var me_gusta = $("#n_likes").text();
					var suma = parseInt(me_gusta) + 1;
					$("#n_likes").text(suma);
				} else if (res['tipoRespuesta'] == false) {
					var me_gusta = $("#n_likes").text();
					var suma = me_gusta - 1;
					$("#n_likes").text(suma);
				}
			});
		});
		$(document).on("submit", "#form_comment", function(e) {
			e.preventDefault();
			var formData = new FormData(event.target);
			formData.append("modulo", "noticia");
			formData.append("controlador", "noticia");
			formData.append("funcion", "comentaNoticia");
			formData.append("email", $("#email").val());
			formData.append("id_noticia", $("#id_noticia").val());

			$.ajax({
				url: '../../App/lib/ajax.php',
				method: 'POST',
				dataType: 'JSON',
				data: formData,
				cache: false,
				processData: false,
				contentType: false
			}).done((res) => {
				if (res['tipoRespuesta'] == "success") {
					var nombre = $("#nombre_user").val();
					var envia = $("#comentario").val();
					var actual = $("#comentar").val();
					var mensaje = `<div class="border rounded" name="${res.id}"><p><b>${nombre} : </b>${envia}<button type="button" class="btn btn-danger btn-sm float-sm-right" id="${res.id}" onclick="deleteComentario(this)"><i class="fas fa-backspace"></i></button></p></div>`;
					document.getElementById("form_comment").reset();
					$("#comentar").prepend(mensaje);
				}
			});
		});
	});
</script>