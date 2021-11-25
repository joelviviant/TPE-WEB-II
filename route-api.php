<?php


require_once('libs/Router.php');
require_once('./controllers/APIController.php');


$router = new Router();


$router->addRoute('films/detail/:ID', 'GET', 'APIController', 'getRemarksByFilm');
$router->addRoute('films/detail/:ID/remarks', 'POST', 'APIController', 'addRemarksFilm');
$router->addRoute('films/detail/:ID/remarks/:ID', 'DELETE', 'APIController', 'deleteRemark');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
