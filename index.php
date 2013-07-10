<?php 
  //require_once("./incl/funciones.php");
//include("../nuevo/wp-login.php");
session_start();
require('../wp-blog-header.php');
require('../wp-load.php');

global $current_user;
get_currentuserinfo();
if(isset($current_user->ID) && $current_user->ID!=0){	 
  	$_SESSION["idUsuario"] = $current_user->ID;
  	header("Location: ./vistas/paUsuario.php");
}else{
	echo "Usuario no identificado<br/><a href='http://simm-pro.com/zona-de-miembros/'>Identificarse</a>";
}
?>

