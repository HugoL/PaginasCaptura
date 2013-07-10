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

if(empty($_POST["txttitulo"])){	
	header("Location:../vistas/incorrecto.php");
	exit();
}
$subtitulo = "";
$pretitulo = "";
$codigoVideo = "";
$codigoForm = "";
$texto = "";
$etiquetas = "";
$idUsuario = "";
$idTipoPagina = "";
$colorBtn = "";
$estilo = "form-basico";
$accion = "";

$titulo = $_POST["txttitulo"];
if(isset($_POST["txtsubtitulo"])){
	$subtitulo = $_POST["txtsubtitulo"];
}
if(isset($_POST["txtpretitulo"])){
	$pretitulo = $_POST["txtpretitulo"];
}
if(isset($_POST["txtcodigovideo"])){
	$codigoVideo = $_POST["txtcodigovideo"];
}
if(isset($_POST["txtcodigoform"])){
	$codigoForm = $_POST["txtcodigoform"];
	$codigoFormLimpio = extraerEstilo($codigoForm);
	$codigoFormLimpio = insertarPlaceholderNombre($codigoFormLimpio,'name');	
	$codigoFormLimpio = insertarPlaceholderEmail($codigoFormLimpio,'email');	
	if(isset($_POST["txttextoboton"])){
		$textoboton = $_POST["txttextoboton"];
		$codigoFormLimpio = insertarValueSubmit($codigoFormLimpio, $textoboton);
	}
}
if(isset($_POST["txttexto"])){
	$texto = $_POST["txttexto"];
}
if(isset($_POST["txttags"])){
	$etiquetas = $_POST["txttags"];
}
if(isset($_POST["txtaccion"])){
	$accion = $_POST["txtaccion"];
}
if(isset($_POST["hdidusuario"])){
	$idUsuario = $_POST["hdidusuario"];
}else{
	header("Location:../vistas/incorrecto.php");
	exit();
}
if(isset($_POST["hdidtipopagina"])){
	$idTipoPagina = $_POST["hdidtipopagina"];
}else{
	header("Location:../vistas/incorrecto.php");
	exit();
}
if(isset($_POST["selestilo"])){
	$estilo = $_POST["selestilo"];
}

$colorBtn = $_POST["selboton"];
$habilitada = 1;
$insertado = insertarPagina($titulo, $subtitulo, $pretitulo, $codigoVideo, $accion, $codigoFormLimpio, $texto, $habilitada, $idUsuario, $idTipoPagina);

if($insertado!=false){
	//inserto el estilo del botón seleccionado
	insertaEstilos($insertado, $colorBtn, $estilo);	
	header("Location: ../vistas/paUsuario.php?msg=000");
}else{
	header("Location: ../vistas/incorrecto.php");
}


?>