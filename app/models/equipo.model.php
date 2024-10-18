<?php
require_once('model.php');

class EquiposModel extends Model
{
    //Función que pide a la DB todos los equipos
    public function getEquipos()
    {
        $pdo = $this->createConnection();

        $sql = "select * from equipo";
        $query = $pdo->prepare($sql);
        $query->execute();

        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $equipos;
    }

    //Función que trae un equipo por id
    public function getEquipo($id_equipo)
    {
        $pdo = $this->createConnection();

        $sql = "SELECT * FROM equipo
        WHERE id_equipo = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$id_equipo]);

        $equipo = $query->fetch(PDO::FETCH_OBJ);

        return $equipo;
    }

    //Función para crear un nuevo equipo en la DB
    public function createEquipo($id_equipo, $nombre_equipo, $ciudad, $year_fundado, $id_jugador)
    {
        $pDO = $this->createConnection();

        $sql = 'INSERT INTO equipo ($id_equipo, $nombre_equipo, $ciudad, $year_fundado, $id_jugador) 
                VALUES (?, ?, ?, ?, ?)';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id_equipo, $nombre_equipo, $ciudad, $year_fundado, $id_jugador]);
        } catch (\Throwable $th) {
            echo $th;
            die(__FILE__);
            return null;
        }
    }

    //Función para borrar un equipo de la DB
    public function deleteEquipo($id_equipo)
    {
        $pDO = $this->createConnection();

        $sql = 'DELETE FROM equipo
                WHERE id_equipo = ?';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id_equipo]);
        } catch (\Throwable $th) {
            return null;
        }
    }

    //Función para modificar un equipo de la DB
    public function updateEquipo($id_equipo, $nombre_equipo, $ciudad, $year_fundado, $id_jugador)
    {
        $pDO = $this->createConnection();

        $sql = 'UPDATE equipo
            SET id_equipo = ?, nombre_equipo = ?, ciudad = ?, year_fundado = ?, id_jugador = ?
            WHERE id_equipo = ?';

        $query = $pDO->prepare($sql);
        try {
            $query->execute([$id_equipo, $nombre_equipo, $ciudad, $year_fundado, $id_jugador]);

        } catch (\Throwable $th) {
            echo $th;
            return null;
        }
    }
    
}