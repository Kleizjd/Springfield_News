<?php getModal('modalNoticia'); ?>

<div class="card">
    <div class="card-header">
        <h4>Noticia</h4>
    </div>
    <div class="card-body">
        <form action="" id="frm_Noticia" method="POST" autocomplete="off">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <div class="row pb-3">
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary" title="Crear Noticia"><i class="fa fa-save"></i> </button>

                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-primary" data-toggle="modal" title="Buscar" data-target="#modalNoticia"><i class="fa fa-search"></i></button>

                                <!--  -->
                            </div>
                            <div class="col-sm-1">
                                <button type="reset" class="btn btn-primary" id="reset" title="Limpiar"><i class="fa fa-file"></i> </button>
                            </div>
                        </div>

                        <div class="row pb-3">
                            <!-- <div class="col-sm-1">
                                <label for="validateKey">Id</label>
                            </div> -->
                            <!-- <div class="col-sm-2">
                                <input type="text" class="form-control" id="validateKey" name="id" required '>
                                <input type="text" class="form-control" id="validateKey" name="code" required 
                                data='<?= json_encode(array("typeNit" => "producto", "table" => "product", "field" => "Code_Product")); ?>'>
                            </div> -->
                            <!-- IMAGE ADMIN -->
                            <div class="col-sm">
                                <label for="imagen_noticia" class="d-flex justify-content-center">
                                    <div class="img__wrap border border-dark btn btn-outline-white d-flex justify-content-center">
                                        <?php if (!empty($perfil["imagen_noticia"])) : ?>

                                            <i class="shadow-hover-efect"></i>
                                            <i class="far fa-edit img__description">Cambiar</i>
                                        <?php else : ?>
                                            <img class="img__img" src="../../public/img/svg/upload-user.svg" />
                                            <i class="shadow-hover-efect"></i>
                                            <i class="far fa-edit img__description">Cambiar</i>
                                        <?php endif; ?>
                                    </div>
                                </label>
                            </div>
                            <div class="text-center col-sm">
                                <div class="nombreArchivo"></div>
                                <div class="ContenedorPrevisualizarArchivo"></div>
                                <input type="file" class="subirArchivo" name="imagen_usuario" id="imagen_usuario" accept="image/png, image/jpeg" style="display: none;" data-file-upload="<?= encriptar("usuarios|" . $perfil["id_usuario"] . "|$ruta"); ?>">
                            </div>
                            <div class="col">
                                <label for="titulo">Noticia</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="titulo" required>
                            </div>
                            <div class="col">
                                <label for="categoria">Categoria</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="categoria" id="categoria" required>
                            </div>
                            <div class="row">

                                <div class="col-sm-3">
                                    <label for="descripcion">Descripcion</label>
                                </div>
                                <div class="col-sm">
                                    <textarea rows="4" cols="4" class="form-control" name="descripcion" id="descripcion"></textarea>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>