<?php
// ESTE PHP TOMA LAS ULTMAS 4 NOVEDADES PARA PONERLAS DEBAJO, EN LA BARRA LATERAL

include_once("inicializar.php");

$con = conectar_DB();
$consulta ="SELECT * FROM novedades WHERE 1 ORDER BY id DESC limit 0,4";
$resul=$con->query($consulta);

$cont = 0;
$arr = array();
while ($linea = $resul->fetchRow(MDB2_FETCHMODE_OBJECT)){
	$arr[$cont] = $linea;
	$arr[$cont]->id = $linea->id;
	$arr[$cont]->desc_larga = pasarATexto($linea->desc_larga);
	$arr[$cont]->desc_corta = pasarATexto($linea->desc_corta);
	$arr[$cont]->nombre_largo = pasarATexto($linea->nombre_largo);
	$arr[$cont]->nombre_corto = pasarATexto($linea->nombre_corto);
	$cont++;
	
}
$smarty->assign("novex",$arr);
$con-> disconnect();
?>