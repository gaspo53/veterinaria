<?php
//VERIFICA QUE LOS DATOS RECIBIDOS ESTEN COMPLETOS, Y LUEGO AGREGA LA IM�GEN AL ART�CULO

include_once("inicializar.php");
include_once('./login_logout.php');

//AGREGA LA IM�GEN AL ART�CULO $id_articulo
function agregarImagen($id_articulo,$path,$altern){
	$con = conectar_DB();
	$altern = pasarAHtml(array($altern));
	$altern = $altern[0]; // SE HACE ESTO PORQUE LA FUNCION ANTERIOR DEVUELVE UN ARREGLO
	$consulta ="INSERT INTO imagen_articulo (id ,file_path, id_articulo ,texto_altern)
	VALUES (NULL , '$path', $id_articulo, '$altern')";
	$resul=$con->query($consulta);
	$con->disconnect();

}

//VERIFICA SI HAY ALGUIEN LOGUEADO
if (hay_alguien()){

	//VALIDA QUE EL TEXTO ALTERNATIVO ESTE COMPLETO
	if ( validarStrings(array($_POST['altern'])) ){
		 
		//VERIFICA QUE EL USUARIO LOGUEADO SEA EL DUE�O DEL ART�CULO
		if (es_duenio_del_articulo($_GET['id'])){
			$status = "";
			//OBTENEMOS LOS DATOS DE LA IM�GEN
			$tamano = $_FILES['imagen']['size'];
			$tipo = $_FILES['imagen']['type'];

			//COMPRUEBA QUE LA EXTENSION SEA DE UNA IM�GEN
			if (substr($tipo,0,5)!="image"){
				$status= "EL FORMATO DE IMAGEN NO SE PUEDE RECONOCER";
			}
			else{
				$archivo = $_FILES["imagen"]['name'];
				$prefijo = substr(md5(uniqid(rand())),0,6);

				//COMPRUEBA QUE EL NOMBRE HAGA REFERENCIA A UN ARCHIVO
				if ($archivo != "") {
					if (!(file_exists('./files'))){
						mkdir("./files",0700); //Crea el directorio donde se guardaran las im�genes y archivos de los art�culos
					}

					// GUARDAMOS LA IM�GEN EN LA CARPETA files
					$destino =  "./files/".$prefijo."_".$archivo;

					//VERIFICA QUE SE HAYA GAURDADO LA IM�GEN CORRECTAMENTE
					if (copy($_FILES["imagen"]['tmp_name'],$destino)) {
						$status = "Im&aacute;gen subida: <b>".$archivo."</b>";
						agregarImagen($_GET['id'],$destino,$_POST['altern']);
					} else {
						$status = "Error al subir la im&aacute;gen";
					}
				} else {
					$status = "Error al subir la im&aacute;gens";
				}
			}
		} else {
			$status=ARTICLE_OWN;
		}
	} else // SI NO CARG� TEXTO ALTERNATIVO
	{
		$status = "DEBE COMPLETAR EL TEXTO ALTERNATIVO DE LA IMAGEN";
	}
} else{
	$status=INICIAR_SESION;
}
	
$smarty->assign('error', $status);
$smarty->assign('desc_temp', "Ver Art&iacute;culo");
$smarty->assign('link_temp', "./ver_articulo.php?id=".$_GET['id']);
$smarty->assign('template','aviso.tpl');
$smarty->display('index.tpl');
?>
