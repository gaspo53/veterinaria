<!-- muestra todos los datos de la nota seleccionada -->
<h2>{$nota_entera->titulo}</h2>
<p>{$nota_entera->nota}</p>
<p>Posteada por <a href="./mostrar_perfil.php?id={$nota_entera->idUsuario}">{$nota_entera->usuario}</a> el {$nota_entera->fecha}</p>
<a href='{$nota_entera->link}' target="_blank"> Link de la Nota </a>
<br>
<br>
<a href="./eliminar_nota.php?id={$nota_entera->id}"> Eliminar Nota </a>
