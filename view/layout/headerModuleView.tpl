<nav class="navbar navbar-expand-lg navbar-light bg-dark" id>
    <a class="navbar-brand" href="/wellcome/"><img id="logoWellcome" src="/view/img/logo.jpg" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="/wellcome/">Paneles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/proyectos/">Proyectos</a>
            </li>
            {if $smarty.session.Type == 'employee'}
            <li class="nav-item">
                <a class="nav-link text-white" href="/crearTarea/">Crear tarea</a>
            </li>
                {else}
                <li class="nav-item">
                    <a class="nav-link text-white" href="/asignarTarea/">Asignar Tarea</a>
                </li>
            {/if}
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {if !empty({$smarty.session.Image})}
                        <img class="rounded-circle" src="/view/img/{$smarty.session.Image}" alt="Imagen de perfil" width="40" height="40"></a>
                    {else}
                    <img class="rounded-circle" src="https://avatars.githubusercontent.com/u/87420161?s=40&v=4" alt="Imagen de perfil" width="40" height="40"></a>
                    {/if}
                    <div class="dropdown-menu dropdown-menu-right bg-white" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item claseHover" href="/perfil/{$smarty.session.IdUser}/">Perfil</a>
                        <a class="dropdown-item claseHover" href="#">Another action</a>
                        <a class="dropdown-item claseHover" href="/logout/">Cerrar sesion</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>