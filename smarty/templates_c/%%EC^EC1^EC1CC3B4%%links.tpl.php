<?php /* Smarty version 2.6.19, created on 2008-02-27 12:38:21
         compiled from links.tpl */ ?>
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