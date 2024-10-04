<?php

require_once 'app/models/equipos.model.php';
require_once 'app/views/equipos.view.php';

class EquiposController{

    private $model;
    private $view;

    public function __construct() {
        $this->model = new EquiposModel();
        $this->view = new EquiposView();
    }

    function showEquipos(){
        // Pedir al modelo todas las equipos
         $equipos =  $this->model->getEquipos();

        // Pasarle a la vista las equpos
         $this->view->mostrarEquipos($equipos);
    }


}
?> 