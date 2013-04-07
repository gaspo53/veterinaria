<?php
//ESTE PHP MUESTRA LA NOVEDAD ELEGIDA, PERO CON LINKS DE AMIN PARA ELIMINARLA
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');


if (hay_alguien()){
	$con = conectar_DB();
	$id_novedad=$_GET['id'];
	$user = getSessionId();
	$consulta ="SELECT * FROM novedades WHERE (id = '$id_novedad')";
	$resul=$con->query($consulta);
	if ($lineax = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$linea= $lineax;
		$con-> disconnect();
		if (($lineax->idUsuario == $user) || (es_admin(getSessionId()))){
			$linea->fecha = convertirFecha($linea->fecha);
			$linea->nombre_corto = pasarATexto($linea->nombre_corto);
			$linea->nombre_largo = pasarATexto($linea->nombre_largo);
			$linea->desc_corta = pasarATexto($linea->desc_corta);
			$linea->desc_larga = pasarATexto($linea->desc_larga);
			$smarty->assign('novedad',$linea);
			$smarty->assign('template','novedad_entera.tpl');
			$smarty->assign('titulo_pagina','Ver novedad:');
			$smarty->display('index.tpl');
		}else
			{
				header("Location: mostrar_novedad.php?id_novedad=".$id_novedad);
			}
	}
	else
		{
			$smarty->assign('template','aviso.tpl');
			$smarty->assign('error', NEW_NOT_EXISTS);
			$smarty->display('index.tpl');
		}
}else
	{
		header("Location: mostrar_novedad.php?id_novedad=".$_GET['id']);
   	}
?>