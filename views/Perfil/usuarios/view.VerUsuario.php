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
                        <a class="nav-link active" data-toggle="tab" href="#verUserForm" role="tab">Ver usuario</a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Visualizando Usuario</h4>

                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    
                        <div class="tab-content">
                            <div class="tab-pane active" id="verUserForm">

                                <form action="" id="frm_Noticia" method="POST" autocomplete="off">
                                    <?php foreach ($sqlUsuario as $usuario) {
                                    } ?>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <!-- <div class="row pb-3">

                                                                <div class="col-sm-3 offset-1">
                                                                    <h4><span class="badge badge-success" id="statUsuario"><?= $usuario["estado_usuario"]; ?></span></h4>
                                                                </div>
                                                            </div> -->

                                                <div class="row pb-3">
                                                    <div class="col-sm-1">
                                                        <label for="code">Codigo</label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="text" class="form-control" value="<?= $usuario["id_usuario"]; ?>" readonly>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <label for="usuario">Usuario</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="email_usuario" value="<?= $usuario["email"]; ?>" readonly>
                                                    </div>
                                                    <div class="col-sm">
                                                        <label for="rol">Rol</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" id="rol" value="<?php echo (($usuario["rolid"] == '2') ?   'Columnista' : 'Lector'); ?>" readonly>
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
                                            <div class="col-2">
                                                <?php if (!empty($usuario["imagen_usuario"])): ?>
                                                    <img class="" src="<?= $ruta . $usuario["imagen_usuario"]; ?>" alt="<?= preg_replace("/\.[^.]+$/", "", $usuario["imagen_usuario"]); ?>" width  = "178" height = "178" >
                                                <?php else : ?>
                                                    <img class="img__img" src="../../public/img/svg/upload-user.svg" width  = "178" height = "178" />
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>

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