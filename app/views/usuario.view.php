<?php

require_once 'libs/Smarty/Smarty.class.php';
class UsuarioView
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('base', BASE_URL);
    }

    public function showHome()
    {
        $this->smarty->display('home.tpl');
    }
    public function showLogin()
    {
        $this->smarty->display('login.tpl');
    }

    public function showRegistrar()
    {
        $this->smarty->display('register.tpl');
    }
}