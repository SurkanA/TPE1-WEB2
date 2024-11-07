<?php

require_once 'libs/Smarty/Smarty.class.php';

class EquiposView
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

    public function mostrarEquipos($equipos)
    {
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('equipos.tpl');
    }
    public function showEquipo($equipos)
    {
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('player.tpl');
    }

    public function showModEquipo($equipos)
    {
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('modPlayer.tpl');
    }
    public function EditaEquipo($equipos)
    {
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('modPlayer.tpl');
    }

    public function mostrarFormEditarEquipo($equipo, $admin){
        $this->smarty->assign('equipo', $equipo);
        $this->smarty->assign('isLogged', $admin);
        $this->smarty->display('forEditEquipo.tpl');
    }


    public function mostrarForm($admin){
        $this->smarty->assign('isLogged', $admin);
        $this->smarty->display('insertEquipo.tpl');
    }
}