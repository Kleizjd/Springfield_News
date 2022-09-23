<?php getModal('modalUsuarios'); ?>

<div class="card">
    <div class="card-header">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Editar Usuario</h4>

            </div>

            <div class="col-md-7 text-right">
                <div class="d-flex justify-content-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a id="ajustes">Perfil</a></li>
                        <li class="breadcrumb-item" id="verNoticia">usuarios</li>
                        <li class="breadcrumb-item active">Editar Usuario</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="" id="form_EditProduct" method="POST" autocomplete="off">
            <?php foreach ($sqlUsuario as $usuario) {
            } ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <div class="row pb-3">
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary" title="Modificar Noticia"><i class="fa fa-save"></i> </button>

                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-primary" data-toggle="modal" title="Buscar" data-target="#modalUsuario"><i class="fa fa-search"></i></button>

                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-danger" id="deleteProduct" title="Eliminar Noticia"><i class="fas fa-trash-alt"></i> </button>

                            </div>
                            <div class="col-sm-3 offset-1">
                                <h4><span class="badge badge-success" id="statProduct"><?= $usuario["estado_usuario"]; ?></span></h4>
                            </div>

                        </div>

                        <div class="row pb-3">
                            <div class="col-sm-1">
                                <label for="code">ID</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="code_usuario" name="code_usuario" value="<?= $usuario["id_usuario"]; ?>" readonly>
                            </div>
                            <div class="col-sm-1">
                                <label for="usuario">correo</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $usuario["email"]; ?>">
                            </div>
                            <div class="col-sm">
                                <label for="rol">Rol</label>
                            </div>
                            <div class="col-sm">
                                <select class="form-control">
                                    <option name="" id="columnista" value="3">Columnista</option>
                                    <option name="" id="lector" value="4">Lector</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-3">
                                <label for="nombre_completo">Nombre Completo</label>
                            </div>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="nombre_completo" readonly value="<?= $usuario["nombre_completo"]; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal BUSCAR -->
<div class="modal fade" id="modalSearchProduct">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
        <div class="modal-content">

            <div class="text-center modal-header">
                <h3 class="w-100 modal-title">Búsqueda de usuarios</h3>
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">
                    <i class="fa fa-window-close fa-2x text-danger"></i>
                </button>
            </div>

            <div class="modal-body">

            </div>

        </div>
    </div>
</div>
<!--  -->
<script>
    $(document).ready(function() {
        $(function EditProduct() {
            $(document).on("submit", "#form_EditProduct", function(event) {
                event.preventDefault();

                var formData = new FormData(event.target);
                formData.append("modulo", "usuario");
                formData.append("controlador", "usuario");
                formData.append("funcion", "editarProducto");
                $.ajax({
                    url: "../../app/lib/ajax.php",
                    method: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false
                }).done((res) => {
                    // alertify.notify(res.mensaje, res.tipoRespuesta, 4);
                    swal({
                        title: 'Noticia modificado exitosamente',
                        type: 'success',
                    });
                });
            });
        });
        $(function deleteProduct() {
            $(document).on("click", "#deleteProduct", function() {
                let status = $("#statProduct").text();
                // alert(status);

                // if(status = "Existente"){

                swal({
                    type: "warning",
                    title: "Esta seguro que desea eliminar el registro?",
                    showCancelButton: true,
                    confirmButtonColor: "#337ab7",
                    confirmButtonText: "Sí",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "No",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then((result) => {
                    if (result.value) {
                        var formData = new FormData($("#form_EditProduct")[0]);
                        formData.append("modulo", "usuario");
                        formData.append("controlador", "usuario");
                        formData.append("funcion", "borrarProducto");
                        formData.append("codigo", $("#code_usuario").val());
                        $.ajax({
                            url: "../../App/lib/ajax.php",
                            method: "POST",
                            dataType: "json",
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false
                        }).done((res) => {
                            if (res.tipoRespuesta == true) {
                                // alertify.notify(res.mensaje, res.tipoRespuesta, 4);
                                swal({
                                    title: 'Noticia Eliminada exitosamente',
                                    type: 'success',
                                });
                                var menu = "usuario";
                                llamarVista(menu, menu, menu);;
                            }
                        });
                    }
                });

                // }
            });
        });

    });
</script>