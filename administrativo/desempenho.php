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
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ano', 'Condominios', 'Pagamentos'],
          ['5/2021',      200,      40],
          ['6/2021',      250,      80],
          ['7/2021',      260,      160],
          ['8/2021',      270,      320],
          ['9/2021',      299,      640],
          ['10/2021',     320,      1280],
          ['11/2021',     650,      2400],
          ['12/2021',     2990,     9800]
        ]);

        var options = {
          title: 'Performance ao longo do tempo',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Período', 'Vendas', 'Visitas', 'Dias'],
          ['1∘ Trim. 2021', 100, 200, 20],
          ['2∘ Trim. 2021', 1000, 400, 20],
          ['3∘ Trim. 2021', 1170, 460, 15],
          ['4∘ Trim. 2021', 660, 1120, 180]
        ]);

        var options = {
          chart: {
            title: 'Vendas x Visitas',
            subtitle: 'Vendas, Vendas, e Dias trabalhados: 2021',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tipo', 'Quantidade'],
          ['Administradoras',  110],
          ['Condominios',      225],
          ['Condominos',       5892],
          ['Sindicos',         4502],
          ['Pagamentos',       9957]
        ]);

        var options = {
          title: 'Dados',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
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

                <div class="col-md-12 uppercase bold"><h2>Desempenho</h2></div>

                <div class="col-md-12">
                  <ul class="list-group">
                    <li class="list-group-item active">
                      <div class="row"><div class="col-md-12"><div class="col-md-12 vermelho">Performance</div></div></div>
                    </li>
                    <li class="list-group-item">
                      <div id="curve_chart" style="width:100%;height:500px"></div>
                    </li>
                  </ul>          
                </div>

                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item active">
                      <div class="row"><div class="col-md-12"><div class="col-md-12 vermelho">Vendas x Visitas</div></div></div>
                    </li>
                    <li class="list-group-item">
                      <div id="barchart_material" style="width:100%;height:400px;"></div>
                    </li>
                  </ul>          
                </div>

                <div class="col-md-6">
                  <ul class="list-group">
                    <li class="list-group-item active">
                      <div class="row"><div class="col-md-12"><div class="col-md-12 vermelho">Armazenamento</div></div></div>
                    </li>
                    <li class="list-group-item">
                    <div id="donutchart" style="width:100%;height:400px;"></div>
                    </li>
                  </ul>          
                </div>

                <div class="col-md-12" style="padding:30px 10px">
                  <footer id="footer"></footer>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">Adicionar ERP</h3>
          </div>
          <div class="modal-body">
          <h2 class="modal-title avisoERP text-center">Cadastrado com sucesso</h2>
          <form method="post" action="">
                  <div class="row formCadERP">
                  <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" name="cnpj" class="form-control" id="cnpj" placeholder="CNPJ">                    
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP">
                  </div>
                  <div class="form-group col-md-9">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="numero" class="form-control" placeholder="Num.">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control" placeholder="UF">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="responsavel">Responsável</label>
                    <input type="text" name="responsavel" class="form-control" id="responsavel" placeholder="Responsável">                   
                  </div>
                  <div class="form-group col-md-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone">                   
                  </div>
                  <div class="form-group col-md-6">
                    <label for="desenvolvedor">Desenvolvedor</label>
                    <input type="text" name="desenvolvedor" class="form-control" id="desenvolvedor" placeholder="Desenvolvedor">                   
                  </div>
                  <div class="form-group col-md-6">
                    <label for="telefoneDes">Telefone Desenvolvedor</label>
                    <input type="text" name="telefoneDes" class="form-control" id="telefoneDes" placeholder="Telefone">                   
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email Desenvolvedor</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email Desenvolvedor">                   
                  </div>

                  <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-danger btn-round cadERP"><i class="glyphicon glyphicon-ok"></i>  Cadastrar ERP</button>
                  </div>
                  </div>
                </form>

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