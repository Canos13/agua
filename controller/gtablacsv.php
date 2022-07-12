<?php
    /* Fincion para imprimir la tabla con los datos del csv para vissualizar los datos*/
    function generatablacsv($csv_file, $titulo){
        $csvfile = fopen($csv_file,'r');
        if( $csvfile !== FALSE){
            $i = 0;
            
            echo '<div class="row-flex">';
                echo '<div class="container">';
                    echo '<div class="col-lg-12"> ';
                        echo '<table id="data_csv_file" class="table table-striped table-bordered" style="width:100%">';
                
                        while(!feof($csvfile)){
                            $csv_data = fgetcsv($csvfile,null,",");
                            $numero = count($csv_data);
                            
                            if($i == 0){
                                if($titulo){
                                    echo '<thead>';
                                    echo '<tr>';
                                        for($j=0; $j<$numero; $j++){
                                            echo '<th>'.$csv_data[$j].'</th>';
                                        }
                                    echo '</tr>';
                                    echo '</thead>';
                                }
                                else{
                                    echo '<thead>';
                                    echo '<tr>';
                                        for($j=0; $j<$numero; $j++){
                                            echo '<th>'."DataColum".$j.'</th>';
                                        }
                                    echo '</tr>';
                                    echo '</thead>';
                                }
                            }
                            if($i==1){
                                echo '<tbody>';
                            }
                            if($i>0){
                                    echo '<tr>';
                                        for($j=0; $j<$numero; $j++){
                                            echo '<td>'.$csv_data[$j].'</td>';
                                        }
                                    echo '</tr>';
                                
                            }
                
                            $i++;
                        }
                        echo '</tbody>';
                        echo '</table>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            echo "<script>
                $(document).ready(function() {
                    $('#data_csv_file').DataTable();
                } );  
            </script>";

            /* echo "
                <script>
                    $(document).on('ready', () => {
                        $('#data_csv_file').DataTable();
                    } );  
                </script>
            "; */
            
            echo "total de registros = ".$i;
    
        }else{
            echo "Archivo vacio";
    
        }
    
        fclose($csvfile);
    }
    
?>