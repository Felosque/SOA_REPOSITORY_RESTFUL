<?php
    echo "<title>Listar Matriculas | Servicio Web Rest</title>";
    include '../includes/menu_layout.php';
    include '../config/routes.php';
?>

        <h2 class="title">Listar Matriculas</h2>
            <div class="cont-tb">
                <table class="table table-dark table-striped mt8">
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
                        $flag = false;
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
                            if(count($listarMatriculas['Matricula']) >=1){
                                for ($i=0; $i <count($listarMatriculas['Matricula']) ; $i++) { 
                                    echo '<tr>'.
                                    '<td>'.$listarMatriculas['Matricula'][$i]['codigo'].'</td>';
                                        $parametro = "=".$listarMatriculas['Matricula'][$i]['pkEstudiante'];
                                        $nombest = json_decode(file_get_contents($ip.$proyecto.$url_buscarestudiante.$parametro),true);
                                        echo '<td>'.$nombest['nombres'].'</td>';
                                        $parametromat = "=".$listarMatriculas['Matricula'][$i]['pkMateria'];
                                        $nommat = json_decode(file_get_contents($ip.$proyecto.$url_buscarmateria.$parametromat),true);
                                        echo '<td>'.$nommat['nombre'].'</td>'.
                                        '<td>'.$listarMatriculas['Matricula'][$i]['notaDefinitiva'].'</td>'.
                                        '<td>'.$listarMatriculas['Matricula'][$i]['fechaInscripcion'].'</td>'.
                                        '<td>'.$listarMatriculas['Matricula'][$i]['fechaInicio'].'</td>'.
                                        '<td>'.$listarMatriculas['Matricula'][$i]['fechaFinal'].'</td>';
                                        if ($listarMatriculas['Matricula'][$i]['estado'] == 0)
                                        {
                                            echo '<td>'.'Matriculada'.'</td>';
                                        }
                                        else if ($listarMatriculas['Matricula'][$i]['estado'] == 1)
                                        {
                                            echo '<td>'.'Cursando'.'</td>';
                                        }
                                        else if ($listarMatriculas['Matricula'][$i]['estado'] == 2)
                                        {
                                            echo '<td>'.'Rerpobada'.'</td>';
                                        }
                                        else if ($listarMatriculas['Matricula'][$i]['estado'] == 3)
                                        {
                                            echo '<td>'.'Aprobada'.'</td>';
                                        }
                                 echo '</tr>';
                                    
                                    
                                }
                            }
                        }

                    ?>
                </tbody>
                
            </table>
            </div>
        <br><br>
<?php include '../includes/footer_layout.php';?>