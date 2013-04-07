<?php

// MUESTRA LAS ACTIVACIONES DE USUARIOS QUE EL ADMINISTRADOR TIENE QUE REALIZAR (SOLO LOS DESACTIVADOS, NO LOS SUSPENDIDOS)
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if (!(tiene_permisos())){
	$smarty->assign('error',NO_TIENE_PERMISOS);
	$smarty->assign('template','aviso.tpl');
} else
{
	/* VARIABLES PARA EL PAGINADOR*/
		 $_pagi_sql = "SELECT * FROM usuarios WHERE ".USUARIO_DESACTIVADO." = 2 ORDER BY nombre ASC";
		 
		 $_pagi_cuantos = CANT_ACTIVACIONES_POR_PAGINA;
													
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
	$smarty->assign('admin_array_all_activaciones',$arrd);
	$smarty->assign('barra',$_pagi_navegacion);
	$smarty->assign('titulo_pagina','Activaciones Pendientes');
	if ($cont == 0){
		$smarty->assign('error','Nadie se ha registrado ultimamente');
		$smarty->assign('template','aviso.tpl');
	} 
	else{
     		$smarty->assign('template','participantes_activar.tpl');
		}
}
$smarty->display('index.tpl');
?>
