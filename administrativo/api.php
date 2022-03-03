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
</head>
<body class="main">
  
<div class="login-screen"></div>
    <div class="container">
      <div class="row">
            <div class="col-md-12 interno">
            <nav class="navbar navbar-default" id="navbar"></nav>
            <div class="col-md-12" style="height:20px;"></div>

            <div class="col-md-6 uppercase bold"><h2>APIs</h2></div>
            <div class="col-md-6 text-right"><h2>
            <?php 
             if (isset($a)) {
               echo "<a href=\"api-editar?a=$a\" class=\"btn btn-danger btn-round\"><i class=\"glyphicon glyphicon-edit\"></i> Editar</a> ";
               echo "<a href=\"api-apagar?a=$a\" class=\"btn btn-danger btn-round\"><i class=\"glyphicon glyphicon-trash\"></i> Apagar</a> ";
             } else {
              //  echo "<a href=\"api-adicionar\" class=\"btn btn-danger btn-round\"><i class=\"glyphicon glyphicon-plus\"></i> Adicionar</a>";
             }
            ?>
            </h2></div>

            <div class="col-md-12">
            <?php
            if (isset($a)) {
              $sql = "SELECT * FROM api WHERE id = '$a'";
              $simples = $conexao->prepare($sql);
              $simples->execute();
              $registro = $simples->fetch();
              $numero = $simples->rowCount();
              //echo $numero;
              if ($registro["token"]) {
                //$registro["token"] = substr($registro["token"], 0, 22)."[Restante omitido]";
                $registro["token"] = $registro["token"];
              } else {
                $registro["token"] = "<h4>Sem Tokem registrado.</h4>";
              }

              echo "<h4><b>".$registro["nome"]."</b></h4>";
              echo "<h6><b>Token</b></h6>";
              echo "<p class=\"valueToken tokenGerado\">".$registro["token"]."</p>";
              echo "<p><span class=\"gerarToken btn btn-danger btn-round\">Gerar um Token?</span> <span class=\"gravarToken\"></span></p>";
              echo "<p><a href=\"erp\" class=\"btn btn-danger btn-round\"><span class=\"glyphicon glyphicon-circle-arrow-left\"></span> Voltar para a lista</a></p>";
              
            } else {
              
              $sql = "SELECT api.id,api.nome,api.site FROM api ORDER BY api.nome ASC";
              $simples = $conexao->prepare($sql);
              $simples->execute();
              //$registro = $simples->fetch();
              $numero = $simples->rowCount();

              if ($numero > 0) {
                // Saída dos dados
                echo "<ul class=\"list-group\">";

                echo "<li class=\"list-group-item active\">";
                  echo "<div class=\"row\">";
                    echo "<div class=\"col-md-12\">";
                      echo "<div class=\"col-md-6 vermelho\">API</div>";
                      echo "<div class=\"col-md-6 vermelho\">Documentação</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</li>";

                  $num = 0;
                  while($registro = $simples->fetch(PDO::FETCH_ASSOC)) {

                    $num = $num+1;
                    
                    echo "<li class=\"list-group-item\">";
                      echo "<div class=\"row\">";
                        echo "<div class=\"col-md-12 lista\">";
                            echo "<div class=\"col-md-6\"><p> ".$registro["nome"]."</p></div>";
                            echo "<div class=\"col-md-6\"><a target=\"_blank\" rel=\"noopener noreferrer\" href=\"".$registro["site"]."\"><p><span class=\"glyphicon glyphicon-check\"></span> Link da documentação</p></a></div>";
                        echo "</div>";
                      echo "</div>";
                    echo "</li>";

                  }

                  echo "<li class=\"list-group-item active\">";
                    echo "<div class=\"row\">";
                      echo "<div class=\"col-md-12\">";
                        echo "<div class=\"col-md-6 vermelho\">API</div>";
                        echo "<div class=\"col-md-6 vermelho\">Documentação</div>";
                      echo "</div>";
                    echo "</div>";
                  echo "</li>";

                echo "</ul>";

                } else {
                    echo "Sem APIs";
                }
            }
            ?>
            <input type="hidden" id="tokenID" name="id" value="<?php echo $a; ?>">          
            </div>
              <div class="col-md-12" style="padding:30px 10px">
                <footer id="footer"></footer>
              </div>	
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>  
    <script src="../assets/js/pagcondominio.js"></script>
    <script type="text/babel" src="../assets/js/react-administrativo.js"></script>
</body>
</html>