<!-- <div class="d-lg-flex half" id="flex">
    <div class="bg order-1 order-md-2" style="background-image: url('./public/img/bg_notice.jpg');" id="estilo"></div>

    <div class="contents order-2 order-md-1"> -->
<!-- CORREO RECUPERA -->
<div class="container" id="correo_recuperacion">
    <div class="login-box card login-box">
        <div class="card">
            <div class="card-header">
                <div class="justify-content-center row">
                    <div class="col-80">
                        <h3>Recuperar <strong>Contraseña</strong></h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!--[ MODIFICAR CONTRASEÑA ]-->
                <form id="reset_email" method="POST" autocomplete="off" class="overflow-auto">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Correo" id="email" name="email" required />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </form>
                <!--[ !MODIFICAR CONTRASEÑA ]-->
                <div class="separator">
                    <p class="change_link">Ya estas Registrado ?
                        <a id="signin" class="panel_join"> Ingresa </a>
                    </p>
                    <div>
                        <span> &copy;Copyright <?= date("Y"); ?> Aunar Papper</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CORREO RECUPERA -->
<!-- PREGUNTA RECUPERA -->
<div class="container" id="pregunta_segura_valida" style="display: none;">

    <div class="login-box card login-box">
        <div class="card-header">
            <div class="justify-content-center row">
                <div class="col-10">
                    <h3>Recuperar <strong>Contraseña</strong></h3>

                </div>
            </div>
            <div class="card-body">
                <!--[ MODIFICAR CONTRASEÑA ]-->
                <form id="reset_password" method="POST" autocomplete="off" class="overflow-auto form-horizontal">
                    <div align="center">
                        <label id="correo"></label>

                    </div>
                    <div class="">
                        <label class="font-weight-bold">Pregunta:</label>
                        <label id="pregunta"></label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Respuesta" id="respuesta" required />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </form>
                <!--[ !MODIFICAR CONTRASEÑA ]-->
            </div>
        </div>
    </div>
</div>
<!-- PREGUNTA RECUPERA -->
<!-- PREGUNTA RECUPERA -->
<div class="container" id="cambio_clave_pornueva" style="display: none;">

    <div class="login-box card login-box">
        <div class="card-header">
            <div class="justify-content-center row">
                <div class="col-10">
                    <h3>Recuperar <strong>Contraseña</strong></h3>

                </div>
            </div>
            <div class="card-body">
                <!--[ MODIFICAR CONTRASEÑA ]-->
                <form id="reset_password" method="POST" autocomplete="off" class="overflow-auto form-horizontal">
                    <div align="center">
                        <label id="correo" name="correo"></label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nueva contraseña" name="nueva_clave" id="nueva_clave" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Verifica contraseña" name="verifica_clave"  id="verifica_clave" required />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </form>
                <!--[ !MODIFICAR CONTRASEÑA ]-->
            </div>
        </div>
    </div>
</div>
<!-- PREGUNTA RECUPERA -->

<!-- </div>
</div> -->
<script src="vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="vendor/sweetalert/js/sweetalert2.min.js"></script>
<script src="public/js/login.js"></script>