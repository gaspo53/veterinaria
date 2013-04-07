<?php
// LOS SIGUIENTES 2 (DOS) INCLUDES SON PARA EL ENVIO DE MAILS
include("./php_classes/class.phpmailer.php");
include("./php_classes/class.smtp.php");

///// FUNCIONES PARA MOSTRAR ARTICULOS

function getFiles($id){
	$con = conectar_DB();
	$consulta ="SELECT * FROM archivo_articulo WHERE id_articulo = '$id'";
	$resul=$con->query($consulta);
	$cont=0;
	$arreglo = array();
	while ($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$linea->file_path = blancosAHtml($linea->file_path);
		$arreglo[$cont]=$linea;
		$cont++;
	}
	$con-> disconnect();
	return($arreglo);
}

function getImages($id){
	$con = conectar_DB();
	$consulta ="SELECT * FROM imagen_articulo WHERE id_articulo = '$id'";
	$resul=$con->query($consulta);
	$cont=0;
	$arreglo = array();
	while ($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$linea->file_path = blancosAHtml($linea->file_path);
		$arreglo[$cont]=$linea;
		$cont++;
	}
	$con-> disconnect();
	return($arreglo);
}


function borrarArchivosArticulo($id_articulo){
	$cont = 0;
	$arreglo_archivos = array();
	$con = conectar_DB();
	$consulta ="SELECT * FROM archivo_articulo WHERE id_articulo = '$id_articulo'";
	$resul=$con->query($consulta);
	while ($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$arreglo_archivos[$cont] = $linea->file_path;
		$cont++;
	}
	$consulta ="SELECT * FROM imagen_articulo WHERE id_articulo = '$id_articulo'";
	$resul=$con->query($consulta);
	while ($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$arreglo_archivos[$cont] = $linea->file_path;
		$cont++;
	}
	foreach ($arreglo_archivos as $files){	
		unlink($files);
	}
}
///// FIN FUNCIONES PARA MOSTRAR ARTICULOS

////////// FUNCIONES RELACIONADAS CON EL CONTROL Y MANEJO DE USUARIOS

function asignarMenu(){
	$tipo = getSessionUserType();
	$con = conectar_DB();
	$consu = "SELECT * FROM menu_items WHERE (idUsuario = '$tipo') OR (idUsuario = '0') ORDER BY titulo ASC";
	$resul = $con->query($consu);
	$cont = 0;
	$arrd = array();
	while ($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$arrd[$cont] = $linea;
		$cont++;
	}
	$con->disconnect();
	return $arrd;
}

function asignarCSS(){
	$css = getSessionCSS();
	return (getCSS($css));
}


function obtenerAdminUsername(){
	$conect = conectar_DB();
	$consulta ="SELECT * FROM usuarios WHERE tipo = ".ES_ADMIN;
	$resul=$conect->query($consulta);
	if($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		return($linea->username);
	}
}

function get_user_data($userId){
	$con = conectar_DB();
	$consulta ="SELECT * FROM usuarios WHERE id = '$userId'";
	$resul=$con->query($consulta);
	$linea = $resul->fetchRow(DB_FETCHMODE_OBJECT);
	$con-> disconnect();
	return($linea);
}

function get_user_data_from_username($user){
	$con = conectar_DB();
	$consulta ="SELECT * FROM usuarios WHERE username = '$user'";
	$resul=$con->query($consulta);
	$linea = $resul->fetchRow(DB_FETCHMODE_OBJECT);
	$con-> disconnect();
	return($linea);
}

function listarUsuarios(){
	$con = conectar_DB();
	$usuario_logueado = getSessionId();
	$activado = USUARIO_ACTIVADO;
	$consulta ="SELECT username 
				FROM usuarios 
				WHERE (id <> '$usuario_logueado') AND (estado = $activado) ORDER BY username ASC"; 
	/*NO tendria sentido enviarse mensaje a si mismo, 
	o ver las novedades u otras cosas de usuario de si mismo, para eso estan los menues "Mis..."*/
	$resul=$con->query($consulta);
	$cont = 0;
	$arr = array();
	while ($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$arr[$cont] = $linea;
		$cont++;
	}
	return($arr);
	$con->disconnect();
}
////////// FIN FUNCIONES RELACIONADAS CON EL CONTROL Y MANEJO DE USUARIOS

/////////// FUNCIONES RELACIONADAS CON LOS ESTILOS (CSS)

function getCSS($css_id){
	$con = conectar_DB();
	$consulta ="SELECT * FROM css_list WHERE id = '$css_id'";
	$resul=$con->query($consulta);
	if($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$con->disconnect();
		return($linea);
	}
	$con->disconnect();
}

function listarCSS(){
	$con = conectar_DB();
	$consulta ="SELECT * FROM css_list WHERE 1 ORDER BY nombre ASC";
	$resul=$con->query($consulta);
	$cont = 0;
	$arr = array();
	while ($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		$arr[$cont] = $linea;
		$cont++;
	}
	return($arr);
	$con->disconnect();
}

/////////// FIN FUNCIONES RELACIONADAS CON LOS ESTILOS (CSS)



//////// FUNCIONES PARA MANEJAR STRINGS

function blancosAHtml($string){
	return str_replace(' ','%20',$string);
}

function pasarAHtml($postParameters){
	$conta =0;

	foreach ($postParameters as $entidad){
		$postParameters[$conta]=htmlentities($entidad,ENT_NOQUOTES,'UTF-8');
		$conta++;
	}
	return $postParameters;
}
	
function pasarATexto($string){ /* POR EL MOMENTO, EN DESUSO, PERO LA DEJAMOS PORQUE LA USAMOS 
									MUCHO Y DESPUES DECIDIMOS NO HACERLO MAS.
									AHORA DEVUELVE EL MISMO STRING QUE RECIBE */
//	$cadena=html_entity_decode($string,ENT_NOQUOTES,'UTF-8');
	return $string;
}

function pasarAISO($string){
	$cadena=html_entity_decode($string,ENT_NOQUOTES,'ISO-8859-1');
	return $cadena;
}

function convertirFecha($date){
	$arreglo = explode("-",$date);
	return $arreglo[2]."/".$arreglo[1]."/".$arreglo[0];
}

function validarStrings($string_array)
{
	$string_sin_blancos='';
	foreach ($string_array as $palabra){
		$string_sin_blancos= trim($palabra,' ');
		if ($string_sin_blancos == '')
			return(FALSE);
	}
	return(TRUE);
}
//////// FIN FUNCIONES PARA MANEJAR STRINGS


function conectar_DB(){ // CONECTA A LA BASE DE DATOS DEPENDIENDO DE site.conf.php
	return(DB::connect(DB_TYPE."://".DB_USERNAME.":".DB_PASSWORD."@".DB_HOST.":".DB_LISTEN_PORT."/".DB_NAME));
}

///////// FUNCIONES RELACIONADAS CON LOS PERMISOS DE LOS ARITUCLOS
function es_duenio_del_mensaje($id_mensaje){
	$con = conectar_DB();
	$consulta ="SELECT * FROM mensajes WHERE id = '$id_mensaje'";
	$resul=$con->query($consulta);
	if($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		if( (hay_alguien()) && (($linea->destinatario) != (getSessionUsername())) ){
			return(FALSE);
		}
		else{ 
			return(TRUE);
			}
	}else{return(FALSE);}	
}

function es_duenio_del_articulo($id_articulo){
	$con = conectar_DB();
	$consulta ="SELECT * FROM articulos WHERE id = '$id_articulo'";
	$resul=$con->query($consulta);
	if($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		if( (hay_alguien()) && (($linea->idUsuario) != (getSessionId())) ){
			return(FALSE);
		}
		else{ 
			return(TRUE);
			}
	}else{return(FALSE);}	
}

function es_duenio_del_evento($id_evento){
	$con = conectar_DB();
	$consulta ="SELECT * FROM eventos WHERE id = '$id_evento'";
	$resul=$con->query($consulta);
	if($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		if( (hay_alguien()) && (($linea->idUsuario) != (getSessionId())) ){
			return(FALSE);
		}
		else{ 
			return(TRUE);
			}
	}else{return(FALSE);}	
}

function es_duenio_de_novedad($id_novedad){
	$con = conectar_DB();
	$consulta ="SELECT * FROM novedades WHERE id = '$id_novedad'";
	$resul=$con->query($consulta);
	if($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		if( (hay_alguien()) && (($linea->idUsuario) != (getSessionId())) ){
			return(FALSE);
		}
		else{ 
			return(TRUE);
			}
	}else{return(FALSE);}	
}

function es_duenio_de_link($id_link){
	$con = conectar_DB();
	$consulta ="SELECT * FROM links_interes WHERE id = '$id_link'";
	$resul=$con->query($consulta);
	if($linea = $resul->fetchRow(DB_FETCHMODE_OBJECT)){
		if( (hay_alguien()) && (($linea->idUsuario) != (getSessionId())) ){
			return(FALSE);
		}
		else{ 
			return(TRUE);
			}
	}else{return(FALSE);}	
}
///////// FIN FUNCIONES RELACIONADAS CON LOS PERMISOS DE LOS ARITUCLOS



////////// FUNCIONES DE CONTROL DE SESION Y COOKIES
function es_admin($id){
	$con = conectar_DB();
	$consulta ="SELECT * FROM usuarios WHERE id = '$id'";
	$resul=$con->query($consulta);
	$linea = $resul->fetchRow(DB_FETCHMODE_OBJECT);
	if (($linea->tipo) != ES_ADMIN){
		return(FALSE);
	}else
		{return(TRUE);}
}

function tiene_permisos(){
	if ((!(hay_alguien())) || (getSessionUserType() != ES_ADMIN))
	{
		return(FALSE);
	}
	else
	{
		return (TRUE);
	}
}

function hay_alguien(){	
	if (isset($_SESSION['id_usuario_veterinaria'])){
		return(TRUE);
	}else
		{ return (FALSE);}
}

function updateCookie($username,$password){
	 setcookie("red_veterinaria_user",$username,99999999999);
	 setcookie("red_veterinaria_pass",$password,99999999999);
}

function hay_cookies(){
	if((isset($_COOKIE['red_veterinaria_user'])) && (isset($_COOKIE['red_veterinaria_pass'])))
		return(TRUE);
	else
		return(FALSE);
}
function getSessionRememberUser(){
	return ($_SESSION['remember_user']);
}

function getSessionId(){
	return ($_SESSION['id_usuario_veterinaria']);
}

function getSessionUsername(){
	return ($_SESSION['username_usuario_veterinaria']);
}

function getSessionCSS(){
	return ($_SESSION['css_usuario_veterinaria']);
}

function setSessionCSS($css_id){
	$_SESSION['css_usuario_veterinaria']=$css_id;
}

function getSessionUserType(){
	return ($_SESSION['tipo_usuario_veterinaria']);
}
////////// FIN FUNCIONES DE CONTROL DE SESION


/////////////// FUNCIONES PARA ENVIAR MAILS DESDE GMAIL (USADAS EN CAMBIO DE ESTADOS, PERMISOS Y RESETEO DE PASSWORDS)

function enviarMail($hacia,$cuerpo,$asunto,$from,$name_to){

		$mail=new PHPMailer();
		
		$mail->IsSMTP();
		$mail->SMTPAuth   = true;                  // habilitas la autentificacion SMTP 
		$mail->SMTPSecure = "ssl";                 // setea el prefijo para el server
		$mail->Host       = "smtp.gmail.com";      // pone a GMAIL como server
		$mail->Port       = 465;                   // setea el puerto de SMTP
		
		$mail->Username   = "red.solidaria.veterinaria@gmail.com";  // GMAIL username
		$mail->Password   = "linuxDead1985";            // GMAIL password
		
		$mail->From       = "red.solidaria.veterinaria@gmail.com";
		$mail->FromName   = $from;
		$mail->Subject    = $asunto;
		$mail->Body       = $cuerpo;                      //HTML Body
		$mail->AltBody    = $cuerpo; //Text Body
		
		$mail->WordWrap   = 50; // setea word wrap
		
		$mail->AddAddress($hacia,$name_to);
		
		$mail->IsHTML(true); // lo envia como HTML
		
		$mail->Send();
}
/////////////// FIN FUNCIONES PARA ENVIAR MAILS DESDE GMAIL (USADAS EN CAMBIO DE ESTADOS, PERMISOS Y RESETEO DE PASSWORDS)
?>