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

if(!isset($_POST["txttitulo"]) || $_POST["txttitulo"] == ""){
	header("Location:../vistas/incorrecto.php");
	exit();
}
$pretitulo = "";
$codigoVideo = "";
$texto = "";
$etiquetas = "";
$idUsuario = "";
$idTipoPagina = "";
$urlBtn = "";
$accion = "";

$titulo = $_POST["txttitulo"];

if(isset($_POST["txtpretitulo"])){
	$pretitulo = $_POST["txtpretitulo"];
}
if(isset($_POST["txtcodigovideo"])){
	$codigoVideo = $_POST["txtcodigovideo"];
}
if(isset($_POST["txtaccion"])){
	$accion = $_POST["accion"];
}
if(isset($_POST["txtcodigoform"])){
	$codigoVideo = $_POST["txtcodigoform"];
}
if(isset($_POST["txttexto"])){
	$texto = $_POST["txttexto"];
}
if(isset($_POST["txturlbotoncompra"])){
	$urlBtn = $_POST["txturlbotoncompra"];
}
if(isset($_POST["txttags"])){
	$etiquetas = $_POST["txttags"];
}
if(isset($_POST["hdidusuario"])){
	$idUsuario = $_POST["hdidusuario"];
}else{
	header("Location:../incorrecto.php");
	exit();
}

$idTipoPagina = $_POST["hdidtipopagina"];

$habilitada = 1;
$insertado = insertarPaginaVentas($titulo, $pretitulo, $codigoVideo, $accion, $codigoForm, $texto, $urlBtn, $habilitada, $idUsuario, $idTipoPagina);
if($insertado != false){
	header("Location: ../vistas/paUsuario.php?msg=000");
}else{
	header("Location: ../vistas/incorrecto.php");
}


?>