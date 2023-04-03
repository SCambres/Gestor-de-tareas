<?php
//require_once ("controller/IndexController.php");
require_once ("config/global.php");

if (isset($_GET['ctrl'])){
    $controller = ucwords($_GET['ctrl']);
}
else {
    $controller = 'Login';
}

$controller .= 'Controller';

if (is_file('controller/' .$controller. '.php')){
    require_once ('controller/' .$controller. '.php');

    $controllerObject = new $controller();

    $controllerObject->main();
}
else {
    header('Location: 404/');
}

