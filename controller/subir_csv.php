<?php
    if(isset($_POST['subircsv'])){
        /* print_r($_FILES); */
        /* $fecha=getdate(); */
        $file_name = $_FILES['archivo']['name'];
        $file_temp = $_FILES['archivo']['tmp_name'];
       /*  printf( $directorio.$file_name); */

        $move_file = move_uploaded_file($file_temp, $directorio.$file_name);

        if($move_file){
            $secargo = true;
            $inuse = $file_name;
            $csv_file = $directorio.$file_name;
        }else{
            echo "Archivo no guardado";
        }

    }
?>