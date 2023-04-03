<?php

class WellcomeController{

    private Tarea $model;

    function __construct(){

    }

    /**
     * @throws SmartyException
     */
    function main() {
        global $smarty;

        $user = new Users();
        $proyectos = new Proyectos();
        $tareas = new Tarea();

        $user->load_all();
        $proyectos->load_all();
        $tareas->load_all();
        $tareas->load_pendientes();
        $tareas->load_proceso();
        $tareas->load_completada();

        $smarty->assign("listaUsers", $user->allUsers);
        $smarty->assign("listaProyectos", $proyectos->allProyectos);
        $smarty->assign("listaTareas", $tareas->allTareas);
        $smarty->assign("tareasPendientes", $tareas->tareaPendiente);
        $smarty->assign("tareasProceso", $tareas->tareaProceso);
        $smarty->assign("tareasCompletada", $tareas->tareaCompletada);

        $smarty->display("Wellcome.tpl");
    }
}