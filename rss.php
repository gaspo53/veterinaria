<?php
require_once('./inicializar.php');
include_once('./tomar_links.php');
include_once('./tomar_novedades.php');
include_once('./login_logout.php');
// ESTA CLASE SE USA PARA ARMAR LOS LINKS EN EL TPL A RSS
class Feed{
	private $link;
	private $titulo;
	
	function __construct($titulo,$link){
		$this->link=$link;
		$this->titulo=$titulo;	
	}

	function getTitulo(){
		return $this->titulo;
	}

	function getLink(){
		return $this->link;
	}

}

$feed1= new Feed("Suscribite a las Novedades","./rss_novedades.php");
$feed2= new Feed("Suscribite a los Eventos","./rss_eventos.php");
$feed3= new Feed("Suscribite a los Art&iacute;culos","./rss_articulos.php");
$feed4= new Feed("Suscribite a los Links de Inter&eacute;s","./rss_links.php");
$feed5= new Feed("Suscribite a las Notas Recomendadas","./rss_notas.php");

$rss_array = array($feed1,$feed2,$feed3,$feed4,$feed5);

$smarty->assign('titulo_pagina','Suscripci&oacute;n RSS');
$smarty->assign('rss_list',$rss_array);
$smarty->assign('template','rss.tpl');
$smarty->display('index.tpl');
?>
