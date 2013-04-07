<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if (!(tiene_permisos())){ // SI NO ES ADMIN NO PUEDE ACCEDER A ESTA OPCION
	$smarty->assign('error',NO_TIENE_PERMISOS);
	$smarty->assign('template','aviso.tpl');
} else
{
		/* VARIABLES PARA EL PAGINADOR*/
	     $username = getSessionUsername();
		 
		 $_pagi_sql = "SELECT * FROM usuarios WHERE (username <> '$username') ORDER BY tipo,username ASC"; 
		 // NO MUESTRO EL ADMIN QUE ESTA LOGUEADO, NO TIENE SENTIDO CAMBIARSE A SI MISMO DE TIPO DE USUARIO, ENTRE OTRAS COSAS
		 $_pagi_cuantos = CANT_PARTICIPANTES_POR_PAGINA;
													
		 $_pagi_nav_num_enlaces = 5;
													
		 $_pagi_mostrar_errores = FALSE;
													
		 $_pagi_separador = ' ';
	
		/* FIN VARIS*/
	include_once('./paginator.inc.php');
	$cont = 0;
	$arrd = array();
	while ($lineax = $_pagi_result->fetchRow(DB_FETCHMODE_OBJECT)){
		$arrd[$cont] = $lineax;
		$cont++;
	}
	$smarty->assign('admin_array_all',$arrd);
	$smarty->assign('barra',$_pagi_navegacion);
	$con-> disconnect();
	$smarty->assign('titulo_pagina','Administrar Participantes');
	$smarty->assign('template','participantesAll.tpl');
}
$smarty->display('index.tpl');
?>
