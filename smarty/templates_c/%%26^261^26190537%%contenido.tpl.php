<?php /* Smarty version 2.6.19, created on 2008-02-27 12:38:21
         compiled from contenido.tpl */ ?>
<?php if ($this->_tpl_vars['contenido']): ?>
	<?php $_from = $this->_tpl_vars['contenido']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actual']):
?>
		<p><?php echo $this->_tpl_vars['actual']; ?>
</p>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>