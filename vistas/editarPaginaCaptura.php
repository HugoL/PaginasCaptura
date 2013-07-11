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

  if(isset($_GET["id"])){
    $idPagina = $_GET["id"];  
  }else{
    header("Location: ../incorrecto.php");
  }
  
  require_once("../incl/funciones.php"); 

  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
<title>Modificar página de captura</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- editor tinymce -->
<script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>
<!-- tags plugin -->
<script src="../js/jquery.tags.js"></script>
<link rel="stylesheet" type="text/css" href="./css/styletags.css" />
<script type="text/javascript">
  tinyMCE.init({
    // General options
    mode : "exact",
    elements : "txttexto",
    theme : "advanced",
    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect,|,media,advhr,|,print",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    // Example word content CSS (should be your site CSS) this one removes paragraph margins
    content_css : "css/word.css",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "lists/template_list.js",
    external_link_list_url : "lists/link_list.js",
    external_image_list_url : "lists/image_list.js",
    media_external_list_url : "lists/media_list.js",

    // Replace values for the template plugin
    template_replace_values : {
      username : "Some User",
      staffid : "991234"
    }
  });
</script>
<script type="text/javascript">
tinyMCE.init({
    // General options
    mode : "exact",
    elements : "txtpretitulo,txtsubtitulo",
    theme : "advanced",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect,forecolor,backcolor",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left"
  });
</script>
<script type="text/javascript">
$(document).ready(function() {  
  $("#titulodiv").hide();
  ("#txttags").tags();

});

</script>
<script language="javascript">
function validar(){
  div = document.getElementById("titulodiv");
  div.style.display="none"; 
    
  if(document.tipoPaginaForm.txttitulo.value==""){
    div = document.getElementById("titulodiv");
    div.style.display="block";
    document.tipoPaginaForm.txttitulo.focus();
    return false;
  }  
  
  document.tipoPaginaForm.submit();
}
  </script>
</head>
<body>
	<?php
    //barra superior 
    include("../layouts/navsup.php") 
  ?>
<div class="container-fluid">
<div class="row-fluid">
	<div class="clearfix"><p>&nbsp;</p></div>
	<div class="span11">
	    <h2>Editar página de captura</h2>	   
      <?php  $pagina = verPagina($idPagina); ?> 
	</div>
<div class="span11">
  <form id="tipoPaginaForm" name="tipoPaginaForm" method="post" action="../controller/controllerEditarPaginaCaptura.php" onsubmit="javascript:return validar()">
  <fieldset>
    <input type="hidden" name="hdidusuario" value="<?php echo $current_user->ID; ?>"/>
    <input type="hidden" name="hdidpagina" value="<?php echo $pagina["id"] ?>"/>
    <input type="hidden" name="hdidtipopagina" value="<?php echo $pagina["id_tipo_pagina"]?>"/>
  <div class="well well-large">
  <div class="control-group">
    <div class="controls">             
      <label>Título:</label>
  		<textarea name="txttitulo" id="titulo" class="span12"><?php echo stripslashes($pagina["titulo"]); ?></textarea>		
      <div id="titulodiv" class="alert alert-error">El título no puede estar vacío</div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Subtítulo: <div style="display:none"><?php echo stripslashes($pagina["subtitulo"]); ?></div></label>
      <textarea name="txtsubtitulo" id="subtitulo" class="span12"><?php echo $pagina["subtitulo"] ?></textarea>   
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Pretítulo:</label>
      <textarea name="txtpretitulo" id="pretitulo" class="span12" ><?php echo stripslashes($pagina["pretitulo"]); ?></textarea>   
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Código del vídeo:</label>
      <textarea name="txtcodigovideo" id="txtcodigovideo"class="span12" rows="5"><?php echo stripslashes($pagina["cod_video"]); ?></textarea>   
    </div>
    <!-- parte derecha --> 
    <ul class="nav nav-list">  
      <li class="divider"></li>  
    </ul>
    <div class="controls">             
      <label>Código formulario:</label>
      <textarea name="txtcodigoform" id="txtcodigoform" rows="4"  class="span12"><?php echo stripslashes($pagina["cod_formulario"]); ?></textarea>   
    </div>    
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Cambiar color del botón:</label>
      <select name="selestiloboton" id="selestiloboton" class="span2">        
        <option selected></option>
        <option value="btn-amarillo" style="background-color:#ff8d00">Amarillo</option>
        <option value="btn-rojo" style="background-color:#ff8d00">Rojo</option>
        <option value="btn-azul" style="background-color:#298ee9">Azul</option>
        <option value="btn-negro" style="background-color:#212121">Negro</option>
        <option value="btn-verde" style="background-color:#2caa07">Verde</option>    
      </select>  
    </div>
     <div class="clearfix">&nbsp;</div>
    <div class="controls">
      <label>Personalizar texto del botón:</label>
      <input type="text" maxlength="20" name="txttextoboton" id="txttextoboton" class="span3" placeholder="Escribe aquí el texto"></textarea>
    </div>
    <ul class="nav nav-list">  
      <li class="divider"></li>
    </ul>
    <!-- /parte derecha -->

    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Texto:</label>
      <textarea name="txttexto" id="txttexto" class="span12" rows="15" ><?php echo stripslashes($pagina["texto"]); ?></textarea>   
    </div>    
    <div class="clearfix">&nbsp;</div>
    <div class="controls">
  		<input type="submit" class="btn btn-danger btn-large" value="Modificar página" />
  	</div>
  </div><!-- control-group -->  
  </form>
</div><!-- well -->
<div class="clearfix">&nbsp;</div>
</div><!-- row-fluid -->
</div><!-- container-fluid -->
</body>
</html>