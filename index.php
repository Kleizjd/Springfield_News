<?php
if (isset($_SESSION)) {
    header("Location: WEB/Pages/");
} else{
    require_once "views/home/home.php"; 
}
 //include_once "Web/Pages/index.php";  
// require_once "views/login/login.view.php";
// require_once "views/logins_nousado/Session.html.php";
// require_once "views/logins_nousado/sesion.php";