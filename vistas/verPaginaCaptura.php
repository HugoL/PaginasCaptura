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
<link rel="stylesheet" href="../css/estilos-hugo.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/<?php echo $estilo['estilo_form'].".css" ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/<?php echo $estilo['boton_form'].".css"; ?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- editor tinymce -->
<script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>
</head>
<body>
  <div id="wrapper">
  <div  id="content">
    <table class="tabla_ventas">
      <tr>
      <td style="width:5%">&nbsp;</td>
      <td style="width:90%">
  <div id="contenido_ventas">
  <div class="titulos">
    <center><div class="pretitulo"><?php echo stripslashes($pagina["pretitulo"]); ?></div></center>
      <div class="titulo"><?php echo stripslashes($pagina["titulo"]); ?></div>
      <center><div class="pretitulo"><?php echo stripslashes($pagina["subtitulo"]); ?></div></center>
  </div><!-- /titulo -->   

  <center><div class="video2"><?php echo stripslashes($pagina["cod_video"]); ?><p>&nbsp;</p></div></center>

  <div class="clearfix">&nbsp;</div>

  <div class="texto"><p><?php echo stripslashes($pagina["texto"]); ?></p></div>

  <center><div class="formulario2"><?php echo stripslashes($pagina["cod_formulario"]); ?></div></center>
 
</div><!-- contenido_ventas -->
</td>
<td style="width:5%">&nbsp;</td>
</table>
</div>      
</div>
</body>
</html>