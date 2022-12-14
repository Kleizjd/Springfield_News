<?php
include_once "../../Config/core.php";
include_once "../../App/lib/Helpers.php";


class Noticia extends Core
{

    public function noticia()
    {
        $data['page_functions_js'] = "functions_noticia.js";
        $sqlNoticia = $this->select_all("SELECT * FROM categorias");
        include_once "../../views/noticia/Noticia.php";
    }

    public function visualizarNoticia()
    {
        extract($_POST);
        $sqlNoticia = $this->select_all("SELECT * FROM noticias WHERE id = $idNoticia");
        include_once "../../views/noticia/view.verNoticia.php";
    }

    public function viewEditarNoticia()
    {
        extract($_POST);
        $sqlNoticia = $this->select_all("SELECT * FROM noticias WHERE id = $codigo");
        $noticias_categoria = $this->select_all("SELECT id, nombre FROM categorias");
        include_once "../../views/noticia/view.EditNoticia.php";
    }

    public function listNoticia()
    {
        extract($_POST);
        // var_dump($_POST);    
        $datos = array();
        $condicion = "";

        if ($categoria_notice != "") {
            if ($categoria_notice == 'T') {
                $categoria_notice = null;
            }
        }

        $sql = "SELECT n.id, titulo, categoria, nombre, descripcion  FROM noticias n, categorias c WHERE n.categoria = c.id AND  c.id LIKE'%$categoria_notice%' $condicion";

        $listNoticia =  $this->select_all($sql);

        foreach ($listNoticia as $list) {
            array_push(
                $datos,
                array(
                    "id" => $list["id"],
                    "titulo" => $list["titulo"],
                    "categoria" => $list["nombre"],
                    "descripcion" => $list["descripcion"],
                    "btnVer" => '<button type="button" class="text-white btn btn-info" id="verNoticiaVista"><i class="fa fa-eye"></i></button>',
                    "btnEditar" => '<button type="button" class="text-white btn btn-warning" id="viewEditarNoticia"><i class="fa fa-edit"></i></button>'

                )
            );
        }
        $table = array("data" => $datos);
        echo json_encode($table);
    }


    public function crearNoticia()
    {


        // extract($_POST);
        // dep($_POST);
        if ($_POST) {
            if (empty($_POST['txtTitulo']) || empty($_POST['txtDescripcion'])) {
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            } else {

                $intIdnoticia = intval($_POST['idNoticia']);
                $strTitulo =  strClean($_POST['txtTitulo']);
                $strDescripcion = strClean($_POST['txtDescripcion']);
                $categoria = strClean($_POST['categoria']);

                $ruta = strtolower(clear_cadena($strTitulo));
                $ruta = str_replace(" ", "-", $ruta);

                $foto            = $_FILES['foto'];
                $nombre_foto     = $foto['name'];
                $type            = $foto['type'];
                $url_temp        = $foto['tmp_name'];
                $imgPortada      = 'portada_noticia.png';
                $request_insert  = "";
                if ($nombre_foto != '') { $imgPortada = 'img_' . md5(date('d-m-Y H:i:s')) . '.jpg'; }

                if ($intIdnoticia == 0) {

                    $sql = "SELECT * FROM noticias WHERE titulo = '{$strTitulo}' ";
                    $request = $this->select_all($sql);

                    if (empty($request)) {
                        $query_insert  = "INSERT INTO noticias(titulo, categoria, descripcion, ruta, portada) VALUES(?,?,?,?,?)";
                        $arrData = array($strTitulo, $categoria, $strDescripcion, $ruta, $imgPortada);
                        $request_insert = $this->insert($query_insert, $arrData);
                        $return = $request_insert;
                    } else {
                        $return = "exist";
                    }
                    $option = 1;
                } else {
                    //Actualizar

                    if ($nombre_foto == '') {
                        if ($_POST['foto_actual'] != 'portada_noticia.png' && $_POST['foto_remove'] == 0) {
                            $imgPortada = $_POST['foto_actual'];
                        }
                    }
                    $sql = "SELECT * FROM noticias WHERE titulo = '{$strTitulo}' AND id != $this->intIdnoticia";
                    $request = $this->select_all($sql);
                    
                    if (empty($request)) {
                        $sql = "UPDATE categoria SET nombre = ?, descripcion = ?, portada = ?, ruta = ?, status = ? WHERE idcategoria = $this->intIdnoticia ";
                        $arrData = array($strTitulo, $categoria, $strDescripcion, $ruta, $imgPortada);
                        $request = $this->update($sql, $arrData);
                    } else {
                        $request = "exist";
                    }
                    $option = 2;
                }
                if ($request_insert > 0) {
                    if ($option == 1) {

                        $arrResponse = array('status' => true, 'msg' => 'Noticia Ingresado exitosamente');
                        if ($nombre_foto != '') {
                            uploadImage($foto, $imgPortada);
                        }
                    } else {
                        $arrResponse = array('status' => true, 'msg' => 'Noticia Actualizada correctamente.');
                        if ($nombre_foto != '') {
                            uploadImage($foto, $imgPortada);
                        }

                        if (($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_noticia.png')
                            || ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_noticia.png')
                        ) {
                            deleteFile($_POST['foto_actual']);
                        }
                    }
                } else if ($request_insert == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => '??Atenci??n! La noticia ya existe.');
                } else {
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    public function editarNoticia()
    {
        extract($_POST);
        $respuesta = array();

        $sql = "UPDATE noticias SET titulo ='$titulo',  categoria = '$categoria', descripcion = '$description' WHERE id='$code_noticia'";
        $actualizarNoticia = $this->select($sql);

        // if ($actualizarNoticia) {  $respuesta["tipoRespuesta"] = true; }
        // echo json_encode($respuesta);  
        $respuesta["tipoRespuesta"] = true;
        echo json_encode($respuesta);
    }


    public function borrarNoticia()
    {
        extract($_POST);
        // var_dump($_POST);
        $respuesta = array();

        $sql = "DELETE FROM noticias WHERE id='$Id'";
        $borrarNoticia = $this->delete($sql);
        $sqlComent = "DELETE FROM comentario WHERE id_noticia='$Id'";
        $comentario = $this->delete($sqlComent);
        $sqlComent = "DELETE FROM reaccion WHERE id_noticia='$Id'";
        $comentario = $this->delete($sqlComent);
        if ($borrarNoticia) {
            $respuesta["tipoRespuesta"] = true;
        }

        echo json_encode($respuesta);
    }
    public function openNoticia()
    {   extract($_POST);

        $sql = "SELECT * FROM noticias n, categorias c WHERE n.id = '$id_Notice' AND c.id = n.categoria";       
        $sqlNoticia =  $this->select($sql);//NOTICIA
        $sqlgusta = "SELECT * FROM reaccion WHERE email = '$email' AND id_noticia = '$id_Notice'";       
        $sqlLike =  $this->select($sqlgusta);//REACCIONES
        $cantidad = "SELECT COUNT(id_noticia) as total FROM reaccion WHERE id_noticia = '$id_Notice'";
        $sqlCantidad =  $this->select($cantidad);//CANTIDAD GENERAL DE REACCIONES
        $comentario = "SELECT c.id, nombre, u.email, id_noticia, comentario FROM comentario c, usuarios u WHERE c.email = u.email AND id_noticia = '$id_Notice'  ORDER BY c.id DESC";
        $sqlComentario =  $this->select_all($comentario);//COMENTARIOS
        $rating = "SELECT * FROM rating WHERE email = '$email' AND id_noticia = '$id_Notice'";
        $sqlRating =  $this->select($rating);//CALIFICACION
        // var_dump($sqlRating);
        $comentarios = "";
        
         foreach ($sqlComentario as $comment) {
                if($comment['email']=== $email){

                $comentarios .= '<div class="border rounded" name="'.$comment['id'].'"><p><b>'.$comment['nombre'].': </b>'.$comment['comentario'].'<button type="button" class="btn btn-danger btn-sm float-sm-right"  id="'.$comment['id'].'" onclick="deleteComentario(this)"><i class="fas fa-backspace"></i></button></p></div>';

                } else {
                    $comentarios .= '<div class="border rounded"><b>'.$comment['nombre'].': </b>'.$comment['comentario'].'</b></div>';

                }
        }
        if ($sqlNoticia) {
            $respuesta["tipoRespuesta"] = true;
            $respuesta["titulo"] = $sqlNoticia["titulo"];
            $respuesta["descripcion"] =  $sqlNoticia["descripcion"];
            $respuesta["categoria"] =  $sqlNoticia["nombre"];
            $respuesta["portada"] =  $sqlNoticia["portada"];
            $respuesta["total"] =  $sqlCantidad["total"];
            $respuesta["id_noticia"] =  $id_Notice;
            $respuesta["cantidad"] =  $id_Notice;
            $respuesta["comentarios"] =  $comentarios;
            if($sqlRating){
            $respuesta["calificacion"] =  $sqlRating["calificacion"];
            } 

            if($sqlLike){
                $respuesta["like"] =  true;
            } else {
                $respuesta["like"] =  false;
            }
        }

        echo json_encode($respuesta);
    }
    public function comentaNoticia()
    {   extract($_POST);
        $respuesta = array();
            if($comentario != ""){
                $sqlInsert = "INSERT INTO comentario(email,id_noticia,comentario) VALUES (?,?,?)"; 
                $arrData = array($email, $id_noticia,$comentario);
                $sql = $this->insert($sqlInsert, $arrData);
                
                $sqlComent = "SELECT id FROM comentario WHERE  email='$email' AND id_noticia = '$id_noticia' ORDER BY id DESC LIMIT 1";
                $sqlComentario =  $this->select($sqlComent);
    
    
                // if($sql){
                    $respuesta["id"] = $sqlComentario["id"];
                    $respuesta["tipoRespuesta"] = "success";
                // }
            } 
            
        echo json_encode($respuesta);
    }
    public function openNoticiaMain()
    {   extract($_POST);
        $sql = "SELECT * FROM noticias n, categorias c WHERE n.id = '$id_Notice' AND c.id = n.categoria";       
        $sqlNoticia =  $this->select($sql);
    

        if ($sqlNoticia) {
            $respuesta["tipoRespuesta"] = true;
            $respuesta["titulo"] = $sqlNoticia["titulo"];
            $respuesta["descripcion"] =  $sqlNoticia["descripcion"];
            $respuesta["categoria"] =  $sqlNoticia["nombre"];
            $respuesta["portada"] =  $sqlNoticia["portada"];
        }

        echo json_encode($respuesta);
    }
    public function likeNoticia()
    {   extract($_POST);
    // dep($_POST);
        $sql = "SELECT * FROM reaccion WHERE  email='$email' AND id_noticia = '$id_noticia'"; 
        $sqlNoticia =  $this->select($sql);
        // var_dump($sqlNoticia);

        if(!$sqlNoticia){ 
            $sql = "INSERT INTO reaccion(email,id_noticia) VALUES (?,?)"; 
            $arrData = array($email, $id_noticia);
            $request = $this->insert($sql, $arrData);
            $respuesta["tipoRespuesta"] = true;

        } else { 
            $sql = "DELETE FROM reaccion WHERE email='$email' AND id_noticia = '$id_noticia'";
            $request = $this->delete($sql);
            $respuesta["tipoRespuesta"] = false;

        }     
        echo json_encode($respuesta);
    }
    public function ratingNoticia()
    {   extract($_POST);
    // dep($_POST);
        $sql = "SELECT * FROM rating WHERE  email='$email' AND id_noticia = '$id_noticia'"; 
        $sqlNoticia =  $this->select($sql);
        // var_dump($sqlNoticia);

        if(!$sqlNoticia){ 
            $sql = "INSERT INTO rating(email,id_noticia, calificacion) VALUES (?,?,?)"; 
            $arrData = array($email, $id_noticia, $calificacion);
            $request = $this->insert($sql, $arrData);
            $respuesta["tipoRespuesta"] = true;

        } else { 
    // dep($_POST);

            $sqlRating = "UPDATE rating SET calificacion = '$calificacion' WHERE email ='$email' AND  id_noticia = '$id_noticia'";
            $actualizarRating = $this->select($sqlRating);
            $respuesta["tipoRespuesta"] = false;
        }     
        echo json_encode($respuesta);
    }
   

    public function deleteComentario()
    {
        extract($_POST);
            
            $sql = "DELETE FROM comentario WHERE  email='$email' AND id_noticia='$id_noticia' AND id = '$idComent'";  
            $sqlComentario =  $this->delete($sql);
            $respuesta["tipoRespuesta"] = true;
            $id_comentario = strval($idComent);

            $respuesta["id_comentario"] = $id_comentario;

        echo json_encode($respuesta);

    }
    public function loadNoticias()
    {  extract($_POST);
        $sql = "SELECT *  FROM noticias ORDER BY id DESC";

        $listNoticia =  $this->select_all($sql);
        include_once "../../views/noticias.php";
    }
}
