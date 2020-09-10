<?php
    echo "<title> Agregar Estudiante | Servicio Web Rest</title>";
    include '../includes/menu_layout.php';
    include '../config/routes.php';
    $result ="";
    $respuesta =0;
    $valitade = false;
    if(isset($_POST['btnsave'])){
        $valitade = true;
        $documento = trim($_POST['documento']);
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $correo = trim($_POST['correo']);
        $direccion = trim($_POST['direccion']);
        $fechaNacim = trim($_POST['fechaNacim'])."T00:00:00-05:00";
        $eps = trim($_POST['eps']);
        $genero = trim($_POST['genero']);
        $telefono = trim($_POST['telefono']);
        $url = $ip.$proyecto.$url_addestudiante;
        $ch = curl_init($url);
       $array = [
            "apellidos" => $apellido,
            "correo" => $correo,
            "direccion" => $direccion,
            "documentoIdentificacion" => $documento,
            "eps" => $eps,
            "fechaNacimiento" => $fechaNacim,
            "genero"=> $genero,
            "nombres" => $nombre,
            "telefono" => $telefono
       ];

     $require = json_encode($array);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $require);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $result = curl_exec($ch);
     $respuesta = curl_getinfo($ch,CURLINFO_HTTP_CODE);
     curl_close($ch);

     
    }
    

?>

<h2 class="title">Agregar Estudiante</h2>

<div class="contformsadd">
        <?php 
                if($valitade != false){
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
    <form method="POST">
        <div class="form-group">
            <label for="nombre">Nombre(s):</label>
            <input type="text" class="form-control" placeholder="Digita tu nombre" id="nombre" name="nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido(s):</label>
            <input type="text" class="form-control" placeholder="Digita tu(s) apellido(s)" id="apellido" name="apellido">
        </div>

        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="text" class="form-control" placeholder="Digita tu Correo" id="correo" name="correo">
        </div>

        <div class="form-group">
            <label for="documento">documento identificacion:</label>
            <input type="text" class="form-control" placeholder="Digita tu documento" id="documento" name="documento">
        </div>

        <div class="form-group">
            <label for="direccion">Fecha Nacimiento :</label>
            <input type="date" class="form-control"  id="fechaNacim" name="fechaNacim">
        </div>

        <div class="form-group">
            <label for="fechaNacim">direccion:</label>
            <input type="text" class="form-control" placeholder="Digita tu direccion" id="direccion" name="direccion">
        </div>


        <div class="form-group">
            <label for="eps">eps :</label>
            <input type="text" class="form-control" placeholder="Digita tu eps" id="eps" name="eps">
        </div>

        <div class="form-group">
            <label for="genero">Genero:</label>
            <select class="form-control" id="genero" name="genero">
                <option>Selecciona tu genero</option>
                <option value="0">Hombre</option>
                <option value="1">Mujer</option>
            </select>
        </div> 

        <div class="form-group">
            <label for="telefono">Telefono :</label>
            <input type="text" class="form-control" placeholder="Digita tu telefono" id="telefono" name="telefono">
        </div>


        <div class="contbtn">
            <button type="submit" class="btn btn-primary" name="btnsave" id="btnsave">Guardar Estudiante</button>
        </div>
    </form> 
</div>
<?php include '../includes/footer_layout.php';?>