<?php
include_once "../../Config/core.php";


class Noticia extends Core{
    
    public function noticia(){
        // $data =  array();
		$data['page_functions_js'] = "functions_noticia.js";
        include_once "../../views/noticia/Noticia.php";
        
    }

    public function visualizarNoticia(){
        extract($_POST);
        // var_dump($_POST);
        $sqlNoticia = $this->select_all("SELECT * FROM usuarios WHERE id = $email");
        include_once "../../views/noticia/view.verNoticia.php";
           
    }

    public function viewEditarNoticia(){
        extract($_POST);
        // var_dump($_POST);
        $sqlNoticia = $this->select_all("SELECT * FROM noticias WHERE id = $codigo");
        include_once "../../views/noticia/view.EditNoticia.php";
    }

    public function listNoticia(){
        extract($_POST);
        // var_dump($_POST);    
        $datos = array(); 
        $condicion = "";

        if($idNoticia != ""){ $condicion .="AND id LIKE '$idNoticia%'";}

        if($noticia != ""){ $condicion .="AND noticias LIKE '$noticia%'"; }

        if($estado != ""){ if($estado == 'T'){ $estado = null;}}

        $sql = "SELECT id, titulo, categoria, estado, descripcion  FROM noticias WHERE estado LIKE '%$estado%' $condicion";

        $listProduct =  $this->select_all($sql);

        foreach ($listProduct as $list) {
            array_push($datos,
            array(
                "id" => $list["id"],
                "titulo" => $list["titulo"],
                "categoria" => $list["categoria"],
                "estado" => $list["estado"],
                "descripcion" => $list["descripcion"],
                "btnVer" => '<button type="button" class="text-white btn btn-info" id="verNoticiaVista"><i class="fa fa-eye"></i></button>',
                "btnEditar" => '<button type="button" class="text-white btn btn-warning" id="viewEditarNoticia"><i class="fa fa-edit"></i></button>'

            ));
        }
            $table = array("data" => $datos);
            // var_dump($table);
            echo json_encode($table);
    }

    public function crearNoticia() {
       
        
        extract($_POST);
        // var_dump($_POST);
        $titulo = $_POST["titulo"];
        $categoria =  $_POST["categoria"];
        $descripcion =  $_POST["descripcion"];


       $sql= "INSERT INTO noticias (titulo, categoria, estado,descripcion) VALUES  (?,?,?,?)";	

       $arrData = array($titulo, $categoria, "A", $descripcion);
       $sql = $this->insert($sql, $arrData);
    
       
       if ($sql) {  $respuesta["tipoRespuesta"] = true; } 
        echo json_encode($respuesta);  
    }
    public function editarNoticia() {
        extract($_POST);
        $respuesta = array();

        $sql = "UPDATE noticias SET noticia ='$product',  cantidad = '$amount', descripcion = '$description' WHERE codigo='$code_product'";
       $actualizarNoticia = $this->select($sql);	
    
        // if ($actualizarNoticia) {  $respuesta["tipoRespuesta"] = true; }
        // echo json_encode($respuesta);  
          $respuesta["tipoRespuesta"] = true; 
        echo json_encode($respuesta);  
    }
    

    public function borrarNoticia() {
        // $this->getCore(); 
        extract($_POST);
        $respuesta = array();

        $sql = "DELETE FROM noticias WHERE codigo='$codigo'";
        $borrarNoticia = $this->delete($sql);
        if ($borrarNoticia) { $respuesta["tipoRespuesta"] = true;  }
        
        echo json_encode($respuesta); 
    }
}