<?php

class CreartareaController {

    function __construct(){
    }

    /**
     * @throws SmartyException
     */

    function main (){
        global $smarty;

        $proyecto = new Proyectos();

        $proyecto->load_all();

        $smarty->assign("listaProyectos", $proyecto->allProyectos);
        $smarty->display("Creartarea.tpl");
    }

}