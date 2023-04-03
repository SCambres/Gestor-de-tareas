{include file='layout/header.tpl'}
{include file='layout/headerModuleView.tpl'}

<body>
<div class="container-fluid" id="login-container-img">
    <div class="container">
        {foreach $infUser as $info}
            <h1 class="h1"><span class="text-white">{$info['Name']}</span></h1>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="" class="col-sm-2 col-form-label"><strong>Nombre completo: </strong></label>
                    <div class="col-sm-6 input-group">
                        <input type="text" class="form-control input-save" id="name" placeholder="{$info['Name']}" data-id="{$info['IdUser']}">
                        <button type="button" class="btn btn-primary btn-save" id="modificarName" style="display: none;">Guardar cambios</button>
                    </div>
                    <label for="" class="col-sm-2 col-form-label"><strong>Correo electrónico: </strong></label>
                    <div class="col-sm-6 input-group">
                        <input type="text" class="form-control input-save" id="email" placeholder="{$info['Email']}" data-id="{$info['IdUser']}">
                        <button type="button" class="btn btn-primary btn-save" id="modificarEmail" style="display: none;">Guardar cambios</button>
                    </div>
                    <label for="static" class="col-sm-2 col-form-label"><strong>Permisos:</strong> </label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext input-save text-white" id="type" value="{$info['Type']}" data-id="{$info['IdUser']}">
                        <button type="button" class="btn btn-primary btn-save" style="display: none;">Guardar cambios</button>
                    </div>
                    <label for="" class="col-sm-2 col-form-label"><strong>Avatar: </strong></label>
                    <div class="col-sm-6 input-group align-items-center">
                        {if !empty({$smarty.session.Image})}
                        <div><img  id="imagePerfil" src="/view/img/{$info['Image']}" data-id="{$info['IdUser']}"></div>
                        {else}
                        <div><img data-id="{$info['IdUser']}" id="logoWellcome" src="https://avatars.githubusercontent.com/u/87420161?s=40&v=4""></div>
                        {/if}
                        <a class="ml-3" id="modificarImagen"><i class="fa-solid fa-camera"></i></a>
                        <input type="file" name="f_subir" id="f_subir" style="display: none">
                    </div>
                </div>
            </form>
        {/foreach}
    </div>
</div>


{*<label for="" class="col-sm-2 col-form-label"><strong>Avatar: </strong></label>*}
{*<div class="col-sm-6 input-group">*}
{*    {if !empty({$smarty.session.Image})}*}
{*        <div>*}
{*            <img id="logoWellcome" src="/view/img/{$info['Image']}">*}
{*        </div>*}
{*    {else}*}
{*        <div>*}
{*            <img id="logoWellcome" src="https://avatars.githubusercontent.com/u/87420161?s=40&v=4">*}
{*        </div>*}
{*    {/if}*}
{*    <div class="mt-2">*}
{*        <input type="file" id="avatarFile" name="avatar" accept="image/*" style="display: none;">*}
{*        <button type="button" class="btn btn-primary" onclick="document.getElementById('avatarFile').click();">*}
{*            Cargar imagen*}
{*        </button>*}
{*        <button type="button" class="btn btn-primary btn-save" style="display: none;">Guardar cambios</button>*}
{*    </div>*}
{*</div>*}

{*{include file='layout/footer.tpl'}*}