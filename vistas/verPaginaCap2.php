<?php
if(isset($_GET["id"])){
	$idPagina = $_GET["id"];
}else{
  header("Location: ../vistas/incorrecto.php");
}

require_once("../incl/funciones.php");

$pagina = verPagina($idPagina);

$estilo = dameEstilos($idPagina);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
<title>Ver página</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/white.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/<?php echo $estilo['estilo_form'].".css" ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/<?php echo $estilo['boton_form'].".css"; ?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- editor tinymce -->
<script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>
<!-- tags plugin -->
<script src="../js/jquery.tags.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styletags.css" />
</head>
	<body>
<div class="container-fluid">
<div class="row-fluid">
  <div class="clearfix">&nbsp;</div>
  <div align="center">
    <div class="span12" id="contenido">
    <div class="span12">
       <div class="pretitulo"><?php echo $pagina["pretitulo"]; ?></div>
      <div class="titulo"><?php echo $pagina["titulo"] ?></div>
      <div class="subtitulo"><?php echo $pagina["subtitulo"]; ?></div>     
    </div><!-- row -->

    <div class="row-fluid">
      <div class="span8" align="right">
      <div class="video"><?php echo $pagina["cod_video"]; ?></div>
      <div class="span3">
        <div class="formCap">
          <div class="arrow">&nbsp;</div>
          <div class="codigoform">
            <div class="accion"><?php echo $pagina["accion"] ?></div>
            <div><?php echo $pagina["cod_formulario"]; ?></div>
            <div class="controls"></div>
          </div>
        </div>      
      <div class="texto span8"><p><?php echo $pagina["texto"]; ?></p></div>
      <div class="clearfix">&nbsp;</div>      
    </div>    
    </div>   
  </div><!-- well -->
</div>
<div class="clearfix">&nbsp;</div>
</div><!-- row-fluid -->
</div><!-- container-fluid -->
</div>
</body>
</body>
</html>