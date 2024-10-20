<?php

require_once 'libs/Smarty/Smarty.class.php';
require_once 'helpers/auth.helper.php';
class UsuarioView
{
    private $smarty;

    public function __construct()
    {
        $authHelper = new AuthHelper();
        $admin = $authHelper->isLogged();

        $this->smarty = new Smarty();
        $this->smarty->assign('base', BASE_URL);
        $this->smarty->assign('admin', $admin);
    }

    public function showHome()
    {
        $this->smarty->display('home.tpl');
    }
    public function showLogin()
    {
        $this->smarty->display('loginUser.tpl');
    }

    public function showRegistrar()
    {
        $this->smarty->display('registerUser.tpl');
    }
}