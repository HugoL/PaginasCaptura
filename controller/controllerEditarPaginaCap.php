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
	$titulo = stripslashes($titulo);
}
if(isset($_POST["txtsubtitulo"])){
	$subtitulo = $_POST["txtsubtitulo"];
	$subtitulo = stripslashes($subtitulo);
}
if(isset($_POST["txtpretitulo"])){
	$pretitulo = $_POST["txtpretitulo"];
	$pretitulo = stripslashes($pretitulo);
}
if(isset($_POST["txtcodigovideo"])){
	$codigoVideo = $_POST["txtcodigovideo"];
}
if(isset($_POST["txtcodigoform"])){
	$codigoForm = $_POST["txtcodigoform"];
	$codigoForm = stripslashes($codigoForm);
	$codigoLimpio = extraerEstilo($codigoForm);
}
if(isset($_POST["txtaccion"])){
	$accion = $_POST["txtaccion"];
}
if(isset($_POST["txttexto"])){
	$texto = $_POST["txttexto"];
}

	$habilitada = 1;
	$idTipoPagina = 1;
	//comprobar que el usuario es el propietario de la página que se quiere borrar
	if(!esPropietario($idPagina,$current_user->ID)){
		echo "No eres el propietario de la página que quieres eliminar";
		exit();
	}
	//---------------------------------------
	if(isset($_POST["txttextoboton"])){
			$textoboton = $_POST["txttextoboton"];
			$codigoForm = insertarValueSubmit($codigoForm, $textoboton);
	}
	
	if(actualizarPagina($idPagina, $titulo, $subtitulo, $pretitulo, $codigoVideo, $accion, $codigoLimpio, $texto, $habilitada, $idTipoPagina)){
		//cambio los valores del estilo si han sido cambiados
		if(isset($_POST["selestiloform"]) && $_POST["selestiloform"]!= ""){
			$estiloForm = $_POST["selestiloform"];
			cambiarEstiloForm($estiloForm,$idPagina);
		}
		if(isset($_POST["selestiloboton"]) && $_POST["selestiloboton"]!=""){
			$estiloBoton = $_POST["selestiloboton"];
			cambiarEstiloBoton($estiloBoton,$idPagina);
		}			
			header("Location: ../vistas/paUsuario.php?msg=000");
	}else{		
		header("Location: ../vistas/incorrecto.php");
	}

?>