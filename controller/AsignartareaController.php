<?php

class AsignartareaController {

    function __construct(){
    }

    /**
     * @throws SmartyException
     */

    function main (){
        global $smarty;

        $proyecto = new Proyectos();
        $user = new Users();

        $user->load_all();
        $proyecto->load_all();

        $smarty->assign("listaUsers", $user->allUsers);
        $smarty->assign("listaProyectos", $proyecto->allProyectos);
        $smarty->display("Asignartarea.tpl");
    }

}