<?php

extract($_POST);


if (!empty($_POST)) {

    if (isset($modulo) && isset($controlador) && isset($funcion)) {
        if (is_dir("../../App/Controllers/" . $controlador)) {
            // echo "<script> alert('servira :'+'../../App/Controllers/" . $modulo . "/" . $controlador . ".controller.php'); </script>";

            if (file_exists("../../App/Controllers/" . $modulo . "/" . $controlador . ".controller.php")) {
                include_once "../../App/Controllers/" . $modulo . "/" . $controlador . ".controller.php";
                $nombreClase = $controlador;
                $objControlador = new $nombreClase();
    
                if (method_exists($objControlador, $funcion)) {
                    $objControlador->$funcion();
                } else {
                    die("La función especificada no existe");
                }
            } else {
                die("El controlador especificado no existe");
            }
        } else {
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
}
