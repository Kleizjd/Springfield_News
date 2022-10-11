<?php getModal('modalNoticia'); ?>

<!-- Modal -->
<div class="card">
    <div class="card-header headerRegister">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Editar Noticia</h4>

            </div>

            <div class="col-md-7 text-right">
                <div class="d-flex justify-content-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item" id="verNoticia">Noticia</li>
                        <li class="breadcrumb-item active">Editar Noticia</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="" id="form_Editnoticia" method="POST" autocomplete="off">
            <?php foreach ($sqlNoticia as $noticia) {
            } ?>
            <input type="hidden" id="idNoticia" name="idNoticia" value="">
            <input type="hidden" id="foto_actual" name="foto_actual" value="">
            <input type="hidden" id="foto_remove" name="foto_remove" value="0">
            <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
            <div class="row pb-3">
                <div class="col-sm-1">
                    <button type="button" class="btn btn-primary" data-toggle="modal" title="Buscar" data-target="#modalNoticia"><i class="fa fa-search"></i></button>
                </div>
                <div class="col-4">Codigo: <input type="text" class="form-control" id="code_noticia" name="code_noticia" value="<?= $noticia["id"]; ?>" readonly></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="titulo">Noticia<span class="required">*</span></label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="<?= $noticia["titulo"]; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descripción <span class="required">*</span></label>
                        <textarea rows="4" cols="4" class="form-control" id="description" name="description" placeholder="Descripción de la Noticia"><?= $noticia["descripcion"]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria<span class="required">*</span></label>
                        <select class="form-control selectpicker" id="categoria" name="categoria" required="">
                            <option value="">Seleccione...</option>
                            <?php foreach ($noticias_categoria as $categoria) : ?>
                                <?php if ($categoria["id"] == $noticia["categoria"]) : ?>

                                    <option value="<?= $categoria["id"]; ?>" selected><?= $categoria["nombre"]; ?></option>
                                <?php else : ?>
                                    <option value="<?= $categoria["id"]; ?>"><?= $categoria["nombre"]; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="photo">
                        <label for="foto">Foto (570x380)</label>
                        <div class="prevPhoto">
                            <span class="delPhoto notBlock">X</span>
                            <label for="foto"></label>
                            <div>
                                <?php if ($noticia["portada"] != "") : ?>
                                    <img id="img" src="<?= media(); ?>/img/uploads/<?= $noticia["portada"]; ?>">

                                <?php else : ?>
                                    <img id="img" src="<?= media(); ?>/img/uploads/portada_noticia.png">

                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="upimg">
                            <input type="file" name="foto" id="foto">
                        </div>
                        <div id="form_alert"></div>
                    </div>
                </div>
            </div>

            <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText" title="Modificar Noticia">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <!-- <button class="btn btn-danger" type="button" data-dismiss="card"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button> -->
                <button type="button" class="btn btn-danger" id="deletenoticia" title="Eliminar Noticia"><i class="fas fa-trash-alt"></i> </button>

            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(function Editnoticia() {
            $(document).on("submit", "#form_Editnoticia", function(event) {
                event.preventDefault();

                var formData = new FormData(event.target);
                formData.append("modulo", "noticia");
                formData.append("controlador", "noticia");
                formData.append("funcion", "editarNoticia");
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
                    swal({title: 'Noticia modificado exitosamente', type: 'success', });
                });
            });
        });
        $(function deletenoticia() {
            $(document).on("click", "#deletenoticia", function() {
                let status = $("#statnoticia").text();
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
                        var formData = new FormData($("#form_Editnoticia")[0]);
                        formData.append("modulo", "noticia");
                        formData.append("controlador", "noticia");
                        formData.append("funcion", "borrarNoticia");
                        formData.append("Id", $("#code_noticia").val());
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
                                swal({title: 'Noticia Eliminada exitosamente', type: 'success',});
                                var menu = "noticia";
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