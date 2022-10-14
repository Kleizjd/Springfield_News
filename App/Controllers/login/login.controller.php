
<?php
include_once "../../Config/Core.php";
@session_start();
class Login extends Core
{
    public function crearSesion()
    { //EN USO
        extract($_POST);

        $user = $_POST["user"];
        $password = $_POST["password"];
        $estado = "'A'";
        $answer = array();
        $sql = "SELECT DISTINCT id_usuario, CONCAT(nombre, ' ', apellido) AS nombre_completo, nombre, apellido, password, rolid, email,imagen_usuario FROM usuarios WHERE email='$user' AND estado_usuario = " . $estado . "";
        $validar_sesion = $this->select($sql);

        if ($validar_sesion != 0) {
            $passwordDB = $validar_sesion['password'];
            if (password_verify($password, $passwordDB)) {

                @session_start();
                $_SESSION['nombre_completo'] = str_replace("*", "", $validar_sesion["nombre_completo"]);
                $_SESSION['imagen_usuario'] = str_replace("*", "", $validar_sesion["imagen_usuario"]);
                $_SESSION['nombres'] = $validar_sesion['nombre'];
                $_SESSION['apellidos'] = $validar_sesion['apellido'];
                $_SESSION['correo_login'] = $validar_sesion['email'];
                $_SESSION["id_usuario"] = $validar_sesion["id_usuario"];
                $_SESSION["rolid"] = $validar_sesion["rolid"];
                $answer["tipoRespuesta"] = "success";
            }
        } else {
            $answer["tipoRespuesta"] = "error";
        }

        echo json_encode($answer);
    }
    public function registarUsuario()
    { //EN USO
        extract($_POST);
        // var_dump($_POST);
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $password = $_POST['password_user'];
        $password_verify = $_POST['password_verify'];
        $pregunta = $_POST['pregunta'];
        $respuesta = $_POST['respuesta'];
        $estado = "'A'";

        if ($password === $password_verify) {
            $sql = "SELECT id_usuario FROM usuarios WHERE email='$email'";
            $sqlSelect = $this->select($sql);
            if ($sqlSelect == 0) {

                //Encriptar-----------------------------------------------------------------------
                $passEncrypt = password_hash($password, PASSWORD_DEFAULT); //password encripted
                //-------------------------------------------------------------------------------

                $sql = "INSERT INTO usuarios(nombre, apellido, email, password, estado_usuario, rolid, id_pregunta, respuesta) VALUES (?,?,?,?,?,?,?,?)";

                $arrData = array($nombre, $apellido, $email, $passEncrypt, 'A', '2', $pregunta, $respuesta);
                $sql = $this->insert($sql, $arrData);

                if ($sql != null) {
                    $answer["tipoRespuesta"] = "success";
                }
            } else {
                $answer['tipoRespuesta'] = "duplicate";
            }
        } else {
            $answer['tipoRespuesta'] = "error";
        }
        echo json_encode($answer);
    }
    // 1
public function camposPassword()
    {   extract($_POST);

        $answer = array();
        $sqlPssword = $this->select_all("SELECT * FROM usuarios WHERE respuesta = '$respuesta' and email ='$email'");
        if ($sqlPssword) {
            $answer['tipoRespuesta'] = "success";
        } else {
            $answer['tipoRespuesta'] = "error";
        }
        echo json_encode($answer);
    }
    //    2
    public function resetByEmail()
    {   extract($_POST);
        $answer = array();
        $sqlPssword = $this->select("SELECT * FROM usuarios, preguntas WHERE email = '$email' and usuarios.id_pregunta = preguntas.id");

        if ($sqlPssword) {
            $answer['tipoRespuesta'] = "success";
            $answer['pregunta'] = $sqlPssword["pregunta"];
            $answer['correo'] = $sqlPssword["email"];
        } else {
            $answer['tipoRespuesta'] = "error";
        }
        echo json_encode($answer);
    }
    // 3
    public function editarPassword()
    {
        extract($_POST);
        $answer = array();
        $sql = "SELECT * FROM usuarios WHERE email ='$email'";
        $sqlPssword = $this->select($sql);

    // if(!$sqlPssword){
        if($nueva_clave === $verifica_clave){
            //Encriptar-----------------------------------------------------------------------
            $passEncrypt = password_hash($nueva_clave, PASSWORD_DEFAULT); //password encripted
            //-------------------------------------------------------------------------------
            $sql = "UPDATE usuarios SET password = ? WHERE email='$email'";

            $arrData = array($passEncrypt);
            $request = $this->update($sql, $arrData);
    
            if ($request != 0) {
                $answer['tipoRespuesta'] = "success";
            }
            // if ($sqlPssword) {
            //     $answer['tipoRespuesta'] = "success";
            // } else {
            //     $answer['tipoRespuesta'] = "error";
            // }
        } else {
            $answer['tipoRespuesta'] = "error";
        }
    // } else {
    //     $answer['tipoRespuesta'] = "warning";

    // }
        echo json_encode($answer);
    }
    public function cerrarSesion()
    {
        @session_unset();
        @session_destroy();
        // echo $_SESSION['correo_login'];
    }
}
