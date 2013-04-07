<?php
// ESTE PHP MUESTRA EL TPL "SIN LINKS", IGUAL A INDEX, PARA VER UN ESTILO ANTES DE GUARDAR LA ELECCION
require_once('./inicializar.php');
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
$smarty->assign('login_display','display:block');
$smarty->assign('logout_display','display:none');
$smarty->assign('css',getCSS($_GET['id_css']));
$smarty->assign('titulo_pagina','As&iacute; se ver&aacute; el t&iacute;tulo de p&aacute;gina');
$smarty->assign('template','contenido.tpl');
$smarty->assign('contenido','As&iacute; se ver&aacute; el Contenido central');
$smarty->display('style_preview.tpl');
?>