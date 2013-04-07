<? if  (file_exists('./site.conf.php')) // QUIERE DECIR QUE ESTA "INSTALADO" EL SITIO
   		header('Location: ./index.php');
?>
<html dir="ltr"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<style type="text/css">

    body { background-color: #ffeece; }
    p, li, td {
        font-family: helvetica, arial, sans-serif;
        font-size: 10pt;
    }
    a { text-decoration: none; color: blue; }
    a img {
        border: none;
    }
    .errormsg {
        color: red;
        font-weight: bold;
    }
    blockquote {
        font-family: courier, monospace;
        font-size: 10pt;
    }
    .install_table {
        width: 500px;
    }
    .td_left {
        text-align: right;
        font-weight: bold;
    }
    .td_right {
        text-align: left;
    }
    .main {
        width: 500px;
        border-width: 1px;
        border-style: solid;
        border-color: #ffc85f;
        -moz-border-radius-bottomleft: 15px;
        -moz-border-radius-bottomright: 15px;
    }
    .td_mainheading {
        background-color: #fee6b9;
        padding: 10px;
    }
    .td_main {
        text-align: center;
    }
    .td_mainlogo {
    }
    .p_mainlogo {
    }
    .p_mainheading {
        font-size: 11pt;
    }
    .p_subheading {
        font-size: 10pt;
        padding: 10px;
    }
    .p_mainheader{
        text-align: right;
        font-size: 20pt;
        font-weight: bold;
    }
    .p_pass {
        color: green;
        font-weight: bold;
    }
    .p_fail {
        color: red;
        font-weight: bold;
    }
    .p_caution {
        color: #ff6600;
        font-weight: bold;
    }
    .p_help {
        text-align: center;
        font-family: helvetica, arial, sans-serif;
        font-size: 14pt;
        font-weight: bold;
        color: #333333;
    }
    .environmenttable {
        font-size: 10pt;
        border-color: #ffc85f;
    }
    table.environmenttable .error {
        background-color : red;
        color : inherit;
    }

    table.environmenttable .warn {
        background-color : yellow;
    }

    table.environmenttable .ok {
        background-color : lightgreen;
    }
    .header {
        background-color: #fee6b9;
        font-size: 10pt;
    }
    .cell {
        background-color: #ffeece;
        font-size: 10pt;
    }
    .error {
        color: #ff0000;
    }
    .errorboxcontent {
        text-align: center;
        font-weight: bold;
        padding: 20px;
        color: #ff0000;
    }
    .invisiblefieldset {
      display:inline;
      border:0px;
      padding:0px;
      margin:0px;
    }
    #mysql, #postgres7, #mssql, #mssql_n, #odbc_mssql, #oci8po {
        display: none;
    }
    #menulanguage {
      direction: ltr;
    }

</style>
<title>Red Solidaria Veterinaria - Instalaci&oacute;n</title>
</head><body>




<table class="main" align="center" cellpadding="3" cellspacing="0">
    <tbody><tr>
        <td class="td_mainlogo">
            <p class="p_mainlogo">&nbsp;</p>
        </td>
        <td class="td_mainlogo" valign="bottom">
            <p class="p_mainheader" align="center" >Instalación</p>
        </td>
    </tr>

    <tr>
        <td class="td_mainheading" colspan="2">
            <p class="p_mainheading">Ahora
necesita configurar la base de datos en la que se almacenarán la mayor
parte de los datos de Red Solidaria Veterinaria. Esta base de datos debe haber sido ya
creada y disponer de un nombre de usuario y una contraseña de acceso, caso contrario la puede crear, pero el usuario y contrase&ntilde;a tienen que existir en el servidor de la base.</p>
          <div style="display: block;" id="mysql" name="mysql"><b>Tipo:</b> MySQL (Tipo de la base de datos) <br>
<b>Servidor:</b> Donde se encuentra la base de datos eg localhost o db.isp.com<br>
<b>Base de datos:</b> nombre de la base de datos, eg proy07user32<br>
<b>Usuario de la BD:</b> usuario de la base de datos<br>
<b>Contraseña:</b> contraseña de la base de datos<br>
</td>
    </tr>
    <tr>
        <td class="td_main" colspan="2">

        <form id="installform" method="post" action="./setup_site.php">

    <table class="install_table" align="center" cellpadding="3" cellspacing="3">


            <tbody>
			<tr>
                <td class="td_left"><p>Tipo</p></td>
                <td class="td_right">
                <select id="menudbtype" name="DB_TYPE">
   					<option  value="mysql" >MySQL (mysql)</option>
				</select>
                </td>
            </tr>
            <tr>
                <td class="td_left"><p>Servidor de la base de datos</p></td>
                <td class="td_right">
                    <input size="40" name="DB_HOST" value="localhost" type="text">
                </td>
            </tr>
 			<tr>
                <td class="td_left"><p>Puerto de la Base de datos</p></td>
                <td class="td_right">
                    <input size="40" name="DB_LISTEN_PORT" value="3306" type="text">
                </td>
            </tr>
            <tr>
                <td class="td_left"><p>Base de datos <br />(caracteres SOLO alfab&eacute;ticos)</p></td>
                <td class="td_right">
                    <input size="40" name="DB_NAME" value="" type="text"><br />
					<label for="DB_CREATE">La Base de datos no est&aacute; creada, <br />DESEO CREARLA</label>
                    <input size="40" name="DB_CREATE"  type="checkbox" >
                </td>
            </tr>
			
            <tr>
                <td class="td_left"><p>Usuario de la BD </p></td>
                <td class="td_right">
                    <input size="40" name="DB_USERNAME" value="" type="text">
                </td>
            </tr>
			<tr>
                <td class="td_left"><p>Contraseña</p></td>
                <td class="td_right">
                    <input size="40" name="DB_PASSWORD" value="" type="password">
                </td>
            </tr>
			<tr>
                <td class="td_left"><p>Carpeta de Smarty (&quot;./carpeta&quot;) </p></td>
                <td class="td_right">
                    <input size="40" name="SMARTY_PATH" value="./smarty"  type="text">
                </td>
            </tr>
            
            <tr>
                <td class="td_left"><p>Cantidad base a mostrar por el paginador</p></td>
                <td class="td_right">
                    <input size="40" name="PAGINATOR_BASE" value="" type="text">
                </td>
            </tr>
			<tr>
                <td class="td_left"><p>Administrador (username)</p></td>
                <td class="td_right">
                    <input size="40" name="ADMIN_USERNAME" value="" type="text">
                </td>
            </tr>
			<tr>
                <td class="td_left"><p>Contrase&ntilde;a administrador</p></td>
                <td class="td_right">
                    <input size="40" name="ADMIN_PASSWORD" value="" type="text">
                </td>
            </tr>


    <tr>
        <td colspan="2">
            <input name="prev" value="«  Instalar  »" type="submit">



        </td>

    </tr>

    </tbody></table>
    </form>


        </td>
    </tr>
</tbody></table>
<div style="color:#330099;font-weight:bold;font-size:36px;text-align:center"><? if (isset($_GET['error']))
echo ("Error en la conexion con la base de datos, compruebe los datos ingresados")?></div>

<p style="font-size:24px; font-family:Georgia, 'Times New Roman', Times, serif; color:#993333;font:bold"> 
Requerimientos VITALES para instalar el sistema, de lo contrario se producir&aacute;n errores NO contemplados:
		<br />
		<br />
		.- MySQL Versi&oacute;n 5.0.51 &oacute; superior<br />
		.- PHP Versi&oacute;n 5.2.5 &oacute; superior<br />
		.- PEAR Database Extension for PHP<br />
		.- Tener habilitados SMTP y SSL en el servidor (ya que se envian mails por gmail(SSL authentification)
			<b>(PERO EL SERVIDOR DE LA FACU LO TIENE HABILITADO, POR ESO LO PUSIMOS)</b>

</p>

</body></html>