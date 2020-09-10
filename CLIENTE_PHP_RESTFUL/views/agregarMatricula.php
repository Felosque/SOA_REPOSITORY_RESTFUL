<?php
    echo "<title> Matricular Matriculas | Servicio Web Rest</title>";
    include '../includes/menu_layout.php';
    include '../config/routes.php';
    $validate = false;
    $validview = false;
    $validsr = false;
    $validsave = false;
    $document = "";
    $grado = "";
    if(isset($_POST['btnbuscar'])){
        $validate = true;
        $document = trim($_POST['documento']);
        $parametro = "=".$document;
        $buscarestudiantes = json_decode(file_get_contents($ip.$proyecto.$url_buscarestudiante.$parametro),true);
    }

    if(isset($_POST['btnsearch'])){
        $validsr = true;
        $document = trim($_POST['ppcedula']);
        $idgrado = trim($_POST['gradoselect']);
        $parametrodoc = "=".$document;
        $parametrograd = "=".$idgrado;
        $buscarestudiantes = json_decode(file_get_contents($ip.$proyecto.$url_buscarestudiante.$parametrodoc),true);
        $buscarmatrigradoest = json_decode(file_get_contents($ip.$proyecto.$url_mtr_grado.$parametrograd),true);
        $grado = $idgrado;
      
    }

    if(isset($_POST['btnSave'])){
        $validsave = true;

        $grado = "=".trim($_POST['paramgrado']);
        $docuest = trim($_POST['paramdocumento']);
        $pfechinicio = trim($_POST['fechInicio'])."T00:00:00-05:00";
        $pfechfinal = trim($_POST['fechFinal'])."T00:00:00-05:00";
        $paramgrado = $grado;

        $buscarmatrigradoest = json_decode(file_get_contents($ip.$proyecto.$url_mtr_grado.$paramgrado),true);
        

        for($i=0;$i<count($buscarmatrigradoest['Materia']);$i++){

            $pkMateria = $buscarmatrigradoest['Materia'][$i]['codigo'];
            $url = $ip.$proyecto.$url_add_matr;
            $ch = curl_init($url);
            $array = [
                "codigo" => 0,
                "estado" => 1,
                "fechaFinal" => $pfechfinal,
                "fechaInicio" => $pfechinicio,
                "fechaInscripcion" => date('Y-m-d')."T00:00:00-05:00",
                "notaDefinitiva" => 0.0,
                "pkEstudiante" => $docuest,
                "pkMateria" => $pkMateria
            ];
            $require = json_encode($array);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $require);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $respuesta = curl_getinfo($ch,CURLINFO_HTTP_CODE);
            curl_close($ch);
        }
    }

//btnsearch

?>
            <h2 class="title">Matricular Estudiante</h2>
        <div class="cont-tb">
                    <form method = 'POST' class="mt8 formbusquedaest">
                        <div class="form-group">
                                <label for="pwd">Documento del estudiante:</label>
                                <?php 
                                    if($validate == true){
                                        echo '<br>';
                                        echo '<b>'.'El documento que busco fue el: '.$document.'</b>';
                                        echo '<br>';
                                    }
                                ?>
                            <div class="contform">
                                <?php
                                    if($validate == true || $validview == true || $validsr == true){
                                        echo '
                                            <input type="text" class="form-control" name="documento" id="documento" value="'.$document.'">
                                            ';
                                    }else{
                                        echo '
                                            <input type="text" class="form-control" name="documento" id="documento" value"estaesto">
                                        ';
                                    }
                                ?>
                                <input type="submit" value="Buscar" class="btn btn-success" name="btnbuscar" id="btnbuscar">
                            </div>
                        </div>
                    </form>
                    <?php 
                        if($validate == true){
                            if($buscarestudiantes == null){
                                echo '
                                <div class="alert alert-danger" alert-dismissible fade show" role="alert">
                                    <strong>Lo siento!</strong> Estudiante No encontrado.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                                    ';
                            }else{

                                echo '                               
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Correcto!</strong> Estudiante encontrado.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    ';
                            }
                        }
                    
                    ?>
                    <?php 
                            if($validsave != false){
                                if($respuesta == 204){
                                    echo '
                                    <div class="alert alert-success" alert-dismissible fade show" role="alert">
                                        Estudiante Agregado.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>    
                                        ';
                                }else {
                                    echo '
                                    <div class="alert alert-danger" alert-dismissible fade show" role="alert">
                                        <strong>Los iento!</strong> Estudiante No Agregado.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>    
                                        ';
                                }
                            }
                    
                    ?>
                <table class="table table-dark table-striped ">
                    <thead>
                        <tr>
                            <th>Nombre(s)</th>
                            <th>Apellidos</th>
                            <th>correo</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            if($validate == true && $buscarestudiantes != null){
                                echo '<tr>'.
                                '<td>'.$buscarestudiantes['nombres'].'</td>'.
                                '<td>'.$buscarestudiantes['apellidos'].'</td>'.
                                '<td>'.$buscarestudiantes['correo'].'</td>'
                                .'</tr>';
                            }

                            if($validview == true && $buscarestudiantes != null){
                                echo '<tr>'.
                                '<td>'.$buscarestudiantes['nombres'].'</td>'.
                                '<td>'.$buscarestudiantes['apellidos'].'</td>'.
                                '<td>'.$buscarestudiantes['correo'].'</td>'

                                .'</tr>';
                            }

                            if($validsr == true && $buscarestudiantes !=null){
                                echo '<tr>'.
                                '<td>'.$buscarestudiantes['nombres'].'</td>'.
                                '<td>'.$buscarestudiantes['apellidos'].'</td>'.
                                '<td>'.$buscarestudiantes['correo'].'</td>'

                                .'</tr>';
                            }
                    ?>
                    </tbody>
                </table>
                <?php
                    if($validate == true || $validsr == true){
                        echo '
                            <form method="POST">
                                <div class="form-group">
                                    <label for="grado">Grado:</label>
                                    <div class="contform">
                                    <select class="form-control" id="grado" name="gradoselect">
                                        <option value="0">Seleccione el grado</option>';
                                        if ($idgrado == 1){
                                            echo '
                                            
                                            <option value="1" selected>Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 2){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2" selected>Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 3){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3" selected>Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 4){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4" selected>Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 5){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5" selected>Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 6){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6" selected>Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 7){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7" selected>Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 8){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8" selected>Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 9){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9" selected>Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 10){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10" selected>Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }else if ($idgrado == 11){
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11" selected>Grado 11</option>    
                                            ';
                                        }else{
                                            echo '
                                            
                                            <option value="1">Grado 1</option>
                                            <option value="2">Grado 2</option>
                                            <option value="3">Grado 3</option>
                                            <option value="4">Grado 4</option>
                                            <option value="5">Grado 5</option>
                                            <option value="6">Grado 6</option>
                                            <option value="7">Grado 7</option>
                                            <option value="8">Grado 8</option>
                                            <option value="9">Grado 9</option>
                                            <option value="10">Grado 10</option>
                                            <option value="11">Grado 11</option>    
                                            ';
                                        }
                                  echo '  </select>
                                    <input type="text" name="ppcedula" id="ppcedula" style="display:none;" value="'.$document.'">
                                    <button type="submit" class="btn btn-primary" name="btnsearch" id="btnsearch"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-dark table-striped ">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Intensidad Horaria</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    if($validsr == true && $buscarmatrigradoest != null){
                                        for($i=0;$i<count($buscarmatrigradoest['Materia']);$i++){
                                            echo '<tr>'.
                                            '<td>'.$buscarmatrigradoest['Materia'][$i]['codigo'].'</td>'.
                                            '<td>'.$buscarmatrigradoest['Materia'][$i]['intensidadHoraria'].'</td>'.
                                            '<td>'.$buscarmatrigradoest['Materia'][$i]['nombre'].'</td>';
                                        }
                                    }
                        echo        '</tbody>
                                    </table>';

                        echo '  <form method="POST">
                                    <input type="text" name="paramdocumento" id="paramdocumento" style="display:none;" value="'.$document.'">
                                    <input type="text" name="paramgrado" id="paramgrado" style="display:none;" value="'.$grado.'">
                                    <div class="contfech">
                                    <div class="form-group">
                                        <label for="direccion">Fecha Inicio :</label>
                                        <input type="date" class="form-control"  id="fechInicio" name="fechInicio">
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Fecha Final :</label>
                                        <input type="date" class="form-control"  id="fechFinal" name="fechFinal">
                                    </div>
                                    </div>
                                    <input type="submit"  class="btn btn-success fas fa-eye" value="Matricular" name="btnSave" id="btnSave">
                                </form>
                            ';
                    }
                ?>
        </div>


<?php include '../includes/footer_layout.php';?>