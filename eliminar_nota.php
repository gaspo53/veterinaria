<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
		$id_nota = $_GET['id'];
		if ((es_duenio_de_novedad($_GET['id'])) || (es_admin(getSessionId()))){
				//SOLO LO PUEDE ELIMINAR SI ES EL DUEÑO O ES UN ADMIN
			$con = conectar_DB();
			$consulta ="DELETE FROM notas_recomendadas WHERE id = '$id_nota'";
			$resul=$con->query($consulta);
			if (DB::isError($resul)){
					$smarty->assign('error',DELETE_NOTE_ERROR);
			} else {
					$smarty->assign('error', DELETE_NOTE_SUCCESS);
					}
		$smarty->assign('link_temp','./listar_notas.php');
		$smarty->assign('desc_temp','Volver a Notas Recomendadas');
		}else
			{$smarty->assign('error',NOTE_OWN);
			}
				
} else {$smarty->assign('error',INICIAR_SESION);
		}
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
$smarty->assign('titulo_pagina','Eliminar Nota');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');

?>