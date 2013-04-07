<?php
require_once('./inicializar.php');
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
include_once('./login_logout.php');

$smarty->assign('titulo_pagina','Historia');
$smarty->assign('cant_paginas',9);
$smarty->assign('pagina_actual',5);
$smarty->assign('contenido','La Red Solidaria Veterinaria se cre&oacute; entre los meses de Agosto y Diciembre de 2007 con fin de aprobar la cursada de Proyecto de Software. Dicha Red fue creada por los alumnos Daniel Gaspar Rajoy y Agust&iacute;n Vosou.');
$smarty->assign('template','contenido.tpl');
$smarty->display('index.tpl');
?>
