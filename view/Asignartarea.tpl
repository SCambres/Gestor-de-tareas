{include file='layout/header.tpl'}
{include file='layout/headerModuleView.tpl'}

<body>
<div class="container-fluid" id="login-container-img">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card m-5">
                <span class="text-centrado text-dark mt-3"><h3><strong>Crear y asignar una nueva tarea</strong></h3></span>

                <form id="formularioTarea" class="card-body cardbody-color p-lg-5" method="post">

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-signature"></i></span>
                            <input type="text" class="form-control" id="NameTarea"
                                   placeholder="Nombre de la tarea">
                        </div>
                        <span class="error text-danger font-italic" id="errorNameTarea"></span>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-comment"></i></i></span>
                            <textarea class="form-control" id="Descripcion"
                                      placeholder="Descripcion"></textarea>
                        </div>
                        <span class="error text-danger font-italic" id="errorDescripcion"></span>
                    </div>
                    <div>
                        Fecha de comienzo prevista:
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                            <input type="datetime-local" class="form-control" id="FechaComienzo">
                        </div>
                        <span class="error text-danger font-italic" id="errorComienzo"></span>
                    </div>
                    <div>
                        Fecha de finalización prevista:
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                            <input type="datetime-local" class="form-control" id="FechaFinalizacion">
                        </div>
                        <span class="error text-danger font-italic" id="errorFinalizacion"></span>
                    </div>
                    <div>
                        Proyecto al que pertenece la tarea:
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-diagram-project"></i></span>
                            <select type="number" class="form-control" id="ProyectoId">
                                {foreach $listaProyectos as $proyecto}
                                    <option value="{$proyecto['IdProyecto']}">{$proyecto['Name']}</option>
                                {/foreach}
                            </select>
                        </div>
                        <span class="error text-danger font-italic" id="errorProyecto"></span>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-diagram-project"></i></span>
{*                            POSIBLE SOLUCION SCROLL PONER size="3"*}
                            <select class="form-control" id="UserId" size="3">
                                {foreach $listaUsers as $user}
                                    <option value="{$user['IdUser']}">{$user['Name']}</option>
                                {/foreach}
                            </select>
                        </div>
                        <span class="error text-danger font-italic" id="errorProyecto"></span>
                    </div>

                    <div class="text-centrado">
                        <button type="button" id="asignarTarea" class="btn px-5 mb-2 w-100 botonesLogin">Crear</button>
                    </div><hr>
                    <div class="text-center">
                        <span>¿Quieres volver al panel?</span><a href="/wellcome/"> VOLVER</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>