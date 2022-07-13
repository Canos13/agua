<?php
 class BasedeDatos {
    private $sql;

    public function __construct(){
        $this->sql = new mysqli("localhost", "root", "","FENOMENO");
        if($this->sql->errno){
            echo "Error en la conecxion";
        }
    }

    public function lists_declaratoias(){
        $listaDeclaratorias = array();
        /* $consulta = "SELECT id_declaratoria, fenomeno, causas, fecha_registro, fecha_inicio,fecha_fin  From declaratoria"; */
        $consulta = "SELECT id, fenomeno, causas, fecha_registro, fecha_inicio,fecha_fin  From declaracion";
        $resultado = $this->sql->query($consulta);
        while($registro = $resultado->fetch_assoc()){
            $declaratorias = new Declaratoria();
            $declaratorias->setId($registro['id']);
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
        /* $consulta="SELECT declaratoria.id_declaratoria, declaratoria.fenomeno, declaratoria.causas, 
                    declaratoria.fecha_inicio,declaratoria.fecha_fin, municipio.nombrem, estado.nombree 
            From declaratoria, estado, municipio, declaratoria_municipio 
            WHERE declaratoria.id_declaratoria = $dato and declaratoria.id_declaratoria = declaratoria_municipio.id_declaratoria and municipio.id_municipio = declaratoria_municipio.id_municipio and municipio.id_estado=estado.id_estado;"; */
        $consulta="SELECT id, fenomeno, causas, 
            fecha_inicio, fecha_fin, municipio, estado
            From declaracion
            WHERE declaracion.id= $dato ;";
        $resultado = $this->sql->query($consulta);
        while($registro = $resultado->fetch_assoc()){
            $declaratoriasmundec = new Estado();
            $declaratoriasmundec->setId($registro['id']);
            $declaratoriasmundec->setFenomeno($registro['fenomeno']);
            $declaratoriasmundec->setCausas($registro['causas']);
            $declaratoriasmundec->setFecha_inicio($registro['fecha_inicio']);
            $declaratoriasmundec->setFecha_fin($registro['fecha_fin']);
            $declaratoriasmundec->setNombrem($registro['municipio']);
            $declaratoriasmundec->setNombree($registro['estado']);

            array_push($listaMinicipiosDeclaratorias, $declaratoriasmundec);
        }

        return $listaMinicipiosDeclaratorias;

    }

    public function lists_declaratoiasrio(){
        $listaDeclaratoriasrio = array();
        $consulta = "SELECT declaracion.id, declaracion.fenomeno, 
                    declaracion.causas, declaracion.fecha_registro, 
                    declaracion.fecha_inicio,declaracion.fecha_fin, nivel_rio.nombre, nivel_rio.nivel_rio 
                    From declaracion,nivel_rio
                    WHERE declaracion.id = nivel_rio.id_declaracion;";
        $resultado = $this->sql->query($consulta);

        while($registro = $resultado->fetch_assoc()){
            $declaratoriasrio = new Rio();
            $declaratoriasrio->setId($registro['id']);
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

    public function lists_declaratoiasmar(){
        $listaDeclaratoriasmar = array();
        $consulta = "SELECT declaracion.id, declaracion.fenomeno, 
                    declaracion.causas, declaracion.fecha_registro, 
                    declaracion.fecha_inicio,declaracion.fecha_fin, nivel_mar.nombre, nivel_mar.nivel_mar 
                    From declaracion,nivel_mar
                    WHERE declaracion.id = nivel_mar.id_declaracion;";
        $resultado = $this->sql->query($consulta);
        while($registro = $resultado->fetch_assoc()){
            $declaratoriasmar = new Mar();
            $declaratoriasmar->setId($registro['id']);
            $declaratoriasmar->setFenomeno($registro['fenomeno']);
            $declaratoriasmar->setCausas($registro['causas']);
            $declaratoriasmar->setFecha_inicio($registro['fecha_inicio']);
            $declaratoriasmar->setFecha_fin($registro['fecha_fin']);
            $declaratoriasmar->setNombre($registro['nombre']);
            $declaratoriasmar->setNivel($registro['nivel_mar']);

            array_push($listaDeclaratoriasmar, $declaratoriasmar);
        }
        return $listaDeclaratoriasmar;
    }

 }
?>