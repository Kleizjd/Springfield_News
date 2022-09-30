<nav class="navbar navbar-expand navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="./">
    <span>
      <img src="../../public/img/logo.jpg" alt="ingesoftware" height="50" width="200">
    </span>
  </a>
  <ul class="navbar-nav px-4 ml-auto">
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="far fa-question-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
        <a class="dropdown-item" href="#">THIS PROGRAM WAS DEVELOPED BY AUNAR</a>
      </div>
    </li>
    <li class="nav-item dropdown no-arrow " id="img_profile_header">

      <div class="d-flex no-block align-items-center p-15 bg-dark text-white m-b-10 " data-toggle="dropdown" id="image_user">
        <img src="../../public/img/user_circle.png" alt="user" class="img-circle" id="img_profile" width="60">
      </div>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <div class="d-flex no-block align-items-center p-15 bg-dark text-white m-b-10" id="img_profile_herence_carga">
          <div id="image_user_list" ><img src="../../public/img/user_circle.png" alt="user" id="img_profile_herence" class="img-circle" width="60"></div>
          <div class="m-l-10">
            <h7 class="m-b-0" id="complete_name_window"></h7>
            <p class=" m-b-0">
              <a class="eml-protected" href="#"></a>
          </div>
        </div>
        <a class="dropdown-item" id="ajustes">Ajustes</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">Salir</a>
      </div>
    </li>
  </ul>
</nav>
<style>
  .img-circle {
    border-radius: 100%
  }
</style>
<script>
  $(document).ready(function() {
    // 	//________________________IMAGEN USUARIO DE PERFIL_______________________________
    $(function loadImageUser() {
      $.ajax({
        url: '../../app/lib/ajax.php',
        method: "post",
        dataType: "JSON",
        data: {
          modulo: "perfil",
          controlador: "perfil",
          funcion: "loadImageUser",
          userId: $("#userId").val()
        },
      }).done((res) => {
        if(res.address != ""){
                  $("#img_profile").attr("src", "../../views/perfil/Files/" + res.address);
        $("#img_profile_herence").attr("src", "../../views/perfil/Files/" + res.address);
        }

        $("#complete_name_window").html(res.nombre_completo);

      });
    });
  });

  //_________________________________________FIN______________________________________________
</script>