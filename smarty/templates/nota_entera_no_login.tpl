<!-- muestra todos los datos de la nota seleccionada, solo para verla -->
<h2>{$nota_entera_no_login->titulo}</h2>
<p>{$nota_entera_no_login->nota}</p>
<p>Posteada por <a href="./mostrar_perfil.php?id={$nota_entera_no_login->idUsuario}">{$nota_entera_no_login->usuario}</a> el {$nota_entera_no_login->fecha}</p>
<a href='{$nota_entera_no_login->link}' target="_blank"> Link de la Nota </a>