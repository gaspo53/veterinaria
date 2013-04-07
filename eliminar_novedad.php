<?php

include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
		$id_novedad = $_GET['id'];
		if ((es_duenio_de_novedad($_GET['id'])) || (es_admin(getSessionId()))){
				//SOLO LO PUEDE ELIMINAR SI ES EL DUE�O O ES UN ADMIN
			$con = conectar_DB();
			$consulta ="DELETE FROM novedades WHERE id = '$id_novedad'";
			$resul=$con->query($consulta);
			if (MDB2::isError($resul)){
					$smarty->assign('error',DELETE_NEW_ERROR);
			} else {
					$smarty->assign('error', DELETE_NEW_SUCCESS);
					}
		$smarty->assign('link_temp','./listar_novedades.php');
		$smarty->assign('desc_temp','Volver a Novedades');
		}else
			{$smarty->assign('error',NEW_OWN);
			}
				
} else {$smarty->assign('error',INICIAR_SESION);
		}
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
$smarty->assign('titulo_pagina','Eliminar Novedad');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');

?>