<?php

require_once('./inicializar.php');
if (!(hay_alguien())) // SI NO HAY NADIE LOGUEADO, SINO ADEMAS DE QUEDAR EN LOOP INFINITO COMPRUEBA SIEMPRE LO MISMO
	if (hay_cookies())
		header('Location: ./validar.php');
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
include_once('./login_logout.php');
$smarty->clear_compiled_tpl();
if ( (isset($_GET['inicio_de_sesion'])) & hay_alguien() )
	$smarty->assign('titulo_pagina', "Usted ha iniciado sesi&oacute;n correctamente.");

else{
	$smarty->assign('titulo_pagina','Bienvenido');
	$smarty->assign('contenido','Usted se encuentra en la Red Solidaria Veterinaria. En este sitio encontrar&aacute; material relacionado a la actividad veterinaria de la ciudad de La Plata. Para participar activamente debe registrarse e iniciar sesi&oacute;n.');
	}
$smarty->assign('template','contenido.tpl');
$smarty->display('index.tpl');

?>
