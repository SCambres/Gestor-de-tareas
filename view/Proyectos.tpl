{include file='layout/header.tpl'}
{include file='layout/headerModuleView.tpl'}

<body>
<div class="container">
    <div class="row">
        <div id="tituloProyecto" class="mt-5 col-12">
            <h2 class="h2 text-center text-white">PROYECTOS ACTUALES</h2><hr class="bg-white">
        </div>
    </div>
    <div class="row">
        {foreach $listaProyectos as $proyecto}
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card bg-dark ">
                    <div class="card-header text-center">
                        <img class="w-25" src="/view/img/imagenProyectos.png">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="text-white">{$proyecto['Name']}</h3><hr class="bg-white">
                        <h4 class="text-white">{$proyecto['Categoria']}</h4>
                        <p class="text-white">{$proyecto['Descripcion']}</p>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
</div>
</body>