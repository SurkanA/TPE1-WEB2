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
    }

    public function showPlayers()
    {
        //Pedir al modelo todas los players
        $jugadores = $this->model->getPlayers();

        //Pasarle a la vista los players
        $this->view->showPlayers($jugadores);
    }

    public function showPlayer($id_jugador)
    {
        //Pedir al modelo todas los players
        $jugador = $this->model->getPlayer($id_jugador);

        //Pasarle a la vista los players
        $this->view->showPlayer($jugador);
    }

    public function showModPlayer($nombre_equipo, $id_jugador)
    {
        //Pedir al modelo todas los players
        $jugador = $this->model->getPlayer($nombre_equipo, $id_jugador);

        //Pasarle a la vista los players
        $this->view->showModPlayer($jugador);
    }


    public function deletePlayer($id_equipo, $id_jugador)
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $this->model->deletePlayer($id_equipo, $id_jugador);
            header('Location: ' . BASE_URL . 'showPlayers');
        }
    }

    public function updatePlayer($nombre_equipoCheck, $id_jugadorOld)
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $id_jugador = $_REQUEST['id_jugador'];
            $nombre_jugador = $_REQUEST['nombre_jugador'];
            $posicion = $_REQUEST['posicion'];
            $edad = $_REQUEST['edad'];
            $biografia = $_REQUEST['biografia'] ?: "No se introdujo una biografia";
            $imagen_url = $_REQUEST['imagen_url'] ?: "https://static.vecteezy.com/system/resources/previews/005/228/939/non_2x/avatar-man-face-silhouette-user-sign-person-profile-picture-male-icon-black-color-illustration-flat-style-image-vector.jpg";
            $nombre_equipo = $_REQUEST['nombre_equipo'];

            $this->model->updatePlayer($nombre_jugador, $edad, $posicion, $biografia, $imagen_url, $nombre_equipo, $id_jugador, $id_jugadorOld, $nombre_equipoCheck);
            //header('Location: ' . BASE_URL . 'showPlayers');
        }
    }
    public function insertPlayer()
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $id_jugador = $_REQUEST['id_jugador'];
            $nombre_jugador = $_REQUEST['nombre_jugador'];
            $posicion = $_REQUEST['posicion'];
            $edad = $_REQUEST['edad'];
            $biografia = $_REQUEST['biografia'] ?: "No se introdujo una biografia";
            $imagen_url = $_REQUEST['imagen_url'] ?: "https://static.vecteezy.com/system/resources/previews/005/228/939/non_2x/avatar-man-face-silhouette-user-sign-person-profile-picture-male-icon-black-color-illustration-flat-style-image-vector.jpg";
            $id_equipo = $_REQUEST['id_equipo'];
            $nombre_equipo = $_REQUEST['nombre_equipo'];

            $this->model->createPlayer($id_jugador, $nombre_jugador, $posicion, $edad, $biografia, $imagen_url, $id_equipo, $nombre_equipo);
            header('Location: ' . BASE_URL . 'showPlayers');
        }
    }
}