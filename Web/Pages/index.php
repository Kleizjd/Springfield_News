<?php include_once "../../Config/Config.php"; include_once "../../App/lib/Helpers.php"; ?>

<?php if (isset($_SESSION["id_usuario"])) :  ?>

  <?php include_once "../Partials/head.php"; ?>

  <body class="bg-light">
    <div id="wrapper">

      <!-- HEADER -->
      <?php include_once "../Partials/header.php"; ?>
      <!-- !HEADER -->

      <!-- SIDE_BAR -->
      <div class="container-fluid">
        <div class="row">
          <?php include_once "../Partials/left_sidebar.php"; ?>
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="lector">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
              <div class="container-fluid" id="cargarVista">
                <?php include_once "../../App/ajax.php"; ?>
              </div>
            </div>
          </main>
        </div>
      </div>
      <!-- !SIDE_BAR -->

      <!-- LOG OUT Modal-->
      <?php include_once "./../partials/log_out.php"; ?>
      <!-- !Logout Modal-->

      <!-- FOOTER -->
      <?php include_once "./../Partials/footer.php"; ?>
      <!-- !FOOTER -->
      <!-- SCRIPTS -->
      <div id="scripts"><?php include_once "./../Partials/scripts.php";  ?></div>
      <!-- !SCRIPTS -->
  </body>

  </html>
  
  <!-- REDIRECT TO LOGIN -- SE REDIRIGE AL LOGIN SI NO HA INICIADO SESIÓN -->
<?php else : header("Location: ../"); ?><?php endif; ?>
<input type="hidden" name="userId" id="userId" value="<?= $_SESSION['id_usuario']; ?>">