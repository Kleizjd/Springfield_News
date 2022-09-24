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
                    location.href = "web/pages"
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
            var esValido = expReg.test($("#email").val());
            if (esValido != true) {
                swal({ title: "El correo electronico NO es válido", type: "error" });
            } else {
                if ($("#nombre").val().length <= 15 && $("#apellido").val().length <= 15) {
                    if (password.length > 7 || $("#password_user").val().length > 7) {
                        if (password.match(/\d/)) {//numeros
                            if (password.match(/[A-Z]/) && password.match(/[A-z]/)) {//Aa
                                if (password.match(/[@#$%^&+=]/)) {
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
                                } else {
                                    swal({ title: "la contraseña debe de almenos tener 1 caracter especial", type: "error" });
                                }
                            } else {
                                swal({ title: "la contraseña debe de almenos tener 1 una letra en Mayuscula y 1 una en Minuscula ", type: "error" });
                            }
                        } else {
                            swal({ title: "la contraseña debe de almenos tener 1 numero ", type: "error" });
                        }

                    } else {
                        swal({ title: "la contraseña debe de tener mas de  8 caracteres", type: "error" });
                    }
                } else {
                    swal({ title: "El Nombre o Apellido de usuario no debe superar 15 caracteres", type: "error" });
                }
            }
        });
    }());
    // INCOMPLETO
    (function resetPassword() {
        $(document).on("submit", "#reset_password", function (event) {
            event.preventDefault();
            var formData = new FormData(event.target);
            formData.append("modulo", "login");
            formData.append("controlador", "login");
            formData.append("funcion", "resetPassword");

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
                    swal({ title: "Cambio de contraseña exitosa", type: "error" });
            
                } else {
                    swal({ title: "contraseña en los campos es diferente", type: "error" });
                }
            })
        });
    }());
    
  
    (function sendEmail() {
        $(document).on("submit", "#reset_email", function (event) {
            event.preventDefault();
            var formData = new FormData(event.target);
            formData.append("modulo", "login");
            formData.append("controlador", "login");
            formData.append("funcion", "resetByEmail");
           
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
                    swal({  type: "success" });
                  
                    $("#correo").text(res.correo);
                    $("#pregunta").text(res.pregunta);
                                      
                    // $(#estilo).load("/www/Springfield_News/views/login/reset.php", function() {
                    // $("#correo").text(res.correo);
                    // $("#pregunta").text(res.pregunta); });

                } else {
                    swal({ title: "No existe correo", type: "error" });
                }
            })
        });
    }());
});

$('#to_register').on("click", function () { $('#login_form').hide(); $("#create_account").show(); });
$('.panel_join').on("click", function () { $('#create_account').hide(); $("#login_form").show(); });
$('#next').on("click", function () { $('#next').hide();$("#pregunta_segura").show(); });

