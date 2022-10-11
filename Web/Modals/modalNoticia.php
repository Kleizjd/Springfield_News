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
                <form method="POST" id="frm_SearchNoticia" action="" autocomplete="off">
                    <div class="container-fluid">

                        <div class="align-items-center pb-4  row">
                           
                                <div class="row ">
                                    <div class="col-3">
                                        <label class="font-weight-bold" for="categoria_noticia">Categoria</label>

                                    </div>
                                    <div class="p-1 col-7">
                                        <select name="categoria_noticia" id="categoria_noticia" class="form-control">
                                            <option value="">Seleccione ...</option>
                                            <option value="1">Moda y Farandula</option>
                                            <option value="2">Politica</option>
                                            <option value="3">Tecnologia</option>
                                            <option value="4">Deportes</option>
                                            <option value="T">Todos</option>
                                        </select>
                                    </div>
                                    <div class="col-2 ">
                                        <button type="submit" class="px-3 py-2 btn btn-primary" title="Buscar">
                                            <i class="fa fa-search"></i>
                                        </button>

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
    $(document).ready(function() {
        /***************************LIST PRODUCT**************************/
        $(function listNoticia() {
            $(document).on("submit", "#frm_SearchNoticia", function(event) {
                event.preventDefault();
                if ($("#categoria_noticia").val()) {
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
                                categoria_notice: $("#categoria_noticia").val()
                            },
                        },
                        columns: [{data: "id"},
                                  {data: "titulo" },
                                  {data: "categoria"},
                                  {data: "descripcion"},
                                  {data: "btnVer"},
                                  {data: "btnEditar"}],});
                } else {
                    swal({type: "warning",title: "Seleccione una Categoria"});
                }
            });
        });
        $(function viewWatchProduct() {
            $(document).on("click", "#verNoticiaVista", function() {
                let data = $("#tableModalSearchNoticia").DataTable().row($(this).parents("tr")).data();
                llamarVista("noticia", "noticia", "visualizarNoticia", {
                    idNoticia: data.id
                }, true);
            });
        });

        $(function viewEditProduct() {
            $(document).on("click", "#viewEditarNoticia", function() {
                let data = $("#tableModalSearchNoticia").DataTable().row($(this).parents("tr")).data();
                llamarVista("noticia", "noticia", "viewEditarNoticia", {
                    codigo: data.id
                }, true);
            });
        });

    });
    // REMPLAZA CARACTERES
    //          var done = res.replace(/[*+\-^${}()|[\]\\]/g,'');
    //         document.getElementById('cargarVista').innerHTML = "";
    //         $('#cargarVista').html(done); //_jQuery
</script>