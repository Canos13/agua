<?php
 $contList2= '
    <select name="type_reg_data" id="type_reg_data"  class="form-control js-example-basic-single">
        <option value="">Seleccione la correspondiente declaratoria</option>
        <option value="1">Declaratoria 01</option>
        <option value="2">Declaratoria 02</option>
        <option value="3">Declaratoria 03</option>
        <option value="4">Declaratoria 04</option>
    </select>
    <script>
    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });
    </script>
 ';

    require("..//..//model/BasedeDatos.php");
    require("..//..//model/Declaratoria.php");

    function ListaDeclaratorias(){
        $bd = new BasedeDatos();
        $listaDeclaratorias = $bd->lists_declaratoias();
        $contList= '
            <select name="type_reg_data" id="type_reg_data"  class="form-control js-example-basic-single">
                <option value="">Seleccione la correspondiente declaratoria</option>';
        foreach($listaDeclaratorias as $declaratorias){
            $text="Id::".$declaratorias->getId()." || ".$declaratorias->getFenomeno()." por ".$declaratorias->getCausas().
                    " con inicio ".$declaratorias->getFecha_inicio()." y fin en ".$declaratorias->getFecha_fin().
                    " registrado el ".$declaratorias->getFecha_registro();

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