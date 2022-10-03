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
                <div class="row">
                    <div class="col">
                   <div class="row">
                    <div class="col">
                    <?php //if (!empty($usuario["imagen_usuario"])): ?>
                        <!-- <img class="" src="<?= $ruta . $usuario["imagen_usuario"]; ?>" alt="<?= preg_replace("/\.[^.]+$/", "", $usuario["imagen_usuario"]); ?>" width  = "178" height = "178" > -->
                    <?php // else : ?>
                        <img class="img__img" src="../../public/img/svg/upload-user.svg" width  = "178" height = "178" />
                    <?php //endif ?>
                    </div>
                    <div class="col">
                    <h1 class="control-label" for="descripcion">Titulo</h1>
                    <p class="text-muted">qwe</p>
                    <p class="" id="descripcion">Titulo</p>
                    </div>
                   </div>
                   
                  


                    <!-- <input type="text" name="" id=""> -->
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Realice su comentario">
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>




<!--  -->
<script>
$(document).ready(function () {
	  /***************************LIST PRODUCT**************************/
	  $(function listNoticia() {
        $(document).on("submit", "#frm_SearchNoticia", function (event) {
			 event.preventDefault();
        if ($("#codes").val()||$("#noticia").val()||$("#status").val()) {
			$("#containerModalSearchProduct").show();
				var status = $('select[name="status"] option:selected').text();
				$("#statusProduct").text(status);


			var tableModalSearchNoticia = $("#tableModalSearchNoticia").DataTable({
					
					dom: "Bfrtip",
					buttons: [{
						extend: "excelHtml5",
						text: '<i class="fa fa-file-excel"></i>',
						titleAttr: "Exportar a Excel",
						className: "bg-success",
						filename: "Noticia",
						sheetName: "Noticia"
					}],
					language: {
						"url": "../../vendor/datatable/language/datatablesSpanish.json"
					},
					destroy: true,
					pageLength: 10,
					autoWidth: false,
					lengthChange: false,
					columnDefs: [{
						"className": "text-center",
						"targets": "_all"
                    }],
                    drawCallback: () => {
						tableModalSearchNoticia.columns.adjust();
					},
					ajax: {
						url: "../../App/lib/ajax.php",
						method: $(this).prop("method"),
						data: {
							modulo: "noticia",
							controlador: "noticia",
							funcion: "listNoticia",
                            idNoticia: $("#idNoticia").val(),
                            noticia: $("#noticia").val(),
                            estado: $("#status").val()
						},
					},
					columns: [
						{data: "id"},
						{data: "titulo"},
						{data: "categoria"},
						{data: "descripcion"},
						{data: "btnVer"},
						{data: "btnEditar"}
					],
				});

          
			} else {
				swal({
					type: "warning",
					title: "Seleccione un criterio de búsqueda"
				});
			}
		});
	});
	$(function viewWatchProduct() {
		$(document).on("click", "#verNoticiaVista", function () {
			let data = $("#tableModalSearchNoticia").DataTable().row($(this).parents("tr")).data();
			llamarVista("noticia", "noticia", "visualizarNoticia", {idNoticia: data.id}, true);});});

	$(function viewEditProduct() {
		$(document).on("click", "#viewEditarNoticia", function () {
			let data = $("#tableModalSearchNoticia").DataTable().row($(this).parents("tr")).data();
			llamarVista("noticia", "noticia", "viewEditarNoticia", {codigo: data.id}, true);
		});
	});
	
});
 // REMPLAZA CARACTERES
    //          var done = res.replace(/[*+\-^${}()|[\]\\]/g,'');
    //         document.getElementById('cargarVista').innerHTML = "";
    //         $('#cargarVista').html(done); //_jQuery
</script>
