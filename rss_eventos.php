<?php
// ARMA UN XML (RSS 2.0) CON LOS ULTIMOS 20 EVENTOS

include_once("inicializar.php");
include_once('./login_logout.php');

      // Definimos variables globales
      $rss_titulo = 'Ultimos Eventos De Veterinaria';
      $rss_url = 'http://'.HOST_IP.':'.LISTEN_PORT.'/'.ROOT_FOLDER.'ver_evento.php?id=';
      $rss_descripcion = 'Eventos de Veterinaria';
      $rss_email = 'no-mail@localhost.com';
       
      // Conexion a la base de datos
      $conexion = conectar_DB();
      $sql = "SELECT * FROM eventos ORDER BY id DESC LIMIT 0,20";
      $result = $conexion->query($sql);
       
      // Header para escribir XML
      header('Content-type: text/xml; charset="iso-8859-1"', true);
       
      // Escribimos el archivo RSS
      echo '<?xml version="1.0" encoding="iso-8859-1"?>';
      echo
      '<rss version="2.0">
           <channel>
                <docs>http://www.info.unlp.edu.ar</docs>
                <title>'.$rss_titulo.'</title>
                <link>'.$rss_url.'</link>
                <description>'.$rss_descripcion.'</description>
                <language>es</language>
                <managingEditor>'.$rss_email.'</managingEditor>
                <webMaster>'.$rss_email.'</webMaster>
      ';
       
	while ($item = $result->fetchRow(MDB2_FETCHMODE_OBJECT)){        
		   echo "<item>" ;
           echo "<title>".pasarAISO($item->titulo)."</title>" ;
           echo "<link>".$rss_url.$item->id."</link>";
           echo "<description><![CDATA[$item->descripcion]]></description>"; 
           echo "</item>";
	}
      echo "</channel>";
      echo "</rss>";   
	 
?> 