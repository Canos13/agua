<?php 
    class Declaratoria{
        private $id;
        private $fenomeno;
        private $causas;
        private $fecha_registro;
        private $fecha_inicio;
        private $fecha_fin;

        public function __construct(){
            $this->id = '';
            $this->fenomeno = '';
            $this->causas = '';
            $this->fecha_resgistro = '';
            $this->fecha_inicio = '';
            $this->fecha_fin= '';
        }

        public function setId($id){ $this->id = $id;}
        public function getId(){ return $this->id; }

        public function setFenomeno($fenomeno){ $this->fenomeno = $fenomeno; }
        public function getFenomeno(){return $this->fenomeno; }

        public function setCausas($causas){ $this->causas = $causas; }
        public function getCausas(){return $this->causas;}

        public function setFecha_registro($fecha_registro){ $this->fecha_registro = $fecha_registro;}
        public function getFecha_registro(){return $this->fecha_registro;}

        public function setFecha_inicio($fecha_inicio){$this->fecha_inicio = $fecha_inicio;}
        public function getFecha_inicio(){return $this->fecha_inicio;}

        public function setFecha_fin($fecha_fin){ $this->fecha_fin = $fecha_fin;}
        public function getFecha_fin(){return $this->fecha_fin;}
    }
?>