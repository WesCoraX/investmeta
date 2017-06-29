<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                <?php foreach ($td as $key => $value): ?>
                ['<?php echo $key ?>',  <?php echo $value ?>,      100],
                <?php endforeach ?>

            ]);

            var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>

<form>
    juros <input type="text" name="j"><br>
    investimento <input type="text" name="i"><br>
    dias <input type="text" name="d"><br>
    final <input type="text" name="f"><br>
    <input type="submit" value="Inserir Dados">
</form>

<div id="curve_chart" style="width: 900px; height: 500px"></div>