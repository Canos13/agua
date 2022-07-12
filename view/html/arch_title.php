<!-- <div class="container">
    <div class="row justify-content-md-center">
        <p>¿Su archivo contiene titulos en sus columnas?</p> 
    </div>
    <div class="row justify-content-md-center">
        <form  method="post" action="">
           <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                        <label class="form-check-label" for="exampleRadios1"> Si, si contiene un titulos </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2"> No, no contiene un titulos </label>
                    </div>
                </div>
                <div class="col">
                    <button type=submit class="btn btn-primary" id="titulos" name="titulos">Aceptar</button>
                </div>
           </div>

        </form>
    </div>
</div> -->
<?php
    if(isset($_POST['titulos'])){
        $valor = $_POST['exampleRadios'];
        if($valor == 'option1'){
            echo "option1";
        }
        if($valor == 'option2'){
            echo "option2";
        }
    }

    include "../../index.php";
?>