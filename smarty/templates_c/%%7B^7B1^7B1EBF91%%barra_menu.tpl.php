<?php /* Smarty version 2.6.19, created on 2008-02-27 12:38:21
         compiled from barra_menu.tpl */ ?>
<?php if ($this->_tpl_vars['menu_items']): ?>
<div id="barra_admin"> 
	  <form name="menu_items" action="./ir_a.php" method="post">
		<select name="url" size="1" onchange="javascript:goTo(this.value)">
			<option value="choose">Elija opci&oacute;n</option>
			<?php $_from = $this->_tpl_vars['menu_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actual']):
?>
				<option value="<?php echo $this->_tpl_vars['actual']->link; ?>
"><?php echo $this->_tpl_vars['actual']->titulo; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
		</select>
		<noscript>
			<input name="ir_a" type="submit" value="Ir A" />
		</noscript>	
	</form>
</div>
<?php endif; ?>