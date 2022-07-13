<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar datos de InfoWater</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>   <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body>
    <h2>Consultar datos de InfoWater</h2>
        <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <p>** Si va ha "Consultar un  declaratoria" no se habilitara la seleccion contigua.</p>
        </div>
        <form action="" method="post" >
            <div class="form-row justify-content-md-center">
                
                <div class="form-group col-md-4">
                    <select name="type_accion" id="type_accion" class="form-control" required>
                        <option value="">Seleccione la informacion a consultar</option>
                        <option value="1">Concultar declaratorias</option>
                        <option value="2">Concultar municipios en/con declaratoria</option>
                        <option value="3">Concultar los niveles de los rios por declaratoria</option>
                        <option value="4">Concultar los niveles de los mares por declaratoria</option>
                    </select>
                </div>
                <div class=" form-group col-md-4" id="id_type_reg_data">
                </div>
            </div>
            <div class="form-row justify-content-md-center">
                <div class=" form-group col-md-6">
                <button type="submit"  id="cdata" name="cdata" class="btn btn-primary form-control">Consultar en InfoWater</button>
                </div>
            </div>
        </form>
        <script src="view/js/list_declaratoria2.js"></script>
    </div>
    <div>
        <?php
            require("model/BasedeDatos.php");
            $data_db = new BasedeDatos();

            if(isset($_POST['cdata'])){
                $accion = intval($_POST['type_accion']);
                $id_declaratoria = "";
                
                if($accion == 1){/* consulta de declaratorias */
                    require("model/Declaratoria.php");
                    echo '<div class="row-flex">
                            <div class="container">
                                <div class="col-lg-12">    
                                    <table id="data_declaratoria" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th>Id</th>
                                            <th>Fenomeno</th>
                                            <th>Causas</th>
                                            <th>Fecha de registro</th>
                                            <th>Fecha de inicio de la declaratoria</th>
                                            <th>Fecha de fin de la declaratoria</th>
                                        </thead>
                                        <tbody> ';
                                        
                                        $listaDeclaratorias = $data_db->lists_declaratoias();

                                        foreach($listaDeclaratorias as $declaratorias){
                                            printf('<tr>');
                                                printf('<td>%d</td>',$declaratorias->getId());
                                                printf('<td>%s</td>',$declaratorias->getFenomeno());
                                                printf('<td>%s</td>',$declaratorias->getCausas());
                                                printf('<td>%s</td>',$declaratorias->getFecha_registro());
                                                printf('<td>%s</td>',$declaratorias->getFecha_inicio());
                                                printf('<td>%s</td>',$declaratorias->getFecha_fin());
                                            printf('</tr>');
                                        }

                                    echo '</tbody>
                                    </table>
                                        <script>
                                            $(document).ready(function() {
                                                $("#data_declaratoria").DataTable();
                                            } );  
                                        </script>
                                </div>
                            </div>
                        </div> ';

                }elseif($accion == 2){ /* consulta de declaratorias en municipios*/
                    require("model/Declaratoria.php");
                    require("model/Estado.php");
                    /* require("model/Municipio.php");    */                 
                    $id_declaratoria = intval($_POST['type_reg_data']);
                    $deca2 = new Declaratoria();
                    $deca2->setId($id_declaratoria);
                    echo '<div class="row-flex">
                            <div class="container">
                                <div class="col-lg-12">    
                                    <table id="data_declaratoria" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th>Id</th>
                                            <th>Fenomeno</th>
                                            <th>Causas</th>
                                            <th>Fecha de inicio de la declaratoria</th>
                                            <th>Fecha de fin de la declaratoria</th>
                                            <th>Municipio</th>
                                            <th>Estado</th>
                                        </thead>
                                        <tbody> ';
                                        $listaMinicipiosDeclaratorias = $data_db->list_mundec($deca2);

                                        foreach($listaMinicipiosDeclaratorias as $declaratoriasmundec){
                                            printf('<tr>');
                                                printf('<td>%d</td>',$declaratoriasmundec->getId());
                                                printf('<td>%s</td>',$declaratoriasmundec->getFenomeno());
                                                printf('<td>%s</td>',$declaratoriasmundec->getCausas());
                                                printf('<td>%s</td>',$declaratoriasmundec->getFecha_inicio());
                                                printf('<td>%s</td>',$declaratoriasmundec->getFecha_fin());
                                                printf('<td>%s</td>',$declaratoriasmundec->getNombrem());
                                                printf('<td>%s</td>',$declaratoriasmundec->getNombree());
                                            printf('</tr>');
                                        }

                                        echo '</tbody>
                                        </table>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#data_declaratoria").DataTable();
                                                } );  
                                            </script>
                                    </div>
                                </div>
                            </div> ';

                }elseif($accion == 3){ /* consulta de niveles de los rios en  la declaratorias*/
                    require("model/Rio.php");
                    $id_declaratoria = intval($_POST['type_reg_data']);

                }elseif($accion == 4){/* consulta de niveles de los mares en  la declaratorias*/
                    require("model/Mar.php");
                    $id_declaratoria = intval($_POST['type_reg_data']);
                }
            }
        ?>
    </div>
</body>
</html>