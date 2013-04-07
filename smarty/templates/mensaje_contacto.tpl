<!-- muestra todos los datos de los mensajes de contacto seleccionados -->
{if $info_user}
	<h1>{$info_user}</h1>
{/if}
<br>
<br>
{foreach from=$mensaje_contacto item=actual}
	<h2>De: {$actual->remitente}</h2>
	<h2>E-Mail: <a href="mailto:{$actual->email}">{$actual->email}</a></h2>
	<br>
	<p>{$actual->mensaje}</p>
	<a href="./eliminar_mensaje_contacto.php?id={$actual->id}"> Eliminar </a>
	<hr>
	<br>	
{/foreach}
