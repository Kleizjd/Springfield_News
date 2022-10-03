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
        $noticias_categoria = $this->select_all("SELECT id, nombre FROM categorias");
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

        $listNoticia =  $this->select_all($sql);

        foreach ($listNoticia as $list) {
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
                // var_dump($foto);
                $nombre_foto     = $foto['name'];
                $type            = $foto['type'];
                $url_temp        = $foto['tmp_name'];
                $imgPortada      = 'portada_noticia.png';
                $request_insert  = "";
                if ($nombre_foto != '') {
                    $imgPortada = 'img_' . md5(date('d-m-Y H:i:s')) . '.jpg';
                }

                if ($intIdnoticia == 0) {

                    $sql = "SELECT * FROM noticias WHERE titulo = '{$strTitulo}' ";
                    $request = $this->select_all($sql);
                    // echo "hola" . " Crear";

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
                    // echo "hola"."  Actualizar";

                    if ($nombre_foto == '') {
                        if ($_POST['foto_actual'] != 'portada_noticia.png' && $_POST['foto_remove'] == 0) {
                            $imgPortada = $_POST['foto_actual'];
                        }
                    }
                    $sql = "SELECT * FROM noticias WHERE titulo = '{$strTitulo}' AND id != $this->intIdnoticia";
                    $request = $this->select_all($sql);
                    // echo "hola";
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
                        // echo "hola"." Crear arrResponse";

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
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! La noticia ya existe.');
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
        // var_dump($_POST);
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
        if ($borrarNoticia) {
            $respuesta["tipoRespuesta"] = true;
        }

        echo json_encode($respuesta);
    }
    public function openNoticia()
    {        extract($_POST);
        // var_dump($_POST);
        $sql = "SELECT *  FROM noticias WHERE id = '$id'";       
        
        $sqlNoticia =  $this->select_all($sql);

        // $usua_perfil = $_SESSION["usua_perfil"];
        // $sqlTipo = "SELECT Codigo, Descripcion FROM tipo_entidades_seg_social ";
        // $Tipos = $ObjCajaCompensacion->Consultar($sqlTipo);
    }
    public function loadNoticias()
    {

        extract($_POST);
        // var_dump($_POST);
        $sql = "SELECT *  FROM noticias ";

        $listNoticia =  $this->select_all($sql);
        include_once "../../views/noticias.php";


        // $cardHtml = '';
        // foreach ($listNoticia as $list) {
        //     $cardHtml .= '<div class="col-sm">';
        //     $cardHtml .= '<from name="formNoticia">';
        //     $cardHtml .= '<div class="card" style="height: 20rem;">';
        //     $cardHtml .= '<img style="height: 7rem;" src="../../public/img/uploads/'.$list['portada'].'" class="card-img-top" alt="...">';
        //     $cardHtml .= '<div class="card-body"></div>';
        //     $cardHtml .= '<h5 class="card-title" >'.$list['titulo'].'</h5> ';
        //     $cardHtml .= '<p class="card-text"></p>';
        //     $cardHtml .= '<a id = "numero" value = "'.$list['id'].'"></a>';
        //     $cardHtml .= '<a onclick="openNoticia(this)"><i class="fas fa-angle-up"></i></a>';
        //     $cardHtml .= '<button type="submit" class="btn btn-primary" id="btnNoticia" onclick="openNoticia(this)">Ver Noticia</button>';
        //     $cardHtml .= '</div>';
        //     $cardHtml .= '</form>';
        //     $cardHtml .= '</div>';
        // }
        // $table = array("data" => $datos);
        // var_dump($table);
        // echo json_encode($cardHtml);
    }
}
