<?php  require "controller/gtablacsv.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejar CSV</title>
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="exampleFormControlFile1">Seleccione el archivo CSV</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </form>
    </div>    

    <?php
        /* Direccion del csv_file */
        $csv_file = "C:/xampp/htdocs/leercsv/archivos_csv\NIVEL_RIOS_DIA.csv";
        /* Si  el csv_file cuenta cin yn titulo */
        $titulo = false; /* si es true tien titulo */
        
        generatablacsv($csv_file,$titulo);
    ?>
</body>
</html>