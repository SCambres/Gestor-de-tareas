<?php
/* Smarty version 4.3.0, created on 2023-03-06 14:29:21
  from '/var/www/ejercicios/tienda_formacion/view/Crear.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6405eab1301749_50798301',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4553d6bca72e7c5774017ca99438733535aa4f9' => 
    array (
      0 => '/var/www/ejercicios/tienda_formacion/view/Crear.tpl',
      1 => 1677763531,
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
function content_6405eab1301749_50798301 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:layout/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:layout/headerModuleView.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-centrado mb-5 text-dark">CREAR NUEVO PRODUCTO</h3>
            <div class="text-centrado mb-5 text-dark">INTRODUCE LOS DATOS</div>
            <div class="card my-5">

                <form id="crearProducto" class="card-body cardbody p-lg-5 " method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <input type="text" class="form-control" id="Name" placeholder="Nombre del producto">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="Stock" placeholder="Stock del producto">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="Price" placeholder="Precio del producto">
                    </div>

                    <div class="mb-3">
                        <input type="file" class="form-control" id="fileToUpload" placeholder="Cargar imagen del producto">
                    </div>

                    <div class="text-centrado">
                        <button type="button" id="crear" class="btn btn-dark">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:layout/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
