<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');
if (hay_alguien()){
		$idUser = getSessionUsername(); //El usuario quiere ver su Bandeja de Entrada
		if ( (isset($_GET['leido']) && ($_GET['leido'] == MENSAJE_TODOS))  || (!(isset($_GET['leido']))) ){
			$consulta ="SELECT * FROM mensajes WHERE (destinatario = '$idUser') ORDER BY id DESC";
			$smarty->assign('titulo_pagina','Mensajes de '.$idUser);
		}else{
			if ($_GET['leido'] == MENSAJE_NO_LEIDO){
				$msg_state = MENSAJE_NO_LEIDO;
				$consulta ="SELECT * FROM mensajes WHERE (destinatario = '$idUser') AND (leido = '$msg_state') ORDER BY id DESC";
				$smarty->assign('titulo_pagina','Mensajes Nuevos de '.$idUser);
			}
		}
		$smarty->assign('msg_user',$idUser);
		/* VARIABLES PARA EL PAGINADOR*/
		 $_pagi_sql = $consulta;
		 
		 $_pagi_cuantos = CANT_MENSAJES_POR_PAGINA;
													
		 $_pagi_nav_num_enlaces = 5;
													
		 $_pagi_mostrar_errores = FALSE;
													
		 $_pagi_separador = ' ';
	
	/* FIN VARIS*/
	include_once('./paginator.inc.php');
		$cont = 0;
		$arrd = array();
		while ($lineax = $_pagi_result->fetchRow(DB_FETCHMODE_OBJECT)){
			$arrd[$cont]= $lineax;
			$cont++;
		}
		if ($cont == 0){
			if ( (isset($_GET['leido'])) && ($_GET['leido'] == MENSAJE_NO_LEIDO) ){ // SI SELECCIONO FILTRAR POR NO LEIDOS
				$smarty->assign('error','NO TIENE MENSAJES SIN LEER');
				$smarty->assign('link_temp','./bandeja_entrada.php');
				$smarty->assign('desc_temp','Volver a Bandeja de Entrada');
			}
			else{
    				$smarty->assign('error','NO TIENE MENSAJES EN SU BANDEJA DE ENTRADA');
				}
			$smarty->assign('template','aviso.tpl');
		} else
			{
				$smarty->assign('mensaje',$arrd);
				$smarty->assign('barra',$_pagi_navegacion);
				$smarty->assign('template','mensajes.tpl');
			}
		$con-> disconnect();
} else{
	$smarty->assign('error',INICIAR_SESION);
	$smarty->assign('template','aviso.tpl');
	}
$smarty->display('index.tpl');
?>
