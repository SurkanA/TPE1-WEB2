<?php

require_once 'libs/Smarty/Smarty.class.php';
class JugadorView
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('base', BASE_URL);
    }

    public function showPlayers($jugadores)
    {
        $this->smarty->assign('jugadores', $jugadores);
        $this->smarty->display('jugadores.tpl');
    }
}