<?php

require_once 'app/models/equipo.model.php';
require_once 'app/views/equipo.view.php';

class EquiposController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new EquiposModel();
        $this->view = new EquiposView();
    }

    public function showEquipos()
    {
        //Pedir al modelo todos los equipos
        $equipos = $this->model->getEquipos();

        //Pasarle a la vista los equipos
        $this->view->mostrarEquipos($equipos);
    }
    //Muestra form para editar tarea
    public function editarEquipo($id_equipo)
    {
        //Pedirle la tarea con ese id al modelo
        $equipos = $this->model->getEquipo($id_equipo);
        //Pasarle la tarea a la vista 
        $this->view->showEditForm($equipos); //creae formulario para podes ingressar un nuevo equipo
    }
        //Función que me va a eliminar una tarea
        public function borrar($id_equipo){
            //Enviar el id al modelo
            $this->model->deleteEquipo($id_equipo);
            //Redireccionarme
            header('Location: ' . BASE_URL . 'home');
        }
}