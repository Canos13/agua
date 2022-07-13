<?php
    require("..//..//model/BasedeDatos.php");
    require("..//..//model/Declaratoria.php");

    function ListaDeclaratorias(){
        $bd = new BasedeDatos();
        $listaDeclaratorias = $bd->lists_declaratoias();
        $contList= '
            <select name="type_reg_data" id="type_reg_data"  class="form-control js-example-basic-single" required>
                <option value="">Seleccione la correspondiente declaratoria</option>';
        foreach($listaDeclaratorias as $declaratorias){
            $text="Id::".$declaratorias->getId()." || ".$declaratorias->getFenomeno()." por ".$declaratorias->getCausas().
                    " con inicio ".$declaratorias->getFecha_inicio()." y fin en ".$declaratorias->getFecha_fin().
                    " datos de la declaratoria registrados el ".$declaratorias->getFecha_registro();

            $contList.='<option value="'.$declaratorias->getId().'">'.$text.'</option>';
        }

        $contList3='</select>
        <script>
        $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
        </script>';

        $resultado = $contList.$contList3;

        return $resultado;
        
       

    }
    
    echo ListaDeclaratorias(); 
?>