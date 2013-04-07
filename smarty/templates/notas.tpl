<!--por cada nota pasada en notas muestra solo algunos datos-->
{foreach from=$notas item=actual}
	<p>{$actual->titulo}</p>
	<p>{$actual->nota}</p>
	<p>Posteado por <a href="./mostrar_perfil.php?id={$actual->idUsuario}">{$actual->usuario}</a> el {$actual->fecha}</p>
	<a href='{$actual->link}' target="_blank"> Link De La Nota </a>
	<br>
	<br>
	<a href='./ver_nota.php?id={$actual->id}'> Ver Nota </a>
	<hr>
{/foreach}
	

