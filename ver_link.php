<?php
//ESTE PHP MUESTRA EL LINK ELEGIDO, PERO CON LINKS DE AMIN PARA ELIMINARLO
include_once("DB.php");
include_once("inicializar.php");
include_once('./login_logout.php');


if (hay_alguien()){
	$con = conectar_DB();
	$id_link=$_GET['id'];
	$user = getSessionId();
	$consulta ="SELECT * FROM links_interes WHERE (id = '$id_link')";
	$resul=$con->query($consulta);
	if ($lineax = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$linea= $lineax;
		$con-> disconnect();
		if (($lineax->idUsuario == $user) || (es_admin(getSessionId()))){
			$linea->fecha = convertirFecha($linea->fecha);
			$linea->descripcion = pasarATexto($linea->descripcion);
			$linea->nombre = pasarATexto($linea->nombre);
			$smarty->assign('link_entero',$linea);
			$smarty->assign('template','link_entero.tpl');
			$smarty->assign('titulo_pagina','Link de inter&eacute;s: '.$linea->nombre);
			$smarty->display('index.tpl');
		}else
			{
				header("Location: mostrar_link.php?id=".$id_link);
			}
	}
	else
		{
			$smarty->assign('template','aviso.tpl');
			$smarty->assign('error', LINK_NOT_EXISTS);
			$smarty->display('index.tpl');
		}
}else
	{
		header("Location: mostrar_link.php?id=".$_GET['id']);
   	}
?>