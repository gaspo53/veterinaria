<!-- muestra todos los datos de los usuarios en admin_array_all -->
{if $admin_array_all}
	{foreach from=$admin_array_all item=actual}
		<p>Username: <a href="./mostrar_perfil.php?id={$actual->id}">{$actual->username}</a></p>
		<p>Nombre y Apellido: {$actual->nombre} {$actual->apellido}</p> 
		<p>E-Mail: <a href="mailto:{$actual->email}">{$actual->email}</a></p> 
		{if $actual->tipo eq "1"}
			<p>Tipo: Administrador</p>
		{elseif $actual->tipo eq "2"}
			<p>Tipo: Participante</p>
		{/if}
		{if $actual->estado eq "1"}
			<p>Estado: ACTIVO</p>
		{elseif $actual->estado eq "2"}
			<p>Estado: DESACTIVADO</p>
		{elseif $actual->estado eq "3"}
			<p>Estado: SUSPENDIDO</p>
		{/if}
		<a href="./modificar_datos_usuarios.php?id={$actual->id}">Modificar </a>
		|
		<a href="./eliminar_usuario.php?id={$actual->id}&amp;username={$actual->username}"> Eliminar</a>
		|
		<a href="./cambiar_permisos.php?username={$actual->username}&amp;tipo=1"> Convertir En ADMINISTRADOR</a>
		|
		<a href="./cambiar_permisos.php?username={$actual->username}&amp;tipo=2"> Convertir En PARTICIPANTE</a>
		<p>
		{if $actual->estado != "1"}
			<a href="./estatificar_usuario.php?username={$actual->username}&amp;estado=1"> Activar</a>
			|
		{/if}
		{if $actual->estado != "2"}
			<a href="./estatificar_usuario.php?username={$actual->username}&amp;estado=2"> Desactivar</a>
		{/if}
		{if $actual->estado != "3"}
			|
			<a href="./estatificar_usuario.php?username={$actual->username}&amp;estado=3"> Suspender</a>
		{/if}
		|
		<a href="./reset_passwd.php?username={$actual->username}&amp;id={$actual->id}"> Restablecer Contrase&ntilde;a</a></p>
		<hr>
	{/foreach}
{else}
	<h2 class="error">No hay ning&uacute;n participante para mostrar</h2>
{/if}