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

if(isset($_POST["hdidpagina"])){
	$idPagina = $_POST["hdidpagina"];
}else{
	header("Location:../vistas/incorrecto.php");
	exit();
}
if(isset($_POST["txttitulo"])){
	$titulo = $_POST["txttitulo"];
}
if(isset($_POST["txtsubtitulo"])){
	$subtitulo = $_POST["txtsubtitulo"];
}
if(isset($_POST["txtpretitulo"])){
	$pretitulo = $_POST["txtpretitulo"];
}
if(isset($_POST["txtcodigovideo"])){
	$codigoVideo = $_POST["txtcodigovideo"];
}

if(isset($_POST["txttexto"])){
	$texto = $_POST["txttexto"];
}
	$habilitada = 1;
	$idTipoPagina = 2;
	$codigoForm = "";
	//comprobar que el usuario es el propietario de la página que se quiere borrar
	if(!esPropietario($idPagina,$_SESSION["idUsuario"])){
		echo "No eres el propietario de la página que quieres eliminar";
		exit();
	}
	//---------------------------------------
	if(actualizarPagina($idPagina, $titulo, $subtitulo, $pretitulo, $codigoVideo, $codigoForm, $texto, $habilitada, $idTipoPagina)){
			header("Location: ../vistas/paUsuario.php?msg=000");
	}else{
		header("Location: ../vistas/incorrecto.php");
	}

?>