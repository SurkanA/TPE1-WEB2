<?php
require_once('model.php');

class JugadorModel extends Model
{
    //Función que pide a la DB todos los jugadores
    public function getPlayers()
    {
        $pdo = $this->createConnection();

        $sql = "select * from jugador";
        $query = $pdo->prepare($sql);
        $query->execute();

        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }

    //Función que trae una player por id
    public function getPlayer($id_jugador)
    {
        $pdo = $this->createConnection();

        $sql = "SELECT * FROM jugador
        WHERE id_jugador = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$id_jugador]);

        $player = $query->fetch(PDO::FETCH_OBJ);

        return $player;
    }

    //Función para crear un nuevo jugador en la DB
    public function createPlayer($id_jugador, $nombre_jugador, $posicion, $edad, $id_equipo)
    {
        $pDO = $this->createConnection();

        $sql = 'INSERT INTO jugador (id_jugador, nombre_jugador, posicion, edad, id_equipo) 
                VALUES (?, ?, ?, ?, ?)';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id_jugador, $nombre_jugador, $posicion, $edad, $id_equipo]);
        } catch (\Throwable $th) {
            echo $th;
            die(__FILE__);
        }
    }

    //Función para borrar un jugador de la DB
    public function deletePlayer($id_jugador)
    {
        $pDO = $this->createConnection();

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
    public function updatePlayer($id_jugador, $nombre_jugador, $posicion, $edad, $id_equipo)
    {
        $pDO = $this->createConnection();

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