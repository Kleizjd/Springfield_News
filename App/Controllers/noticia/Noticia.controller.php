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
        // var_dump($_POST);
        $sqlNoticia = $this->select_all("SELECT * FROM noticias WHERE id = $idNoticia");
        include_once "../../views/noticia/view.verNoticia.php";
    }

    public function viewEditarNoticia()
    {
        extract($_POST);
        // var_dump($_POST);
        $sqlNoticia = $this->select_all("SELECT * FROM noticias WHERE id = $codigo");
        include_once "../../views/noticia/view.EditNoticia.php";
    }

    public function listNoticia()
    {
        extract($_POST);
        // var_dump($_POST);    
        $datos = array();
        $condicion = "";

        if ($idNoticia != "") {
            $condicion .= "AND id LIKE '$idNoticia%'";
        }

        if ($noticia != "") {
            $condicion .= "AND noticias LIKE '$noticia%'";
        }

        if ($estado != "") {
            if ($estado == 'T') {
                $estado = null;
            }
        }

        $sql = "SELECT id, titulo, categoria, descripcion  FROM noticias WHERE estado LIKE '%$estado%' $condicion";

        $listProduct =  $this->select_all($sql);

        foreach ($listProduct as $list) {
            array_push(
                $datos,
                array(
                    "id" => $list["id"],
                    "titulo" => $list["titulo"],
                    "categoria" => $list["categoria"],
                    "descripcion" => $list["descripcion"],
                    "btnVer" => '<button type="button" class="text-white btn btn-info" id="verNoticiaVista"><i class="fa fa-eye"></i></button>',
                    "btnEditar" => '<button type="button" class="text-white btn btn-warning" id="viewEditarNoticia"><i class="fa fa-edit"></i></button>'

                )
            );
        }
        $table = array("data" => $datos);
        // var_dump($table);
        echo json_encode($table);
    }

    public function crearNoticia()
    {


        extract($_POST);
        dep($_POST);
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
                // var_dump($foto);
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
                    echo "hola";
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
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                        if ($nombre_foto != '') {
                            uploadImage($foto, $imgPortada);
                        }
                    } else {
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                        //         if($nombre_foto != ''){ uploadImage($foto,$imgPortada); }

                        //         if(($nombre_foto == '' && $_POST['foto_remove'] == 1 && $_POST['foto_actual'] != 'portada_categoria.png')
                        //             || ($nombre_foto != '' && $_POST['foto_actual'] != 'portada_categoria.png')){
                        //             deleteFile($_POST['foto_actual']);
                    }
                    // }
                    // }else if($request_cateria == 'exist'){
                    //     $arrResponse = array('status' => false, 'msg' => '¡Atención! La categoría ya existe.');
                    // }else{
                    //     $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
    }
    public function editarNoticia()
    {
        extract($_POST);
        $respuesta = array();

        $sql = "UPDATE noticias SET noticia ='$product',  cantidad = '$amount', descripcion = '$description' WHERE codigo='$code_product'";
        $actualizarNoticia = $this->select($sql);

        // if ($actualizarNoticia) {  $respuesta["tipoRespuesta"] = true; }
        // echo json_encode($respuesta);  
        $respuesta["tipoRespuesta"] = true;
        echo json_encode($respuesta);
    }


    public function borrarNoticia()
    {
        // $this->getCore(); 
        extract($_POST);
        $respuesta = array();

        $sql = "DELETE FROM noticias WHERE codigo='$codigo'";
        $borrarNoticia = $this->delete($sql);
        if ($borrarNoticia) {
            $respuesta["tipoRespuesta"] = true;
        }

        echo json_encode($respuesta);
    }
}
