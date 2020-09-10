    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    


    <?php $url = getcwd(); ?>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Colegio</a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php
                    if(strpos($url,'\colegioclientephp\views')){
                        echo '<a class="nav-link" href="../index.php">Principal</a>';
                    }else{
                        echo '<a class="nav-link" href="./index.php">Principal</a>';
                    }
                ?>
                
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Estudiantes
                </a>
                <div class="dropdown-menu">

                <?php
                        if ( strpos($url,'\views')){
                            echo 
                            '<a class="dropdown-item" href="./agregarestudiante.php">Agregar Estudiante</a>'.
                            '<a class="dropdown-item" href="./listarestudiantes.php">Listar Estudiantes</a>'.
                            '<a class="dropdown-item" href="./buscarestudiantes.php">Buscar Estudiantes</a>'.
                            '<a class="dropdown-item" href="./eliminarestudiante.php">Eliminar Estudiantes</a>'.
                            '<a class="dropdown-item" href="./promedioestudiante.php">Promedio Estudiante</a>'
                            ;                       
                        }else{
                            echo 
                            '<a class="dropdown-item" href="./views/agregarestudiante.php">Agregar Estudiante</a>'.
                            '<a class="dropdown-item" href="./views/listarestudiantes.php">Listar Estudiantes</a>'.
                            '<a class="dropdown-item" href="./views/buscarestudiantes.php">Buscar Estudiantes</a>'.
                            '<a class="dropdown-item" href="./views/eliminarestudiante.php">Eliminar Estudiantes</a>'.
                            '<a class="dropdown-item" href="./views/promedioestudiante.php">Promedio Estudiante</a>'
                            ;
                        }
                ?>


                </div>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Matriculas
                </a>
                <div class="dropdown-menu">
                        <?php 
                            if ( strpos($url,'\views')){
                                echo
                                '<a class="dropdown-item" href="./agregarMatricula.php">Matricular Estudiante</a>'.
                                '<a class="dropdown-item" href="./listarMatricula.php">Listar Matriculas</a>'.
                                '<a class="dropdown-item" href="./listarMatriculaDosParametros.php">Listar Matriculas por dos parametros</a>'.
                                '<a class="dropdown-item" href="./verMatriculaEstudiante.php">Buscar / Ver Matriculas Estudiante</a>'.
                                '<a class="dropdown-item" href="./actualizarMatriculaEstudiante.php">Actualizar Matriculas Estudiante</a>'.
                                '<a class="dropdown-item" href="./eliminarMatriculaEstudiante.php">Eliminar Matricula</a>'.
                                '<a class="dropdown-item" href="./estadisticaMatriculaEstudiante.php">Estadisticas de Matricula</a>'
                                ;
                            }else{

                                echo
                                '<a class="dropdown-item" href="./views/agregarMatricula.php">Matricular Estudiante</a>'.
                                '<a class="dropdown-item" href="./views/listarMatricula.php">Listar Matriculas</a>'.
                                '<a class="dropdown-item" href="./views/listarMatriculaDosParametros.php">Listar Matriculas por dos parametros</a>'.
                                '<a class="dropdown-item" href="./views/verMatriculaEstudiante.php">Buscar / Ver Matriculas Estudiante</a>'.
                                '<a class="dropdown-item" href="./views/actualizarMatriculaEstudiante.php">Actualizar Matriculas Estudiante</a>'.
                                '<a class="dropdown-item" href="./views/eliminarMatriculaEstudiante.php">Eliminar Matricula</a>'.
                                '<a class="dropdown-item" href="./views/estadisticaMatriculaEstudiante.php">Estadisticas de Matricula</a>'
                                ;
                            }
                        ?>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" onclick="acercaDe()">Acerca de ....</a>
            </li>


        </ul>
    </nav>
