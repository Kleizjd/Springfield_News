<?php
include_once "../../Config/core.php";
// include_once "Utilities/Utilities.controller.php";
class Perfil extends Core
{
    public function perfil()
    {
        extract($_POST);
        $ruta = "../../views/perfil/Files/";
        $sqlPerfil = "SELECT * FROM usuarios WHERE id_usuario = '$userId' ";
        $Perfil = $this->select_all($sqlPerfil);

        include_once "../../views/Perfil/Perfil.view.php";
    }
    public function loadImageUser()
    {
        extract($_POST);
        $answer = array();
        $ruta = "../../../views/Admin/Files/";
        $sqlUser = "SELECT CONCAT(nombre, ' ', apellido) AS nombre_completo, imagen_usuario FROM usuarios WHERE id_usuario = '$userId' ";
        $user = $this->select($sqlUser);

        $answer["address"] = $user['imagen_usuario'];
        $answer["nombre_completo"] = $user['nombre_completo'];

        echo json_encode($answer);
    }
    public function editEmail()
    {
        extract($_POST);
        // var_dump($_POST);
        $answer = array();

        $sqlVerify = "SELECT id_usuario, email FROM usuarios WHERE email='$actualiza_correo'";
        $sql = $this->select($sqlVerify);
        // var_dump($sql);
        
        if($sql == false){
            $sql = "UPDATE usuarios SET email = ? WHERE id_usuario = $userId";

            $arrData = array($actualiza_correo);
            $request = $this->update($sql, $arrData);
    
            if ($request != 0) {
                unset($_SESSION['correo_login']);
                $_SESSION['correo_login'] = $actualiza_correo;
                $answer['tipoRespuesta'] = "success";
            }
        } else {
            $answer['tipoRespuesta'] = "error";
        }
       
        echo json_encode($answer);
    }
    public function editPassword()
    {
        extract($_POST);
        // var_dump($_POST);
        $answer = array();
        // $message = "la contrasena actual no es correcta";

        $sqlVerify = "SELECT DISTINCT id_usuario, CONCAT(nombre, ' ', apellido) AS nombre_completo, nombre, apellido, password, rolid, email,imagen_usuario FROM usuarios WHERE email='$email' ";
        $sql = $this->select($sqlVerify);
        if ($sql != 0) {

            $passwordDB = $sql['password'];
            if ($actual_password != $new_password) {
                // echo $actual_password. " - ". $passwordDB;

                if (password_verify($actual_password, $passwordDB)) {
                        //  echo $actual_password. " ". $passwordDB;

                    if ($new_password == $confirm_password) {

                        //Encriptar-----------------------------------------------------------------------
                        $passEncrypt = password_hash($new_password, PASSWORD_DEFAULT); //password encripted
                        //---------------------------------------------------------------/contraseña encriptada

                        $sqlUpdate = "UPDATE usuarios SET password = ? WHERE id_usuario = '$userId'";
                        $arrData = array($passEncrypt);
                        $request = $this->update($sqlUpdate, $arrData);

                        // if ($request != 0) {
                            
                            $answer["tipoRespuesta"] = "success";
                            $answer["message"] = "Cambio de contraseña exitoso";
                        // }
                    } else {

                        $answer["tipoRespuesta"] = "warning";
                        $answer["message"] = " las contraseñas no coiciden";
                    }
                }  else {
                    $answer["tipoRespuesta"] = "warning";
                    $answer["message"] = "la contraseña Actual es incorrecta";
                }
            } else {
                $answer["tipoRespuesta"] = "error";
                $answer["message"] = "la contraseña no puede ser la Actual";
            }
        }
        echo json_encode($answer);
        // echo json_encode(array("tipoRespuesta" => $tipoRespuesta, "message" => $message));
    }
    public function editName()
    {
        extract($_POST);
        // var_dump($_POST);
        $sql = "UPDATE usuarios SET nombre = '$name_user', apellido = '$lastName' WHERE id_usuario = '$userId' ";
        $sqlUser = $this->select($sql);

        $sql = "SELECT * FROM usuarios WHERE id_usuario = '$userId' ";
        $sqlUser = $this->select($sql);

        $nombre = $sqlUser['nombre'];
        $apellido = $sqlUser['apellido'];

        $tipoRespuesta = "success";
        echo json_encode(array('tipoRespuesta' => $tipoRespuesta, 'message' => 'Nombre Cambiado exitosamente', 'nombre' => $nombre, 'apellido' => $apellido));
    }
}
