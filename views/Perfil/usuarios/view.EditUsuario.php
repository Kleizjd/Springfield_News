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
                        <a class="nav-link" data-toggle="tab" href="#manageUsers" id="manage" role="tab">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#editUserForm" role="tab">Editar usuario</a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Editar Usuario</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <div class="tab-content">
                    <div class="tab-pane active" id="editUserForm">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm col-lg">
                                    <div class="card-header">
                                        <form action="" id="form_EditUsuario" method="POST" autocomplete="off">
                                            <?php foreach ($sqlUsuario as $usuario) {
                                            } ?>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <div class="row pb-3">
                                                            <div class="col-sm-1">
                                                                <button type="submit" class="btn btn-primary" title="Modificar Usuario"><i class="fa fa-save"></i> </button>

                                                            </div>
                                                            <div class="col-sm-1">
                                                                <button type="button" class="btn btn-danger" id="deleteUsuario" title="Eliminar Usuario"><i class="fas fa-trash-alt"></i> </button>

                                                            </div>
                                                            <!-- <div class="col-sm-3 offset-1">
                                                                <h4><span class="badge badge-success" id="statProduct"><?= $usuario["estado_usuario"]; ?></span></h4>
                                                            </div> -->

                                                        </div>

                                                        <div class="row pb-3">
                                                            <div class="col-sm-1">
                                                                <label for="code">Codigo</label>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control" id="code_usuario" name="code_usuario" value="<?= $usuario["id_usuario"]; ?>" readonly>
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <label for="email">correo</label>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="email" name="email" value="<?= $usuario["email"]; ?>">
                                                            </div>
                                                            <div class="col-sm">
                                                                <label for="rol">Rol</label>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <select class="form-control" id="rol" name="rol">
                                                                    <!-- <option name="" id="columnista" value="3">Columnista</option>
                                                                    <option name="" id="lector" value="4">Lector</option> -->
                                                                    <?php $i=0; foreach ($sqlPerfil as $rol) : ?>

                                                                    <?php if ($i > 0) : ?>
                                                                        <?php if ($rol["id"] == $usuario["rolid"]) : ?>

                                                                            <option value="<?= $rol["id"]; ?>" selected><?= $rol["nombre"]; ?></option>
                                                                        <?php else : ?>
                                                                            <option value="<?= $rol["id"]; ?>"><?= $rol["nombre"]; ?></option>
                                                                        <?php endif; ?>
                                                                        <?php endif; $i++;?>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-sm-3">
                                                                <label for="nombre">Nombre</label>
                                                            </div>
                                                            <div class="col-sm">
                                                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuario["nombre"]; ?>">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label for="nombre_completo">Apellido</label>
                                                            </div>
                                                            <div class="col-sm">
                                                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $usuario["apellido"]; ?>">
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
    <script>
        $(document).ready(function() {
            
            $(function EditProduct() {
                $(document).on("submit", "#form_EditUsuario", function(event) {
                    event.preventDefault();

                    var formData = new FormData(event.target);
                    formData.append("modulo", "usuario");
                    formData.append("controlador", "usuario");
                    formData.append("funcion", "editarUsuario");
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
                            title: 'Usuario modificado exitosamente',
                            type: 'success',
                            timer: 111000
                        });
                    });
                });
            });
            $(function deleteUsuario() {
                $(document).on("click", "#deleteUsuario", function() {
                    let status = $("#statProduct").text();
                    swal({
                        type: "warning",
                        title: "Esta seguro que desea eliminar el Usuario?",
                        showCancelButton: true,
                        confirmButtonColor: "#337ab7",
                        confirmButtonText: "Sí",
                        cancelButtonColor: "#d33",
                        cancelButtonText: "No",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then((result) => {
                        if (result.value) {
                            var formData = new FormData($("#form_EditUsuario")[0]);
                            formData.append("modulo", "usuario");
                            formData.append("controlador", "usuario");
                            formData.append("funcion", "borrarUsuario");
                            formData.append("id_usuario", $("#code_usuario").val());
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
                                        title: 'Usuario Eliminada exitosamente',
                                        type: 'success',
                                        timer: 111000,
                                        buttons: false,

                                    }).then(function(){
                                window.location.href = "../../Web/Pages/index.php";
                                        
                                    })
                                }
                            });
                        }
                    });
                });
            });

        });
    </script>