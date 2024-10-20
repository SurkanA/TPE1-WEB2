<?php
require_once('model.php');

class JugadorModel extends Model
{
    //Función que pide a la DB todos los jugadores
    public function getPlayers()
    {
        $pdo = $this->createConnection();

        $sql = "SELECT * FROM `jugador` ORDER BY `jugador`.`id_equipo` ASC";
        $query = $pdo->prepare($sql);
        $query->execute();

        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }

    //Función que trae una player por id
    public function getPlayer($nombre_equipo, $id_jugador)
    {
        $pdo = $this->createConnection();

        $sql = "SELECT * FROM jugador
        WHERE id_jugador = ? AND nombre_equipo = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$id_jugador, $nombre_equipo]);

        $player = $query->fetch(PDO::FETCH_OBJ);

        return $player;
    }

    //Función para crear un nuevo jugador en la DB
    public function createPlayer($id_jugador, $nombre_jugador, $posicion, $edad, $biografia, $imagen_url, $id_equipo, $nombre_equipo)
    {
        $pDO = $this->createConnection();

        $sql = 'INSERT INTO jugador (id_jugador, nombre_jugador, posicion, edad, biografia, imagen_url, id_equipo, nombre_equipo) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id_jugador, $nombre_jugador, $posicion, $edad, $biografia, $imagen_url, $id_equipo, $nombre_equipo]);
        } catch (\Throwable $th) {
            echo $th;
            die(__FILE__);
        }
    }

    //Función para borrar un jugador de la DB
    public function deletePlayer($id_equipo, $id_jugador)
    {
        $pDO = $this->createConnection();

        $sql = 'DELETE FROM jugador
                WHERE nombre_equipo = ? AND id_jugador = ?';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id_equipo, $id_jugador]);
        } catch (\Throwable $th) {
            return null;
        }
    }

    //Función para modificar un jugador de la DB
    public function updatePlayer($nombre_jugador, $edad, $posicion, $biografia, $imagen_url, $nombre_equipo, $id_jugador, $id_jugadorOld, $nombre_equipoCheck)
    {
        $sql = 'UPDATE jugador
                SET nombre_jugador = ?, edad = ?, posicion = ?, biografia = ?, imagen_url = ?, nombre_equipo = ?, id_jugador = ?
                WHERE id_jugador = ? AND nombre_equipo = ?';

        $query = $this->createConnection()->prepare($sql);
        $query->execute([$nombre_jugador, $edad, $posicion, $biografia, $imagen_url, $nombre_equipo, $id_jugador, $id_jugadorOld, $nombre_equipoCheck]);

    }
}