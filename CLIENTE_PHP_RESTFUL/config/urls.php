<?php

    $url_matricula = '';


    // Servicios extras-------------------------------------------------------------------------------------
    $url_cantEst = 'servicioWebEstudiante/cantidadEstudiantesRegistrados';
    $url_cantMat = 'serviciosWebMateria/cantidadMateriasRegistradas';
    $url_cantMatr = 'serviciosWebMatricula/cantidadMatriculasRegistradas';

    //Servicio Estudiantes-----------------------------------------------------------------------------------

    $url_estudiantes = 'servicioWebEstudiante/darEstudiantes';
    $url_buscarestudiante = 'servicioWebEstudiante/buscarEstudiante?documento';
    $url_eliminarestudiante = 'servicioWebEstudiante/eliminarEstudiante?documento';
    $url_addestudiante = 'servicioWebEstudiante/insertarEstudiante';
    //Servicio Materia

    $url_buscarmateria = 'serviciosWebMateria/darMateriaPorCodigo?codigo';
    




    //Servicio Matriculas-------------------------------------------------------------------------------------
    $url_buscarpromedioestudiante = 'serviciosWebMatricula/darPromedioEstudiante?documento';
    $url_add_matr = 'serviciosWebMatricula/matricularEstudiante';
    $url_list_matriculas = 'serviciosWebMatricula/darMatriculas';
    $url_matr_est_grado =  'serviciosWebMatricula/darMatriculasEstudianteGrado?documento';
    $url_mtr_est = 'serviciosWebMatricula/darMatriculaCodigo?codigo';
    $url_update_mtr_est = 'serviciosWebMatricula/actualizarMatricula';
    $url_matr_estado = 'serviciosWebMatricula/darMatriculasPorEstado?estado';
    $url_matr_docu_est = 'serviciosWebMatricula/darMatriculasEstudiante?documento';
    $url_mtr_grado = 'serviciosWebMateria/darMateriasPorGrado?grado';
    $url_delete_matricula = 'serviciosWebMatricula/borrarMatriculaCodigo?codigo';

    