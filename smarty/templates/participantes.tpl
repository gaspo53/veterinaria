<!--muestra la informacion de los participantes pasados por admin2_array-->
{foreach from=$admin2_array item=actual}
	<p>Usuario: 
		<a href="./mostrar_perfil.php?id={$actual->id}">{$actual->username}</a>
	</p>
	<p>Nombre y Apellido: {$actual->nombre} {$actual->apellido}</p> 
	<p>Profesi&oacute;n: {$actual->profesion}</p>
	<p>E-Mail: <a href="mailto:{$actual->email}">{$actual->email}</a></p> 
	{if $actual->tipo eq "1"}
		<p>Tipo: Administrador</p>
	{elseif $actual->tipo eq "2"}
		<p>Tipo: Participante</p>
	{/if}
	
	<br>
	<h5><a href="./escribir_mensaje.php?usuario_a_responder={$actual->username}">Contactar participante </a></h5> 
	<hr>
{/foreach}
