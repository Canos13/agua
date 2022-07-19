    <div class="container">
        <div class="row justify-content-md-center">
            <p>** Si va ha "Registar declaratoria" no se habilitara la seleccion contigua.</p>
        </div>
        <form action="" method="post" >
            <div class="form-row justify-content-md-center">
                
                <div class="form-group col-md-4">
                    <select name="type_accion" id="type_accion" class="form-control" required>
                        <option value="">Seleccione la informacion a registrar</option>
                        <option value="1">Registar declaratoria</option>
                        <option value="2">Registrar municipios en declaratoria</option>
                        <option value="3">Registar los niveles de los rios</option>
                        <option value="4">Registar los niveles de los mares</option>
                    </select>
                </div>
                <div class=" form-group col-md-4" id="id_type_reg_data">
                </div>
            </div>
            <input type="text" id="dirfile" name="dirfile" style="display:none" value ="<?php echo $csv_file; ?>">
            <input type="text" id="titletf" name="titletf" style="display:none" value ="<?php if($titulo == TRUE){ echo 'TRUE'; }else{ echo 'FALSE'; }?>">

            <div class="form-row justify-content-md-center">
                <div class=" form-group col-md-6">
                <input type="submit"  id="savedata" name="savedata" class="btn btn-primary form-control" value="hola">Guardar en InfoWater</input>
                </div>
            </div>
        </form>
        <script src="view/js/list_declaratoria.js"></script>
    </div>
<?php
echo "afuera del post";
echo  $_POST['type_accion'];
        if(isset($_POST['savedata'])){
            $dir_csv_file = $_POST['dirfile'];
            $cont_title = $_POST['titletf'];
             echo  $_POST['type_accion'];
            echo "eneknxksmxsldmldscmdlcmdlcmdlcdcdcd";
        }
    /* require "controller/save_csv_in_bd.php"; */
?>
