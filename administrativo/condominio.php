<?php
/*
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
*/
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
<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
<link href="../assets/css/pagcondominio.css" rel="stylesheet">
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

            <div class="col-md-6 uppercase"><h2>Condomínio</h2></div>
            <div class="col-md-6 text-right"><h2><a href="" class="btn btn-danger btn-round dataModal" data-toggle="modal" data-target="#Modal"><i class="glyphicon glyphicon-plus"></i></a></h2></div>
            <div class="col-md-12">
            <?php
            if (isset($a)) {
              // $sql = "SELECT condominios.id,condominios.condominio,condominios.exibicao,condominios.boleto,boleto.id FROM condominios WHERE id = '$a' AND exibicao = '1' INNER JOIN boleto ON condominios.boleto = boleto.id";
              // $sql = "SELECT * FROM condominios FULL OUTER JOIN boleto ON condominios.boleto = boleto.id WHERE condominios.id = '$a' AND condominios.exibicao = '1'";
              // $sql = "SELECT condominios.id,condominios.condominio,condominios.exibicao,condominios.boleto,boleto.id,boleto.nome FROM condominios FULL OUTER JOIN boleto ON condominios.boleto = boleto.id WHERE condominios.id = '$a' AND condominios.exibicao = '1'";
              
              
              // $sql = "SELECT * FROM condominios WHERE condominios.id = '$a' AND condominios.exibicao = '1'";
              $sql = "SELECT * FROM condominios WHERE condominios.id = '$a'";
              $simples = $conexao->prepare($sql);
              $simples->execute();
              $registro = $simples->fetch();
              $numero = $simples->rowCount();

              $sql2 = "SELECT * FROM administradora WHERE id = '".$registro["administradora"]."'";
              $simples2 = $conexao->prepare($sql2);
              $simples2->execute();
              $registro2 = $simples2->fetch();
              $numero2 = $simples2->rowCount();

              $sqlBol = "SELECT * FROM boleto WHERE id = '".$registro["boleto"]."'";
              $simplesBol = $conexao->prepare($sqlBol);
              $simplesBol->execute();
              $registroBol = $simplesBol->fetch();
              $numeroBol = $simplesBol->rowCount();
              $registroBol["nome"] = $registroBol["nome"] ? $registroBol["nome"] : "-";

              echo "<ul class=\"list-group\">";

              echo "<li class=\"list-group-item active\">";
                echo "<div class=\"row\">";
                  echo "<div class=\"col-md-12\">";
                    echo "<div class=\"col-md-7 vermelho\"><h4><b>".$registro["condominio"]."</b></h4></div>";
                    echo "<div class=\"col-md-5 vermelho text-right\">";
                        echo "<a href=\"\" class=\"btn btn-danger btn-round remessaModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#remessaModal\" ><i class=\"glyphicon glyphicon-file\"></i></a> ";
                        echo "<a href=\"\" class=\"btn btn-danger btn-round dataModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#editarCond\" ><i class=\"glyphicon glyphicon-edit\"></i></a> ";
                        echo "<p class=\"btn btn-danger btn-round exibicao\" data-id=\"$a\" data-banco=\"condominios\"><i class=\"glyphicon glyphicon-trash\"></i></p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</li>";

              echo "<li class=\"list-group-item\">";
              echo "<div class=\"row\">";
                echo "<div class=\"col-md-12 lista\">";
                    // echo "<div class=\"col-md-12\"><b>Sindico:</b> ".$registro["sindico"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Telefone: </b> ".$registro["telefone"]."</div>";
                    echo "<div class=\"col-md-12\"><b>CNPJ: </b>".$registro["documento"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Logradouro: </b>".$registro["logradouro"].", ".$registro["numero"]."</div>";
                    echo "<div class=\"col-md-12\"><b>CEP: </b>".$registro["cep"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Bairro: </b>".$registro["bairro"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Cidade/Estado: </b>".$registro["cidade"]."/".$registro["estado"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Administradora: </b> <a href=\"administradora-".$registro2["id"]."\"> ".$registro2["nome"]." <i class=\"glyphicon glyphicon-share\"></i></a></div>";
                  

                    echo "<div class=\"col-md-12\"><b>Boleto: </b> ".$registroBol["nome"]." </div>";

                echo "</div>";
              echo "</div>";
              echo "</li>";

              echo "</ul>";
            } else {
              
              // $sql = "SELECT condominios.id,condominios.condominio,condominios.liberacao,chave,administradora FROM condominios WHERE exibicao = '1' ORDER BY id DESC";
              $sql = "SELECT condominios.id,condominios.condominio,condominios.liberacao,chave,administradora FROM condominios ORDER BY id DESC";
              $simples = $conexao->prepare($sql);
              $simples->execute();
              // $registro = $simples->fetch();
              $numero = $simples->rowCount();
              // echo $numero;
              
              if ($numero > 0) {
                // Saída dos dados
                $num = 0;
                echo "<ul class=\"list-group\">";
                echo "<li class=\"list-group-item active\">";
                  echo "<div class=\"row\">";
                    echo "<div class=\"col-md-12\">";
                      echo "<div class=\"col-md-3 vermelho\">Nome</div>";
                      echo "<div class=\"col-md-3 vermelho\">Liberação</div>";
                      echo "<div class=\"col-md-4 vermelho\">Administradora</div>";
                      echo "<div class=\"col-md-2 vermelho text-center\">Pagamentos</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</li>";

                while($registro = $simples->fetch(PDO::FETCH_ASSOC)) {
                  
                  $num = $num+1;
                  
                  switch ($registro["liberacao"]) {
                    case 0:
                        $liberacao = "-";
                        $status = "<i class=\"glyphicon glyphicon-exclamation-sign text-warning\" title=\"Observar\" alt=\"Observar\"></i>";
                        break;
                      case 1:
                        $liberacao = "Em homologação";
                        $status = "<i class=\"glyphicon glyphicon-ban-circle text-warning\" title=\"Avaliando\" alt=\"Avaliando\"></i>";
                        break;
                    case 2:
                        $liberacao = "Aprovado para Produção";
                        $status = "<i class=\"glyphicon glyphicon-ok-sign text-success\" title=\"Liberado\" alt=\"Liberado\"></i>";
                        break;
                  }

                  $sql2 = "SELECT * FROM administradora WHERE id = '".$registro["administradora"]."'";
                  $simples2 = $conexao->prepare($sql2);
                  $simples2->execute();
                  $registro2 = $simples2->fetch();
                  $registro2["nome"] = $registro2["nome"] ? $registro2["nome"] : " - ";
                  $admNome = $registro2["exibicao"] ? $registro2["nome"] : "<b>(".$registro2["nome"]." Desabilitado!)</b>";

                  echo "<li class=\"list-group-item\">";

                  echo "<div class=\"row\">";
                    echo "<div class=\"col-md-12 lista\">";
                        echo "<div class=\"col-md-3\"><a href=\"condominio-".$registro["id"]."\"><p>".$status." ".$registro["condominio"]."</p></a></div>";
                        echo "<div class=\"col-md-3\">".$liberacao."</div>";
                        echo "<div class=\"col-md-4\"><a href=\"administradora-".$registro2["id"]."\"> ".$admNome."</a></div>";
                        echo "<div class=\"col-md-2 text-center\"><a href=\"\" class=\"btn btn-danger btn-round dataModal\" data-id=\"1\" data-toggle=\"modal\" data-target=\"#pagamentos\" ><i class=\"glyphicon glyphicon-usd\"></i></a></div>";
                    echo "</div>";
                  echo "</div>";
                  echo "</li>";
                  }
                  echo "<li class=\"list-group-item active\">";
                  echo "<div class=\"row\">";
                    echo "<div class=\"col-md-12\">";
                      echo "<div class=\"col-md-3 vermelho\">Nome</div>";
                      echo "<div class=\"col-md-3 vermelho\">Liberação</div>";
                      echo "<div class=\"col-md-4 vermelho\">Administradora</div>";
                      echo "<div class=\"col-md-2 vermelho text-center\">Pagamentos</div>";
                      echo "</div>";
                  echo "</div>";
                echo "</li>";
                echo "</ul>";
                } else {
                    echo "Sem Condomínios Cadastrados";
                }

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
            <h3 class="modal-title text-center" id="ModalLabel">Adicionar Condomínio</h3>
          </div>
          <div class="modal-body form-row row">
          
          <div class="alert alert-success text-center avisoModal col-md-10 col-md-offset-1 " role="alert">
            Condomínio Cadastrado!
          </div>

          <form method="post" class="formAddCond" action="">
            <div class="form-group col-md-6">
              <label for="NomeCond">Nome do Condomínio</label>
              <input type="text" name="condominio" class="form-control" id="condominio" placeholder="Nome do Condomínio" required>
            </div>
            <div class="form-group col-md-6">
              <label for="documento">Documento</label>
              <input type="text" name="documento" class="form-control cnpj" id="documento" placeholder="Documento">
            </div>
            <div class="form-group col-md-3">
              <label for="cep">CEP</label>
              <input type="text" name="cep" id="cep" class="form-control cep" placeholder="CEP" required>
            </div>
            <div class="form-group col-md-6">
              <label for="logradouro">Logradouro</label>
              <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Endereço" required>
            </div>
            <div class="form-group col-md-3">
              <label for="numero">Número</label>
              <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" required>
            </div>
            <div class="form-group col-md-6">
              <label for="bairro">Bairro</label>
              <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" required>
            </div>
            <div class="form-group col-md-4">
              <label for="cidade">Cidade</label>
              <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" required>
            </div>
            <div class="form-group col-md-2">
              <label for="estado">UF</label>
              <input type="text" name="estado" id="estado" class="form-control uf" placeholder="UF" required>
            </div>
            <div class="form-group col-md-6">
              <label for="sindico">Sindico</label>
              <input type="text" name="sindico" id="sindico" class="form-control" placeholder="Sindico" required>
            </div>
            <div class="form-group col-md-6">
              <label for="telefone">Telefone Síndico</label>
              <input type="text" name="telefone" id="telefone" class="form-control telefone" placeholder="Telefone Síndico" required>
            </div>
            <div class="form-group col-md-4">
              <label for="valor">Valor</label>
              <input type="text" name="valor" id="valor" class="form-control money" placeholder="Valor" required>
            </div>
            <div class="form-group col-md-4">
              <label for="taxa">Taxa</label>
              <input type="text" name="taxa" id="taxa" class="form-control porcentagem" placeholder="Taxa" required>
            </div>
            <div class="form-group col-md-4">
              <label for="porcentagem">Porcentagem</label>
              <input type="text" name="porcentagem" id="porcentagem" class="form-control porcentagem" placeholder="Porcentagem" required>
            </div>
            <div class="form-group col-md-4">
              <label for="banco">Banco</label>
              <input type="text" name="banco" class="form-control" id="banco" placeholder="Banco">                   
            </div>
            <div class="form-group col-md-4">
              <label for="agencia">Agência</label>
              <input type="text" name="agencia" class="form-control" id="agencia" placeholder="Agência">                   
            </div>
            <div class="form-group col-md-4">
              <label for="conta">Conta</label>
              <input type="text" name="conta" class="form-control" id="conta" placeholder="Conta">                   
            </div>
            <div class="form-group col-md-6">
              <label for="administradora">Administradora</label>
              <select name="administradora" id="administradora" class="form-control" required>
                <option value="">Escolha</option>
                <?php
                $sqlAdm = "SELECT administradora.id,administradora.nome,administradora.condominios,administradora.exibicao FROM administradora WHERE exibicao = '1' ORDER BY nome ASC";
                $simplesAdm = $conexao->prepare($sqlAdm);
                $simplesAdm->execute();
                // $resultado = $simples->fetch();
                // $numero = $simples->rowCount();
                try {
                  foreach($conexao->query($sqlAdm) as $registroAdm) {
                    $registroAdm["condominios"] ? $condominiosAdm = explode(",", $registroAdm["condominios"]) : $condominiosAdm = array();
                    $registroAdm["nome"] = $registroAdm["nome"] ? $registroAdm["nome"] : "-";
                          echo "<option value=\"".$registroAdm["id"]."\">".$registroAdm["nome"]."</option>";
                  }
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
                ?>
              </select>                   
            </div>
            <div class="form-group col-md-6">
              <label for="liberacao">Liberação</label>
              <select name="liberacao" id="liberacao" class="form-control" required>
                <option value="0">Escolha</option>
                <option value="1">Em homologação</option>
                <option value="2">Aprovado para produção</option>
              </select>                   
            </div>
          </div>
          <div class="modal-footer">
          <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-danger btn-round btn-block addCond" name="botao" value="Alterar"><i class="glyphicon glyphicon-ok"></i>  Adicionar Condomínio</button>
            </div>
          </div>
          </form>

        </div>
      </div>
    </div>

    <div class="modal fade" id="editarCond" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">Editar Condomínio</h3>
          </div>
          <div class="modal-body form-row row">
          
          <div class="alert alert-success text-center avisoModal col-md-10 col-md-offset-1 " role="alert">
            Condomínio Cadastrado!
          </div>

          <form method="post" class="formAddCond" action="">
            <div class="form-group col-md-6">
              <label for="NomeCond">Nome do Condomínio</label>
              <input type="text" name="condominio" class="form-control" id="condominioEdc" placeholder="Nome do Condomínio" value="<?php echo $registro["condominio"]; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="documento">Documento</label>
              <input type="text" name="documento" class="form-control cnpj" id="documentoEdc" placeholder="Documento" value="<?php echo $registro["documento"]; ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="cep">CEP</label>
              <input type="text" name="cep" id="cepEdc" class="form-control cep" placeholder="CEP" value="<?php echo $registro["cep"]; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="logradouro">Logradouro</label>
              <input type="text" name="logradouro" id="logradouroEdc" class="form-control" placeholder="Endereço" value="<?php echo $registro["logradouro"]; ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="numero">Número</label>
              <input type="text" name="numero" id="numeroEdc" class="form-control" placeholder="Número" value="<?php echo $registro["numero"]; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="bairro">Bairro</label>
              <input type="text" name="bairro" id="bairroEdc" class="form-control" placeholder="Bairro" value="<?php echo $registro["bairro"]; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="cidade">Cidade</label>
              <input type="text" name="cidade" id="cidadeEdc" class="form-control" placeholder="Cidade" value="<?php echo $registro["cidade"]; ?>">
            </div>
            <div class="form-group col-md-2">
              <label for="estado">UF</label>
              <input type="text" name="estado" id="estadoEdc" class="form-control" placeholder="UF" value="<?php echo $registro["estado"]; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="sindico">Sindico</label>
              <input type="text" name="sindico" id="sindicoEdc" class="form-control" placeholder="Sindico" value="<?php echo $registro["sindico"]; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="telefone">Telefone</label>
              <input type="text" name="telefone" id="telefoneEdc" class="form-control telefone" placeholder="Telefone" value="<?php echo $registro["telefone"]; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="valor">Valor</label>
              <input type="text" name="valor" id="valorEdc" class="form-control money" placeholder="Valor" value="<?php echo $registro["valor"]; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="taxa">Taxa</label>
              <input type="text" name="taxa" id="taxaEdc" class="form-control" placeholder="Taxa" value="<?php echo $registro["taxa"]; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="porcentagem">Porcentagem</label>
              <input type="text" name="porcentagem" id="porcentagemEdc" class="form-control" placeholder="Porcentagem" value="<?php echo $registro["porcentagem"]; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="banco">Banco</label>
              <input type="text" name="banco" class="form-control" id="bancoEdc" placeholder="Banco" value="<?php echo $registro["banco"]; ?>">                   
            </div>
            <div class="form-group col-md-4">
              <label for="agencia">Agência</label>
              <input type="text" name="agencia" class="form-control" id="agenciaEdc" placeholder="Agência" value="<?php echo $registro["agencia"]; ?>">                   
            </div>
            <div class="form-group col-md-4">
              <label for="conta">Conta</label>
              <input type="text" name="conta" class="form-control" id="contaEdc" placeholder="Conta" value="<?php echo $registro["conta"]; ?>">                   
            </div>
            <div class="form-group col-md-4">
              <label for="administradora">Administradora</label>
              <select name="administradora" id="administradoraEdc" class="form-control" required>
                <option value="">Escolha</option>
                <?php
                $sqlAdm2 = "SELECT administradora.id,administradora.nome,administradora.condominios,administradora.exibicao FROM administradora WHERE exibicao = '1' ORDER BY nome ASC";
                $simplesAdm2 = $conexao->prepare($sqlAdm2);
                $simplesAdm2->execute();
                try {
                  foreach($conexao->query($sqlAdm2) as $registroAdm2) {
                    $registroAdm2["condominios"] ? $condominiosAdm2 = explode(",", $registroAdm2["condominios"]) : $condominiosAdm2 = array();
                    $registroAdm2["nome"] = $registroAdm2["nome"] ? $registroAdm2["nome"] : "-";
                    $select = ($registro["administradora"] == $registroAdm2["id"] ) ? "selected" : "";
                          echo "<option $select value=\"".$registroAdm2["id"]."\">".$registroAdm2["nome"]."</option>";
                  }
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
                ?>
              </select>                   
            </div>
            <div class="form-group col-md-4">
              <label for="liberacaoEdc">Liberação</label>
              <select name="liberacao" id="liberacaoEdc" class="form-control" required>
                <option value="0" <?php echo $registro["liberacao"] == '0' ? "selected":""?>>Escolha</option>
                <option value="1" <?php echo $registro["liberacao"] == '1' ? "selected":""?>>Em homologação</option>
                <option value="2" <?php echo $registro["liberacao"] == '2' ? "selected":""?>>Aprovado para produção</option>
              </select>                   
            </div>
            <div class="form-group col-md-4">
              <label for="boleto">Boleto</label>
              <select name="boleto" id="boletoEdc" class="form-control" required>
                <option value="">Escolha Um</option>
                <?php
                $sqlBoleto = "SELECT produtos.id,produtos.nome FROM produtos WHERE tipo = 'boleto' ORDER BY produtos.nome ASC";
                $simplesBoleto = $conexao->prepare($sqlBoleto);
                $simplesBoleto->execute();
                try {
                  foreach($conexao->query($sqlBoleto) as $registroBoleto) {
                    $registroBoleto["condominios"] ? $condominiosBoleto = explode(",", $registroBoleto["condominios"]) : $condominiosBoleto = array();
                    $registroBoleto["nome"] = $registroBoleto["nome"] ? $registroBoleto["nome"] : "-";
                    $select = ($registro["boleto"] == $registroBoleto["id"] ) ? "selected" : "";
                          echo "<option $select value=\"".$registroBoleto["id"]."\">".$registroBoleto["nome"]."</option>";
                  }
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
                ?>
              </select>                   
            </div>
          </div>
          <div class="modal-footer">
          <div class="col-md-12 text-center">
                <button type="button" class="btn btn-danger btn-round btn-block editarCon" name="botao" value="Alterar"><i class="glyphicon glyphicon-ok"></i>  Editar condomínio</button>
                <input type="hidden" name="id" id="idEdc" value="<?php echo $a; ?>" required>
            </div>
          </div>
          </form>

        </div>
      </div>
    </div>

    <div class="modal fade" id="pagamentos" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">Pagamentos</h3>
          </div>
          <div class="modal-body form-row row">
          
            <div class="col-md-10 col-md-offset-1 " role="alert">
                <h2>Sem Pagamentos no momento</h2>
            </div>

        </div>
      </div>
    </div>
    </div>

    <div class="modal fade" id="remessaModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">Enviar Remessa</h3>
          </div>
          <div class="modal-body">
          <h2 class="modal-title avisoAdm text-center">Carregamento feito com sucesso</h2>
               <form method="post" action="../app/upload" enctype="multipart/form-data">
                  <div class="row formCadAdm">
                    <div class="form-group col-md-9 custom-file">
                      <label for="arquivo">Arquivo</label>
                      <input type="file" name="arquivo" id="arquivo" class="custom-file-input" accept=".txt,.rem" required>
                      <input type="hidden" name="administradora" value="<?php echo $registro["administradora"]; ?>">
                      <input type="hidden" name="condominio" value="<?php echo $a; ?>">
                      <input type="hidden" name="origem" value="administrativo">
                      <input type="hidden" name="tipo" value="remessa">
                      <input type="hidden" name="email" value="<?php echo $emailacesso; ?>">
                    </div>              
                    <div class="form-group text-left col-md-3">
                      <label for="arquivo">Enviar</label>
                      <button type="submit" class="btn btn-danger btn-round btn-block arquivoEnvia" name="botao" value="Enviar"><i class="glyphicon glyphicon-send"></i></button>
                    </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.mask.min.js"></script>  
    <script src="../assets/js/pagcondominio.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/babel" src="../assets/js/react-administrativo.js"></script>
    <script>
        //------ MASK ------//
        //https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.data').mask('00/00/0000');
        $('.hora').mask('00:00:00');
        $('.datahora').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.money').mask('#.##0,00', {reverse: true});
        $('.numero').mask('0#');
        $('.porcentagem').mask('##0,00%', {reverse: true});
        $('.uf').mask('AA');

        var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('.telefone').mask(SPMaskBehavior, spOptions);
    </script>
</body>
</html>