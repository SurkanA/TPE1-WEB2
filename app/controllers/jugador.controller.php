<?php

require_once 'app/models/jugador.model.php';
require_once 'app/views/jugador.view.php';
require_once 'helpers/auth.helper.php';

class JugadorController
{
    private $model;
    private $view;
    private $authHelper;
    public function __construct()
    {
        $this->model = new JugadorModel();
        $this->view = new JugadorView();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLoggedIn();
    }

    public function showPlayers()
    {
        //Pedir al modelo todas los players
        $jugadores = $this->model->getPlayers();

        //Pasarle a la vista los players
        $this->view->showPlayers($jugadores);
    }

    public function insertPlayer()
    {

        $id_jugador = $_REQUEST['id_jugador'];
        $nombre = $_REQUEST['nombre_jugador'];
        $posicion = $_REQUEST['posicion'];
        $edad = $_REQUEST['edad'];
        $id_equipo = $_REQUEST['id_equipo'];

        $this->model->createPlayer($id_jugador, $nombre, $posicion, $edad, $id_equipo);
        header('Location: ' . BASE_URL . 'jugadores');
    }

    public function deletePlayer()
    {

        $id_jugador = $_REQUEST['id_jugador'];

        $this->model->deletePlayer($id_jugador);
        header('Location: ' . BASE_URL . 'jugadores');
    }

    public function updatePlayer()
    {
        $id_jugador = $_REQUEST['id_jugador'];
        $nombre = $_REQUEST['nombre_jugador'];
        $posicion = $_REQUEST['posicion'];
        $edad = $_REQUEST['edad'];
        $id_equipo = $_REQUEST['id_equipo'];

        $this->model->updatePlayer($id_jugador, $nombre, $posicion, $edad, $id_equipo);
        header('Location: ' . BASE_URL . 'jugadores');
    }
}