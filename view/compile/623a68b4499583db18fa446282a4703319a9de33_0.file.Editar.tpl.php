<?php
/* Smarty version 4.3.0, created on 2023-03-22 16:49:50
  from '/var/www/Demo/view/Editar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641b239e4ae480_76650163',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '623a68b4499583db18fa446282a4703319a9de33' => 
    array (
      0 => '/var/www/Demo/view/Editar.tpl',
      1 => 1677592302,
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
function content_641b239e4ae480_76650163 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layout/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:layout/headerModuleView.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center mb-5 text-dark">EDITAR PRODUCTO</h3>
            <div class="text-center mb-5 text-dark">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Nombre']->value, 'info');
$_smarty_tpl->tpl_vars['info']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->do_else = false;
?>
                    <strong><?php echo $_smarty_tpl->tpl_vars['info']->value['Name'];?>
</strong>
                    <span style="display: none" id="productid"><?php echo $_smarty_tpl->tpl_vars['info']->value['Id'];?>
</span>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="card my-5">

                <form id="editarDatos" class="card-body cardbody p-lg-5 " method="post">

                    <div class="mb-3">
                        <input type="text" class="form-control" id="Name" placeholder="Edita el nombre">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="Stock" placeholder="Actualiza el stock">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="Price" placeholder="Edita el precio">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="Image" placeholder="Editar imagen">
                    </div>

                    <div class="text-center">
                        <button type="button" id="enviarEditar" class="btn btn-dark">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:layout/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
