

<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col">
            <h3>Recuperar <strong>Contraseña</strong></h3>
            <!--[ MODIFICAR CONTRASEÑA ]-->
            <form id="reset_password" method="POST" autocomplete="off" class="overflow-auto">
                <div class="form-group">
                    <label>Pregunta:</label>
                    <input type="question" class="form-control" placeholder="Preguta de seguridad" id="question" required />
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