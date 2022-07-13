<?php
 class BasedeDatos {
    private $sql;

    public function __construct(){
        $this->sql = new mysqli("localhost", "root", "","fenomenoPluvial");
        if($this->sql->errno){
            echo "Error en la conecxion";
        }
    }

    public function lists_declaratoias(){
        $listaDeclaratorias = array();
        $consulta = "SELECT id_declaratoria, fenomeno, causas, fecha_registro, fecha_inicio,fecha_fin  From declaratoria";
        $resultado = $this->sql->query($consulta);
        while($registro = $resultado->fetch_assoc()){
            $declaratorias = new Declaratoria();
            $declaratorias->setId($registro['id_declaratoria']);
            $declaratorias->setFenomeno($registro['fenomeno']);
            $declaratorias->setCausas($registro['causas']);
            $declaratorias->setFecha_registro($registro['fecha_registro']);
            $declaratorias->setFecha_inicio($registro['fecha_inicio']);
            $declaratorias->setFecha_fin($registro['fecha_fin']);

            array_push($listaDeclaratorias, $declaratorias);
        }
        return $listaDeclaratorias;
    }

    public function list_mundec($deca2){
        $dato= $deca2->getId();
        $listaMinicipiosDeclaratorias = array();
        $consulta="SELECT declaratoria.id_declaratoria, declaratoria.fenomeno, declaratoria.causas, 
                    declaratoria.fecha_inicio,declaratoria.fecha_fin, municipio.nombrem, estado.nombree 
            From declaratoria, estado, municipio, declaratoria_municipio 
            WHERE declaratoria.id_declaratoria = $dato and declaratoria.id_declaratoria = declaratoria_municipio.id_declaratoria and municipio.id_municipio = declaratoria_municipio.id_municipio and municipio.id_estado=estado.id_estado;";
        $resultado = $this->sql->query($consulta);
        while($registro = $resultado->fetch_assoc()){
            $declaratoriasmundec = new Estado();
            $declaratoriasmundec->setId($registro['id_declaratoria']);
            $declaratoriasmundec->setFenomeno($registro['fenomeno']);
            $declaratoriasmundec->setCausas($registro['causas']);
            $declaratoriasmundec->setFecha_inicio($registro['fecha_inicio']);
            $declaratoriasmundec->setFecha_fin($registro['fecha_fin']);
            $declaratoriasmundec->setNombrem($registro['nombrem']);
            $declaratoriasmundec->setNombree($registro['nombree']);

            array_push($listaMinicipiosDeclaratorias, $declaratoriasmundec);
        }

        return $listaMinicipiosDeclaratorias;

    }

    public function lists_declaratoiasrio(){
        $listaDeclaratoriasrio = array();
        $consulta = "SELECT declaratoria.id_declaratoria, declaratoria.fenomeno, 
                    declaratoria.causas, declaratoria.fecha_registro, 
                    declaratoria.fecha_inicio,declaratoria.fecha_fin, rio.nombre, rio.nivel_rio 
                    From declaratoria,rio
                    WHERE declaratoria.id_declaratoria = rio.id_declaratoria;";
        $resultado = $this->sql->query($consulta);
        while($registro = $resultado->fetch_assoc()){
            $declaratoriasrio = new Rio();
            $declaratoriasrio->setId($registro['id_declaratoria']);
            $declaratoriasrio->setFenomeno($registro['fenomeno']);
            $declaratoriasrio->setCausas($registro['causas']);
            $declaratoriasrio->setFecha_inicio($registro['fecha_inicio']);
            $declaratoriasrio->setFecha_fin($registro['fecha_fin']);
            $declaratoriasrio->setNombre($registro['nombre']);
            $declaratoriasrio->setNivel($registro['nivel_rio']);

            array_push($listaDeclaratoriasrio, $declaratoriasrio);
        }
        return $listaDeclaratoriasrio;
    }

 }
?>