<?php
    Class Conn {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "fornellis";
        public $con;
        
        public function conectar() {
            $this->con = null;
            
            try { 
                $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
                $this->con->set_charset("utf8mb4");
            } catch (mysqli_sql_exception $e) {
                echo "Erro: {$e->getMessage()}";
            }
            
            return $this->con;
        }   
    }