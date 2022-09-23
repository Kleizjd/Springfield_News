<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('./public/img/bg_notice.jpg');"></div>
    <div class="contents order-2 order-md-1">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col">
            <h3>Recuperar <strong>Contraseña</strong></h3>

                    <!--[ MODIFICAR CONTRASEÑA ]-->
                    <form id="reset_email" method="POST" autocomplete="off" class="overflow-auto">
                        <div class="form-group">
                            <!-- <input type="email" class="form-control" placeholder="Correo" id="email" required /> -->
                            <label>Pregunta:<?php $pregunta["pregunta"] ?></label>
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
</div>
<script src="public/js/login.js"></script>