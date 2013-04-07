<?php
     //REALIZA LA BÚSQUEDA AVANZADA SEGÚN LOS CRITERIOS SELECCIONADOS

  include_once("inicializar.php");
  //ALMACENES DE LAS CONSULTAS SEGÚN LA TABLA EN LA QUE BUSQUE
  $bus_nov = "";
  $bus_art = "";
  $bus_eve = "";
  $bus_lin = "";
  $bus_not = "";

  //ARRAY CON LAS PALBRAS A BUSCAR SEGUN EL CRITERIO
  $pal_todas = explode(" ",$_GET['todas_palabras']);
  $pal_alguna = explode(" ",$_GET['alguna_palabra']);
  $pal_ninguna = explode(" ",$_GET['sin_palabras']);

  /**** ELIMINA LOS BLANCOS ****/

  foreach ($pal_todas as $key => $value) {
    if ($value =="") {
      unset($pal_todas[$key]);
    }
  }
  foreach ($pal_alguna as $key => $value) {
    if ($value =="") {
      unset($pal_alguna[$key]);
    }
  }
  foreach ($pal_ninguna as $key => $value) {
    if ($value =="") {
      unset($pal_ninguna[$key]);
    }
  }
  /**** FIN ELIMINA LOS BLANCOS ****/

  //CONVIERTE PALABRAS A HTML UTF

  $pal_todas = pasarAHtml($pal_todas);
  $pal_alguna = pasarAHtml($pal_alguna);
  $pal_ninguna = pasarAHtml($pal_ninguna);
  // FIN CONVERSIÓN

  if (( $_GET['todas_palabras']!='')or($_GET['alguna_palabra']!='')or($_GET['sin_palabras']!='')){

  	if (  isset($_GET['bus_novedades'])  ){
  	//PARA BUSCAR LAS NOVEDADES
  		if ( sizeOf($pal_todas)>0 ){
                        //SI HAY ALGUNA PALABRA EN "BUSCAR TODAS LAS PALABRAS"...
                        $consu = "";
  			foreach ($pal_todas as $palabra){
  				if ($consu != ""){ $consu .= " AND ";}
  				$consu .= "((nombre_corto LIKE '%".$palabra."%') OR (nombre_largo LIKE '%".$palabra."%') OR (desc_corta LIKE '%".$palabra."%') OR (desc_larga LIKE '%".$palabra."%'))";
  			}

  			$bus_nov = "(".$consu.")"; //ARMAMOS LA CONSULTA
  		}

  		if ( sizeOf($pal_alguna)>0 ){
                        //SI HAY ALGUNA PALABRA EN "BUSCAR ALGUNA DE LAS PALABRAS"...
  			$consu = "";
  			foreach ($pal_alguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(nombre_corto LIKE '%".$palabra."%') OR  (nombre_largo LIKE '%".$palabra."%') OR  (desc_corta LIKE '%".$palabra."%') OR  (desc_larga LIKE '%".$palabra."%')";
  			}
  			
  			//CONTINUAMOS ARMANDO LA CONSULTA
  			if ($bus_nov == ""){
  				$bus_nov = "(".$consu.")";
  			}else{
  				$bus_nov .= "OR ".$consu;
  			}
  		}
  		if ( sizeOf($pal_ninguna)>0 ){
                        //SI HAY ALGUNA PALABRA EN "BUSCAR NINGUNA DE LAS PALABRAS"...
  			$consu = "";
  			foreach ($pal_ninguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(nombre_corto LIKE '%".$palabra."%') OR  (nombre_largo LIKE '%".$palabra."%') OR  (desc_corta LIKE '%".$palabra."%') OR  (desc_larga LIKE '%".$palabra."%')";
  			}
  			
  			//CONTINUAMOS ARMANDO LA CONSULTA
  			if ($bus_nov == ""){
  				$bus_nov = "NOT (".$consu.")";
  			}else{
  				$bus_nov = "(".$bus_nov.")AND NOT( ".$consu.")";
  			}
  		}
  		//UNIMOS LAS 3 CONSULTAS DE ARRIBA
  		$bus_nov = "SELECT id , nombre_corto AS titulo , desc_corta AS descripcion , 'novedades' AS tipo FROM novedades WHERE (".$bus_nov.")";
  	}
/* ¡¡¡¡ LOS COMENTARIOS DE ESTA BÚSQUEDA SE REPITEN PARA LAS DE ABAJO... SON IDÉNTICOS !!!!      */
  	if (  isset($_GET['bus_articulos'])  ){
  	//PARA BUSCAR LOS ARTICULOS
  		if ( sizeOf($pal_todas)>0 ){

  			$consu = "";
  			foreach ($pal_todas as $palabra){
  				if ($consu != ""){ $consu .= " AND ";}
  				$consu .= "((titulo LIKE '%".$palabra."%') OR (descripcion LIKE '%".$palabra."%'))";
  			}
  			if ($bus_art == ""){
  				$bus_art = "(".$consu.")";
  			}else{
  				$bus_art .= "OR ".$consu;
  			}
  		}

  		if ( sizeOf($pal_alguna)>0 ){
  			$consu = "";
  			foreach ($pal_alguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(titulo LIKE '%".$palabra."%') OR  (descripcion LIKE '%".$palabra."%')";
  			}
  			if ($bus_art == ""){
  				$bus_art = "(".$consu.")";
  			}else{
  				$bus_art .= "OR ".$consu;
  			}
  		}
  		if ( sizeOf($pal_ninguna)>0 ){
  			$consu = "";
  			foreach ($pal_ninguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(titulo LIKE '%".$palabra."%') OR  (descripcion LIKE '%".$palabra."%')";
  			}
  			if ($bus_art == ""){
  				$bus_art = "NOT (".$consu.")";
  			}else{
  				$bus_art = "(".$bus_art.")AND NOT( ".$consu.")";
  			}
  		}

  		$bus_art = "SELECT id,titulo,descripcion,'articulos' FROM articulos WHERE (".$bus_art.")";
  	}

  	if (  isset($_GET['bus_links'])  ){
  	//PARA BUSCAR LOS LINKS

  		if ( sizeOf($pal_todas)>0 ){
  			$consu = "";
  			foreach ($pal_todas as $palabra){
  				if ($consu != ""){ $consu .= " AND ";}
  				$consu .= "((nombre LIKE '%".$palabra."%') OR  (descripcion LIKE '%".$palabra."%'))";
  			}

  			if ($bus_lin == ""){
  				$bus_lin = "(".$consu.")";
  			}else{
  				$bus_lin .= "OR ".$consu;
  			}

  		}
  		if ( sizeOf($pal_alguna)>0 ){
  			$consu = "";
  			foreach ($pal_alguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(nombre LIKE '%".$palabra."%') OR  (descripcion LIKE '%".$palabra."%')";
  			}
  			if ($bus_lin == ""){
  				$bus_lin = "(".$consu.")";
  			}else{
  				$bus_lin .= "OR ".$consu;
  			}
  		}
  		if ( sizeOf($pal_ninguna)>0 ){
  			$consu = "";
  			foreach ($pal_ninguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(nombre LIKE '%".$palabra."%') OR  (descripcion LIKE '%".$palabra."%')";
  			}
  			if ($bus_lin == ""){
  				$bus_lin = "NOT (".$consu.")";
  			}else{
  				$bus_lin = "(".$bus_lin.")AND NOT( ".$consu.")";
  			}
  		}

  		$bus_lin = "SELECT id,nombre,descripcion,'links' FROM links_interes WHERE (".$bus_lin.")";
  	}

  	if (  isset($_GET['bus_notas'])  ){
  	//PARA BUSCAR LAS NOTAS
  		if ( sizeOf($pal_todas)>0 ){
  			$consu = "";
  			foreach ($pal_todas as $palabra){
  				if ($consu != ""){ $consu .= " AND ";}
  				$consu .= "((titulo LIKE '%".$palabra."%') OR  (nota LIKE '%".$palabra."%'))";
  			}
  			if ($bus_not == ""){
  				$bus_not = "NOT (".$consu.")";
  			}else{
  				$bus_not = "(".$bus_not.")AND NOT( ".$consu.")";
  			}
  		}
  		if ( sizeOf($pal_alguna)>0 ){
  			$consu = "";
  			foreach ($pal_alguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(titulo LIKE '%".$palabra."%') OR (nota LIKE '%".$palabra."%')";
  			}
  			if ($bus_not == ""){
  				$bus_not = "(".$consu.")";
  			}else{
  				$bus_not .= "OR ".$consu;
  			}
  		}
  		if ( sizeOf($pal_ninguna)>0 ){
  			$consu = "";
  			foreach ($pal_ninguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(titulo LIKE '%".$palabra."%') OR (nota LIKE '%".$palabra."%')";
  			}
  			if ($bus_not == ""){
  				$bus_not = "NOT (".$consu.")";
  			}else{
  				$bus_not = "(".$bus_not.")AND NOT( ".$consu.")";
  			}
  		}

  		$bus_not = "SELECT id,titulo,nota,'notas' FROM notas_recomendadas WHERE (".$bus_not.")";
  	}

  	if (  isset($_GET['bus_eventos'])  ){
  	//PARA BUSCAR LOS EVENTOS
  		if ( sizeOf($pal_todas)>0 ){
  			$consu = "";
  			foreach ($pal_todas as $palabra){
  				if ($consu != ""){ $consu .= " AND ";}
  				$consu .= "((titulo LIKE '%".$palabra."%') OR  (descripcion LIKE '%".$palabra."%') OR  (lugar LIKE '%".$palabra."%'))";
  			}
  			if ($bus_eve == ""){
  				$bus_eve = "NOT (".$consu.")";
  			}else{
  				$bus_eve = "(".$bus_eve.")AND NOT( ".$consu.")";
  			}
  		}
  		if ( sizeOf($pal_alguna)>0 ){
  			$consu = "";
  			foreach ($pal_alguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(titulo LIKE '%".$palabra."%') OR  (descripcion LIKE '%".$palabra."%') OR  (lugar LIKE '%".$palabra."%')";
  			}
  			if ($bus_eve == ""){
  				$bus_eve = "(".$consu.")";
  			}else{
  				$bus_eve .= "OR ".$consu;
  			}
  		}
  		if ( sizeOf($pal_ninguna)>0 ){
  			$consu = "";
  			foreach ($pal_ninguna as $palabra){
  				if ($consu != ""){ $consu .= " OR ";}
  				$consu .= "(titulo LIKE '%".$palabra."%') OR  (descripcion LIKE '%".$palabra."%') OR  (lugar LIKE '%".$palabra."%')";
  			}
  			if ($bus_eve == ""){
  				$bus_eve = "NOT (".$consu.")";
  			}else{
  				$bus_eve = "(".$bus_eve.")AND NOT( ".$consu.")";
  			}
  		}

  		$bus_eve = "SELECT id,titulo,descripcion,'eventos' FROM eventos WHERE (".$bus_eve.")";
  	}
  }else{
  }

  //SI NO HAY QUE BUSCAR EN ALGUNA TABLA, REALIZA UNA CONSULTA QUE NO DEVUELVE NINGÚN RESULTADO.
  if ( $bus_nov == "") $bus_nov = "SELECT id,nombre_corto AS titulo,desc_corta AS descripcion,'novedades' AS tipo FROM novedades WHERE id<0";
  if ( $bus_art == "") $bus_art = "SELECT id,titulo,descripcion,'articulos' FROM articulos WHERE id<0";
  if ( $bus_eve == "") $bus_eve = "SELECT id,titulo,descripcion,'eventos' FROM eventos WHERE id<0";
  if ( $bus_lin == "") $bus_lin = "SELECT id,nombre AS titulo,descripcion,'links' FROM links_interes WHERE id<0";
  if ( $bus_not == "") $bus_not = "SELECT id,titulo,nota AS descripcion,'nota' FROM notas_recomendadas WHERE id<0";

  /****** UNIMOS TODAS LAS CONSULTAS *******/

  $consultax = "SELECT * FROM(".$bus_nov.") AS Tabla1 UNION SELECT * FROM (".$bus_art.") AS Tabla2 UNION SELECT * FROM (".$bus_eve.") AS Tabla3 UNION SELECT * FROM (".$bus_lin.")AS Tabla4 UNION SELECT * FROM (".$bus_not.")AS Tabla5";

  /*** FIN -UNIMOS TODAS LAS CONSULTAS- ***/



  /* VARIABLES PARA EL PAGINADOR*/
     $_pagi_sql = $consultax;
     $_pagi_cuantos = CANT_RESULTADOS_POR_PAGINA;
     $_pagi_nav_num_enlaces = 5;
     $_pagi_mostrar_errores = TRUE;
     $_pagi_separador = ' ';
  /* FIN VARIABLES PAGINADOR*/

  include_once('./paginator.inc.php');

  $resultados = array();
  $contador = 0;

  //CUENTA EN contador LA CANTIDAD DE RESULTADOS
  while($row=$_pagi_result->fetchRow(DB_FETCHMODE_OBJECT)){
  	$resultados[$contador] = $row;
  	$contador++;
  }

  //SI SE PRODUJO ALGUN RESULTADO LO MUESTRA MEDIANTE busqueda_resultado.tpl, SINO AVISA QUE NO SE PRODUJO RESULTADO
  if ($contador > 0){
  	$smarty->assign('template','busqueda_resultado.tpl');
  	$smarty->assign('itemcitos',$resultados);
    $smarty->assign('barra',$_pagi_navegacion);
  }else{
  	$smarty->assign('template','aviso.tpl');
  	$smarty->assign('error','La b&uacute;squeda no produjo resultados');
  }

  include_once('./login_logout.php');
  $smarty->assign('titulo_pagina','Resultados de la b&uacute;squeda:');
  $smarty->display('index.tpl');
?>
