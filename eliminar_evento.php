<?php

include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
		$id_novedad = $_GET['id'];
		if ((es_duenio_del_evento($_GET['id'])) || (es_admin(getSessionId()))){
				//SOLO LO PUEDE ELIMINAR SI ES EL DUE�O O ES UN ADMIN
			$con = conectar_DB();
			$consulta ="DELETE FROM eventos WHERE id = '$id_novedad'";
			$resul=$con->query($consulta);
			if (MDB2::isError($resul)){
					$smarty->assign('error',DELETE_EVENT_ERROR);
			} else {
					$smarty->assign('error', DELETE_EVENT_SUCCESS);
					}
		$smarty->assign('link_temp','./mis_eventos.php');
		$smarty->assign('desc_temp','Volver a Mis Eventos');
		$smarty->assign('link_temp2','./eventos.php');
		$smarty->assign('desc_temp2','Volver a Eventos');
		}else
			{$smarty->assign('error',EVENT_OWN);
			}
				
} else {$smarty->assign('error',INICIAR_SESION);
		}
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
$smarty->assign('titulo_pagina','Eliminar Evento');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');

?>