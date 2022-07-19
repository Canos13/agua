<?php
    require_once("Municipio.php");
    class Estado extends Municipio{
        private $ide;
        private $nombree;

        public function __construct(){
            $this->ide = '';
            $this->nombree = '';
        }

        public function setIde($ide){ $this->ide = $ide;}
        public function getIde(){ return $this->ide; }

        public function setNombree($nombree){$this->nombree = $nombree;}
        public function getNombree(){return $this->nombree;}
    }
?>