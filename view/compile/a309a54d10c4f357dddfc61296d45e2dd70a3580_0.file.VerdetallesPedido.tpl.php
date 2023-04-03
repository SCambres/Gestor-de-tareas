<?php
/* Smarty version 4.3.0, created on 2023-03-06 12:07:49
  from '/var/www/ejercicios/tienda_formacion/view/VerdetallesPedido.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6405c985a4f4b6_64448267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a309a54d10c4f357dddfc61296d45e2dd70a3580' => 
    array (
      0 => '/var/www/ejercicios/tienda_formacion/view/VerdetallesPedido.tpl',
      1 => 1678099371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/header.tpl' => 1,
    'file:layout/headerModuleView.tpl' => 1,
    'file:layout/footer.tpl' => 1,
  ),
),false)) {
function content_6405c985a4f4b6_64448267 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layout/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:layout/headerModuleView.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div>
    <table class="table mt-5">
        <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>OrderId</th>
            <th>ProductId</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infoPedido']->value, 'info');
$_smarty_tpl->tpl_vars['info']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['info']->value['Id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['info']->value['OrderId'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['info']->value['ProductId'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['info']->value['Quantity'];?>
</td>

            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </tbody>
    </table>

</div>
<?php $_smarty_tpl->_subTemplateRender('file:layout/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
