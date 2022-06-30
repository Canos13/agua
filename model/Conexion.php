<?php
    class Conexion{
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $db = "centro_de_computo";
        private $conect;

        public function __construct(){
            $connectionString = "mysql:hos=".$this->host.";dbname=".$this->db.";charset=utf8";
            try {
                $this->connect = new PDO($connectionString, $this->user, $this->password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexion exitosa";
            }catch(Exception $e){
                $this->connect = "Erro de conexion";
                echo "Error: ".$e->getMessage();
            }
        }

        public function nuevo(){
            try{
                $conect = new Conexion();
    
            }catch(Exception $e){
    
            }finally{
                close();
            }
        }
        
    }
?>