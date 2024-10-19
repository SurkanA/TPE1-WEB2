<?php

class AuthHelper
{
    public function __construct()
    {
    }

    public function login($user)
    {
        // INICIO LA SESSION Y LOGUEO AL USUARIO
        session_start();
        $_SESSION['ID_USER'] = $user->id_user;
        $_SESSION['USER'] = $user->user;
        $_SESSION['ADMINISTRATOR'] = $user->administrator;
    }

    public function logout()
    {
        session_start();
        session_destroy();
    }

    public function checkLoggedIn()
    {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . BASE_URL . 'loginUser');
            die();
        }
    }

    public function checkAdmin()
    {
        session_start();
        if ($_SESSION['ADMINISTRATOR'] != "S") {
            header('Location: ' . 'home');
            die();
        }
    }

    public function getLoggedUserName()
    {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['USER'];
    }
}