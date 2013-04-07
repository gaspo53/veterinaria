<?php
     //MUESTRA EL FORMULARIO DE LA B�SQUEDA AVANZADA (form_busqueda.tpl)
     
     include_once("inicializar.php");
     include_once('./login_logout.php');
     $smarty->assign('template','form_busqueda.tpl');
     $smarty->assign('titulo_pagina','B&uacute;squeda Avanzada');
     $smarty->assign('template','form_busqueda.tpl');
     $smarty->display('index.tpl');
?>
