<?php

require_once 'app/models/jugador.model.php';
require_once 'app/views/jugador.view.php';

class JugadorController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new JugadorModel();
        $this->view = new JugadorView();
    }

    public function showJugadores()
    {
        //Pedir al modelo todas las tareas
        $jugadores = $this->model->getJugadores();

        //Pasarle a la vista las tareas
        $this->view->mostrarJugadores($jugadores);
    }
}