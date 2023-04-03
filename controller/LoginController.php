<?php

class LoginController {
    function __construct(){
    }

    /**
     * @throws SmartyException
     */

    function main (){
        global $smarty;

        $smarty->display("Login.tpl");
    }
}