<div class="row">
    <div class="col">
        <div class="newSearch" id="containerModalSearchProduct" >
        <h3 class="w-100 modal-title">Búsqueda de usuarios</h3>

            <table id="tableSearchUser" class="table-bordered table-hover" width="100%">

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
			var tableSearchUser = $("#tableSearchUser").DataTable({
					
					dom: "Bfrtip",
					buttons: [{
						extend: "excelHtml5",
						text: '<i class="fa fa-file-excel"></i>',
						titleAttr: "Exportar a Excel",
						className: "bg-success",
						filename: "Usuarios",
						sheetName: "Usuarios"
					}],
					language: {
						"url": "../../vendor/datatable/language/datatablesSpanish.json"
					},
					destroy: true,
					pageLength: 10,
					autoWidth: true,
					lengthChange: false,
					columnDefs: [{
						"className": "text-center",
						"targets": "_all"
                    }],
                    drawCallback: () => { tableSearchUser.columns.adjust();},
					ajax: {
						url: "../../App/lib/ajax.php",
						method: "POST",
						// method: $(this).prop("method"),
						dataType: "json",
						data: {
							modulo: "usuario",
							controlador: "usuario",
							funcion: "listUsuario",
                            estado: "T"
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
	});
	$(function viewWatchProduct() {
		$(document).on("click", "#verUsuarioVista", function () {
			let data = $("#tableSearchUser").DataTable().row($(this).parents("tr")).data();
			llamarVista("usuario", "usuario", "visualizarUsuario", {id_usuario: data.id_usuario}, true);});});

	$(function viewEditProduct() {
		$(document).on("click", "#viewEditarUsuario", function () {
			let data = $("#tableSearchUser").DataTable().row($(this).parents("tr")).data();
			llamarVista("usuario", "usuario", "viewEditarUsuario", {id_usuario: data.id_usuario}, true);});});
});
 // REMPLAZA CARACTERES
    //          var done = res.replace(/[*+\-^${}()|[\]\\]/g,'');
    //         document.getElementById('cargarVista').innerHTML = "";
    //         $('#cargarVista').html(done); //_jQuery
</script>