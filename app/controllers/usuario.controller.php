<?php

require_once 'app/models/usuario.model.php';
require_once 'app/views/usuario.view.php';
require_once 'helpers/auth.helper.php';



class UsuarioController
{

    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {

        $this->model = new UsuarioModel();
        $this->view = new UsuarioView();
        $this->authHelper = new AuthHelper();
    }

    public function showHome()
    {
        $this->view->showHome();
    }
    public function loginUser()
    {
        $this->view->showLogin();
    }

    public function logoutUser()
    {
        $this->authHelper->logout();
        header('Location: ' . BASE_URL . 'loginUser');
    }


    public function registerUser()
    {
        $this->view->showRegistrar();
    }

    public function addUser()
    {
        if ($_POST['user'] != "" && $_POST['password'] != "") {
            $user = $_POST['user'];
            $userPassword = $_POST['password'];

            $hash = password_hash($userPassword, PASSWORD_DEFAULT);

            $user = $this->model->createUser($user, $hash, 'N');
            header('Location: ' . BASE_URL . 'loginUser');
        }
    }

    public function authUser()
    {
        $user = $_REQUEST['user'];
        $password = $_REQUEST['password'];

        $user = $this->model->getUsuario($user);

        //Si el usuario existe y las contraseñas coinciden
        if (!empty($user) && password_verify($password, ($user->password))) {
            $this->authHelper->login($user);

            header('Location: ' . BASE_URL . 'home');
        } else {
            header('Location: ' . BASE_URL . 'loginUser');
        }
    }
}