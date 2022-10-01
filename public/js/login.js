$(document).ready(function () {
    $(document).on("click", ".showPassword", function () {
        let inputpassword = $(this).parent().find("input");
        if ($(inputpassword).val() != "") {
            if ($(inputpassword).prop("type") == "password") {
                $(inputpassword).prop("type", "text");
                $(this).html('<i class="fas fa-eye-slash"></i>');
            } else if ($(inputpassword).prop("type") == "text") {
                $(inputpassword).prop("type", "password");
                $(this).html('<i class="fas fa-eye"></i>');
            }
        }
    });
    (function validarLogin() {
        $(document).on("submit", "#login_form", function (event) {
            event.preventDefault();
            var formData = new FormData(event.target);
            formData.append("modulo", "login");
            formData.append("controlador", "login");
            formData.append("funcion", "crearSesion");

            $.ajax({
                url: 'app/lib/ajax.php',
                method: $(this).attr('method'),
                dataType: 'JSON',
                data: formData,
                cache: false,
                processData: false,
                contentType: false
            }).done((res) => {

                if (res.tipoRespuesta == "success") {
                    location.href = "web/pages";
                } else {
                    swal({ title: "Usuario o Contraseña incorrectos", type: "error" });
                }
            })
        });
    }());

    (function create_account() {
        $("#create_account").on("submit", function (event) {
            event.preventDefault();

            var formData = new FormData(event.target);
            formData.append("modulo", "login");
            formData.append("controlador", "login");
            formData.append("funcion", "registarUsuario");
            formData.append('email', $("#email").val());
            formData.append('password_user', $("#password_user").val());
            formData.append('password_verify', $("#password_verify").val());
            formData.append('nombre', $("#nombre").val());
            formData.append('apellido', $("#apellido").val());
            formData.append('pregunta', $("#pregunta").val());
            formData.append('respuesta', $("#respuesta").val());
            var password = $('#password_user').val();

            var expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

            var validaTexto = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;//crea un objeto con una expresion regular


            var correoValido = expReg.test($("#email").val());
            var nombreValido = validaTexto.test($("#nombre").val());
            var apellidoValido = validaTexto.test($("#apellido").val());
            var respuesta = validaTexto.test($("#respuesta").val());
            
            if (correoValido != true) {
                swal({ title: "El correo electronico NO es válido", type: "error" });
            }else if (nombreValido != true) {
                swal({ title: "El nombre NO es válido", type: "error" });
            }else if (apellidoValido != true) {
                swal({ title: "El apellido NO es válido", type: "error" });
            }else if (respuesta != true) {
                swal({ title: "la respuesta tiene que ser en letras", type: "error" });
            } else {
                if ($("#nombre").val().length <= 15 && $("#apellido").val().length <= 15) {
                if ($("#respuesta").val().length <= 15) {

                    if (password.length > 7 && password.length < 20 || $("#password_user").val().length > 7 && $("#password_user").val().length < 20) {
                        if (password.match(/\d/)) {//numeros
                            if (password.match(/[A-Z]/)) {//Aa
                                // if (password.match(/[@#$%^&+=]/)) {
                                if (password.match(/[a-z]/)) {
                                    $.ajax({
                                        url: 'app/lib/ajax.php',
                                        method: $(this).attr('method'),
                                        dataType: 'JSON',
                                        data: formData,
                                        cache: false,
                                        processData: false,
                                        contentType: false
                                    }).done((res) => {
                                        if (res.tipoRespuesta == "success") {
                                            $(event.target)[0].reset();
                                            swal({ title: "Creacion de usuario exitoso", type: res.tipoRespuesta });
                                        } else if (res.tipoRespuesta == "duplicate") {
                                            swal({ title: "Usuario existente", type: "error" });
                                        } else { swal({ title: "la clave tiene que ser la misma", type: "error" }); }
                                    })
                                // } else {
                                //     swal({ title: "la contraseña debe de almenos tener 1 caracter especial", type: "error" });
                                // }
                            } else {
                                swal({ title: "la contraseña debe de almenos tener 1 una letra en Minuscula", type: "error" });
                            }
                            } else {
                                swal({ title: "la contraseña debe de almenos tener 1 una en Mayuscula", type: "error" });
                            }
                        } else {
                            swal({ title: "la contraseña debe de almenos tener 1 numero ", type: "error" });
                        }

                    } else {
                        swal({ title: "la contraseña debe de tener mas de  8 caracteres y menos 20 ", type: "error" });
                    }
                } else {
                    swal({ title: "La respuesta no debe ser mayor a 15 caracteres", type: "error" });
                }
                } else {
                    swal({ title: "El Nombre o Apellido de usuario no debe superar 15 caracteres", type: "error" });
                }
            }
        });
    }());
    // 1
    (function sendEmail() {
        $(document).on("submit", "#reset_email", function (event) {
            event.preventDefault();
            var formData = new FormData(event.target);
            formData.append("modulo", "login");
            formData.append("controlador", "login");
            formData.append("funcion", "resetByEmail");

            var expReg = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

            var correoValido = expReg.test($("#email").val());

            if (correoValido != true) {
                swal({ title: "El correo electronico NO es válido", type: "error" });
            }else{
            $.ajax({
                url: 'app/lib/ajax.php',
                method: $(this).attr('method'),
                dataType: 'JSON',
                data: formData,
                cache: false,
                processData: false,
                contentType: false
            }).done((res) => {
                
                if (res.tipoRespuesta == "success") {
                    $('#correo_recuperacion').hide();
                    $("#pregunta_segura_valida").show();
                    swal({  title: "Continua" ,type: "success" });
                  
                    $("#correo").text(res.correo);
                    $("#pregunta").text(res.pregunta);
                    $("#email_user").text(res.correo);
                                      
                    // $(#estilo).load("/www/Springfield_News/views/login/reset.php", function() {
                    // $("#correo").text(res.correo);
                    // $("#pregunta").text(res.pregunta); });

                } else {
                    swal({ title: "No existe correo", type: "error" });
                }
            })}
        });
    }());
    // 2
    (function resetPassword() {
        $(document).on("submit", "#reset_password", function (event) {
            event.preventDefault();
            var formData = new FormData(event.target);
            formData.append("modulo", "login");
            formData.append("controlador", "login");
            formData.append("funcion", "camposPassword");
            formData.append("email", $('#correo').text());
            formData.append("respuesta", $('#respuesta').val());

            $.ajax({
                url: 'app/lib/ajax.php',
                method: $(this).attr('method'),
                dataType: 'JSON',
                data: formData,
                cache: false,
                processData: false,
                contentType: false
            }).done((res) => {

                if (res.tipoRespuesta == "success") {
                    swal({ title: "Respuesta correcta", type: "success" });
                    $("#pregunta_segura_valida").hide();
                    $('#cambio_clave_pornueva').show();
                    
                } else {
                    swal({ title: "respuesta incorrecta", type: "error" });
                }
            })
        });
    }());
    // 3
    (function editarClave() {
      $(document).on("submit", "#editarCLave", function (event) {
        event.preventDefault();
        var formData = new FormData(event.target);
        formData.append("modulo", "login");
        formData.append("controlador", "login");
        formData.append("funcion", "editarPassword");
        formData.append("email", $("#email_user").text());
        formData.append("password", $("#nueva_clave").val());
        formData.append("verifica_clave", $("#verifica_clave").val());
        var password = $("#nueva_clave").val();
        if (password.length > 7 && password.length < 20 || $("#verifica_clave").val().length > 7 && $("#verifica_clave").val().length < 20) {
          if (password.match(/\d/)) {// numeros
            if (password.match(/[A-Z]/)) { //A
            if(password.match(/[a-z]/)){//a
              $.ajax({
                url: "app/lib/ajax.php",
                method: $(this).attr("method"),
                dataType: "JSON",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
              }).done((res) => {
                if (res.tipoRespuesta == "success") {
                  swal({ type: "success" });
                  location.href = "";

                } else if(res.tipoRespuesta == "warning") { swal({ title: "la clave no debe haber sido usada ya.", type: "warning" }); }
                else { swal({ title: "las claves no son iguales", type: "error" }); }
              });
            } else {
              swal({ title: "la contraseña debe de almenos tener 1 una letra en Minuscula ", type: "error",});
            }
            } else {
              swal({ title:
                  "la contraseña debe de almenos tener 1 una letra en Mayuscula ", type: "error",});
            }
          } else {
            swal({ title: "la contraseña debe de almenos tener 1 numero ", type: "error", });
          }
        } else {
          swal({
            title: "la contraseña debe de tener mas de  8 caracteres y menos 20 ", type: "error", });
        }
      });
    })();  
});

$('#to_register').on("click", function () { $('#login_form').hide(); $("#create_account").show(); });
$('.panel_join').on("click", function () { $('#create_account').hide(); $("#login_form").show(); });
$('#next').on("click", function () { $('#next').hide();$("#pregunta_segura").show(); });

