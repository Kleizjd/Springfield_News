
<?php
include_once "../../Config/Core.php";

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
        // echo "session id: ".$_SESSION["id_usuario"]." session nombre: ".$_SESSION["nombreUsuario"];

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

                $arrData = array($nombre, $apellido, $email, $passEncrypt, 'A', '2', $pregunta,$respuesta );
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
    public function resetPassword()
    {
        extract($_POST);
        var_dump($_POST);

        $answer = array();
        $sqlPssword = $this->select_all("SELECT * FROM usuarios WHERE email = $email");
        // $answer['tipoRespuesta'] = "success";
        // include_once "reset.php";

        // echo json_encode($answer);
    }
    public function resetByEmail()
    {
        extract($_POST);
        $answer = array();
        $sqlPssword = $this->select("SELECT * FROM usuarios, preguntas WHERE email = '$email' and usuarios.id_pregunta = preguntas.id");
        // var_dump($sqlPssword);
        if ($sqlPssword) {
            $answer['tipoRespuesta'] = "success";
            $answer['pregunta'] = $sqlPssword["pregunta"];
            $answer['correo'] = $sqlPssword["email"];
        } else {
            $answer['tipoRespuesta'] = "error";
        }
        echo json_encode($answer);
    }








    //     public function editarPasswordEmail()
    //     {
    //         extract($_POST);
    //         $typeAnswer = "error";
    //         $message = "la contrasena actual no es correctassss";
    //         $sqlVerify = "SELECT contrasena FROM usuario WHERE correo = '$email'";
    //         $sql = $this->select($sqlVerify);

    //         if (mysqli_num_rows($sql) != 0) {
    //             $row = $sql->fetch_assoc();
    //             $password = $row['contrasena'];

    //                 if ($new_password == $confirm_password) {

    //                     $utilities = new Utilities();
    //                     $passEncrypt = $utilities->encriptPassword($new_password, 10); //contraseña encriptada

    //                     $sqlUpdate = "UPDATE usuario SET contrasena ='$passEncrypt' WHERE correo ='$email'";

    //                     $sql = $this->select($sqlUpdate);
    //                     if ($sql != 0) {
    //                         $typeAnswer = "success";
    //                         $message = "Cambio de contraseña exitoso";
    //                     }
    //                 } else {
    //                     $typeAnswer = "warning";
    //                     $message = " las contraseñas no coiciden";
    //                 }
    //         }
    //         echo json_encode(array("typeAnswer" => $typeAnswer, "message" => $message));
    //     }





    //     public function forgotPassword()
    //     {   
    //         extract($_POST);
    //         $answer = array();

    //         $obtain = $this->getConnection();
    //         $email_user = $obtain->real_escape_string($_POST['email_user']);
    //         $sql = "SELECT contrasena FROM usuario WHERE correo = '$email_user' ";
    //         $answerQuery = $this->select($sql);
    //         if ($answerQuery) {

    //             $fila = $answerQuery->fetch_assoc();
    //             $contrabd = $fila['contrasena'];

    //             $sql = "UPDATE usuario SET codigo_recuperacion  = '" . md5($contrabd) . "' WHERE correo = '" . $email_user . "' ";
    //             $answer = $this->select($sql);

    //             $projectName = explode('/', $_SERVER['REQUEST_URI'])[2];
    //             $projectName = "/".explode('/', $_SERVER['REQUEST_URI'])[1]."/".$projectName;

    //             $link = "http://".$_SERVER['HTTP_HOST'].$projectName."?ptk=".md5($contrabd)."&p2=".$_POST['email_user'];

    //             	$asunto = "Recuperación de Contraseña";

    //                 $mens_email = file_get_contents("http://".$_SERVER['HTTP_HOST'].$projectName."/views/Session/correo.html");


    //                 $mens_email = str_replace("<ENLACE>", $link, $mens_email);
    //             	$estructura = "MIME-Version: 1.0"."\r\n";
    //                 $estructura.= "Content-type:text/html;charset=UTF-8"."\r\n";
    //                 $estructura.= "From: jose.jdgo97@gmail.com"."\r\n";
    //                 $estructura.= "=Reply-To: jose.jdgo97@gmail.com";
    //                 $estructura.= "\r\n"."X-Mailer: PHP/" . phpversion();

    //             	$m = mail($email_user, $asunto, $mens_email, $estructura);
    //                 // var_dump($m);
    //                echo "".$estructura;

    //             	$mensaje = "Se ha enviado un correo a su bandeja de entrada. Por favor verifique su correo.";
    //             	$mensaje .= "<br><br>".$link;
    //                 // $answer['typeAnswer'] = true;
    //         } else {
    //           $answer['typeAnswer'] = false;
    //         }
    //         echo json_encode($answer);
    //     }

    public function cerrarSesion()
    {
        @session_unset();
        @session_destroy();
    }
}
