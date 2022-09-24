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


<script src="public/js/login.js"></script>