<?php
require_once('./inicializar.php');
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
include_once('./login_logout.php');

// EL MAPA DEL SITIO ES MUY GENERAL, NO TENIENDO FUNCIONES DE USUARIO NI DE ADMINISTRADOR YA QUE NO CORRESPONDE

$smarty->assign('titulo_pagina','Mapa del Sitio');
$mapa = "<ul id='mapa_sitio'>
			<li> <a href='./index.php'> Pagina Principal</a></li>
			<li> <a href='./historia.php'> Historia</a></li>
			<li> <a href='./origen.php'> Or&iacute;gen</a></li>
			<li> <a href='./participantes.php'> Participantes</a></li>
			<li> <a href='./sign_in.php'> Registrarse</a></li>
			<li> <a href='./listar_articulos.php'> Art&iacute;culos</a></li>
			<li> <a href='./listar_notas.php'> Notas Recomendadas</a></li>
			<li> <a href='./listar_novedades.php'> Novedades</a></li>
			<li> <a href='./eventos.php'> Eventos</a></li>
			<li> <a href='./listar_links_interes.php'> Links De Inter&eacute;s</a></li>
			<li> <a href='./rss.php'> Suscripci&oacute;n RSS</a></li>
			<li> <a href='./acerca_de.php'> Acerca De</a></li>
			<li> <a href='./contacto.php'> Contacto</a></li>
			<li> <a href='./busqueda_avanzada.php'> Buscar (Avanzado)</a></li>
		</ul>";

$smarty->assign('mapa_sitio',$mapa);
$smarty->display('index.tpl');
?>
