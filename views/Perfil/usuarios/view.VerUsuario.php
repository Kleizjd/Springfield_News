<div class="card shadow-lg mt-2">
    <div class="badge-dark card-header">
        <div class="row">
            <h4>
                <b>Configuracion</b>
            </h4>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#myProfile" role="tab" id="ajustes">Mi perfil</a>
                </li>
                <?php if ($_SESSION["rolid"] == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#manageUsers" role="tab">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#verUserForm" role="tab">Editar usuario</a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Visualizando Usuario</h4>

                </div>
                <!-- <div class="col-md-3 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" title="Buscar" data-target="#modalUsuario"><i class="fa fa-search"></i>Nueva busqueda</button>
            </div> -->

                <!-- <div class="col-md-4 text-right">
                <div class="d-flex justify-content-end">
                    
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item"><a id="ajustes">Perfil</a></li>
                        <li class="breadcrumb-item" id="verUsuario">Usuario</li>
                        <li class="breadcrumb-item active">Ver Usuario</li>
                    </ol>
            
                </div>
            </div> -->

            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="card-block">
                        <div class="tab-content">
                            <div class="tab-pane active" id="verUserForm">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm col-lg">
                                            <form action="" id="frm_Noticia" method="POST" autocomplete="off">
                                                <?php foreach ($sqlUsuario as $usuario) {
                                                } ?>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <div class="row pb-3">

                                                                <div class="col-sm-1">


                                                                </div>

                                                                <div class="col-sm-3 offset-1">
                                                                    <h4><span class="badge badge-success" id="statUsuario"><?= $usuario["estado_usuario"]; ?></span></h4>
                                                                </div>
                                                            </div>

                                                            <div class="row pb-3">
                                                                <div class="col-sm-2">
                                                                    <label for="code">Codigo del Usuario</label>
                                                                </div>
                                                                <div class="col-sm">
                                                                    <input type="text" class="form-control" value="<?= $usuario["id_usuario"]; ?>" readonly>
                                                                </div>
                                                                <div class="col-sm">
                                                                    <label for="usuario">Usuario</label>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control" id="email_usuario" value="<?= $usuario["email"]; ?>" readonly>
                                                                </div>
                                                                <div class="col-sm">
                                                                    <label for="rol">Rol</label>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <input type="text" class="form-control" id="rol" value="<?php
                                                                                                                            echo (($usuario["rolid"] == '2') ?   'Columnista' : 'Lector'); ?>" readonly>
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
                                </div>
                            </div>
                            <div class="tab-pane" id="manageUsers">
                                <div class="container-fluid">
                                    <?php include_once "../../views/Perfil/usuarios.php";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal BUSCAR -->
<!-- <div class="modal fade" id="modalSearchProduct">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
            <div class="modal-content">

                <div class="text-center modal-header">
                    <h3 class="w-100 modal-title">Búsqueda de Usuarios</h3>
                    <button type="button" class="close" data-dismiss="modal" title="Cerrar">
                        <i class="fa fa-window-close fa-2x text-danger"></i>
                    </button>
                </div>

                <div class="modal-body">

                </div>

            </div>
        </div>
    </div> -->
<!--  -->