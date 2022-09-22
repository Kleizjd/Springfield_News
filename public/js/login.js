$(document).ready(function() {
    // document.body.classList.add("login_register");
		$(document).on("click", ".showPassword", function() {
            let inputPassword = $(this).parent().find("input");
            if ($(inputPassword).val() != "") {
                if ($(inputPassword).prop("type") == "password") {
                    $(inputPassword).prop("type", "text");
                    $(this).html('<i class="fas fa-eye-slash"></i>');
                } else if ($(inputPassword).prop("type") == "text") {
                    $(inputPassword).prop("type", "password");
                    $(this).html('<i class="fas fa-eye"></i>');
                }
            }
        });


 (function validarLogin() {
    $(document).on("submit", "#login_form", function (event) {

    // $("#login_form").on("submit", function (event) {
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
                    swal({
                        title: "Usuario o Contraseña incorrectos",
                        type: "error"
                    });
                }
            })
        });
}());
 (function create_account() {
    $("#create_account").on("submit", function (event) { event.preventDefault();

           var formData = new FormData(event.target);
            formData.append("modulo", "login");
            formData.append("controlador", "login");
            formData.append("funcion", "registarUsuario");
            formData.append('email', $("#email").val());
            formData.append('password_user', $("#password_user").val());
            formData.append('password_verify', $("#password_verify").val());
            formData.append('nombre', $("#nombre").val());
            formData.append('apellido', $("#apellido").val());

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
                    swal({ title: "Creacion de usuario exitoso", type: res.tipoRespuesta});
                } else if(res.tipoRespuesta == "duplicate"){swal({ title: "Usuario existente",type: "error"});
                } else {swal({ title: "la clave tiene que ser la misma", type:"error"});}
            })
        });
}());
});

$('#to_register').on("click", function() {$('#login_form').hide();$("#create_account").show();});
$('.panel_join').on("click", function() {$('#create_account').hide();$("#login_form").show();});

