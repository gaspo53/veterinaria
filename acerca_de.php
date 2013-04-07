<?php
// ESTE PHP MUESTRA TEXTO EN EL CONTENIDO CENTRAL DEL TEMPLATE INDEX.TPL

require_once('./inicializar.php');
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
include_once('./login_logout.php');

$smarty->assign('titulo_pagina','Acerca de...');
$smarty->assign('contenido','Para mas informaci&oacute;n acercate a la Facultad de Inform&aacute;tica de la Universidad Nacional de La Plata ubicada en calle 50 y 115.');
$smarty->assign('template','contenido.tpl');
$smarty->display('index.tpl');
?>
