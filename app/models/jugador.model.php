<?php
require_once('model.php');

class JugadorModel extends Model
{
    //Función que pide a la DB todos los jugadores
    public function getJugadores()
    {
        $pdo = $this->crearConexion();

        $sql = "select * from jugador";
        $query = $pdo->prepare($sql);
        $query->execute();

        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }

    //Función que trae una tarea por id
    public function getJugador($id_jugador)
    {
        $pdo = $this->crearConexion();

        $sql = "SELECT * FROM jugador
        WHERE id_jugador = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$id_jugador]);

        $tarea = $query->fetch(PDO::FETCH_OBJ);

        return $tarea;
    }

    //Función para crear un nuevo jugador en la DB
    public function createJugador($id_jugador, $nombre_jugador, $posicion, $edad, $id_equipo)
    {
        $pDO = $this->crearConexion();

        $sql = 'INSERT INTO jugador (id_jugador, nombre_jugador, posicion, edad, id_equipo) 
                VALUES (?, ?, ?, ?, ?)';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id_jugador, $nombre_jugador, $posicion, $edad, $id_equipo]);
        } catch (\Throwable $th) {
            echo $th;
            die(__FILE__);
            return null;
        }
    }

    //Función para borrar un jugador de la DB
    public function deleteJugador($id_jugador)
    {
        $pDO = $this->crearConexion();

        $sql = 'DELETE FROM jugador
                WHERE id_jugador = ?';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id_jugador]);
        } catch (\Throwable $th) {
            return null;
        }
    }

    //Función para modificar un jugador de la DB
    public function updateJugador($id_jugador, $nombre_jugador, $posicion, $edad, $id_equipo)
    {
        $pDO = $this->crearConexion();

        $sql = 'UPDATE jugador
            SET id_jugador = ?, nombre_jugador = ?, posicion = ?, edad = ?, id_equipo = ?
            WHERE id_jugador = ?';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id_jugador, $nombre_jugador, $posicion, $edad, $id_equipo]);

        } catch (\Throwable $th) {
            echo $th;
            return null;
        }
    }
}