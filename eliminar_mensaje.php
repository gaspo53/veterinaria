<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
		$id_mensaje = $_GET['id'];
		if ((es_duenio_del_mensaje($_GET['id'])) || (es_admin(getSessionId()))){
				//SOLO LO PUEDE ELIMINAR SI ES EL DUEÑO O ES UN ADMIN
			$con = conectar_DB();
			$consulta ="DELETE FROM mensajes WHERE id = '$id_mensaje'";
			$resul=$con->query($consulta);
			if (DB::isError($resul)){
					$smarty->assign('error',DELETE_MESSAGE_ERROR);
			} else {
					$smarty->assign('error', DELETE_MESSAGE_SUCCESS);
					}
		}else
			{$smarty->assign('error',MESSAGE_OWN);
			}
		$smarty->assign('link_temp','./bandeja_entrada.php');
		$smarty->assign('desc_temp','Volver a Bandeja de Entrada (de '.getSessionUsername().' )');
} else {$smarty->assign('error',INICIAR_SESION);
		}
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
$smarty->assign('titulo_pagina','Eliminar Mensaje');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');

?>