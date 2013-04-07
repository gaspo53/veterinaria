<?php
  require_once('./inicializar.php');
  include_once('./tomar_links.php');
  include_once('./tomar_novedades.php');
  include_once('./login_logout.php');

  $smarty->assign('titulo_pagina','Or&iacute;gen');
  $smarty->assign('contenido','La Red Solidaria Veterinaria es una asociaci&oacute;n civil sin fines de lucro, que re&uacute;ne a un grupo de profesionales veterinarios con el fin de realizar diversas tareas solidarias relacionadas con su profesi&oacute;n. Todos ellos desarrollan individualmente diversas tareas en diferentes barrios carenciados de la periferia de la ciudad de La Plata, asesorando a personas de escasos recursos en el cuidado, atenci&oacute;n, sanidad y bienestar de sus animales. Por otro lado llevan a cabo actividades de educaci&oacute;n para la prevenci&oacute;n de diferentes zoonosis y otras enfermedades de inter&eacute;s para la poblaci&oacute;n. Decidieron unirse a fin de optimizar los recursos para realizar dichas tareas, minimizar los esfuerzos, aunar criterios en el trabajo a llevar a cabo y garantizar una atenci&oacute;n m&aacute;s completa, ya que todos ellos proven&iacute;an de diferentes especialidades de la medicina veterinaria.');
  $smarty->assign('template','contenido.tpl');
  $smarty->display('index.tpl');
?>
