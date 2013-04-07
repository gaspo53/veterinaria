<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if ( (hay_alguien()) && (es_admin(getSessionId())) ){
	/* VARIABLES PARA EL PAGINADOR*/
		 $_pagi_sql = "SELECT * FROM contacto ORDER BY id DESC";
		 
		 $_pagi_cuantos = CANT_MENSAJES_POR_PAGINA;
													
		 $_pagi_nav_num_enlaces = 5;
													
		 $_pagi_mostrar_errores = FALSE;
													
		 $_pagi_separador = ' ';
	
	/* FIN VARIS*/
	include_once('./paginator.inc.php');
	$arreglo= array();
	$cont=0;
	while ($lineax = $_pagi_result->fetchRow(DB_FETCHMODE_OBJECT)){
		$arreglo[$cont++]=$lineax;
	}	
	if ($cont == 0){ 
		$smarty->assign('info_user',"No hay mensajes de contacto");
	}
	$smarty->assign('mensaje_contacto',$arreglo);
	$smarty->assign('titulo_pagina','Mensajes de contacto');
	$smarty->assign('barra',$_pagi_navegacion);
	$smarty->assign('template','mensaje_contacto.tpl');
	$con-> disconnect();
}else{
		$smarty->assign('error',NO_TIENE_PERMISOS);
		$smarty->assign('template','aviso.tpl');
	}
$smarty->display('index.tpl');
?>