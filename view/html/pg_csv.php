<?php  
    require "controller/gtablacsv.php";

    /* si se gargo el archivo csv para el siguinte form*/
    $secargo = false;
    $directorio="C://xampp/htdocs/agua/arch_csv/";

    /* Direccion del csv_file */
    /* $csv_file = "C:/xampp/htdocs/agua/arch_csv/NIVEL_RIOS_DIA.csv"; */
    $csv_file = "";

    $titulo = false; /* si es true tien titulo */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejar CSV</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>   <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    

    <!--  -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    
    <h2>Datos a guardar en la base de datos de InfoWater</h2>
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <p>Seleccione el archivo con los datos a guaradar  de acuerdo al formto especidicado</p>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-6">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            El archivo contine titulos para sus columnas 
                        </label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <!-- con SCSS para cambiar el browse:: buscar  y en input lang="es"-->
                        <input type="file" class="custom-file-input" id="archivo" name="archivo" aria-describedby="inputGroupFileAddon01" accept=".csv" required>
                        <label class="custom-file-label" for="archivo">Seleccione un archivo .csv</label>
                        <script src="view/js/custom_file_input_csv.js"></script>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="subircsv" name="subircsv">Usar</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>  

    <br>
    
    <?php
        
        /* Es el post del archivo */ 
        require "controller/subir_csv.php";

        if($secargo){
            echo '<div class="container">
                    <div class="row justify-content-md-center">
                       <p>Se esta haciendo uso del archivo: <strong>'.$inuse.'</strong></p> 
                    </div>
                 </div>';
            echo "<br>";
            require "view/html/type_insert.php";
            require "controller/save_csv_in_bd.php";
            echo "<br>";
            generatablacsv($csv_file,$titulo);
        }else{
            echo '<div class="container">
                    <div class="row justify-content-md-center">
                        <p>no se ha cargado ningun archivo csv</p>
                    </div>
                </div>';
        }

    ?>
</body>
</html>