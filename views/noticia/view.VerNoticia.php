<?php getModal('modalNoticia'); ?>

<div class="card">
    <div class="card-header">
        <!-- <h4>Ver Noticia</h4> -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Visualizando Noticia</h4>
                
            </div>
            <div class="col-md-3 text-right">
                <button  type="button" class="btn btn-primary" data-toggle="modal"  title="Buscar" data-target="#modalNoticia"><i class="fa fa-search"></i>Nueva busqueda</button>
            </div>
            
            <div class="col-md-4 text-right">
                <div class="d-flex justify-content-end">
                    
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item" id="verNoticia">Noticia</li>
                        <li class="breadcrumb-item active">Ver Noticia</li>
                    </ol>
            
                </div>
            </div>
            </div>
        </div>
        <div class="card-body">
            <form action="" id="frm_noticia" method="POST" autocomplete="off">
                <?php foreach ($sqlNoticia as $noticia) {} ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm">
                            <div class="row pb-3">
                               
                                <div class="col-sm-1">
                              

                                </div>
                                
                                <div class="col-sm-3 offset-1">
                                    <h4><span class="badge badge-success" id="statnoticia"><?= $noticia["estado"]; ?></span></h4>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col-sm-2">
                                    <label for="code">Codigo del noticia</label>
                                </div>
                                <div class="col-sm">
                                    <input type="text" class="form-control" value="<?= $noticia["id"]; ?>" readonly>
                                </div>
                                <div class="col-sm">
                                    <label for="noticia">Noticia</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="noticia" value="<?= $noticia["titulo"]; ?>" readonly>
                                </div>
                                <div class="col-sm">
                                    <label for="estado">Categoria</label>
                                </div>
                                <div class="col-sm">
                                    <input type="text" class="form-control" id="estado" value="<?= $noticia["categoria"]; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-3">
                                    <label for="description">Descripcion</label>
                                </div>
                                <div class="col-sm">
                                    <textarea rows="4" cols="4" class="form-control" id="description" readonly><?= $noticia["descripcion"]; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal BUSCAR -->
    <div class="modal fade" id="modalSearchnoticia">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
            <div class="modal-content">

                <div class="text-center modal-header">
                    <h3 class="w-100 modal-title">Búsqueda de noticiaos</h3>
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