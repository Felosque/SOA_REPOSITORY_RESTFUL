<?php
    echo "<title>Listar Estudiantes | Servicio Web Rest</title>";
    include '../includes/menu_layout.php';
    include '../config/routes.php';

?>

    <h2 class="title">Listar Estudiantes</h2>
    
    <div class="cont-tb">
        <table class="table table-dark table-striped mt8">
        <thead>
            <tr>
                <th>Nombre(s)</th>
                <th>Apellidos</th>
                <th>Fecha Nacimiento</th>
                <th>Documeto  Identificacion</th>
                <th>Genero</th>
                <th>Eps</th>
                <th>Direccion</th>
                <th>correo</th>
                <th>telefono</th> 
            </tr>
        </thead>
        <tbody>

                <?php 
                
                    if(count($listarestudiantes['Estudiante']) > 1){
                
                            for ($i=0; $i <count($listarestudiantes['Estudiante']) ; $i++) { 
                                echo '<tr>'.
                                '<td>'.$listarestudiantes['Estudiante'][$i]['nombres'].'</td>'.
                                '<td>'.$listarestudiantes['Estudiante'][$i]['apellidos'].'</td>'.
                                '<td>'.$listarestudiantes['Estudiante'][$i]['fechaNacimiento'].'</td>'.
                                '<td>'.$listarestudiantes['Estudiante'][$i]['documentoIdentificacion'].'</td>';
                                if($listarestudiantes['Estudiante'][$i]['genero'] == '0'){
                                    echo '<td>'.'Hombre'.'</td>';
                                }else{
                                    echo '<td>'.'Mujer'.'</td>';
                                }
                                echo '<td>'.$listarestudiantes['Estudiante'][$i]['eps'].'</td>'.
                                '<td>'.$listarestudiantes['Estudiante'][$i]['direccion'].'</td>'.
                                '<td>'.$listarestudiantes['Estudiante'][$i]['correo'].'</td>'.
                                '<td>'.$listarestudiantes['Estudiante'][$i]['telefono'].'</td>'
                                .'</tr>';
                            }                
                    }
                ?>
            
            
        </tbody>
        
    </table>
    </div>
<br><br><br><br>
<?php include '../includes/footer_layout.php';?>