<?php
ob_start();
session_start();

	unset($_SESSION["usuario"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Acceso formulario inscripción</title>
<![if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      body { padding-top: 40px; padding-left:30px; padding-right:30px; }
    </style>
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">	
	<script language="javascript">
function validar(){
	div = document.getElementById("nombrediv");
	div.style.display="none";
	div = document.getElementById("passdiv");
	div.style.display="none";
		
	
	if(document.form_login.usuario.value==""){
		div = document.getElementById("nombrediv");
		div.style.display="block";
		document.form_login.usuario.focus();
		return false;
	}

	if(document.form_login.pass.value==""){
		div = document.getElementById("passdiv");
		div.style.display="block";
		document.form_login.pass.focus();
		return false;
	}
	
	document.form_login.submit();
}
</script>
</head>

<body>
<div class="container">
			<div class="row-fluid">
			<div class="span12"><p><h1>xxxxxxxxxxxxxxxx</h1>Cambia el texto<br /><br /></p></div>
				<div class="login-form span12">					
					<form action="./procesar/procesar_login.php" onsubmit="javascript:return validar()" id="form_login" name="form_login" method="post">
						<fieldset>
						<div class="hero-unit">
						<div class="span12" align="center"><h3>Login</h3></div>
							<div class="clearfix">
								<div class="span12" align="center"><input type="text" placeholder="Nombre de usuario" name="usuario"><div id="nombrediv" style="display:none" class="alert alert-error"><h3>Nombre de usuario vacío</h3></div>
								</div>
							</div>
							<div class="clearfix">
								<div class="span12" align="center"><input type="password" placeholder="Contraseña" name="pass"><div id="passdiv" style="display:none" class="alert alert-error"><h3>Contraseña vacía</h3></div></div>
							</div>
							<div class="span12" align="center"><button class="btn btn-danger" type="submit">Entrar</button></div>
							</div><!-- hero-unit -->
						</fieldset>
					</form>
				</div>
			</div>
	</div> <!-- /container -->
</body>
</html>
