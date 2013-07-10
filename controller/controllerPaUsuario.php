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


switch ($_GET["t"]) {
  case '1':
    header("Location:../vistas/paPaginaCap.php");
    break;
  case '2':
    header("Location:../vistas/paPaginaVid.php");
    break;
  case '3':
    header("Location:../vistas/paPaginaCaptura.php");
    break;
  default:
    header("Location:../vistas/paUsuario.php?msg=002");
    break;
}

/*if(isset($_POST["optionPagina"])){
    $tipoPagina = $_POST["optionPagina"];
  
  if($tipoPagina=="captura"){
  	header("Location:../vistas/paPaginaCap.php");
  }else{
  	if($tipoPagina=="ventas"){
  		header("Location:../vistas/paPaginaVid.php");
  	}else{
  		header("Location:../vistas/incorrecto.php");
  	}
  }
}else{
  header("Location:../vistas/paUsuario.php?msg=002");
}*/
?>