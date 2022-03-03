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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
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
            <div class="col-md-12 uppercase bold"><h2>Condômino</h2></div>
            <div class="col-md-12">
            <?php
              //$sql = "SELECT condominos.id,condominos.erp,condominos.condominio,condominos.bloco,condominos.apartamento,condominos.nome,condominos.email FROM condominos WHERE condominos.status = '1' ORDER BY condominos.id ASC";
              $sql = "SELECT condominos.id,condominos.erp,condominos.condominio,condominos.bloco,condominos.apartamento,condominos.nome,condominos.email,condominos.status FROM condominos ORDER BY condominos.id ASC";
              $simples = $conexao->prepare($sql);
              $simples->execute();
              $numero = $simples->rowCount();

              if ($numero > 0) {
                 echo "<ul class=\"list-group\">";
                 echo "<li class=\"list-group-item active\">";
                  echo "<div class=\"row\">
                          <div class=\"col-md-4\"> Nome </div>
                          <div class=\"col-md-3\"> Condomínio </div>
                          <div class=\"col-md-3\"> Apt./Bloco </div>
                          <div class=\"col-md-1\"> Status </div>
                          <div class=\"col-md-1\"> User </div>
                        </div>";
                 echo "</li>";
                  while($registro = $simples->fetch(PDO::FETCH_ASSOC)) {
                    $status = ($registro["status"] == 2) ? "<i class=\"glyphicon glyphicon-ok-circle text-success\" title=\"Aceitou\" alt=\"Aceitou\"></i>" : "<i class=\"glyphicon glyphicon-ban-circle text-warning\" title=\"Falta aceitar\" alt=\"Falta aceitar\"></i>";
                    echo "
                    <li class=\"list-group-item\">
                      <div class=\"row\">
                        <div class=\"col-md-4\"> <spam class=\"dataModal\" data-id=\"".$registro["id"]."\" data-toggle=\"modal\" data-target=\"#Modal\" title=\"Ver dados\" alt=\"Ver dados\">".$registro["nome"]." - ".descriptografar($registro["email"])."</spam></div>";
                        $condominioId = $registro["condominio"];
                        $sqlCondominio = "SELECT * FROM condominios WHERE condominios.id = '$condominioId'";
                        $simplesCondominio = $conexao->prepare($sqlCondominio);
                        $simplesCondominio->execute();
                        $registroCondominio = $simplesCondominio->fetch();
                        $registroCondominio["condominio"] = $registroCondominio["condominio"] ? $registroCondominio["condominio"] : "-";
                    echo "<div class=\"col-md-3\"> <a href=\"condominio-".$condominioId."\">".$registroCondominio["condominio"]."</a></div>";
                    echo "
                        <div class=\"col-md-3\"> ".$registro["apartamento"]." / ".$registro["bloco"]." </div>
                        <div class=\"col-md-1\"> ".$status." </div>
                        <div class=\"col-md-1\"> <spam class=\"dataModal\" data-id=\"".$registro["id"]."\" data-toggle=\"modal\" data-target=\"#Modal\" ><i class=\"glyphicon glyphicon-user text-danger\"></i></spam></div>
                      </div>
                      </li>
                    ";
                  }
                echo "<li class=\"list-group-item active\">";
                echo "<div class=\"row\">
                        <div class=\"col-md-4\"> Nome </div>
                        <div class=\"col-md-3\"> Condomínio </div>
                        <div class=\"col-md-3\"> Apt./Bloco </div>
                        <div class=\"col-md-1\"> Status </div>
                        <div class=\"col-md-1\"> User </div>
                      </div>";
                 echo "</li>";
                 echo "</ul>";
                } else {
                    echo "<div class=\"alert alert-warning text-center\" role=\"alert\">Sem Condominos Cadastrados</div>";
                }
            ?>
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
            <h2 class="modal-title" id="ModalLabel">Condomino</h2>
          </div>
          <div class="modal-body">
            <p id="IdNoModal"></p>
          </div>
        </div>
      </div>
    </div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>  
    <script src="../assets/js/pagcondominio.js"></script>  
    <script src="../assets/js/jquery.mask.min.js"></script>
    <script src="../assets/js/pagcondominio.js"></script>
    <script type="text/babel" src="../assets/js/react-administrativo.js"></script>
</body>
</html>