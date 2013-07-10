<!-- barra superior -->
<?php 
/*require('../../wp-blog-header.php');
require('../..//wp-load.php');
get_currentuserinfo();
global $current_user; 
*/
?>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="../vistas/paUsuario.php">Sistema prospección</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Hola <a href="#" class="navbar-link"><?php echo $current_user->display_name; ?>!</a>
            </p>
            <ul class="nav">           
              <li><a href="#about"><em class="icon icon-user icon-white"> </em> Zona de miembros</a></li>            
              <li><a href="../vistas/logout.php"><em class="icon icon-off icon-white"> </em> Salir</a></li>              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	<!-- fin barra superior -->