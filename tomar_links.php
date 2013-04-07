<?php
// ESTE PHP TOMA LOS ULTMOS 3 LINKS PARA PONERLOS DEBAJO, EN LA BARRA LATERAL
include_once("DB.php");
include_once("inicializar.php");

$con = conectar_DB();
$consultax ="SELECT * FROM links_interes WHERE 1 ORDER BY id DESC limit 0,3";
$resuls=$con->query($consultax);

$cont = 0;
$arrd = array();
while ($lineax = $resuls->fetchRow(DB_FETCHMODE_OBJECT)){
	$arrd[$cont] = $lineax;
	$arrd[$cont]->id = $lineax->id;
	$arrd[$cont]->descripcion = pasarATexto($lineax->descripcion);
	$arrd[$cont]->nombre = pasarATexto($lineax->nombre);
	$arrd[$cont]->url = pasarATexto($lineax->url);
	$cont++;
}

$smarty->assign("linkkk",$arrd);
$con->disconnect();
?>