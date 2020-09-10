<?php
    echo "<title>Filtrar  Matriculas | Servicio Web Rest</title>";
    include '../includes/menu_layout.php';
    include '../config/routes.php';
    $valuestate = false;
    $valuedocu = false;
    $valselect = false;
    if(isset($_POST['btnestado'])){
        $valuestate = true;
        $estado = trim($_POST['est']);
        if($estado != 12){
            $valselect = true;
            $parametro = "=".$estado;
            $buscar_matr_est = json_decode(file_get_contents($ip.$proyecto.$url_matr_estado.$parametro),true);
        }
    }

    if(isset($_POST['btndoc'])){
        $valuedocu = true;
        $docu = trim($_POST['docest']);
        $parametro = "=".$docu;
        $busc_mtri_doc_st =  json_decode(file_get_contents($ip.$proyecto.$url_matr_docu_est.$parametro),true);

    }


    ///$url_matr_estado
?>

        <h2 class="title">Filtrar Matriculas</h2>
            <div class="filters">
                <form method="post" name="form1">
                    <div class="form-group">
                        <label for="docest">documento estudiante:</label>
                        <input type="text" class="form-control" placeholder="Digita el documento" id="docest" name="docest">
                    </div>
                    <div class="contsub">
                        <input type="submit" name="btndoc" id="btndoc" class="btn btn-primary" value="Filtrar">
                    </div>
                </form>
                <form method="post" name="form2">
                    <div class="form-group">
                        <label for="nombre">Estado de la materia:</label>
                        <?php
                        
                        if($valuestate == true){
                            echo '<select class="form-control" id="est" name="est">';
                                    if($estado == 0){
                                        echo '
                                        <option value="12">Seleccione el estado</option>
                                        <option value="0" selected>Matriculada</option>
                                        <option value="1">Cursando</option>
                                        <option value="2">Rerpobada</option>
                                        <option value="3">Aprobada</option>
                                        ';
                                    }else if($estado == 1){
                                        echo '
                                        <option value="12">Seleccione el estado</option>
                                        <option value="0">Matriculada</option>
                                        <option value="1" selected>Cursando</option>
                                        <option value="2">Rerpobada</option>
                                        <option value="3">Aprobada</option>
                                        ';
                                    }else if($estado ==2){
                                        echo '
                                        <option value="12">Seleccione el estado</option>
                                        <option value="0">Matriculada</option>
                                        <option value="1">Cursando</option>
                                        <option value="2" selected>Rerpobada</option>
                                        <option value="3">Aprobada</option>
                                        ';
                                    }else if ($estado == 3){
                                        echo '
                                        <option value="12">Seleccione el estado</option>
                                        <option value="0">Matriculada</option>
                                        <option value="1">Cursando</option>
                                        <option value="2">Rerpobada</option>
                                        <option value="3" selected>Aprobada</option>
                                        ';
                                    }else{
                                        echo '
                                        <option selected value="12">Seleccione el estado</option>
                                        <option value="0">Matriculada</option>
                                        <option value="1">Cursando</option>
                                        <option value="2">Rerpobada</option>
                                        <option value="3">Aprobada</option>
                                        ';
                                    }
                             echo  '</select>';
                        }else{
                            echo '
                                <select class="form-control" id="est" name="est">
                                    <option selected value="12">Seleccione el estado</option>
                                    <option value="0">Matriculada</option>
                                    <option value="1">Cursando</option>
                                    <option value="2">Rerpobada</option>
                                    <option value="3">Aprobada</option>
                                </select>
                            ';
                        }
                        
                        
                        ?>

                    </div>
                    <div class="contsub">
                        <input type="submit" name="btnestado" id="btnestado" class="btn btn-primary" value="Filtrar">
                    </div>
                </form>
            </div>
            <div class="cont-tb">
                <table class="table table-dark table-striped ">
                <thead>
                    <tr>
                        <th>Codigo Matricula</th>
                        <th>Cod Estudiante</th>
                        <th>Materia</th>
                        <th>Definitiva</th>
                        <th>Fecha de inscripcion</th>
                        <th>Fecha inicio</th>
                        <th>Fecha Final</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($valuestate == true || $valuedocu == true){
                            if($valuestate == true){
                                echo '                               
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Has !</strong> Filtrado por estado de la matricula!.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    ';

                                    if($listarMatriculas == null){
                                        echo '                               
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Ups !</strong> Aun no se ha registrado ninguna Matricula!.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            ';
                                    }else{
                                        if($valuestate == true && $valselect == true){
                                            if( count($buscar_matr_est) == 1 && 
                                            count($buscar_matr_est['Matricula']) >= 8 && 
                                            count($buscar_matr_est['Matricula']) < 9){
                                            
                                                echo '<tr>'.
                                                        '<td>'.$buscar_matr_est['Matricula']['codigo'].'</td>';
                                                            $parametroest = "=".$buscar_matr_est['Matricula']['pkEstudiante'];
                                                            $nombest = json_decode(file_get_contents($ip.$proyecto.$url_buscarestudiante.$parametroest),true);
                                                echo    '<td>'.$nombest['nombres'].'</td>';
                                                            $parametromat = "=".$buscar_matr_est['Matricula']['pkMateria'];
                                                            $nommat = json_decode(file_get_contents($ip.$proyecto.$url_buscarmateria.$parametromat),true);
                                                echo    '<td>'.$nommat['nombre'].'</td>'.
                                                        '<td>'.$buscar_matr_est['Matricula']['notaDefinitiva'].'</td>'.
                                                        '<td>'.$buscar_matr_est['Matricula']['fechaInscripcion'].'</td>'.
                                                        '<td>'.$buscar_matr_est['Matricula']['fechaInicio'].'</td>'.
                                                        '<td>'.$buscar_matr_est['Matricula']['fechaFinal'].'</td>';
                                
                                                        if ($buscar_matr_est['Matricula']['estado'] == 0)
                                                        {
                                                            echo '<td>'.'Matriculada'.'</td>';
                                                        }
                                                        else if ($buscar_matr_est['Matricula']['estado'] == 1)
                                                        {
                                                            echo '<td>'.'Cursando'.'</td>';
                                                        }
                                                        else if ($buscar_matr_est['Matricula']['estado'] == 2)
                                                        {
                                                            echo '<td>'.'Rerpobada'.'</td>';
                                                        }
                                                        else if ($buscar_matr_est['Matricula']['estado'] == 3)
                                                        {
                                                            echo '<td>'.'Aprobada'.'</td>';
                                                        }
                                                        
                                                echo '</tr>';
                                            }else{
                                                for($i=0;$i<count($buscar_matr_est['Matricula']);$i++){
                                                    echo '<tr>'.
                                                    '<td>'.$buscar_matr_est['Matricula'][$i]['codigo'].'</td>';
                                                    $parametroest = "=".$buscar_matr_est['Matricula'][$i]['pkEstudiante'];
                                                    $nombest = json_decode(file_get_contents($ip.$proyecto.$url_buscarestudiante.$parametroest),true);
                                                    echo '<td>'.$nombest['nombres'].'</td>';
                                
                                                    $parametromat = "=".$buscar_matr_est['Matricula'][$i]['pkMateria'];
                                                    $nommat = json_decode(file_get_contents($ip.$proyecto.$url_buscarmateria.$parametromat),true);
                                
                                                    echo '<td>'.$nommat['nombre'].'</td>'.
                                                    '<td>'.$buscar_matr_est['Matricula'][$i]['notaDefinitiva'].'</td>'.
                                                    '<td>'.$buscar_matr_est['Matricula'][$i]['fechaInscripcion'].'</td>'.
                                                    '<td>'.$buscar_matr_est['Matricula'][$i]['fechaInicio'].'</td>'.
                                                    '<td>'.$buscar_matr_est['Matricula'][$i]['fechaFinal'].'</td>';
                                
                                                    if ($buscar_matr_est['Matricula'][$i]['estado'] == 0)
                                                    {
                                                        echo '<td>'.'Matriculada'.'</td>';
                                                    }
                                                    else if ($buscar_matr_est['Matricula'][$i]['estado'] == 1)
                                                    {
                                                        echo '<td>'.'Cursando'.'</td>';
                                                    }
                                                    else if ($buscar_matr_est['Matricula'][$i]['estado'] == 2)
                                                    {
                                                        echo '<td>'.'Rerpobada'.'</td>';
                                                    }
                                                    else if ($buscar_matr_est['Matricula'][$i]['estado'] == 3)
                                                    {
                                                        echo '<td>'.'Aprobada'.'</td>';
                                                    }
                                                echo '</tr>';
                                                }
                                            }
                                        }else{
                                            echo '
                                            <div class="alert alert-danger" alert-dismissible fade show" role="alert">
                                                <strong>Lo siento!</strong> Debes seleccionar el estado.
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>    
                                                ';
                                        }
                                
                                        }
                            }else if($valuedocu == true){
                                echo '                               
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Has !</strong> Filtrado por documento del estudiante!.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    ';

                                if($busc_mtri_doc_st == null){
                                    echo '                               
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Ups !</strong> Aun no se ha registrado ninguna Matricula con este documento!.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        ';
                                    }else{
                                        for($i=0;$i<count($busc_mtri_doc_st['Matricula']);$i++){
                                            echo '<tr>'.
                                            '<td>'.$busc_mtri_doc_st['Matricula'][$i]['codigo'].'</td>';
                                            $parametroest = "=".$busc_mtri_doc_st['Matricula'][$i]['pkEstudiante'];
                                            $nombest = json_decode(file_get_contents($ip.$proyecto.$url_buscarestudiante.$parametroest),true);
                                            echo '<td>'.$nombest['nombres'].'</td>';
                                            $parametromat = "=".$busc_mtri_doc_st['Matricula'][$i]['pkMateria'];
                                            $nommat = json_decode(file_get_contents($ip.$proyecto.$url_buscarmateria.$parametromat),true);
                                            echo '<td>'.$nommat['nombre'].'</td>'.
                                            '<td>'.$busc_mtri_doc_st['Matricula'][$i]['notaDefinitiva'].'</td>'.
                                            '<td>'.$busc_mtri_doc_st['Matricula'][$i]['fechaInscripcion'].'</td>'.
                                            '<td>'.$busc_mtri_doc_st['Matricula'][$i]['fechaInicio'].'</td>'.
                                            '<td>'.$busc_mtri_doc_st['Matricula'][$i]['fechaFinal'].'</td>';
                                            if ($busc_mtri_doc_st['Matricula'][$i]['estado'] == 0)
                                            {
                                                echo '<td>'.'Matriculada'.'</td>';
                                            }
                                            else if ($busc_mtri_doc_st['Matricula'][$i]['estado'] == 1)
                                            {
                                                echo '<td>'.'Cursando'.'</td>';
                                            }
                                            else if ($busc_mtri_doc_st['Matricula'][$i]['estado'] == 2)
                                            {
                                                echo '<td>'.'Rerpobada'.'</td>';
                                            }
                                            else if ($busc_mtri_doc_st['Matricula'][$i]['estado'] == 3)
                                            {
                                                echo '<td>'.'Aprobada'.'</td>';
                                            }
                                        echo '</tr>';
                                        }
                                    }


                            }
                        }else{
                            echo '                               
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Debes !</strong> Filtrar por algun parametro!.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                ';
                        }               
                    ?>
                </tbody>
                
            </table>
            </div>
        <br><br><br><br>
<?php include '../includes/footer_layout.php';?>