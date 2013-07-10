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
<!-- tags plugin -->
<script src="../js/jquery.tags.js"></script>
<link rel="stylesheet" type="text/css" href="../css/styletags.css" />
</head>
<body>
<div id="wrapper">
 <div  id="content">
 <div class="titulos">
    <center><div class="pretitulo"><?php echo stripslashes($pagina["pretitulo"]); ?></div></center>
      <div class="titulo"><?php echo stripslashes($pagina["titulo"]); ?></div>
      <center><div class="subtitulo"><?php echo stripslashes($pagina["subtitulo"]); ?></div> </center>
  </div>

    <table class="contenidos">
      <tr>
        <td>
        <div class="video">
          <center><?php echo stripslashes($pagina["cod_video"]); ?></center>
         </div><br/>
         <div class="texto"><p><?php echo stripslashes($pagina["texto"]); ?></p></div>
        </td>
        <td class="tdform">
          <div class="arrow"><img src="../img/arrow.png" width="240px" height="158px"/></div>
          <div class="accion"><?php echo stripslashes($pagina["accion"]); ?></div>
        <div><?php echo stripslashes($pagina["cod_formulario"]); ?></div>
        </td>
      </tr>
      <tr>
        <td><!-- texto --></td>
        <td></td>
      </tr>
    </table>
      </div>
      <div class="partederecha">
        
      </div>
    </div>
  </div>
</div>
</body>
</body>
</html>