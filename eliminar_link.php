<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
		$id_link = $_GET['id'];
		if ((es_duenio_de_link($_GET['id'])) || (es_admin(getSessionId()))){
				//SOLO LO PUEDE ELIMINAR SI ES EL DUEÑO O ES UN ADMIN
			$con = conectar_DB();
			$consulta ="DELETE FROM links_interes WHERE id = '$id_link'";
			$resul=$con->query($consulta);
			if (DB::isError($resul)){
					$smarty->assign('error',DELETE_LINK_ERROR);
			} else {
					$smarty->assign('error', DELETE_LINK_SUCCESS);
					}
		$smarty->assign('link_temp','./listar_links_interes.php');
		$smarty->assign('desc_temp','Volver a Links De Inter&eacute;s');
		}else
			{$smarty->assign('error',LINK_OWN);
			}
				
} else {$smarty->assign('error',INICIAR_SESION);
		}
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
$smarty->assign('titulo_pagina','Eliminar Link De Inter&eacute;s');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');

?>