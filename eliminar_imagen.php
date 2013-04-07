<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
		if ( ( es_duenio_del_articulo($_GET['id_imagen'])) || (es_admin(getSessionId())) ){
				//SOLO LA PUEDE ELIMINAR SI ES EL DUEÑO O ES UN ADMIN
			$id = $_GET['id_imagen'];
			$con = conectar_DB();
			$consulta ="DELETE FROM imagen_articulo WHERE id = '$id'";
			$resul=$con->query($consulta);
			if (DB::isError($resul)){
					$smarty->assign('error',DELETE_IMAGE_ERROR);
			} else {
					if (file_exists($_GET['file_path'])){
						unlink($_GET['file_path']);
						$smarty->assign('error',DELETE_IMAGE_SUCCESS);
					}else{
						$smarty->assign('error',IMAGE_NOT_EXISTS);
					}
				}
		$smarty->assign('link_temp','./ver_articulo.php?id='.$_GET['id_articulo']);
		$smarty->assign('desc_temp','Volver a el art&iacute;culo');
		}else
			{$smarty->assign('error',ARTICLE_OWN);
			}
} else {
		$smarty->assign('error',INICIAR_SESION);
		}
$smarty->assign('titulo_pagina','Eliminar Im&aacute;gen');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');

?>