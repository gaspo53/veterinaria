{if $menu_items}
	<!-- ESTE TEMPLATE MUESTRA LA BARRA DE MENU DE USUARIO -->
<div id="barra_admin"> 
	  <form name="menu_items" action="./ir_a.php" method="post">
		<select name="url" size="1" onchange="javascript:goTo(this.value)">
			<option value="choose">Elija opci&oacute;n</option>
			{foreach from=$menu_items item=actual}
				<option value="{$actual->link}">{$actual->titulo}</option>
			{/foreach}
		</select>
		<noscript>
			<input name="ir_a" type="submit" value="Ir A" />
		</noscript>	
	</form>
</div>
{/if}