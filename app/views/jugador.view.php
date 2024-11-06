<?php

require_once 'libs/Smarty/Smarty.class.php';
require_once 'app/views/usuario.view.php';
class JugadorView
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

    public function showPlayers($jugadores, $equipos)
    {
        $this->smarty->assign('jugadores', $jugadores);
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('players.tpl');
    }

    public function showPlayer($jugador)
    {
        $this->smarty->assign('jugador', $jugador);
        $this->smarty->display('player.tpl');
    }

    public function showModPlayer($jugador, $equipos)
    {
        $this->smarty->assign('jugador', $jugador);
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('modifyPlayer.tpl');
    }
}