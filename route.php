<?php

require_once "controllers/filmController.php";
require_once "controllers/directorController.php";
require_once "controllers/userController.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);
$filmController = new FilmController();
$directorController = new DirectorController();
$userController = new UserController();
switch ($params[0]) {
    case 'home':
        $filmController->getFilms();
        break;
    case 'films':
        if (isset($params[1]))

            switch ($params[1]) {
                case 'detail':
                    $filmController->getFilm($params[2]);
                    break;
                case 'add':
                    $filmController->addFilm();
                    break;
                case 'edit':
                    $filmController->editFilmForm($params[2]);
                    break;
                case 'edit':
                    $filmController->editFilm($params[2]);
                    $filmController->getFilm($params[2]);
                    break;
                case 'delete':
                    $filmController->deleteFilm($params[2]);
                    break;
                default:
                    $filmController->getFilms();
                    break;
            }
        else
            $filmController->getFilms();
        break;

    case 'directors':
        if (isset($params[1]))
            switch ($params[1]) {
                case 'add':
                    $directorController->addDirector();
                    break;
                case 'edit':
                    $directorController->editDirectorForm($params[2]);
                    break;
                case 'edit':
                    $directorController->editDirector($params[2]);
                    break;
                case 'delete':
                    $directorController->deleteDirector($params[2]);
                    break;
                case 'films':
                    $filmController->getFilmsbyDirector($params[2]);
                    break;
                default:
                    $directorController->getDirector();
                    break;
            }
        else
            $directorController->getDirector();
        break;
    case 'login':
        $userController->showLogin();
        break;
    case 'verify':
        $userController->verifyLogin();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'verify-register':
        $userController->registerUser();
        break;
    case 'register':
        $userController->showRegister();
        break;
    case 'users':
        if (isset($params[1]))
            switch ($params[1]) {
                case 'edit':
                    $userController->editUserForm($params[2]);
                    break;
                case 'edit':
                    $userController->editUser($params[2]);
                    break;
                case 'delete':
                    $userController->deleteUser($params[2]);
                    break;
            }
        else
            $userController->getUsers();
        break;
    default:
        echo ('404 Page not found');
        break;
}
