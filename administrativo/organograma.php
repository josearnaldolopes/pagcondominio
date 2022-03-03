<?php
include "../app/variaveis.php";
include "../app/constants.php";
include "../app/conexao.php";
include "../app/function.php";
acesso ($acesso, "administrativo");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="robots" content="noindex, nofollow">
<title>PagCondominio.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../assets/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<link href="../assets/css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../assets/css/pagcondominio.css" rel="stylesheet" id="bootstrap-css">
<link rel="icon" type="image/png" href="../assets/logos/icon-32x32.png">
<script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script crossorigin src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages:["orgchart"]});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Manager');
    data.addColumn('string', 'ToolTip');

    // For each orgchart box, provide the name, manager, and tooltip to show.
    data.addRows([
      [{'v':'presidente', 'f':'Acácio<div style="color:white; font-style:italic">Presidente</div>'},
      '', 'Presidente'],
      [{'v':'tecnologia', 'f':'José Arnaldo<div style="color:white; font-style:italic">Head de Bugs</div>'},
      'presidente', 'VP'],
      [{'v':'financeiro', 'f':'Leandro<div style="color:white; font-style:italic">Financeiro</div>'},
      'presidente', 'VP'],
      [{'v':'auxfinanceiro', 'f':'Alexandre Nogueira<div style="color:white; font-style:italic">Auxiliar</div>'},
      'financeiro', 'VP'],
      ['Pedro Prado', 'financeiro', ''],
      ['Alice', 'presidente', ''],
      ['Júlio', 'presidente', ''],
      ['Carlos Alberto', 'presidente', ''],
      ['Robson', 'tecnologia', ''],
      ['Carolina', 'tecnologia', '']
    ]);

    // Create the chart.
    var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
    // Draw the chart, setting the allowHtml option to true for the tooltips.
    chart.draw(data, {'allowHtml':true});
  }
</script>
</head>
<body class="main">
  
    <div class="login-screen"></div>
    <div class="container">
      <div class="row">
            <div class="col-md-12 interno">
            <nav class="navbar navbar-default" id="navbar"></nav>
            <div class="col-md-12" style="height:20px;"></div>

            <div class="col-md-12 uppercase bold"><h2>Organograma</h2></div>

              <div class="col-md-12">
                <ul class="list-group">
                  <li class="list-group-item active">
                    <div class="row"><div class="col-md-12"><div class="col-md-12 vermelho">Organograma</div></div></div>
                  </li>
                  <li class="list-group-item organograma">
                    <div id="chart_div"></div>
                  </li>
                </ul>          
              </div>

              <div class="col-md-12" style="padding:30px 10px">
                <footer id="footer"></footer>
              </div>	
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>  
    <script src="../assets/js/jquery.mask.min.js"></script>  
    <script src="../assets/js/pagcondominio.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/babel" src="../assets/js/react-administrativo.js"></script>
</body>
</html>