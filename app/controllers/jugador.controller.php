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
        $equipos = $this->model->getEquipos();

        //Pasarle a la vista los players
        $this->view->showPlayers($jugadores, $equipos);
    }

    public function showPlayer($nombre_equipo, $id_jugador)
    {
        //Pedir al modelo todas los players
        $jugador = $this->model->getPlayer($nombre_equipo, $id_jugador);

        //Pasarle a la vista los players
        $this->view->showPlayer($jugador);
    }

    public function showModPlayer($nombre_equipo, $id_jugador)
    {
        //Pedir al modelo todas los players
        $jugador = $this->model->getPlayer($nombre_equipo, $id_jugador);
        $equipos = $this->model->getEquipos();

        //Pasarle a la vista los players
        $this->view->showModPlayer($jugador, $equipos);
    }


    public function deletePlayer($nombre_equipo, $id_jugador)
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $this->model->deletePlayer($nombre_equipo, $id_jugador);
            header('Location: ' . BASE_URL . 'players');
        }
    }

    public function updatePlayer($teamWhere, $idWhere)
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $nombre_jugador = $_REQUEST['nombre_jugador'];
            $nombre_equipo = $_REQUEST['nombre_equipo'];
            $id_jugador = $_REQUEST['id_jugador'];
            $edad = $_REQUEST['edad'];
            $posicion = $_REQUEST['posicion'];
            $biografia = $_REQUEST['biografia'] ?: "No se introdujo una biografia";
            $imagen_url = $_REQUEST['imagen_url'] ?: "https://static.vecteezy.com/system/resources/previews/005/228/939/non_2x/avatar-man-face-silhouette-user-sign-person-profile-picture-male-icon-black-color-illustration-flat-style-image-vector.jpg";
            $this->model->updatePlayer($nombre_jugador, $nombre_equipo, $id_jugador, $edad, $posicion, $biografia, $imagen_url, $teamWhere, $idWhere);
            header('Location: ' . BASE_URL . 'players');
        }
    }
    public function insertPlayer()
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $nombre_jugador = $_REQUEST['nombre_jugador'];
            $nombre_equipo = $_REQUEST['nombre_equipo'];
            $id_jugador = $_REQUEST['id_jugador'];
            $edad = $_REQUEST['edad'];
            $posicion = $_REQUEST['posicion'];
            $biografia = $_REQUEST['biografia'] ?: "No se introdujo una biografia";
            $imagen_url = $_REQUEST['imagen_url'] ?: "https://static.vecteezy.com/system/resources/previews/005/228/939/non_2x/avatar-man-face-silhouette-user-sign-person-profile-picture-male-icon-black-color-illustration-flat-style-image-vector.jpg";

            $this->model->createPlayer($nombre_jugador, $nombre_equipo, $id_jugador, $edad, $posicion, $biografia, $imagen_url);
            header('Location: ' . BASE_URL . 'players');
        }
    }
}