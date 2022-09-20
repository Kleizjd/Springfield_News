<div class="card-body">
	<form method="POST" id="frm_SearchUser" action="" autocomplete="off">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<?php foreach ($notification as $sqlNoti) {
				} ?>
				<h4 class="text-themecolor">Notificaciones</h4>
				<h4 class="m-b-0 m-t-5" id="notificaciones"><?= $sqlNoti["notificaciones"]; ?></h4>

			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="./">Home</a></li>
						<li class="breadcrumb-item active">Notificaciones</li>
					</ol>
					<button type="submit" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-search"></i>Buscar</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<style>
	div.dataTables_wrapper {
		margin: 0 auto;
		width: 80%;
	}
</style>

<div class="container">
	<div class="newSearch" id="containerModalSearchUser" style="display: none;">
		<table id="tableSearchUser" class="table-bordered table-hover" width="100%">

			<thead class="table text-white bg-primary thead-primary">
				<tr>
					<th>Correo</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Nacimiento</th>
					<th>Editar</th>
				</tr>
			</thead>

			<tbody></tbody>
		</table>
	</div>
</div>
<!--  -->
<script>
	$(document).ready(function() {
		$(function listProduct() {
			$(document).on("submit", "#frm_SearchUser", function(event) {
				event.preventDefault();

				$("#containerModalSearchUser").show();
				var status = $('select[name="status"] option:selected').text();
				$("#statusProduct").text(status);

				var tableSearchUser = $("#tableSearchUser").DataTable({
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
						"url": "../../vendor/sb-admin-2-2017/lib/datatables/language/datatablesSpanish.json"
					},
					destroy: true,
					pageLength: 10,
					autoWidth: false,
					lengthChange: false,
					columnDefs: [{
						"className": "text-center",
						"targets": "_all"
					}],
					drawCallback: () => { tableSearchUser.columns.adjust(); },
					ajax: {
						url: "../../app/lib/ajax.php",
						method: $(this).prop("method"),
						data: {
							module: "HelpUser",
							controller: "HelpUser",
							nameFunction: "viewGetHelpUser",
						},

					},
					columns: [{data: "correo"},{data: "titulo"},{data: "descripcion"},{data: "fecha"},{data: "info"},],
				}, );
			});
		});
		$(function viewUsersInfo() {
			$(document).on("click", "#viewUsersInfo", function() {
				let data = $("#tableSearchUser").DataTable().row($(this).parents("tr")).data();
				callView("HelpUser", "HelpUser", "viewUsersInfo", {
					correo: data.correo
				}, true);
			});
		});

	});
</script>