{if $users_list}
<!-- FORM USADO PARA VER ARTICULOS (O LO QUE SEA QUE HAYA POSTEADO DE UN USUARIO, SOLO PARA ADMINS, 
Y LA VARIABLE {$form_action} LA SETEA EL PHP CORRESPONDIENTE, PARA VER ARTICULSO, NOTAS, ETC.-->
<form action="{$form_action}" method="GET" onsubmit="return validar_seleccion('usuarios');">
	<div class="formulario">
	<h4>Seleccione el usuario deseado</h4>
		<br>
		<br>
	
		<p>
			<label for="usuarios">Usuario</label>
				<select name="usuarios" id="usuarios" size="1">
				{foreach from=$users_list item=actual}
					<option value="{$actual->username}">{$actual->username}</option>
				{/foreach}
				</select>  
		</p>
		<input name="enviar" type="submit" value="Enviar">
	</div>
</form>
{else}
		<h2 class="error">No hay ning&uacute;n usuario para seleccionar</h2>
{/if}