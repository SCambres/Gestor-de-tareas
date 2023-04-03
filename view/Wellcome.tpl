{include file='layout/header.tpl'}
{include file='layout/headerModuleView.tpl'}

<body>
<div class="m-2 p-2">
    <div id="proyectoAsociados">
        <label for="proyectoSelect">Proyecto:</label>
        <select id="proyectoSelect" class="form-select" aria-label="selectProyectos">
            {foreach $listaProyectos as $proyecto}
                <option value="{$proyecto['IdProyecto']}">{$proyecto['Name']}</option>
            {/foreach}
        </select>
    </div>
    <div id="generalPanel" class="container-fluid">
        <div id="generalPanel" class="justify-content-around">
            <div class="text-center">
                <h2 class="text-white">TAREAS</h2><hr class="bg-white">
            </div>
            <div class="row m-3">
                <div class="col-lg-4 col-md-12 col-sm-12 my-3">
                    <div class="card">
                        <div class="card-header text-center bg-success font-italic bg-dark">
                            <h5 class="text-light">Pendiente</h5>
                        </div>
                        <div class="card-body">
                            {assign var="hayTareasCompletadas" value=false}
                            {foreach $tareasPendientes as $pendientes}
                                {if $smarty.session.IdUser == $pendientes['UserId']}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card" id="tareaPendiente{$pendientes['IdTarea']}">
                                                <div class="card-header font-italic bg-dark">
                                                    <h6 class="text-light">{$pendientes['Name']}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <strong>Descripción: {$pendientes['Descripcion']} </strong>
                                                    <hr>
                                                    <strong>Fecha inicio
                                                        programada: {$pendientes['FechaComienzo']}</strong>
                                                    <hr>
                                                    <strong>Fecha finalización
                                                        aproximada: {$pendientes['FechaFinalizacion']}</strong>
                                                    <hr>
                                                    <select class="form-select nuevoEstado"
                                                            data-id="{$pendientes['IdTarea']}"
                                                            aria-label="select estado">
                                                        <option>Pendiente</option>
                                                        <option>Proceso</option>
                                                        <option>Completada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {assign var="hayTareasCompletadas" value=true}
                                {/if}
                            {/foreach}
                            {if !$hayTareasCompletadas}
                                <span>Sin tareas pendientes</span>
                            {/if}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 my-3">
                    <div class="card">
                        <div class="card-header text-center bg-success font-italic bg-dark">
                            <h5 class="text-light">En proceso</h5>
                        </div>
                        <div class="card-body">
                            {assign var="hayTareasCompletadas" value=false}
                            {foreach $tareasProceso as $proceso}
                                {if $smarty.session.IdUser == $proceso['UserId']}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card">
                                                <div class="card-header font-italic bg-dark">
                                                    <h6 class="text-light">{$proceso['Name']}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <strong>Descripción: {$proceso['Descripcion']} </strong>
                                                    <hr>
                                                    <strong>Fecha inicio: {$proceso['FechaComienzo']}</strong>
                                                    <hr>
                                                    <strong>Fecha finalización
                                                        aproximada: {$proceso['FechaFinalizacion']}</strong>
                                                    <hr>
                                                    <select class="form-select nuevoEstado"
                                                            data-id="{$proceso['IdTarea']}" aria-label="select estado">
                                                        <option>Proceso</option>
                                                        <option>Pendiente</option>
                                                        <option>Completada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {assign var="hayTareasCompletadas" value=true}
                                {/if}
                            {/foreach}
                            {if !$hayTareasCompletadas}
                                <span>Sin tareas en proceso</span>
                            {/if}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 my-3">
                    <div class="card">
                        <div class="card-header text-center bg-success font-italic bg-dark">
                            <h5 class="text-light">Completado</h5>
                        </div>
                        <div class="card-body">
                            {assign var="hayTareasCompletadas" value=false}
                            {foreach $tareasCompletada as $completada}
                                {if $smarty.session.IdUser == $completada['UserId']}
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card">
                                                <div class="card-header font-italic bg-dark">
                                                    <h6 class="text-light">{$completada['Name']}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <strong>Descripción: {$completada['Descripcion']} </strong>
                                                    <hr>
                                                    <strong>Fecha inicio: {$completada['FechaComienzo']}</strong>
                                                    <hr>
                                                    <strong>Fecha
                                                        finalización: {$completada['FechaFinalizacion']}</strong>
                                                    <hr>
                                                    <select class="form-select nuevoEstado"
                                                            data-id="{$completada['IdTarea']}"
                                                            aria-label="select estado">
                                                        <option>Completada</option>
                                                        <option>Proceso</option>
                                                        <option>Pendiente</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {assign var="hayTareasCompletadas" value=true}
                                {/if}
                            {/foreach}
                            {if !$hayTareasCompletadas}
                                <span>Sin tareas completadas</span>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

{*{include file='layout/footer.tpl'}*}

