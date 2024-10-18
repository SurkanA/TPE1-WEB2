<?php

require_once 'app/controllers/jugador.controller.php';
require_once 'app/controllers/usuario.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'loginUser';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new UsuarioController();
        $controller->showHome();
        break;
    case 'equipos':
        break;
    case 'jugadores':
        $controller = new JugadorController();
        $controller->showPlayers();
        break;
    case 'loginUser':
        $controller = new UsuarioController();
        $controller->loginUser();
        break;
    case 'registerUser':
        $controller = new UsuarioController();
        $controller->registerUser();
        break;
    case 'addUser':
        $controller = new UsuarioController();
        $controller->addUser();
    case 'authUser':
        $controller = new UsuarioController();
        $controller->authUser();
        break;
    default:
        echo "404 not found";
        break;
}