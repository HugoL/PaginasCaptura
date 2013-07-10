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

	if(isset($_GET["id"])){
		$idPagina = $_GET["id"];	
	}else{
		header("Location: ../vistas/incorrecto.php");
	}
	
	//comprobar que el usuario es el propietario de la página que se quiere borrar
	if(!esPropietario($idPagina,$current_user->ID)){
		echo "No eres el propietario de la página que quieres eliminar";
		exit();
	}
	//---------------------------------------
	if(eliminarPagina($idPagina)){
		header("Location: ../vistas/paUsuario.php?msg=000");
	}else{
		header("Location: ../vistas/incorrecto.php");
	}


?>