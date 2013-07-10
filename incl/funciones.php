<?php
require_once("conf.php");

$conexion = mysql_connect($DBhost,$DBuser,$DBpassword);
if(!mysql_select_db($DBname,$conexion)){	
	echo "imposible conectar con la base de dawwtos";
	exit();
}

function insertarPagina($titulo, $subtitulo, $pretitulo,$codigoVideo,$accion,$codigoFormulario,$texto,$habilitada,$idUsuario,$idTipoPagina){
	$insertar = sprintf("INSERT INTO hl_paginas_captura(titulo,subtitulo,pretitulo,cod_video,accion,cod_formulario,texto,habilitada,id_usuario,id_tipo_pagina) VALUES ('%s','%s','%s','%s','%s','%s','%s',%u,%u,%u)",mysql_real_escape_string($titulo),mysql_real_escape_string($subtitulo),mysql_real_escape_string($pretitulo),mysql_real_escape_string($codigoVideo),mysql_real_escape_string($accion),mysql_real_escape_string($codigoFormulario),mysql_real_escape_string($texto),$habilitada,$idUsuario,$idTipoPagina);		
		
		$insertado = mysql_query($insertar) or die(mysql_error());

		if($insertado){
			return mysql_insert_id();
		}
		
		return $insertado;	
}

function insertarPaginaVentas($titulo, $pretitulo,$codigoVideo,$accion,$codigoFormulario,$texto,$url,$habilitada,$idUsuario,$idTipoPagina){
	$insertar = sprintf("INSERT INTO hl_paginas_captura(titulo,pretitulo,cod_video,accion,cod_formulario,texto,url_btn_compra,habilitada,id_usuario,id_tipo_pagina) VALUES ('%s','%s','%s','%s','%s','%s','%s',%u,%u,%u)",mysql_real_escape_string($titulo),mysql_real_escape_string($pretitulo),mysql_real_escape_string($codigoVideo),mysql_real_escape_string($accion),mysql_real_escape_string($codigoFormulario),mysql_real_escape_string($texto),mysql_real_escape_string($url),$habilitada,$idUsuario,$idTipoPagina);		
		$insertado = mysql_query($insertar) or die(mysql_error());

		if($insertado){
			return mysql_insert_id();
		}
		
		return $insertado;	
}

function listarPaginasUsuario($idUsuario){	
		$orden= sprintf("SELECT * FROM hl_paginas_captura WHERE id_usuario = %u",$idUsuario);
		$conList = mysql_query($orden) or die(mysql_error());	

		return $conList;
}

function verPagina($idPagina){	
		$orden= sprintf("SELECT * FROM hl_paginas_captura WHERE id = %u",$idPagina);
		$result = mysql_query($orden) or die(mysql_error());

		$resultado = mysql_fetch_assoc($result);

		return $resultado;
}

function esPropietario($idPagina, $idUsuario){
	$orden= sprintf("SELECT id_usuario FROM hl_paginas_captura WHERE id = %u",$idPagina);
	$result = mysql_query($orden) or die(mysql_error());	
	$resultado = mysql_fetch_assoc($result);
	if($resultado["id_usuario"]== $idUsuario){
		return true;
	}
	return false;
}

function eliminarPagina($idPagina){
	$orden = sprintf("DELETE FROM hl_paginas_captura WHERE id = %u",$idPagina);
		$eliminado = mysql_query($orden) or die(mysql_error());	

		return $eliminado;
}

function actualizarPagina($idPagina,$titulo,$subtitulo,$pretitulo,$codigoVideo,$accion,$codigoForm, $texto,$habilitada,$idTipoPagina){	
		$actualizar= sprintf("UPDATE hl_paginas_captura SET titulo = '%s',subtitulo = '%s',pretitulo = '%s',cod_video = '%s', accion = '%s', cod_formulario = '%s', texto = '%s',habilitada = %u,id_tipo_pagina = %u WHERE id = %u",mysql_real_escape_string($titulo),mysql_real_escape_string($subtitulo),mysql_real_escape_string($pretitulo),mysql_real_escape_string($codigoVideo),mysql_real_escape_string($accion),mysql_real_escape_string($codigoForm),mysql_real_escape_string($texto),$habilitada,$idTipoPagina,$idPagina);

		$actualizado = mysql_query($actualizar);

		return $actualizado;
}

function dameTextoTipo($idTipo){
	$orden= sprintf("SELECT tipo FROM hl_tipos_pagina WHERE id = %u",$idTipo);
		$result = mysql_query($orden) or die(mysql_error());
	$tipo = mysql_fetch_assoc($result);

	return $tipo["tipo"];
}

function dameTiposPagina(){
	$orden= sprintf("SELECT tipo FROM hl_tipos_pagina");
	$result = mysql_query($orden) or die(mysql_error());

	return $result;
}

function insertaEstilos($idPagina, $estilo, $estiloForm){
	$insertar = sprintf("INSERT INTO hl_paginas_estilos(id_pagina,boton_form, estilo_form) VALUES ('%u','%s','%s')",$idPagina, mysql_real_escape_string($estilo), mysql_real_escape_string($estiloForm));		
		
		$insertado = mysql_query($insertar) or die(mysql_error());

		return $insertado;
}

function dameEstilos($idPagina){
	$orden= sprintf("SELECT boton_form, estilo_form FROM hl_paginas_estilos WHERE id_pagina = %u",$idPagina);
		$result = mysql_query($orden) or die (mysql_error());

	$estilo = mysql_fetch_assoc($result);
	if($estilo["boton_form"] == ""){
		$estilo["boton_form"] = "btn-rojo";
	}
	if($estilo["estilo_form"] == ""){
		$estilo["estilo_form"] = "form-basico";
	}
	return $estilo;

}

function extraerEstilo($texto){
	$pos = stripos($texto, "</style>");
	
	if ($pos === false) {
    	return $texto;
	} else {
    	$fin = strlen($texto);
		$extracto = substr($texto, $pos+8, $fin);
		return $extracto;
	}
	
}

function insertarPlaceholderNombre($texto,$valor){
	$pos = stripos($texto, "name=\"name\"");
	
	if ($pos === false) {
    	return $texto;
	} else {		
    	$fin = strlen($texto);
		$extracto = substr($texto, 0, $pos+11)." placeholder='".$valor."'".substr($texto, $pos+11,$fin);
		return $extracto;
	}
}

function insertarPlaceholderEmail($texto,$valor){
	$pos = stripos($texto, "name=\"email\"");
	
	if ($pos === false) {
    	return $texto;
	} else {		
    	$fin = strlen($texto);
		$extracto = substr($texto, 0, $pos+12)." placeholder='".$valor."'".substr($texto, $pos+12,$fin);
		return $extracto;
	}
}

function cambiarEstiloForm($estilo,$idPagina){
	$actualizar= sprintf("UPDATE hl_paginas_estilos SET estilo_form = '%s'WHERE id_pagina = %u",mysql_real_escape_string($estilo),$idPagina);

		$actualizado = mysql_query($actualizar);

		return $actualizado;
}

function cambiarEstiloBoton($estilo,$idPagina){
	$actualizar= sprintf("UPDATE hl_paginas_estilos SET boton_form = '%s'WHERE id_pagina = %u",mysql_real_escape_string($estilo),$idPagina);

		$actualizado = mysql_query($actualizar);

		return $actualizado;
}


function insertarValueSubmit($texto, $valor){
	$pos = stripos($texto, "type=\"submit\"");
	
	if ($pos === false) {
    	return $texto;
	} else {		
    	$fin = strlen($texto);
		$extracto = substr($texto, 0, $pos+13)." value='".$valor."'".substr($texto, $pos+13,$fin);
		return $extracto;
	}
}

?>