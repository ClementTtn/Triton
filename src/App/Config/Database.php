<?php
namespace App\Config;

use PDO;

class Database{

    // Connexion vers la base de données (ici en local)
    private string $host = "localhost";
    private string $db_name = "u932903713_triton";
    private string $username = "u932903713_ctutin";
    private string $password = "h,cK]uas[~62";

    private PDO $conn;


    // get the database connection
    public function getConnection() : PDO{

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }


}
?>