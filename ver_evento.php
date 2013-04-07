<?php
//ESTE PHP MUESTRA EL EVENTO ELEGIDO, PERO CON LINKS DE AMIN PARA ELIMINARLO

include_once("inicializar.php");
include_once('./login_logout.php');


if (hay_alguien()){
	$con = conectar_DB();
	$id_evento=$_GET['id'];
	$user = getSessionId();
	$consulta ="SELECT * FROM eventos WHERE (id = '$id_evento')";
	$resul=$con->query($consulta);
	if ($lineax = $resul->fetchRow(MDB2_FETCHMODE_OBJECT)){
		$linea= $lineax;
		$con-> disconnect();
		if (($lineax->idusuario == $user) || (es_admin(getSessionId()))){
			$linea->fecha = convertirFecha($linea->fecha);
			$linea->fecha_comienzo = convertirFecha($linea->fecha_comienzo);
			$linea->fecha_fin = convertirFecha($linea->fecha_fin);
			$linea->titulo = pasarATexto($linea->titulo);
			$linea->descripcion = pasarATexto($linea->descripcion);
			$linea->lugar = pasarATexto($linea->lugar);
			$smarty->assign('evento_entero',$linea);
			$smarty->assign('template','evento_entero.tpl');
			$smarty->assign('titulo_pagina','Ver evento: '.$linea->titulo);
			$smarty->display('index.tpl');
		}else
			{
				header("Location: mostrar_evento.php?id=".$id_evento);
			}
	}
	else
		{
			$smarty->assign('template','aviso.tpl');
			$smarty->assign('error', EVENT_NOT_EXISTS);
			$smarty->display('index.tpl');
		}
}else
	{
		header("Location: mostrar_evento.php?id=".$_GET['id']);
   	}
?>