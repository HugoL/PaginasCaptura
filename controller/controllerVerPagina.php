<?php 
session_start();
require('../../wp-blog-header.php');
require('../../wp-load.php');
global $current_user;
get_currentuserinfo();
if(!isset($current_user->ID) || $current_user->ID==0){  
    header("Location:http://simm-pro.com/zona-de-miembros/");    
    exit();
  }
require_once("../incl/funciones.php");

if(!isset($_GET["id"]) || !isset($_GET["tip"])){
	header("Location: ../vistas/incorrecto.jsp");
	exit();	
}
$id = $_GET["id"];

if($_GET["tip"] == "1"){
	header("Location: ../vistas/verPaginaCap.php?id=".$id);
	exit();
}
if($_GET["tip"] == "2"){
	header("Location: ../vistas/verPaginaVen.php?id=".$id);
	exit();
}

header("Location: ../vistas/incorrecto.php");

?>