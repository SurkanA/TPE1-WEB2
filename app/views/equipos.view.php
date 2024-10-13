<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class EquiposView{

    private $smarty;

    public function __construct(){
       $this->smarty = new Smarty\Smarty;  
    }

    //smarty->assign("NombreDeVariable", ValorDeLaVariable)

    function mostrarEquipos($equipos){
        $this->smarty->assign('equipos', $equipos);
        $this->smarty->display('home.tpl');
    }
    
}
?>