<?php

class ProyectosController {

    function __construct(){
    }

    /**
     * @throws SmartyException
     */

    function main (){
        global $smarty;

        $proyectos = new Proyectos();

        $proyectos->load_all();

        $smarty->assign("listaProyectos", $proyectos->allProyectos);
        $smarty->display("Proyectos.tpl");
    }
}