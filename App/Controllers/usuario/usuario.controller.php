<?php
include_once "../../Config/core.php";


class Usuario extends Core{
    
    public function usuario(){ include_once "../../views/usuario/usuario.php";}

    public function visualizarUsuario(){
        extract($_POST);
        $ruta = "../../views/perfil/Files/";

        $sqlUsuario = $this->select_all("SELECT CONCAT(nombre, ' ', apellido) AS nombre_completo, email, rolid, id_usuario, estado_usuario, imagen_usuario FROM usuarios WHERE id_usuario = $id_usuario");
        include_once "../../views/perfil/usuarios/view.VerUsuario.php";
    }

    public function viewEditarUsuario(){
        extract($_POST);
        $sqlUsuario = $this->select_all("SELECT nombre, apellido, email, rolid, id_usuario, estado_usuario FROM usuarios WHERE id_usuario = $id_usuario");
        // var_dump($sqlUsuario);
        $sqlPerfil =  $this->select_all("SELECT * FROM perfiles");
        // echo "<br>";
        // var_dump($sqlPerfil);

        include_once "../../views/perfil/usuarios/view.EditUsuario.php";
    }

    public function listUsuario(){
        extract($_POST);
        // var_dump($_POST);
        $datos = array(); 
 
        $sql ="SELECT id_usuario, CONCAT(u.nombre, ' ', apellido) AS nombre_completo, email, rolid, estado_usuario, p.nombre as perfil FROM usuarios u, perfiles p WHERE rolid = p.id";
        $listUsuario =  $this->select_all($sql);
        $administrador = "";
        foreach ($listUsuario as $list) {
            
            if($list["rolid"]==1){
                 $administrador = '<i class="fa fa-user-circle"></i>';
            } else {
                $administrador = '<button type="button" class="text-white btn btn-warning" id="viewEditarUsuario"><i class="fa fa-edit"></i></button>';
            }
            array_push($datos,
            array(
                "id_usuario" => $list["id_usuario"],
                "email" => $list["email"],
                "nombre_completo" => $list["nombre_completo"],
                "estado" => $list["estado_usuario"],
                "rol" => $list["perfil"],
                "btnVer" => '<button type="button" class="text-white btn btn-info" id="verUsuarioVista"><i class="fa fa-eye"></i></button>',
                "btnEditar" => $administrador,

            ));
        }
            $table = array("data" => $datos);
            echo json_encode($table);
    }

    public function crearUsuario() {
       
        
        extract($_POST);
        // var_dump($_POST);
        $codigo_usuario = $_POST["codigo"];
        $usuario = $_POST["usuario"];
        $valor =  $_POST["valor"];
        $cantidad =  $_POST["cantidad"];
        $descripcion =  $_POST["descripcion"];

       $sql= "INSERT INTO usuario (codigo, usuario) VALUES  (?,?)";	

       $arrData = array($codigo_usuario, $usuario);
       $sql = $this->insert($sql, $arrData);
    
       
       if ($sql) {  $respuesta["tipoRespuesta"] = true; } 
        echo json_encode($respuesta);  
    }
    public function editarUsuario() {
        extract($_POST);
        // var_dump($_POST);
        $respuesta = array();

        $sql = "UPDATE usuarios SET nombre ='$nombre', apellido = '$apellido', email = '$email', rolid = '$rol' WHERE id_usuario='$code_usuario'";
        $actualizarUusario = $this->select($sql);	

        $respuesta["tipoRespuesta"] = true; 
        echo json_encode($respuesta);  
    }
    

    public function borrarUsuario() {
        extract($_POST);
        $respuesta = array();

        $sql = "DELETE FROM usuarios WHERE id_usuario='$id_usuario'";
        $borrarProducto = $this->delete($sql);
        if ($borrarProducto) { $respuesta["tipoRespuesta"] = true;  }
        
        echo json_encode($respuesta); 
    }
}