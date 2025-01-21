<?php
    Class Conn {
        private $servername = "127.0.0.1";
        private $username = "root";
        private $password = "";
        private $dbname = "fornellis";
        public $con;
        
        public function conectar() {
            $this->con = null;
            
            try { 
                $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            } catch (mysqli_sql_exception $e) {
                echo "Erro: {$e->get_Message()}";
            }
            
            return $this->con;
        }   
    }