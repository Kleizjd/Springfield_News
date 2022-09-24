<?php //getModal('modalUsuarios'); 
?>

<div class="row page-titles">
   
    <div class="text-center modal-header">
        <h3 class="w-100 modal-title">Búsqueda de usuarios</h3>
        </button>
    </div>

    <div class="card-body">
        <form method="POST" id="frm_SearchUser" action="" autocomplete="off">
            <div class="container-fluid">
                <div class="row">
                    <label class="font-weight-bold">Digite los primeros caracteres</label>
                </div>
                <div class="align-items-center pb-4 border row">
                    <div class="col-8">
                        <div class="row">
                            <div class="p-1 col-4">
                                <label class="font-weight-bold" for="id_usuario">ID</label>

                                <input type="text" name="id_usuario" id="id_usuario" class="form-control">
                            </div>
                            <div class="p-1 col-4">
                                <label class="font-weight-bold" for="correo">Correo:</label>

                                <input type="text" name="correo" id="correo" class="form-control">
                            </div>
                            <div class="p-1 col-4">
                                <label class="font-weight-bold" for="status">Estado</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Seleccione ...</option>
                                    <option value="T">Todos</option>
                                    <option value="activo">Activo</option>
                                    <option value="desactivado">Desactivado</option>
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
            <table id="tableModalSearchUser" class="table-bordered table-hover" width="100%">

                <thead class="table text-white bg-primary thead-primary">
                    <tr>
                        <th>ID</th>
                        <th>Correo</th>
                        <th>Nombre Completo</th>
                        <th>Estado</th>
                        <th>Rol</th>
                        <th>Ver</th>
                        <th>Editar</th>

                    </tr>
                </thead>

                <tbody></tbody>
            </table>
        </div>
    </div>
</div>



<!--  -->
<script>
$(document).ready(function () {
	  /***************************LIST PRODUCT**************************/
	  $(function listProduct() {
        $(document).on("submit", "#frm_SearchUser", function (event) {
			 event.preventDefault();
        if ($("#id_usuario").val()||$("#correo").val()||$("#status").val()) {
			$("#containerModalSearchProduct").show();
				var status = $('select[name="status"] option:selected').text();
				$("#statusProduct").text(status);


			var tableModalSearchUser = $("#tableModalSearchUser").DataTable({
					
					dom: "Bfrtip",
					buttons: [{
						extend: "excelHtml5",
						text: '<i class="fa fa-file-excel"></i>',
						titleAttr: "Exportar a Excel",
						className: "bg-success",
						filename: "CajaCompensacion",
						sheetName: "CajaCompensacion"
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
						tableModalSearchUser.columns.adjust();
					},
					ajax: {
						// method: "post",
						url: "../../App/lib/ajax.php",
						method: $(this).prop("method"),
						// dataType: "json",
						data: {
							modulo: "usuario",
							controlador: "usuario",
							funcion: "listUsuario",
                            id: $("#id_usuario").val(),
                            correo: $("#correo").val(),
                            estado: $("#status").val()
						},
					},
					columns: [
						{data: "id_usuario"},
						{data: "email"},
						{data: "nombre_completo"},
						{data: "estado"},
						{data: "rol"},
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
		$(document).on("click", "#verUsuarioVista", function () {
			let data = $("#tableModalSearchUser").DataTable().row($(this).parents("tr")).data();
			llamarVista("usuario", "usuario", "visualizarUsuario", {id_usuario: data.id_usuario}, true);});});

	$(function viewEditProduct() {
		$(document).on("click", "#viewEditarUsuario", function () {
			let data = $("#tableModalSearchUser").DataTable().row($(this).parents("tr")).data();
			llamarVista("usuario", "usuario", "viewEditarUsuario", {id_usuario: data.id_usuario}, true);});});
});
 // REMPLAZA CARACTERES
    //          var done = res.replace(/[*+\-^${}()|[\]\\]/g,'');
    //         document.getElementById('cargarVista').innerHTML = "";
    //         $('#cargarVista').html(done); //_jQuery
</script>
