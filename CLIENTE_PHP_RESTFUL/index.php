<?php
    echo "<title>Colegio | Servicio Web Rest</title>";
    include 'includes/menu_layout.php';
    include 'config/routes.php';

    $est = $estudiantes['respuesta'];
    $mat = $materias['respuesta'];
    $matr = $matriculas['respuesta'];
    
    echo  '
            <h2 class="title">Dashboard</h2>
            
            <div class="dashboard">
                <div class="es"><h3>Estudiantes Registrados: '.$est.'</h3></div>
                <div class="mat"><h3>Materias Registradas: '.$mat.'</h3></div>
                <div class="matr"><h3>Matriculas Registradas: '.$matr.'</h3></div>
            </div>
    
            ';

    include 'includes/footer_layout.php';