<?php
/* Smarty version 4.3.0, created on 2023-03-27 13:36:46
  from '/var/www/Demo/view/Login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64217fcec67be3_72828782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c7f32edddf37cf094965b1ebae93b4c0c4f1ea3' => 
    array (
      0 => '/var/www/Demo/view/Login.tpl',
      1 => 1679917005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/header.tpl' => 1,
    'file:layout/footer.tpl' => 1,
  ),
),false)) {
function content_64217fcec67be3_72828782 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<div class="container-fluid" id="login-container-img">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card m-5">
                <a class="text-center" href="/login/"><img class="w-25 align-self-center" src="/view/img/logo.jpg"></a>
                <span class="text-centrado text-dark font-weight-bold mt-3">Iniciar sesión en youtrack</span>

                <form id="formulario" class="card-body cardbody-color p-lg-5" method="post">

                    <div class="text-centrado">
                        <img src="https://cdn.pixabay.com/photo/2018/09/17/23/21/imagination-3685048_960_720.png"
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                             width="200px" alt="profile">
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                   placeholder="Correo electrónico">
                        </div>
                        <span class="error text-danger font-italic" id="errorEmail"></span>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña">
                        </div>
                        <span class="error text-danger font-italic" id="errorPassword"></span>
                    </div>

                    <div class="text-center">
                        <button type="button" id="enviar" class="btn px-5 mb-2 w-100 botonesLogin">Login</button>
                    </div><hr>
                    <div class="text-center">
                        <span>¿Eres nuevo en YouTrack?</span>
                        <a href="/registro/" class="btn px-5 mt-1 w-100 botonesLogin"><span id="enlaceRegistro">Registrate</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
