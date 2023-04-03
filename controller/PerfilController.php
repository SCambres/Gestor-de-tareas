<?php

class PerfilController {

    function __construct() {

    }

    /**
     * @throws SmartyException
     */

    function main (){
        global $smarty;
        $user = new Users();
        $idUser = $_GET['perfil'];
        $user->setIdUser($idUser);

        $user->loadInfoUser();

        $smarty->assign("infUser", $user->infUser);
        $smarty->display("Perfil.tpl");
    }

}
