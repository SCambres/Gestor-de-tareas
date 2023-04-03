<?php

class RegistroController {
    function __construct(){
    }

    /**
     * @throws SmartyException
     */

    function main (){
        global $smarty;

        $smarty->display("Registro.tpl");
    }
}