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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->
<title>Panel administración</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway">
<script language="javascript">
    function confirmar(id){
      if(confirm("Seguro que quieres borrar la página?"))
        document.location.href="../controller/controllerEliminarPagina.php?id="+id;
    }
  </script>
</head>
<body>
	<?php
    //barra superior 
    include("../layouts/navsup.php"); 
  ?>
 <div class="container-fluid">
<div class="row-fluid">
	<div class="clearfix"><p>&nbsp;</p></div>
	<div class="span11">
	    <h2>Panel de Administración</h2>
      <?php 
      if(isset($_GET["msg"])){
        $msg = $_GET["msg"];
        switch ($msg) {
          case '000':
             echo "<div class=\"alert alert-success \">Operación realizada con éxito!</div>";
            break;
          case '001':
             echo "<div class=\"alert alert-error \">No está autorizado para ver el contenido</div>";
            break;
          case '002':
             echo "<div class=\"alert alert-error \">No se ha definido el tipo de página</div>";
            break;
          default:
            echo "<div class=\"alert alert-error \">No se puede realizar la acción solicitada</div>";
            break;
        }

      } ?>
	    <div>Crea una nueva página seleccionando el tipo de página y pinchando en "Crear página"</div>
      <div class="clearfix">&nbsp;</div>
	</div>
	<div class="clearfix"><p>&nbsp;</p></div>
<div class="span11">
  <form id="tipoPaginaForm" name="tipoPaginaForm" method="post" action="../controller/controllerPaUsuario.php">
  <fieldset>
  <div class="well well-large">
  <div class="control-group">
    <div class="controls">      
       	<label class="radio">
  			<input type="radio" name="optionPagina" id="captura" value="captura" checked>Página de captura</label>
		<label class="radio">
  			<input type="radio" name="optionPagina" id="ventas" value="ventas">Página de ventas
		</label>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="controls">
  		<input type="submit" class="btn btn-danger btn-large" value="Crear página" />
  	</div>
  </div><!-- control-group -->  
  </form>
</div><!-- well -->
<div class="span11">
  <div><h4>Páginas creadas:</h4></div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="well well-large">
<table class="table table-hover">
  <tr>
    <th>Título</th>
    <th>Tipo de página</th>    
    <th>Ver</th>
    <th>Editar</th>
    <th>Borrar</th>
  </tr>  
    <?php 
    $resultado = listarPaginasUsuario($current_user->ID);
    while($pagina = mysql_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>".strip_tags($pagina["titulo"])."</td>";
        echo "<td>".dameTextoTipo($pagina["id_tipo_pagina"])."</td>";        
        echo "<td><a href=\"../controller/controllerVerPagina.php?id=".$pagina["id"]."&tip=".$pagina["id_tipo_pagina"]."\" target=\"_blank\" class=\"btn btn-success\"><em class=\"icon icon-eye-open icon-white\"></em></a></td>";
        echo "<td><a href=\"../vistas/editarPaginaCap.php?id=".$pagina["id"]."\" class=\"btn btn-primary\"><em class=\"icon icon-edit icon-white\"></em></a></td>";
        echo "<td><a href=\"javascript:confirmar(".$pagina["id"].")\" class=\"btn btn-danger\"><em class=\"icon icon-remove icon-white\" ></em></a></td>";
        echo "</tr>";
      }
    ?> 
</table></div><!--- well -->
<div class="clearfix">&nbsp;</div>
</div><!-- row-fluid -->
</div><!-- container-fluid -->
</body>
</html>