<?php  

    $ruta="Upload/";

    foreach($_FILES as $key){

        $nombre = $key['name'];

        /* print_r($nombre); */
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
                require "../controller/gtablacsv.php";
                $titulo = true; 
                
            }
        } 
    }

   /*  $csv_file = "D:/xampp/htdocs/leercsv/archivos_csv/NIVEL_RIOS_DIA.csv"; */

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../view/css/bootstrap.css" rel="stylesheet"/>
    <link href="../view/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../view/css/style.css" rel="stylesheet"/>  
    <link href="../view/css/themes/green.css" rel="stylesheet" />   

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top move-me" id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img class="logo-custom" src="../view/img/logo180-50.png" alt=""  />
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../">INICIO</a></li>
                    <li><a href="../consulta">CONSULTAR DATOS</a></li>              
                    <li><a href="./">SUBIR DATOS</a></li>
                    <li style="visibility: hidden" ><a href="#developers">ACERCA DE</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br><br>

    <div class="container" >
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlFile1">Seleccione el archivo CSV</label>
                <input type="file" class="form-control-file" name="archivo" id="exampleFormControlFile1">
                <input type="submit" class="btn btn-primary" value="Enviar">
            </div>
        </form>
    </div>    

    <?php
        if(isset($alert)){
            generatablacsv($destino,$titulo);
        }
        
    ?>

</body>
</html>