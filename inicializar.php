<?php
// PREGUNTO SI EL SITIO NO ESTA "INSTALADO", YA QUE USAMOS COMO FLAG ESE ARCHIVO, ADEMAS SI NO CUENTA CON ESTE ARCHIVO EL SITIO NO ANDA
if ( !(file_exists('./site.conf.php')) ){
	header('Location: ./instalar.php');
}
else
  {
	session_start();
	include_once("lib/MDB2.php");
	include_once("./funciones.php");
	require_once("./site.conf.php");
	require_once(SMARTY_PATH."/libs/Smarty.class.php");
	$smarty= new Smarty;
	$smarty->template_dir = SMARTY_PATH."/templates";
	$smarty->config_dir = SMARTY_PATH."/templates";
	$smarty->cache_dir = SMARTY_PATH."/cache";
	$smarty->compile_dir = SMARTY_PATH."/templates_c";
	$smarty->assign('year',date('Y'));
	require_once("./usuarios_online.php");
  }
?>