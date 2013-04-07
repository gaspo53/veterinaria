<?php /* Smarty version 2.6.19, created on 2013-04-07 15:26:20
         compiled from links.tpl */ ?>
<!-- lista todos los links de la variable linkkk, generalmente se usa para la barra lateral-->
<?php if ($this->_tpl_vars['linkkk']): ?>
	<ul>
		<?php $_from = $this->_tpl_vars['linkkk']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actual']):
?>
			<li><a href="<?php echo $this->_tpl_vars['actual']->url; ?>
" target="_blank"><?php echo $this->_tpl_vars['actual']->nombre; ?>
</a></li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
<?php endif; ?>