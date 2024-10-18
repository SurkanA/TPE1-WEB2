<?php
require_once('config/config.php');
class Model
{
    protected $db;

    private function _deploy()
    {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END
            END;
            $this->db->query($sql);
        }
    }

    public function ___construct()
    {
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST .
            ";dbname=" . MYSQL_DB . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASS
        );
        $this->_deploy();

    }
    protected function createConnection()
    {
        $host = MYSQL_HOST;
        $user = MYSQL_USER;
        $password = MYSQL_PASS;
        $database = MYSQL_DB;

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
        } catch (\Throwable $th) {
            die($th);
        }

        return $pdo;
    }
}