<?php
//ESTE PHP MUESTRA LAS NOTAS DEL USUARIO LOGUEADO

include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
	$idUser = getSessionId();
	/* VARIABLES PARA EL PAGINADOR*/
		 $_pagi_sql = "SELECT * FROM notas_recomendadas WHERE idusuario = '$idUser' ORDER BY id DESC";
		 
		 $_pagi_cuantos = CANT_NOTAS_POR_PAGINA;
													
		 $_pagi_nav_num_enlaces = 5;
													
		 $_pagi_mostrar_errores = FALSE;
													
		 $_pagi_separador = ' ';
	
	/* FIN VARIS*/
	include_once('./paginator.inc.php');
	$cont = 0;
	$arrd = array();
	while ($lineax = $_pagi_result->fetchRow(MDB2_FETCHMODE_OBJECT)){
		$lineax->fecha = convertirFecha($lineax->fecha);
		$arrd[$cont]= $lineax;
		$cont++;
	}
	if ($cont > 0){
		$smarty->assign('template','notas_completa.tpl');
		$smarty->assign('notas_completa',$arrd);
		$smarty->assign('barra',$_pagi_navegacion);
	}else{
			$smarty->assign('template','aviso.tpl');
			$smarty->assign('error',getSessionUsername()." no tiene notas.");
	}
	$smarty->assign('titulo_pagina','Notas de '.getSessionUsername());
	$con-> disconnect();
}else{
	$smarty->assign('template','aviso.tpl');
	$smarty->assign('error',INICIAR_SESION);
}
$smarty->display('index.tpl');

?>
