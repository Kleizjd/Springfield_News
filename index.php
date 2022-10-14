<?php
if (isset($_SESSION)) {
    header("Location: WEB/Pages/");
} else{
    require_once "views/home/home.php"; 
}