<?php
    require "../../controller/gtablacsv.php";

    /* echo $_POST['exampleRadios']; */
    $valor = $_POST['exampleRadios'];
    
    $csv_file = $_POST['datotitulo'];
    if($valor == 'option1'){
        /* echo "option1";
        echo " ";
        echo $csv_file; */
        $titulo = true;
        generatablacsv($csv_file,$titulo);
        
    }
    if($valor == 'option2'){
        /* echo $csv_file;
        echo " ";
        echo "option2"; */
        $titulo = false;
        generatablacsv($csv_file,$titulo);
        
    }
?>