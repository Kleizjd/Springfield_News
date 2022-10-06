<script type="text/javascript" src="../../public/js/global.js"></script>
<?php

extract($_POST);


if (!empty($_POST)) {

    if (isset($ruta) && isset($modulo) && isset($controlador) && isset($funcion)) {
        // echo "<script> alert('servira :'+'". $ruta . $modulo . "/" . $controlador . ".controller.php'); </script>";
        if (is_dir($ruta."App/Controllers/". $controlador)) {
            // echo "<script> alert('servira :'+'../App/Controllers/" . $modulo . "/" . $controlador . ".controller.php'); </script>";

            if (file_exists($ruta."App/Controllers/" . $modulo . "/" . $controlador . ".controller.php")) {
                include_once $ruta."App/Controllers/" . $modulo . "/" . $controlador . ".controller.php";
                $nombreClase = $controlador;
                $objControlador = new $nombreClase("../");
    
                if (method_exists($objControlador, $funcion)) {
                    $objControlador->$funcion();
                } else {
                    die("La función especificada no existe");
                }
            } else {
                die("El controlador especificado no existe");
            }
        } else {
            // echo "<script> alert('servira :'+'../App/Controllers/" . $modulo . "/" . $controlador . ".controller.php'); </script>";
       
            die("El módulo especificado no existe");
        }
    } else {
        if (!isset($modulo)) {
            die("El módulo no esta definido");
        } else if(!isset($controlador)){
            die("El controlador no esta definido");
        }else if(!isset($funcion)){
            die("La función no esta definida");
        }
    }
} else {
    if(file_exists("views/home/main.php")){
        include_once "Config/core.php";

        $noticias= new Core();
        $sql = "SELECT * FROM noticias ORDER BY id DESC LIMIT 5";
        $listNoticia =  $noticias->select_all($sql);
        include_once "views/home/main.php";
        
    } else{
        // include_once "../../views/noticias.php";
       echo "<script>
       var menu = 'noticia';
       llamarVista(menu, menu, 'loadNoticias');

        </script>";
    }
}
