<?php
include("../app/variaveis.php");
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
<link href="css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<link href="css/font-awesome.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/pagcondominio.css" rel="stylesheet" id="bootstrap-css">
</head>

<body class="main">
	
<div class="screen"></div>
    <div class="container">
    	<div class="row">
            <div class="col-md-12 interno">
            <?php include("inc/menu.php"); ?>
            <div class="col-md-12" style="height:20px;"></div>

            <div class="col-md-12 uppercase bold"><h2>Síndico</h2><hr></div>

            <div class="col-md-12 vermelho text-right">
            <?php 
             if (isset($a)) {
               echo "<a href=\"sindicos-editar?a=$a\"><i class=\"glyphicon glyphicon-edit\"></i> Editar</a> ";
               echo "<a href=\"sindicos-apagar?a=$a\"><i class=\"glyphicon glyphicon-trash\"></i> Apagar</a> ";
             }
            ?>
            </div>

            <div class="col-md-12">
            <?php
            if (isset($a)) {
              $sql = "SELECT * FROM sindicos WHERE id = '$a'";
              $result = mysqli_query($conexao, $sql);
              $numero = mysqli_num_rows($result);
              $registro = mysqli_fetch_assoc($result);

              echo "<h4><b>".$registro["nome"]."</b></h4>";
              echo "<h6><b>Endereço:</b></h6>";
              echo "<p>".$registro["cep"]." - ".$registro["endereco"].", ".$registro["numero"]." ".$registro["bairro"]." ".$registro["cidade"]."/".$registro["estado"]."</p>";
              echo "<h6><b>Telefone</b></h6>";
              echo "<p>".$registro["telefone"]." ".$registro["celular"]."</p>";
              echo "<p><a href=\"sindicos\"><span class=\"glyphicon glyphicon-circle-arrow-left\"></span> Voltar para a lista</a></p>";
            } else {
              $sql = "SELECT sindicos.id,sindicos.nome,sindicos.condominio FROM sindicos ORDER BY id DESC";
              $result = mysqli_query($conexao, $sql);
              $numero = mysqli_num_rows($result);

              if ($numero > 0) {
                // Saída dos dados
                  $num = 0;
                  while($registro = mysqli_fetch_assoc($result)) {

                    $num = $num+1;

                    echo "<a href=\"?a=".$registro["id"]."\"><p>".$num." - ".$registro["nome"]."  [".$registro["condominio"]."]</p></a>";

                  }
                } else {
                    echo "Sem síndicos cadastrados";
                }
            }
            ?>            
            </div>
            <?php include("inc/rodape.php"); ?>

            </div>
        </div>
        
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>