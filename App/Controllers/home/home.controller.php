<?php
include_once "Config/core.php";


class home extends Core{
    
    public function coffee(){
        $sql = "SELECT * FROM noticias ORDER BY id DESC LIMIT 5";
        $listNoticia =  $this->select_all($sql);
        include_once "views/home/main.php";
        
    }
    public function contactanos(){

        include_once "views/home/contact.php";
        
    }
    public function contributors(){

        include_once "views/home/contributors.php";
        
    }
    public function join(){

        include_once "views/login/login.php";
        
    }
    public function resetByEmail(){
        
        include_once "views/login/reset.php";
        
    }
 
}