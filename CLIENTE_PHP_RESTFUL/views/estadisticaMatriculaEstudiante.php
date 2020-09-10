<?php
    echo "<title>Grafica Materias por grado | Servicio Web Rest</title>";
    include '../includes/menu_layout.php';
    include '../config/routes.php';


    for($i=1;$i<12;$i++){
        $parametro = "=".$i;
        $materiagrado = json_decode(file_get_contents($ip.$proyecto.$url_mtr_grado.$parametro),true);

        if($i ==1){
            $valgrado1 = count($materiagrado['Materia']);
        }elseif($i ==2){
            $valgrado2 = count($materiagrado['Materia']);
        }elseif($i ==3){
            $valgrado3 = count($materiagrado['Materia']);
        }elseif($i ==4){
            $valgrado4 = count($materiagrado['Materia']);
        }elseif($i ==5){
            $valgrado5 = count($materiagrado['Materia']);
        }elseif($i ==6){
            $valgrado6 = count($materiagrado['Materia']);
        }elseif($i ==7){
            $valgrado7 = count($materiagrado['Materia']);
        }elseif($i ==8){
            $valgrado8 = count($materiagrado['Materia']);
        }elseif($i ==9){
            $valgrado9 = count($materiagrado['Materia']);
        }elseif($i ==10){
            $valgrado10 = count($materiagrado['Materia']);
        }else{
            $valgrado11 = count($materiagrado['Materia']);
        }
    }
?>

<h1 class="title">Grafica Cantidad Materias por grado</h1>
<div id="chart_div"></div>
<script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawMultSeries);

    function drawMultSeries() {
        var data = google.visualization.arrayToDataTable([
            ['Grado', 'cantidad'],
            ['Grado 1', <?php echo $valgrado1 ?>],
            ['Grado 2', <?php echo $valgrado2 ?>],
            ['Grado 3', <?php echo $valgrado3 ?>],
            ['Grado 4', <?php echo $valgrado4 ?>],
            ['Grado 5', <?php echo $valgrado5 ?>],
            ['Grado 6', <?php echo $valgrado6 ?>],
            ['Grado 7', <?php echo $valgrado7 ?>],
            ['Grado 8', <?php echo $valgrado8 ?>],
            ['Grado 9', <?php echo $valgrado9 ?>],
            ['Grado 10', <?php echo $valgrado10 ?>],
            ['Grado 11', <?php echo $valgrado11 ?>]
        ]);

        var options = {
            title: 'Materias Por Grado',
            chartArea: {width: '50%'},
            hAxis: {
            title: 'Total Materias',
            minValue: 0
            },
            vAxis: {
            title: 'Grado'
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        }
</script>






<style>
    #chart_div {
    width: 95%;
    min-height: 700px !important;
}
</style>




<?php 

include '../includes/footer_layout.php';
?>