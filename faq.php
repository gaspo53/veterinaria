<?php

include_once("inicializar.php");
include_once('./login_logout.php');
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
$smarty->assign('template','faq.tpl');
$smarty->assign('titulo_pagina','FAQs');
$smarty->display('index.tpl');
?>