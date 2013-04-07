<?php /* Smarty version 2.6.19, created on 2013-04-07 15:40:06
         compiled from contenido.tpl */ ?>
<?php if ($this->_tpl_vars['contenido']): ?>
	<!-- ESTA VARIALBE LA USAMOS PARA MOSTRAR TEXTO EN EL CENTRO DE LA PAGINA -->
	<?php $_from = $this->_tpl_vars['contenido']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actual']):
?>
		<p><?php echo $this->_tpl_vars['actual']; ?>
</p>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>