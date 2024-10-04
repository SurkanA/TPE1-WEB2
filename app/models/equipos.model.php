<?php

class EquiposModel{

    private function crearConexion(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'futbol';
    
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
        } catch (\Throwable $th) {
            die($th);
        }

        return $pdo;
    }
    public function getEquipos(){ 
    $pdo = $this->crearConexion();

    $sql = "select * from equipo";
    $query = $pdo->prepare($sql);
    $query->execute();

    $equipos = $query->fetchAll(PDO::FETCH_OBJ);

    return $equipos;
    }
}