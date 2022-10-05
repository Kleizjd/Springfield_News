
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
	<div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
		<div class="modal-content">

			<div class="text-center modal-header">
				<h3 class="w-100 modal-title">Noticia</h3>
				<button type="button" class="close" data-dismiss="modal" title="Cerrar">
					<i class="fa fa-window-close fa-2x text-danger"></i>
				</button>
			</div>

			<div class="card-body">
				<input type="hidden" name="id_noticia" id="id_noticia" value="">

				<div class="row">
					<div class="col-6 border">
						<div class="row">
							<div class="col-5">
								<img class="img__img" id="img_notice" src="public/img/svg/upload-user.svg" width="178" height="178" />

								<h4 id="titulo_notice">Titulo</h4>
								<p class="text-muted" id="categoria_notice">categoria_noticia</p>
								
							</div>
							<div class="col-7">
								<p class="" id="descripcion">descripcion</p>


							</div>
						</div>
					</div>
				


				</div>
			</div>
		</div>
	</div>
</div>
<!-- <style>input[type="checkbox"]:checked + label .fa-thumbs-up {
display: block;
color: blue;
}</style> -->
