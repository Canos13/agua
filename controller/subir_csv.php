<?php
    if(isset($_POST['subirCSV'])){
        print_r($_FILES);
        $nombre = $_FILES['archivo']['name'];
        $guardado = $_FILES['archivo']['tmp_name'];


        if(move_uploaded_file($guardado, 'arch_csv/'.$nombre)){
            $secargo = true;
            $csv_file = $directorio.$file;
            echo "Archivo guardado";
        }else{
            echo "Archivo no guardado";
        }

    }
?>