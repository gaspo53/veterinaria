<!-- ESTE TEMPLATE MUESTRA LOS RESULTADOS DE LAS BUSQUEDAS, Y DEPENDIENDO DE SU TIPO CREA EL LINK PARA VER EL RESULTADO -->
{foreach from=$itemcitos item=actual}
	<p>Titulo: {$actual->titulo}</p>
	{if $actual->tipo eq "novedades"}
		<a href="./ver_novedad.php?id={$actual->id}">Ver Novedad </a>
	{elseif $actual->tipo eq "articulos"}
		<a href="./ver_articulo.php?id={$actual->id}">Ver Art&iacute;culo </a>
	{elseif $actual->tipo eq "eventos"}
		<a href="./ver_evento.php?id={$actual->id}">Ver Evento </a>
	{elseif $actual->tipo eq "notas"}
		<a href="./ver_nota.php?id={$actual->id}">Ver Nota </a>
	{elseif $actual->tipo eq "links"}
		<a href="./ver_link.php?id={$actual->id}">Ver Link </a>
	{/if}
	<hr>
	</p>
{/foreach}
