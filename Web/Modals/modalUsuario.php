<!-- Modal BUSCAR -->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
        <div class="modal-content">

            <div class="text-center modal-header">
                <h3 class="w-100 modal-title">Crear de Usuario</h3>
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">
                    <i class="fa fa-window-close fa-2x text-danger"></i>
                </button>
            </div>

            <div class="card-body">
                <form method="POST" id="frm_crea_usuario" action="" autocomplete="off">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm col-lg">
                                 <div class="container-fluid">
                                    <div class="row pb-3">
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                                        </div>
                                        <div class="col-1">
                                            <label for="rol">Rol</label>
                                        </div>
                                        <div class="col-3">
                                            <div class="row">
                                                <select name="rol" name="rol" class="form-control">
                                                    <option value="">Seleccione...</option>
                                                    <!-- <option value="1">Administrador</option> -->
                                                    <option value="2">Lector</option>
                                                    <option value="3">Columnista</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Correo Electronico">
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group form-group">
                                            <input type="password" class="form-control" placeholder="Contrase&ntilde;a" name="password_user" id="password_user" required />
                                            <button type="button" class="btn btn-outline-primary showPassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group form-group">
                                            <input type="password" class="form-control" placeholder="Validar Contrase&ntilde;a" required name="password_verify" id="password_verify" />
                                            <button type="button" class="btn btn-outline-primary showPassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group text-center">
                                            <b>PREGUNTA DE SEGURIDAD</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select name="pregunta" id="pregunta" class="custom-select" required>
                                                <option selected value="">Seleccione...</option>
                                                <option value="1">cual fue el nombre de su primera mascota?</option>
                                                <option value="3">lugar de nacimiento?</option>
                                                <option value="4">color favorito?</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control border border-primary rounded" placeholder="Respuesta" id="respuesta" name="respuesta" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
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
<!--  -->
<script>
    $(function create_account() {
        $("#frm_crea_usuario").on("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(event.target);
            formData.append("modulo", "usuario");
            formData.append("controlador", "usuario");
            formData.append("funcion", "crearUsuario");
            var password = $('#password_user').val();

            var expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

            var validaTexto = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/; //crea un objeto con una expresion regular


            var correoValido = expReg.test($("#email").val());
            var nombreValido = validaTexto.test($("#nombre").val());
            var apellidoValido = validaTexto.test($("#apellido").val());
            var respuesta = validaTexto.test($("#respuesta").val());

            if (correoValido != true) {
                swal({title: "El correo electronico NO es válido",type: "error"});
            } else if (nombreValido != true) {
                swal({title: "El nombre NO es válido",type: "error"
                });
            } else if (apellidoValido != true) {
                swal({title: "El apellido NO es válido",type: "error"
                });
            } else if (respuesta != true) {
                swal({title: "la respuesta tiene que ser en letras",type: "error"});
            } else {
                if ($("#nombre").val().length <= 15 && $("#apellido").val().length <= 15) {
                    if ($("#respuesta").val().length <= 15) {

                        if (password.length > 7 && password.length < 20 || $("#password_user").val().length > 7 && $("#password_user").val().length < 20) {
                            if (password.match(/\d/)) { //numeros
                                if (password.match(/[A-Z]/)) { //Aa
                                    // if (password.match(/[@#$%^&+=]/)) {
                                    if (password.match(/[a-z]/)) {
                                        $.ajax({
                                            url: '../../App/lib/ajax.php',
                                            method: $(this).attr('method'),
                                            dataType: 'JSON',
                                            data: formData,
                                            cache: false,
                                            processData: false,
                                            contentType: false
                                        }).done((res) => {
                                            if (res.tipoRespuesta == "success") {

                                                $(event.target)[0].reset();
                                                swal({title: "Creacion de usuario exitoso",type: res.tipoRespuesta,timer: 111000,}).then(function(){window.location.reload();})
                                            
                                            } else if (res.tipoRespuesta == "duplicate") {
                                                swal({title: "Usuario existente",type: "error"});
                                            } else {
                                                swal({title: "la clave tiene que ser la misma",type: "error"});
                                            }
                                        })
                                        // } else {
                                        //     swal({ title: "la contraseña debe de almenos tener 1 caracter especial", type: "error" });
                                        // }
                                    } else {
                                        swal({title: "la contraseña debe de almenos tener 1 una letra en Minuscula",type: "error"});
                                    }
                                } else {
                                    swal({title: "la contraseña debe de almenos tener 1 una en Mayuscula",type: "error"});
                                }
                            } else {
                                swal({
                                    title: "la contraseña debe de almenos tener 1 numero ",type: "error"
                                });
                            }

                        } else {
                            swal({ title: "la contraseña debe de tener mas de  8 caracteres y menos 20 ", type: "error"});
                        }
                    } else {
                        swal({title: "La respuesta no debe ser mayor a 15 caracteres",type: "error"});
                    }
                } else {
                    swal({title: "El Nombre o Apellido de usuario no debe superar 15 caracteres", type: "error"
                    });
                }
            }
        });
      
    }());
       
</script>