<?php 
  //require_once("./incl/funciones.php");
if(isset($_POST["optionPagina"])){
  $tipoPagina = $_POST["optionPagina"];
}else{
  $tipoPagina = "TIPO DE PÁGINA NO RECONOCIDO";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
<title>Crear página</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
<script type="text/javascript" src="./js/jquery.js"></script>
<!-- editor tinymce -->
<script type="text/javascript" src="./js/tiny_mce/tiny_mce.js"></script>
<!-- tags plugin -->
<script src="./js/jquery.tags.js"></script>
<link rel="stylesheet" type="text/css" href="./css/styletags.css" />
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

</script type="text/javascript">
$(document).ready(function() {  
  ('#txttags').tags();
});
<script>

</script>
</head>
<body>
	<?php
    //barra superior 
    include("layouts/navsup.php") 
  ?>
<div class="container-fluid">
<div class="row-fluid">
	<div class="clearfix"><p>&nbsp;</p></div>
	<div class="span11">
	    <h2>Crear página <?php echo $tipoPagina; ?></h2>	    
	</div>
<div class="span11">
  <form id="tipoPaginaForm" name="tipoPaginaForm" method="post" action="#">
  <fieldset>
  <div class="well well-large">
  <div class="control-group">
    <div class="controls">             
      <label>Título:</label>
  		<input type="text" name="txttitulo" id="titulo" class="span12" />		
    </div>
    <div class="controls">             
      <label>Código del vídeo:</label>
      <textarea name="txtcodigo" id="txtcodigo" placeholder="pega aquí el código de tu vídeo" class="span12" rows="8" ></textarea>   
    </div>
    <div class="controls">             
      <label>Texto:</label>
      <textarea name="txttexto" id="txttexto" placeholder="introduce aquí el texto" class="span12" rows="5" ></textarea>   
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">             
      <label>Etiquetas:</label>
      <input type="text" name="txttags" id="txttags" class="span12" />  
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