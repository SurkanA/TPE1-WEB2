<?php

require_once 'app/models/equipo.model.php';
require_once 'app/views/equipo.view.php';
require_once 'helpers/auth.helper.php';

class EquiposController
{
    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->model = new EquiposModel();
        $this->view = new EquiposView();
        $this->authHelper = new AuthHelper();
    }

    public function showEquipos()
    {
        //Pedir al modelo todos los equipos
        $equipos = $this->model->getEquipos();

        //Pasarle a la vista los equipos
        $this->view->mostrarEquipos($equipos);
    }
    public function deleteEquipo($id_equipo)
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $this->model->deleteEquipo($id_equipo);
            header('Location: ' . BASE_URL . 'equipos');
        }
    }
    public function updateEquipo()
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $id_equipo = $_REQUEST['id_equipo'];
            $nombre_equipo = $_REQUEST['nombre_equipo'];
            $ciudad = $_REQUEST['ciudad'];
            $year_fundado = $_REQUEST['year_fundado'];
            $biografia = $_REQUEST['biografia'] ?: "No se introdujo una biografia";
            $imagen_url = $_REQUEST['imagen_url'] ?: "https://static.vecteezy.com/system/resources/previews/005/228/939/non_2x/avatar-man-face-silhouette-user-sign-person-profile-picture-male-icon-black-color-illustration-flat-style-image-vector.jpg";

            $this->model->updateEquipo($nombre_equipo, $ciudad, $year_fundado, $biografia, $imagen_url, $id_equipo);
            header('Location: ' . BASE_URL . 'equipos');
        }
    }

    public function editarEquipo($id_equipo)
    {
        $admin = $this->authHelper->isAdmin();
        
        $equipo = $this->model->getEquipo($id_equipo);
        if ($admin) {

            $this->view->mostrarFormEditarEquipo($equipo, $admin);
            //header('Location: ' . BASE_URL . 'showPlayers');
        }
    }
    public function createEquipo()
    {
        $admin = $this->authHelper->isAdmin();
        if ($admin) {
            $nombre_equipo = $_REQUEST['nombre_equipo'];
            $ciudad = $_REQUEST['ciudad'];
            $year_fundado = $_REQUEST['year_fundado'];
            $biografia = $_REQUEST['biografia'];
            $imagen_url = $_REQUEST['imagen_url'] ?: "https://static.vecteezy.com/system/resources/previews/005/228/939/non_2x/avatar-man-face-silhouette-user-sign-person-profile-picture-male-icon-black-color-illustration-flat-style-image-vector.jpg";

            $this->model->createEquipo ( $nombre_equipo, $ciudad, $year_fundado, $biografia, $imagen_url);
            header('Location: ' . BASE_URL . 'equipos');
        }
    }

    public function showForm(){
        $admin = $this->authHelper->isAdmin();

        $this->view->mostrarForm($admin);
    }
}