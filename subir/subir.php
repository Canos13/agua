<?php

    $ruta="Upload/";

    foreach($_FILES as $key){

        $nombre = $key['name'];

        print_r($nombre);
        $ruta_temp = $key['tmp_name'];

        $fecha=getdate();
        $nombre_v=$fecha["mday"]."-".$fecha["mon"]."-".$fecha["year"]."_".$fecha["hours"]."-".$fecha["minutes"]."-".$fecha["seconds"].".csv";		

        $destino=$ruta.$nombre_v;
        $explo=explode(".",$nombre);

        if($explo[1] != "csv"){
            $alert=1;
        }else{
            if(move_uploaded_file($ruta_temp, $destino)){
                $alert=2;
            }
        } 
    }



?>