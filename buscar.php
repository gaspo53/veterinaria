<?php

include_once("inicializar.php");
include_once('./login_logout.php');

$busqueda = $_GET['text_buscar'];

if  (validarStrings(array($busqueda))){
                //ALMACENES DE LAS CONSULTAS SEG�N LA TABLA EN LA QUE BUSQUE
		$con_eve = "SELECT id,titulo,descripcion,'eventos' FROM eventos WHERE (";
		$con_art = "SELECT id,titulo,descripcion,'articulos' FROM articulos WHERE (";
		$con_lin = "SELECT id,nombre,descripcion,'links' FROM links_interes WHERE (";
		$con_nov = "SELECT id,nombre_corto AS titulo,desc_corta AS descripcion,'novedades' AS tipo FROM novedades WHERE (";
		$con_not = "SELECT id,titulo,nota,'notas' FROM notas_recomendadas WHERE (";
		
		//ARRAY CON LAS PALBRAS A BUSCAR SEGUN EL CRITERIO
		$palabras = explode(" ",$_GET['text_buscar']);

		// CONVIERTE PALABRAS A HTML UTF
                $palabras = pasarAHtml($palabras);

                /**** ELIMINA LOS BLANCOS ****/
		foreach ($palabras as $key => $value) {
		        if ($value =="") {
				unset($palabras[$key]);
			}
		}


		$conta = 0;
		foreach ($palabras as $palabra){
			if ($conta != 0){
				$con_eve .= "AND";
				$con_art .= "AND";
				$con_lin .= "AND";
				$con_nov .= "AND";
				$con_not .= "AND";
			}
			$conta++;

			$con_nov .= "((nombre_corto LIKE '%".$palabra."%') OR (nombre_largo LIKE '%".$palabra."%') OR (desc_corta LIKE '%".$palabra."%') OR (desc_larga LIKE '%".$palabra."%'))";
			$con_art .= "((titulo LIKE '%".$palabra."%') OR (descripcion LIKE '%".$palabra."%'))";
			$con_lin .= "((nombre LIKE '%".$palabra."%') OR (descripcion LIKE '%".$palabra."%'))";
			$con_eve .= "((titulo LIKE '%".$palabra."%') OR (descripcion LIKE '%".$palabra."%') OR (lugar LIKE '%".$palabra."%'))";
			$con_not .= "((titulo LIKE '%".$palabra."%') OR (nota LIKE '%".$palabra."%'))";
		}

		$con_eve .= ")";
		$con_art .= ")";
		$con_lin .= ")";
		$con_nov .= ")";
		$con_not .= ")";

		$consultita = "SELECT * FROM(".$con_nov.") AS Tabla1 UNION SELECT * FROM (".$con_art.") AS Tabla2 UNION SELECT * FROM (".$con_eve.") AS Tabla3 UNION SELECT * FROM (".$con_lin.")AS Tabla4 UNION SELECT * FROM (".$con_not.")AS Tabla5";

		/* VARIABLES PARA EL PAGINADOR*/
		   $_pagi_sql = $consultita;
		   $_pagi_cuantos = CANT_RESULTADOS_POR_PAGINA;
		   $_pagi_nav_num_enlaces = 5;
		   $_pagi_mostrar_errores = TRUE;
		   $_pagi_separador = ' ';
		/* FIN VARIABLES*/

		include_once('./paginator.inc.php');

		$resultados = array();
		$contador = 0;

                //CUENTA EN contador LA CANTIDAD DE RESULTADOS
		While($row=$_pagi_result->fetchRow(MDB2_FETCHMODE_OBJECT)){
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
} else{
       $smarty->assign('template','aviso.tpl');
       $smarty->assign('error','DEBE INGRESAR UN CRITERIO DE B&Uacute;SQUEDA');
}
$smarty->assign('titulo_pagina','Resultados de la b&uacute;squeda para: "'.$busqueda.'"');   
$smarty->display('index.tpl');
?>
