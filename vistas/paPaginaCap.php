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

  $idTipoPagina = 1;
  //require_once("./incl/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
<title>Crear página</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
<script type="text/javascript" src="../js/jquery.js">
</script>
<!-- editor tinymce -->
<script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>
<!-- tags plugin -->
<script src="../js/jquery.tags.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styletags.css" />
<script type="text/javascript">
  tinyMCE.init({
    // General options
    mode : "exact",
    elements : "txttexto",
    theme : "advanced",
    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
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
  $('input.tags').tags({
        separator:   ',',
        maxTagWords: 6,
        tagAdded:    function(tag) { console.log('Tag added:'+tag); },
        tagRemoved:  function(tag) { console.log('Tag removed:'+tag); }
      });

});

</script>
<script language="javascript">
function validar(){
  div = document.getElementById("titulodiv");
  div.style.display="none"; 
    
  if(document.tipoPaginaForm.txttitulo.value.length==0){
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
	    <h2>Crear página de captura</h2>	    
	</div>
<div class="span11">
  <form id="tipoPaginaForm" name="tipoPaginaForm" method="post" action="../controller/controllerInsertarPaginaCap.php" onsubmit="javascript:return validar()">
  <fieldset>
    <input type="hidden" name="hdidusuario" value="<?php echo $current_user->ID; ?>"/>
    <input type="hidden" name="hdidtipopagina" value="<?php echo $idTipoPagina ?>"/>
  <div class="well well-large">
  <div class="control-group">
    <div class="controls">             
      <label>Título:</label>
  		<textarea name="txttitulo" id="titulo" class="span12" placeholder="ponle un título a tu página" ></textarea>		
      <div id="titulodiv" class="alert alert-error">El título no puede estar vacío</div>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Pretítulo:</label>
      <textarea name="txtpretitulo" id="pretitulo" class="span12" placeholder="ponle un pretítulo a tu página (opcional)" ></textarea>   
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Subtítulo:</label>
      <textarea name="txtsubtitulo" id="subtitulo" class="span12" placeholder="ponle un subtítulo a tu página (opcional)" ></textarea>   
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Código del vídeo:</label>
      <textarea name="txtcodigovideo" id="txtcodigovideo" placeholder="pega aquí el código de tu vídeo" class="span12" rows="5" ></textarea>   
    </div>
    <div class="controls">             
      <label>Llamada a la acción:</label>
      <input type="text" name="txtaccion" id="txtcodigoform" placeholder="texto que aparecerá encima del formulario" class="span12" />  
    </div>
    <div class="controls">             
      <label>Código formulario:</label>
      <textarea name="txtcodigoform" id="txtcodigoform" placeholder="introduce aquí el código del formulario" class="span12" rows="4" ></textarea>   
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Texto:</label>
      <textarea name="txttexto" id="txttexto" placeholder="introduce aquí el texto" class="span12" rows="15" ></textarea>   
    </div>
    <div class="clearfix">&nbsp;</div>    
    <div class="controls">             
      <label>Etiquetas:</label>
      <input type="text" name="txttags" id="txttags" class="tags span12" placeholder="escribe una etiqueta y pulsa intro" />  
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Color de botón:</label>
      <select name="selboton" id="selboton" class="span2" >
        <option value="btn-amarillo" >Amarillo</option>
        <option value="btn-rojo">Rojo</option>
        <option value="btn-azul">Azul</option>
        <option value="btn-negro">Negro</option>
        <option value="btn-verde">Verde</option>
      </select> 

      <label>Texto del botón:</label> 
      <input type="text" name="txttextoboton" id="txttextoboton" class="span2" maxlength="20"/>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Estilo del formulario:</label>
      <select name="selestilo" id="selestilo" class="span2" >
        <option value="form-basico">Formulario sencillo</option>
        <option value="form-flecha">Formulario con flecha</option>
      </select>  
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">
  		<input type="submit" class="btn btn-danger btn-large" value="Crear página" />
  	</div>
  </div><!-- control-group -->    
  </form>
</div><!-- well -->
<div class="clearfix">&nbsp;</div>
</div><!-- row-fluid -->
</div><!-- container-fluid -->
</body>
</html>