<?php
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
		$id_articulo = $_GET['id'];
		if ((es_duenio_del_articulo($_GET['id'])) || (es_admin(getSessionId()))){ 
			//SOLO LO PUEDE ELIMINAR SI ES EL DUEÑO O ES UN ADMIN
			$con = conectar_DB();
			$consulta ="DELETE FROM articulos WHERE id = '$id_articulo'";
			$resul=$con->query($consulta);
			borrarArchivosArticulo($id_articulo);
			//AHORA SE BORRAN LAS IMAGENES DE ESE ARTICULO
			$consulta ="DELETE FROM imagen_articulo WHERE id_articulo = '$id_articulo'";
			$resul=$con->query($consulta);
			// POR ULTIMO LOS ARCHIVOS
			$consulta ="DELETE FROM archivo_articulo WHERE id_articulo = '$id_articulo'";
			$resul=$con->query($consulta);
			if (DB::isError($resul)){
					$smarty->assign('error',DELETE_ARTICLE_ERROR);
			} else {
					$smarty->assign('error',DELETE_ARTICLE_SUCCESS);
					}
			$smarty->assign('link_temp','./listar_articulos.php');
			$smarty->assign('desc_temp','Volver a Art&iacute;culos');
		}else
			{$smarty->assign('error',ARTICLE_OWN);
			}
				
} else {$smarty->assign('error',INICIAR_SESION);
		}
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
$smarty->assign('titulo_pagina','Eliminar Art&iacute;culo');
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');

?>