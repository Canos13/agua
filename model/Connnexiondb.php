<?php
    class Conexiondb{
        private $sql;

        public function __construct(){
            $this->sql = new mysqli("localhost", "root", "","bd");
            if($this->sql->errno){
                echo "Error en la conecxion";
            }
        }
    }

?>