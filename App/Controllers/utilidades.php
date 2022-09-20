<?php
@session_start();
include_once "../config1Config.php";
include_once "../config1core.php";

class Utilities extends Core {

    // public function GenerateRecordAudit($proceso, $descripcion) {
        
	// 	$fecha=date("Y-m-d");
    //     $stime=date("h").":".date("i");
    //     $direccion = ObtenerIP();
    //     $hostname = gethostname();
        
    //     $cons="INSERT INTO auditoria (Numero_Registro, Fecha, Hora_Actualiza, Equipo, Direccion_Ip, Usuario, Proceso, Descripcion, Nit_Empresa)
    //      VALUES (null,'$fecha',CURRENT_TIMESTAMP, '$hostname', '$direccion','".$_SESSION["usua_nombreCompleto"]."','$proceso','$descripcion','".$_SESSION["Nit_Empresa"]."') ";
    //     $this->consult($cons);
    // }

    public function validateKey(){
        extract($_POST);
        $answer = false;
        
        $sql = "SELECT $field AS Nit FROM $table WHERE $field = '$nit'";
        // echo  "SELECT $campo AS Nit FROM $table WHERE $campo = '$nit'";
        $verificar = $this ->select_all($sql);

        if($verificar != null){
            if($verificar[0]['Nit'] == $nit){
                $answer=true;
            }
        }

        echo json_encode($answer);
    }

}