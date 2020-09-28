<?php
 class Database {
        private $host = "localhost";
        private $database_name = "phptestdb";
        private $username = "root";
        private $password = "";

        public $conn;
        public $hostname = 'https://dev.anterasaas.com';

        public function getConnection(){
            $this->conn = null;
            try{
                //$this->conn = mysqli_connect($this->host,$this->username, $this->password, $this->database_name);
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    } 
?> 