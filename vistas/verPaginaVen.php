<?php
require_once("../incl/funciones.php");

if(isset($_GET["id"])){
	$idPagina = $_GET["id"];
}else{
  header("Location: ../vistas/incorrecto.php");
}

$pagina = verPagina($idPagina);
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
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
<script type="text/javascript" src="../js/jquery.js"></script>
<!-- editor tinymce -->
<script type="text/javascript" src="../js/tiny_mce/tiny_mce.js"></script>
<!-- tags plugin -->
<script src="../js/jquery.tags.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styletags.css" />
</head>
<body>
  <div id="wrapper">
  <div  id="content">
    <table class="tabla_ventas">
      <tr>
      <td style="width:20%">&nbsp;</td>
      <td style="width:60%">
  <div id="contenido_ventas">
  <div class="titulos">
    <center><div class="pretitulo"><?php echo stripslashes($pagina["pretitulo"]); ?></div></center>
      <div class="titulo"><?php echo stripslashes($pagina["titulo"]); ?></div>
  </div><!-- /titulo -->
  

  <div class="video"><center><p><?php echo stripslashes($pagina["cod_video"]); ?></p></center></div> 

  <div class="texto"><p><?php echo stripslashes($pagina["texto"]); ?></p></div>

  <div class="arrow">&nbsp;</div>
  <div class="accion"><center><?php echo stripslashes($pagina["accion"]); ?></center></div><br/>

  <div><?php echo stripslashes($pagina["cod_formulario"]); ?></div>

  <div class="btn_compra"><center><a href="<?php echo $pagina['url_btn_compra'] ?>"><img src="../img/boton_compra.png" /></a></center></div>
</div><!-- contenido_ventas -->
</td>
<td style="width:20%">&nbsp;</td>
</table>
</div>      
</div>
</body>
</html>