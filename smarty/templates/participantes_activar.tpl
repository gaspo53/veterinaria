<!-- lista todos los participantes que estan esperando la activacion -->
{foreach from=$admin_array_all_activaciones item=actual}
	<p>Username: <a href="./mostrar_perfil.php?id={$actual->id}">{$actual->username}</a></p>
	<p>E-Mail: <a href="mailto:{$actual->email}">{$actual->email}</a></p> 
	{if $actual->tipo eq "1"}
		<p>Tipo: Administrador</p>
	{elseif $actual->tipo eq "2"}
		<p>Tipo: Participante</p>
	{/if}
	<a href="./estatificar_usuario.php?username={$actual->username}&amp;estado=1"> Activar</a>
	<hr>
{/foreach}
