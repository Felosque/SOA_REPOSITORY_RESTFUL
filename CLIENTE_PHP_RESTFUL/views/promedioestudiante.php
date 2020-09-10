<?php
    echo "<title> Promedio Estudiante | Servicio Web Rest</title>";
    include '../includes/menu_layout.php';
    include '../config/routes.php';
    $validate = false;
    if(isset($_POST['btnbuscar'])){
            $validate = true;
            $document = trim($_POST['documento']);
            $parametro = "=".$document;
            $buscarestudiantes = json_decode(file_get_contents($ip.$proyecto.$url_buscarestudiante.$parametro),true);
            $buscarpromedioEst = json_decode(file_get_contents($ip.$proyecto.$url_buscarpromedioestudiante.$parametro),true);

    }
    
?>

            <h2 class="title">Promedio Estudiante </h2>
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
                    <input type="text" class="form-control" name="documento" id="documento">
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
        <table class="table table-dark table-striped ">
        <thead>
            <tr>
                <th>Nombre(s)</th>
                <th>Apellidos</th>
                <th>Documeto  Identificacion</th>
                <th>correo</th>
                <th>promedio</th> 
            </tr>
        </thead>
        <tbody>

        <?php
                if($validate == true &&  $buscarestudiantes != null && $buscarpromedioEst != null){
                    echo '<tr>'.
                    '<td>'.$buscarestudiantes['nombres'].'</td>'.
                    '<td>'.$buscarestudiantes['apellidos'].'</td>'.
                    '<td>'.$buscarestudiantes['documentoIdentificacion'].'</td>'.
                    '<td>'.$buscarestudiantes['correo'].'</td>'.
                    '<td>'.$buscarpromedioEst['respuesta'].'</td>'
                    .'</tr>';
                }

        ?>
            
            
        </tbody>
        
    </table>
    </div>
<br><br><br><br>