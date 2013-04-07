<?php
//ESTE PHP MUESTRA LOS EVENTOS DEL USUARIO LOGUEADO

include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
	$idUser = getSessionId();
	/* VARIABLES PARA EL PAGINADOR*/
		 $_pagi_sql = "SELECT * FROM eventos WHERE idusuario = '$idUser' ORDER BY id DESC";
		 
		 $_pagi_cuantos = CANT_ARTICULOS_POR_PAGINA;
													
		 $_pagi_nav_num_enlaces = 5;
													
		 $_pagi_mostrar_errores = FALSE;
													
		 $_pagi_separador = ' ';
	
	/* FIN VARIS*/
	include_once('./paginator.inc.php');
	$cont = 0;
	$arrd = array();
	while ($lineax = $_pagi_result->fetchRow(MDB2_FETCHMODE_OBJECT)){
		$lineax->fecha = convertirFecha($lineax->fecha);
		$arrd[$cont] = $lineax;
		$cont++;
	}
	$smarty->assign('titulo_pagina','Eventos de '.getSessionUsername());
	if ($cont > 0){
		$smarty->assign('template','eventos_full.tpl');
		$smarty->assign('eventos_full',$arrd);
		$smarty->assign('barra',$_pagi_navegacion);
	}else{
			$smarty->assign('template','aviso.tpl');
			$smarty->assign('error',getSessionUsername()." no tiene eventos");
	}
	
	$con-> disconnect();
}else{
	$smarty->assign('template','aviso.tpl');
	$smarty->assign('error',INICIAR_SESION);
}
$smarty->display('index.tpl');

?>
