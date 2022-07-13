<?php
    require "../../controller/gtablacsv.php";

    /* echo $_POST['exampleRadios']; */
    $valor = $_POST['exampleRadios'];
    $cadena1 = '<//?php $titulo= true; generatablacsv($csv_file,$titulo) ?//>';
    $cadena2 = '<//?php $titulo= false; generatablacsv($csv_file,$titulo) ?//>';
    $csv_file = $_POST['datotitulo'];
    if($valor == 'option1'){
        printf($cadena1);
        
    }
    if($valor == 'option2'){
        printf($cadena2);
    }
?>