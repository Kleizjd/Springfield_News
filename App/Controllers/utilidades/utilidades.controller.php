<?php
include_once "../../Config/Core.php";

class Utilidades extends Core {

    public function uploadFile(){
        extract($_POST);
        // var_dump($_POST);

        extract($_FILES);
        $answer["typeAnswer"] = false;

        // EL CAMPO VALORES SE DIVIDE EN DOS: EL DISTINTIVO QUE VA A IR JUNTO AL ARCHIVO AL SUBIRSE
        // Y EL VALOR DE LA CONDICIÓN PARA HACER EL UPDATE
        if (!empty($Tabla) && !empty($Campo) && !empty($Valores) && !empty($Ruta)) {
            $Valores = explode(",", $Valores);
            $Distintivo = $Valores[0];
            // SE VÁLIDA SI EL VALOR DE LA CONDICIÓN SE ENVIO, 
            // SI NO SE TOMA EL DISTINTIVO COMO EL VALOR DE LA CONDICIÓN
            $ValorCondicion = !empty($Valores[1]) ? $Valores[1] : $Distintivo;

            $sqlLlavePrimaria = "SELECT column_name, column_key, extra FROM information_schema.columns WHERE table_schema=DATABASE() AND table_name='$Tabla'";
            // echo $sqlLlavePrimaria;
            $LlavePrimaria = $this->select($sqlLlavePrimaria);
            
            $LlavePrimaria = $LlavePrimaria["column_name"];
            // echo "si es".$LlavePrimaria;
            
           if (isset($_FILES["Archivo"]["name"])) {
                $Archivo = $this->lreplace(".", "-" . $Distintivo . ".", $_FILES["Archivo"]["name"]);
                $RutaCompleta = $Ruta . $Archivo;
                
                
                $sqlUpdate = "UPDATE $Tabla SET $Campo = '$Archivo' WHERE $LlavePrimaria = '$ValorCondicion'";
                $sqlUpdate = $this->select($sqlUpdate);

                // $sqlUpdate = "UPDATE $Tabla SET $Campo = ? WHERE $LlavePrimaria = '$ValorCondicion'";
                // $arrData = array($sqlUpdate);

                // $sqlUpdate = $this->update($sqlUpdate, $arrData);
              
                // if (mysqli_affected_rows($sqlUpdate->conexion) > 0) {
                // if ($sqlUpdate) {
                    $move_uploaded_file = move_uploaded_file($_FILES["Archivo"]["tmp_name"], utf8_decode($RutaCompleta));
                    
                    if ($move_uploaded_file) {
                        $answer["typeAnswer"] = true;
                        $answer["archivo"] = $Archivo;
                        $answer["ruta"] = $RutaCompleta;
                        // echo "miremos".$answer["archivo"];
                        // echo "miremos".$answer["ruta"];
                    // }    
                }
            }

            echo json_encode($answer);
        }
    }

    function lreplace($search, $replace, $subject) {
        $pos = strrpos($subject, $search);
        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }
        return $subject;
    }




    // public function GenerateRecordAudit($proceso, $descripcion) {
        
	// 	$fecha=date("Y-m-d");
    //     $stime=date("h").":".date("i");
    //     $direccion = ObtenerIP();
    //     $hostname = gethostname();
        
    //     $cons="INSERT INTO auditoria (Numero_Registro, Fecha, Hora_Actualiza, Equipo, Direccion_Ip, Usuario, Proceso, Descripcion, Nit_Empresa) VALUES
    //         (null,'$fecha',CURRENT_TIMESTAMP, '$hostname', '$direccion','".$_SESSION["usua_nombreCompleto"]."','$proceso','$descripcion','".$_SESSION["Nit_Empresa"]."') ";

    //     $this->consult($cons);
    // }

    public function validateKey(){
        extract($_POST);
        $answer = false;
        $sqlverificar = "SELECT $field AS Nit FROM $table WHERE $field = '$nit'";
        // echo  "SELECT $field AS Nit FROM $table WHERE $field = '$nit'";
        $verificar = $this ->consult($sqlverificar);
        if($verificar != null){
            if($verificar[0]['Nit'] == $nit){
                $answer=true;
            }
        }

        echo json_encode($answer);
    }

}
