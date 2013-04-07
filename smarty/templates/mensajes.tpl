<!-- muestra todos los datos de los mensajes seleccionados, solo para verlos -->
{foreach from=$mensaje item=mensaje}
	<h2>De: {$mensaje->remitente}</h2>
	<br>
	{if $mensaje->leido == 0}
		<h1>Asunto: {$mensaje->asunto} (Sin leer)</h1>
	{else}
		<h1>Asunto: {$mensaje->asunto}</h1>
	{/if}
	<a href="./ver_mensaje.php?id={$mensaje->id}"> Ver </a>
	<hr>
	<br>	
{/foreach}
{if $mensaje}
	<a href="./bandeja_entrada.php?leido=0"> No Le&iacute;dos </a>
	|
	<a href="./bandeja_entrada.php?leido=2"> Todos </a>
{/if}
