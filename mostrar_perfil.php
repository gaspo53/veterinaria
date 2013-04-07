<?php

//ESTE PHP MUESTRA EL PERFIL DEL USUARIO ELEGIDO
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');
if (hay_alguien()){
	$con = conectar_DB();
	$id_usuario=$_GET['id'];
	$consulta ="SELECT * FROM usuarios WHERE (id = $id_usuario) AND (estado = ".USUARIO_ACTIVADO.")";
	if (tiene_permisos()) // SI ES UN ADMIN, MESTRA TODOS, SIN IMPORTAR SU ESTADO
			$consulta ="SELECT * FROM usuarios WHERE id = $id_usuario";
	$resul=$con->query($consulta);
	if ($lineax = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$lineax->nombre = pasarATexto($lineax->nombre);
		$lineax->apellido = pasarATexto($lineax->apellido);
		$lineax->direccion = pasarATexto($lineax->direccion);
		$lineax->profesion = pasarATexto($lineax->profesion);
		$smarty->assign('usuario',$lineax);
		$smarty->assign('titulo_pagina','Perfil del participante');
		$smarty->assign('template','info_usuario.tpl');
		$con-> disconnect();
	}else{
		$smarty->assign('template','aviso.tpl');
		$smarty->assign('error', USER_NOT_EXISTS);
	}
} else{
		$smarty->assign('template','aviso.tpl');
		$smarty->assign('error', INICIAR_SESION);
	}
$smarty->display('index.tpl');
?>