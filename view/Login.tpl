{include file="layout/header.tpl"}
<body>
<div class="container-fluid" id="login-container-img">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card m-5">
                <a class="text-center" href="/login/"><img class="w-25 align-self-center" src="/view/img/logo.jpg"></a>
                <span class="text-centrado text-dark mt-3"><h3><strong>Iniciar sesión en youtrack</strong></h3></span>

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

{include file="layout/footer.tpl"}