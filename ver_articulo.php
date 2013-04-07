<?php
//ESTE PHP MUESTRA EL ARTICULO ELEGIDO, PERO CON LINKS DE AMIN PARA ELIMINARLO

include_once("inicializar.php");
include_once('./login_logout.php');

if (hay_alguien()){
	$con = conectar_DB();
	$id_articulo=$_GET['id'];
	$user = getSessionId();
	$consulta ="SELECT * FROM articulos WHERE (id = '$id_articulo')";
	$resul=$con->query($consulta);
	if ($lineax = $resul->fetchRow(MDB2_FETCHMODE_OBJECT)){
		$linea = $lineax;
		$con-> disconnect();
		if (($lineax->idusuario == $user) || (es_admin(getSessionId()))){
			$linea->fecha = convertirFecha($linea->fecha);
			$linea->descripcion = $linea->descripcion;
			$linea->titulo = $linea->titulo;
			$smarty->assign('articulo',$linea);
			$smarty->assign('archivos_articulo',getFiles($id_articulo));
			$smarty->assign('imagenes_articulo',getImages($id_articulo));
			$smarty->assign('template','articulo_entero.tpl');
			$smarty->assign('titulo_pagina','Ver art&iacute;culo: '.$linea->titulo);
			$smarty->display('index.tpl');
		}else
			{
				header("Location: mostrar_articulo.php?id_articulo=".$id_articulo);
			}
	}
	else
		{
			$smarty->assign('template','aviso.tpl');
			$smarty->assign('error', ARTICLE_NOT_EXISTS);
			$smarty->display('index.tpl');
		}
}else
	{
		header("Location: mostrar_articulo.php?id_articulo=".$_GET['id']);
   	}
?>