<?php
  //MUESTRA EL FORMULARIO DE CONTACTO (form_contacto.tpl)
  include_once("DB.php");
  include_once("inicializar.php");
  include_once('./login_logout.php');
  
  $smarty->assign('template','form_contacto.tpl');
  $smarty->assign('titulo_pagina','Contactenos');
  $smarty->display('index.tpl');
?>
