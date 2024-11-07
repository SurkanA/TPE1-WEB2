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
        //Función para modificar un jugador de la DB
        public function updateEquipo($nombre_equipo, $ciudad, $year_fundado, $biografia, $imagen_url, $id)
        {
            $sql = 'UPDATE equipo
                    SET nombre_equipo = ?, ciudad = ?, year_fundado = ?, biografia = ?, imagen_url = ?
                    WHERE id_equipo = ?';
    
            $query = $this->createConnection()->prepare($sql);
            $query->execute([$nombre_equipo, $ciudad, $year_fundado, $biografia, $imagen_url, $id]);
    
        }
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Inserts a new team into the database.
     *
     * @param string $nombre_equipo The name of the team.
     * @param string $ciudad The city where the team is based.
     * @param int $year_fundado The year the team was founded.
     * @param string $imagen_url The URL of the team's image.
     */
/******  0cb85519-b986-49a5-8d5d-0a29ac03f1c6  *******/
    public function createEquipo( $nombre_equipo, $ciudad, $year_fundado, $biografia, $imagen_url)
    {
        $pDO = $this->createConnection();

        $sql = 'INSERT INTO equipo ( nombre_equipo, ciudad,year_fundado, biografia, imagen_url ) 
                VALUES (?, ?, ?, ?, ?)'; 

        $query = $pDO->prepare($sql);
        try {
            $query->execute([ $nombre_equipo, $ciudad, $year_fundado, $biografia, $imagen_url]);
        } catch (\Throwable $th) {
            echo $th;
            die(__FILE__);
        }
    }
    
}