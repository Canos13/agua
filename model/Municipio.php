<?php
    require_once("Declaratoria.php");
    class Municipio extends Declaratoria{
        private $idm;
        private $nombrem;
        private $cp;

        public function __construct(){
            $this->idm = '';
            $this->nombrem = '';
            $this->cp = ''; 
        }
        public function setIdm($idm){ $this->idm = $idm;}
        public function getIdm(){ return $this->idm; }
        
        public function setNombrem($nombrem){$this->nombrem = $nombrem;}
        public function getNombrem(){return $this->nombrem;}

        public function setCp($cp){$this->cp = $cp;}
        public function getCp(){return $this->cp;}
 }
?>