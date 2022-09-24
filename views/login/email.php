<div class="d-lg-flex half" id="flex" >
    <div class="bg order-1 order-md-2" style="background-image: url('./public/img/bg_notice.jpg');" id="estilo">

    </div>

    <div class="contents order-2 order-md-1" >

        <div class="container" id="correo_recuperacion">
            <div class="row align-items-center justify-content-center">
                <div class="col">
                    <h3>Recuperar <strong>Contraseña</strong></h3>
                    <label>Correo</label>
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


</div>
<script src="vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="vendor/sweetalert/js/sweetalert2.min.js"></script>
<script src="public/js/login.js"></script>