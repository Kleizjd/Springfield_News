<?php
include_once "Config.php";
include_once "Conexion.php";

class Core
{

    private $server;
    private $user;
    private $password;
    private $database;
    public $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }
    //Insertar un registro
    public function insert(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrVAlues = $arrValues;
        $insert = $this->conexion->prepare($this->strquery);
        $resInsert = $insert->execute($this->arrVAlues);
        if ($resInsert) {
            $lastInsert = $this->conexion->lastInsertId();
        } else {
            $lastInsert = 0;
        }
        return $lastInsert;
    }
    //Busca un registro
		public function select(string $query)
		{
			$this->strquery = $query;
        	$result = $this->conexion->prepare($this->strquery);
			$result->execute();
        	$data = $result->fetch(PDO::FETCH_ASSOC);
        	return $data;
		}
		//Devuelve todos los registros
		public function select_all(string $query)
		{
			$this->strquery = $query;
        	$result = $this->conexion->prepare($this->strquery);
			$result->execute();
        	$data = $result->fetchAll(PDO::FETCH_ASSOC);
        	return $data;
		}
		//Actualiza registros
		public function update(string $query, array $arrValues)
		{
			$this->strquery = $query;
			$this->arrVAlues = $arrValues;
			$update = $this->conexion->prepare($this->strquery);
			$resExecute = $update->execute($this->arrVAlues);
	        return $resExecute;
		}
		//Eliminar un registros
		public function delete(string $query)
		{
			$this->strquery = $query;
        	$result = $this->conexion->prepare($this->strquery);
			$del = $result->execute();
        	return $del;
		}
}
    // public function __construct() {
    //     $this->setConnect();
    //     $this->Connect();
    // } 
    // private function setConnect() {
    //     require "Config.php";

    //     $this->server = $server;
    //     $this->user = $user;
    //     $this->password = $password;
    //     $this->database = $database;

    // }
    
    // public function Connect()
    // {
    //     $this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database);
    //     if (mysqli_connect_errno()) {
    //         echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>", mysqli_connect_error();
    //         exit();
    //     } else {
    //         $this->conexion->set_charset("utf8");
    //     }
    // }
     // public function getConnect()
    // {
    //     return $this->conexion;
    // }

    // public function closeConnect()
    // {
    //     mysqli_close($this->conexion);
    // }
    // public function execute($sql)
    // {
    //     $conexion = $this->Connect();
    //     if ($this->conexion) {
    //         $result = mysqli_query($this->conexion, $sql);
    //         return $result;
    //     } else {
    //         echo mysqli_errno();
    //     }
    // }
