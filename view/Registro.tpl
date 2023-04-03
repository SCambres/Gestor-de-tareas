{include file="layout/header.tpl"}
<body>
<div class="container-fluid" id="login-container-img">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card m-5">
                <a class="text-center" href="/login/"><img class="w-25 align-self-center" src="/view/img/logo.jpg"></a>
                <span class="text-centrado text-dark mt-3"><h3><strong>Registrate en youtrack</strong></h3></span>

                <form id="formularioRegistro" class="card-body cardbody-color p-lg-5" method="post" enctype="multipart/form-data">

                    <div class="text-centrado">
                        <img src="https://cdn.pixabay.com/photo/2018/09/17/23/21/imagination-3685048_960_720.png"
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                             width="200px" alt="profile">
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-signature"></i></span>
                            <input type="text" class="form-control" id="Name"
                                   placeholder="Nombre completo">
                        </div>
                        <span class="error text-danger font-italic" id="errorName"></span>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control" id="Email" aria-describedby="emailHelp"
                                   placeholder="Correo electrónico">
                        </div>
                        <span class="error text-danger font-italic" id="errorEmail"></span>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control" id="Password" placeholder="Contraseña">
                        </div>
                        <span class="error text-danger font-italic" id="errorPassword"></span>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control" id="ConfirmPassword" placeholder="Confirmar contraseña">
                        </div>
                        <span class="error text-danger font-italic" id="errorConfirmPassword"></span>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                            <input type="file" class="form-control" id="fileToUpload" placeholder="Imágen de avatar">
                        </div>
                    </div>

                    <div class="text-centrado">
                        <button type="button" id="guardarRegistro" class="btn px-5 mb-2 w-100 botonesLogin">Continuar</button>
                    </div><hr>
                    <div class="text-center">
                        <span>¿Ya tienes una cuenta?</span><a href="/login/"> Iniciar sesión</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{include file="layout/footer.tpl"}