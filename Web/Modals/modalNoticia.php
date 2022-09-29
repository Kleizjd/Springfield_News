<!-- 
<style>
    div.dataTables_wrapper {
        margin: 0 auto;
        width: 80%;
    }
</style> -->
<!-- Modal BUSCAR -->
<div class="modal fade" id="modalNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <!-- <div class="modal fade" id="modalSearchProduct"> -->
    <div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
        <div class="modal-content">

            <div class="text-center modal-header">
                <h3 class="w-100 modal-title">Búsqueda de Noticias</h3>
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">
                    <i class="fa fa-window-close fa-2x text-danger"></i>
                </button>
            </div>

            <div class="card-body">
                <form method="POST" id="frm_SearchProduct" action="" autocomplete="off">
                    <div class="container-fluid">
                        <div class="row">
                            <label class="font-weight-bold">Digite los primeros caracteres</label>
                        </div>
                        <div class="align-items-center pb-4 border row">
                            <div class="col-8">
                                <div class="row">
                                    <div class="p-1 col-4">
                                        <label class="font-weight-bold" for="idNoticia">Id</label>

                                        <input type="text" name="idNoticia" id="idNoticia" class="form-control">
                                    </div>
                                    <div class="p-1 col-4">
                                        <label class="font-weight-bold" for="noticia">Noticia</label>

                                        <input type="text" name="noticia" id="noticia" class="form-control">
                                    </div>
                                    <div class="p-1 col-4">
                                        <label class="font-weight-bold" for="status">Estado</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Seleccione ...</option>
                                            <option value="T">Todos</option>
                                            <option value="A">Actual</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="row">
                                    <div class="col-5 offset-1">
                                        <button type="submit" class="px-3 py-2 btn btn-primary" id="btnSearchProduct" title="Buscar">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <button type="reset" class="px-3 py-2 btn btn-primary" id="btnNewSearch" title="Nueva búsqueda">
                                            <i class="fa fa-file"></i>
                                        </button>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="col-5 offset-1">
                                            <h4><span class="badge badge-success" id="statusProduct"></span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="container">
                <div class="newSearch" id="containerModalSearchProduct" style="display: none;">
                    <table id="tableModalSearchNoticia" class="table-bordered table-hover" width="100%">

                        <thead class="table text-white bg-primary thead-primary">
                            <tr>
                                <th>Id</th>
                                <th>titulo</th>
                                <th>categoria</th>
                                <th>Descripcion</th>
                                <th>Ver</th>
                                <th>Editar</th>

                            </tr>
                        </thead>

                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!--  -->
<script>
$(document).ready(function () {
	  /***************************LIST PRODUCT**************************/
	  $(function listProduct() {
        $(document).on("submit", "#frm_SearchProduct", function (event) {
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
