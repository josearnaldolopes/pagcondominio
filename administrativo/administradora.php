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
<title>PagCondominio.com | Administradora</title>
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
            <div class="col-md-12" id="page" style="height:20px;"></div>

            <div class="col-md-6 uppercase bold"><h2>Administradora</h2></div>
            <div class="col-md-6 text-right"><h2><a href="" class="btn btn-danger btn-round dataModal" data-id="1" data-toggle="modal" data-target="#Modal"><i class="glyphicon glyphicon-plus"></i></a></h2></div>
            <div class="col-md-12">
            <?php
            // echo "Acesso:".$emailacesso.$_COOKIE["email"].$emaillog.$emailacesso.$chaveacesso.$acesso."?".$acesso;
            if (isset($a)) {
              $sql = "SELECT * FROM administradora WHERE id = '$a'";
              $simples = $conexao->prepare($sql);
              $simples->execute();
              $registro = $simples->fetch();
              $numero = $simples->rowCount();
              
              $numero ? "" : die(header('Location: administradora'));
              $dominioURL = $registro["dominio"] ? $registro["dominio"]."/" : "";

              echo "<ul class=\"list-group\">";

              echo "<li class=\"list-group-item active\">";
                echo "<div class=\"row\">";
                  echo "<div class=\"col-md-12\">";
                    echo "<div class=\"col-md-7 vermelho\"><h4><b>".$registro["nome"]."</b></h4></div>";
                    echo "<div class=\"col-md-5 vermelho text-right\">";
                        echo "<a href=\"\" class=\"btn btn-danger btn-round logoModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#logoModal\" ><i class=\"glyphicon glyphicon-picture\"></i></a> ";
                        echo "<a href=\"\" class=\"btn btn-danger btn-round dataModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#editarAdm\" ><i class=\"glyphicon glyphicon-edit\"></i></a> ";
                        echo $registro["exibicao"] ? "<p class=\"btn btn-danger btn-round exibicao\" data-id=\"$a\" data-banco=\"administradora\" data-liberacao=\"nao\"><i class=\"glyphicon glyphicon-trash\"></i></p>" : "<p class=\"btn btn-danger btn-round exibicao\" data-id=\"$a\" data-banco=\"administradora\" data-liberacao=\"sim\"><i class=\"glyphicon glyphicon-refresh\"></i></p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</li>";

              echo "<li class=\"list-group-item\">";
              echo "<div class=\"row\">";
                echo "<div class=\"col-md-12 lista\">";
                    echo "<div class=\"col-md-12\"><b>Responsável:</b> ".$registro["responsavel"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Telefone: </b> ".$registro["telefone"]."</div>";
                    echo "<div class=\"col-md-12\"><b>CNPJ: </b>".$registro["cnpj"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Email: </b>".descriptografar($registro["email"])."</div>";
                    echo "<div class=\"col-md-12\"><b>URL: </b><a href=\"https://pagcondominio.com/administradora/".$dominioURL."\" target=\"_blank\" rel=\”noopener\”.> https://pagcondominio.com/administradora/".$dominioURL." <i class=\"glyphicon glyphicon-share\"></i></a></div>";
                echo "</div>";
              echo "</div>";
              echo "</li>";

              echo "</ul>";
              
            } else {
              $sql = "SELECT administradora.id,administradora.nome,administradora.condominios,administradora.exibicao FROM administradora ORDER BY exibicao DESC, nome ASC";
              $simples = $conexao->prepare($sql);
              $simples->execute();
              $resultado = $simples->fetch();
              $numero = $simples->rowCount();

              if ($numero > 0) {
                echo "<ul class=\"list-group\">";

                echo "<li class=\"list-group-item active\">";
                  echo "<div class=\"row\">";
                    echo "<div class=\"col-md-12\">";
                      echo "<div class=\"col-md-10 vermelho\">Nome</div>";
                      echo "<div class=\"col-md-2 text-center vermelho\">Condominios</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</li>";

                try {
                  foreach($conexao->query($sql) as $registro) {

                    $sqlRel = "SELECT condominios.id,condominios.condominio,condominios.administradora FROM condominios WHERE condominios.administradora LIKE ".$registro["id"]." AND exibicao = '1'";
                    $simplesRel = $conexao->prepare($sqlRel);
                    $simplesRel->execute();
                    $numeroRel = $simplesRel->rowCount();

                    $registro["condominios"] ? $condominios = explode(",", $registro["condominios"]) : $condominios = array();
                    $registro["nome"] = $registro["nome"] ? $registro["nome"] : "-";
                    $admExibicao = $registro["exibicao"] ? "<i class=\"glyphicon glyphicon-ok-sign text-success\" title=\"Liberado\" alt=\"Liberado\"></i> ".$registro["nome"] : "<i class=\"glyphicon glyphicon-ban-circle text-warning\" title=\"Desabilitado\" alt=\"Desabilitado\"></i> <b>".$registro["nome"]." (Desabilitado)</b>";

                    echo "<li class=\"list-group-item\">";
                    echo "<div class=\"row\">";
                      echo "<div class=\"col-md-12 lista\">";
                          echo "<div class=\"col-md-10\"><a href=\"administradora-".$registro["id"]."\">".$admExibicao."</a></div>";
                          echo "<div class=\"col-md-2 text-center\">"."<span class=\"badge\">".$numeroRel."</span></div>";
                      echo "</div>";
                    echo "</div>";
                    echo "</li>";
                  }
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }

                  echo "<li class=\"list-group-item active\">";
                    echo "<div class=\"row\">";
                      echo "<div class=\"col-md-12\">";
                        echo "<div class=\"col-md-10 vermelho\">Nome</div>";
                        echo "<div class=\"col-md-2 text-center vermelho\">Condominios</div>";
                      echo "</div>";
                    echo "</div>";
                  echo "</li>";

                  echo "</ul>";

                  
                } else {
                    echo "<div class=\"alert alert-warning text-center\" role=\"alert\">Sem Administradoras Cadastradas</div>";
                }
            }
            ?>            
            </div>
            <div class="col-md-5">
              <?php
              if (isset($a)) {
              echo "<ul class=\"list-group\">";

              echo "<li class=\"list-group-item active\">";
                echo "<div class=\"row\">";
                  echo "<div class=\"col-md-12\">";
                    echo "<div class=\"col-md-8 vermelho\"><h4>Condominios</h4></div>";
                    echo "<div class=\"col-md-4 vermelho  text-right\"><a href=\"condominio\" class=\"btn btn-danger btn-round\"><i class=\"glyphicon glyphicon-plus\"></i></a></div>";
                  echo "</div>";
                echo "</div>";
              echo "</li>";

              if ($registro["id"]) {
                  $sqlRel = "SELECT condominios.id,condominios.condominio,condominios.administradora FROM condominios WHERE condominios.administradora LIKE $a AND exibicao = '1'";
                  $simples = $conexao->prepare($sqlRel);
                  $simples->execute();
                  $numero = $simples->rowCount();
                } else {
                  $numero = 0;
                }
                
                if ($numero > 0) {

                    foreach($conexao->query($sqlRel) as $registroRel) {
                      echo "<li class=\"list-group-item\">";
                      echo "<div class=\"row\">";
                        echo "<div class=\"col-md-12 lista\">";
                          echo "<div class=\"col-md-12\"> <a href=\"condominio-".$registroRel["id"]."\"><i class=\"glyphicon glyphicon-ok\"></i> ".$registroRel["condominio"]."</a></div>";
                        echo "</div>";
                        echo "</div>";
                      echo "</li>";
                    }

                } else {
                  echo "<div class=\"alert alert-warning text-center\" role=\"alert\" data-rel=\"true\">Sem condominios relacionados</div>";
                }
                echo "</ul>";

              // Paineis adicionais
              echo "<ul class=\"list-group\">";

                echo "<li class=\"list-group-item active\">";
                  echo "<div class=\"row\">";
                    echo "<div class=\"col-md-12\">";
                      echo "<div class=\"col-md-7 vermelho\"><h4>Receita Garantida</h4></div>";
                      echo "<div class=\"col-md-5 vermelho text-right\">";
                          //echo "<a href=\"\" class=\"btn btn-danger btn-round logoModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#logoModal\" ><i class=\"glyphicon glyphicon-picture\"></i></a> ";
                          //echo "<a href=\"\" class=\"btn btn-danger btn-round dataModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#editarAdm\" ><i class=\"glyphicon glyphicon-edit\"></i></a> ";
                          //echo $registro["exibicao"] ? "<p class=\"btn btn-danger btn-round exibicao\" data-id=\"$a\" data-banco=\"administradora\" data-liberacao=\"nao\"><i class=\"glyphicon glyphicon-trash\"></i></p>" : "<p class=\"btn btn-danger btn-round exibicao\" data-id=\"$a\" data-banco=\"administradora\" data-liberacao=\"sim\"><i class=\"glyphicon glyphicon-refresh\"></i></p>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</li>";

                echo "<li class=\"list-group-item\">";
                echo "<div class=\"row\">";
                  echo "<div class=\"col-md-12 lista\">";
                      echo "<div class=\"col-md-12\"><b>Informação:</b> {Inserir informações no futuro}</div>";
                      // echo "<div class=\"col-md-12\"><b>Responsável:</b> ".$registro["responsavel"]."</div>";
                  echo "</div>";
                echo "</div>";
                echo "</li>";

              echo "</ul>";

              echo "<ul class=\"list-group\">";

                echo "<li class=\"list-group-item active\">";
                  echo "<div class=\"row\">";
                    echo "<div class=\"col-md-12\">";
                      echo "<div class=\"col-md-7 vermelho\"><h4>Parcelamento</h4></div>";
                      echo "<div class=\"col-md-5 vermelho text-right\">";
                          //echo "<a href=\"\" class=\"btn btn-danger btn-round logoModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#logoModal\" ><i class=\"glyphicon glyphicon-picture\"></i></a> ";
                          //echo "<a href=\"\" class=\"btn btn-danger btn-round dataModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#editarAdm\" ><i class=\"glyphicon glyphicon-edit\"></i></a> ";
                          //echo $registro["exibicao"] ? "<p class=\"btn btn-danger btn-round exibicao\" data-id=\"$a\" data-banco=\"administradora\" data-liberacao=\"nao\"><i class=\"glyphicon glyphicon-trash\"></i></p>" : "<p class=\"btn btn-danger btn-round exibicao\" data-id=\"$a\" data-banco=\"administradora\" data-liberacao=\"sim\"><i class=\"glyphicon glyphicon-refresh\"></i></p>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</li>";

                echo "<li class=\"list-group-item\">";
                echo "<div class=\"row\">";
                  echo "<div class=\"col-md-12 lista\">";
                      echo "<div class=\"col-md-12\"><b>Informação:</b> {Inserir informações no futuro}</div>";
                      // echo "<div class=\"col-md-12\"><b>Responsável:</b> ".$registro["responsavel"]."</div>";
                  echo "</div>";
                echo "</div>";
                echo "</li>";

              echo "</ul>";

              }
              echo "</ul>";
              ?>
            </div>
            <div class="col-md-7">
              <?php
              if (isset($a)) {
              echo "<ul class=\"list-group\">";

              echo "<li class=\"list-group-item active\">";
                echo "<div class=\"row\">";
                  echo "<div class=\"col-md-12\">";
                    echo "<div class=\"col-md-9 vermelho\"><h4>Arquivos enviados</h4></div>";
                    echo "<div class=\"col-md-3 vermelho  text-right\"><a href=\"\" class=\"btn btn-danger btn-round remessaModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#remessaModal\" ><i class=\"glyphicon glyphicon-file\"></i></a></div>";
                  echo "</div>";
                echo "</div>";
              echo "</li>";

              if ($registro["id"]) {
                  $sqlRemessa = "SELECT uploads.id,uploads.data,uploads.arquivo,uploads.pasta,uploads.tipo,uploads.condominio FROM uploads WHERE uploads.administradora = '$a' AND tipo = 'remessa' ORDER BY id DESC";
                  $simples = $conexao->prepare($sqlRemessa);
                  $simples->execute();
                  $numero = $simples->rowCount();
                } else {
                  $numero = 0;
                }

                if ($numero > 0) {

                    foreach($conexao->query($sqlRemessa) as $registroRemessa) {

                      if ($registroRemessa["condominio"] <> "administradora") {
                        $Cond = $conexao->prepare("SELECT * FROM condominios WHERE id = ".$registroRemessa["condominio"]."");
                        $Cond->execute();
                        $registroCond = $Cond->fetch();
                        $regCond = $registroCond["condominio"];
                      } else {
                        $regCond = "<b>Pela Administradora</b>";
                      }
                        $data = date_format(date_create("".$registroRemessa["data"].""),"d/m/Y H:i:s");

                      echo "<li class=\"list-group-item\">";
                      echo "<div class=\"row\">";
                        echo "<div class=\"col-md-12 lista\">";
                          //echo "<div class=\"col-md-4\"> <a href=\"arquivo-".$registroRemessa["pasta"].$registroRemessa["arquivo"]."\"><i class=\"glyphicon glyphicon-file\"></i> ? ".$registroRemessa["arquivo"].$registroRemessa["pasta"].$registroRemessa["arquivo"]."</a></div>";
                          echo "<div class=\"col-md-4\"> <a href=\"\" data-id=\"".$registroRemessa["arquivo"]."\" data-toggle=\"modal\" data-target=\"#cnab\"><i class=\"glyphicon glyphicon-file\"></i> ".$registroRemessa["arquivo"]."</a></div>";
                        echo "<div class=\"col-md-4\">".$regCond."</div>";
                          echo "<div class=\"col-md-4\">".$data."</div>";
                        echo "</div>";
                        echo "</div>";
                      echo "</li>";
                    }

                } else {
                  echo "<div class=\"alert alert-warning text-center\" role=\"alert\" data-rel=\"true\">Sem Arquivos enviados</div>";
                }
              }
              echo "</ul>";
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
            <h3 class="modal-title text-center" id="ModalLabel">Adicionar Administradora</h3>
          </div>
          <div class="modal-body">
          <h2 class="modal-title avisoAdm text-center">Cadastrado com sucesso</h2>
               <form method="post" action="">
                  <div class="row formCadAdm">
                    <div class="form-group col-md-6">
                      <label for="nome">Nome</label>
                      <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="responsavel">Responsável</label>
                      <input type="text" name="responsavel" class="form-control" id="responsavel" placeholder="Responsável" required>                   
                    </div>                    
                    <div class="form-group col-md-6">
                      <label for="cnpj">CNPJ</label>
                      <input type="text" name="cnpj" class="form-control cnpj" id="cnpj" placeholder="CNPJ" required>                    
                    </div>
                    <div class="form-group col-md-6">
                      <label for="telefone">Telefone</label>
                      <input type="text" name="telefone" class="form-control telefone" id="telefone" placeholder="Telefone" required>                   
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Email" required>                   
                    </div>                    
                    <div class="form-group text-center col-md-12">
                      <button type="button"  class="btn btn-danger btn-round btn-block addAdm" name="botao" value="Cadastrar"><i class="glyphicon glyphicon-ok"></i> Cadastrar Administradora</button>
                    </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editarAdm" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">Editar Administradora</h3>
          </div>
          <div class="modal-body">
          <h2 class="modal-title avisoAdm text-center">Alterada com sucesso</h2>
               <form method="post" action="">
                  <div class="row formCadAdm">
                  <div class="form-group col-md-6">
                      <label for="nomeEdc">Nome</label>
                      <input type="text" name="nome" id="nomeEdc" class="form-control" placeholder="Nome" value="<?php echo $registro["nome"]; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="responsavelEdc">Responsável</label>
                      <input type="text" name="responsavel" id="responsavelEdc" class="form-control" placeholder="Responsável" value="<?php echo $registro["responsavel"]; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="telefoneEdc">Telefone</label>
                      <input type="text" name="telefone" class="form-control telefone" id="telefoneEdc" placeholder="Telefone" value="<?php echo $registro["telefone"]; ?>" required>                    
                    </div>
                    <div class="form-group col-md-6">
                      <label for="cnpjEdc">CNPJ</label>
                      <input type="text" name="cnpj" class="form-control cnpj" id="cnpjEdc" placeholder="CNPJ" value="<?php echo $registro["cnpj"]; ?>" required>                   
                    </div>
                    <div class="form-group col-md-6">
                      <label for="emailEdc">Email</label>
                      <input type="text" name="email" class="form-control" id="emailEdc" placeholder="Email" value="<?php echo descriptografar($registro["email"]); ?>" required>                   
                    </div>
                    <div class="form-group col-md-3">
                      <label for="senha">Senha</label>
                      <input type="text" name="email" class="form-control" id="senha" placeholder="Senha" value="<?php echo descriptografar($registro["senha"]); ?>" required>                   
                    </div>
                    <div class="form-group col-md-3">
                      <label for="gerarSenha">Gerar</label>
                      <button type="button" class="btn btn-danger btn-round btn-block gerarSenha" id="gerarSenha" name="botao" value="Gerar"><i class="glyphicon glyphicon-pencil"></i> Gerar</button>                   
                    </div>
                    <div class="form-group col-md-6">
                      <label for="url">Dominio</label>
                      <p style="padding-top:8px" id="url">https://pagcondominio.com/administradora/</p>                  
                    </div>
                    <div class="form-group col-md-6">
                      <label for="dominio">URL Personalizada</label>
                      <input type="text" name="email" class="form-control" id="dominio" placeholder="URL Personalizada" value="<?php echo $registro["dominio"]; ?>" required>                   
                    </div>
                    <div class="form-group text-center col-md-12">
                      <button type="button" class="btn btn-danger btn-round btn-block editarAdm" name="botao" value="Salvar"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
                      <input type="hidden" name="id" id="idEdc" value="<?php echo $a; ?>" required>                   
                    </div>
                  </div>
                </form>
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
                      <input type="hidden" name="administradora" value="<?php echo $registro["id"]; ?>">
                      <input type="hidden" name="condominio" value="">
                      <input type="hidden" name="origem" value="administrativo">
                      <input type="hidden" name="tipo" value="remessa">
                      <input type="hidden" name="email" value="<?php echo $emailacesso; ?>">
                    </div>              
                    <div class="form-group text-left col-md-3">
                      <label for="arquivo">Envio</label>
                      <button type="submit" class="btn btn-danger btn-round btn-block arquivoEnvia" name="botao" value="Enviar"><i class="glyphicon glyphicon-send"></i></button>
                    </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="cnab" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">CNAB</h3>
          </div>
          <div class="modal-body">
          <h2 class="modal-title text-center">Arquivo</h2>
          <a href="" class="btn btn-danger btn-round"><i class="glyphicon glyphicon-plus"></i> Processar CNAB</a>
          <!--
               <form method="post" action="../app/upload" enctype="multipart/form-data">
                  <div class="row formCadAdm">
                    <div class="form-group col-md-9 custom-file">
                      <label for="arquivo">Arquivo</label>
                      <input type="file" name="arquivo" id="arquivo" class="custom-file-input" accept=".txt,.rem" required>
                      <input type="hidden" name="administradora" value="<?php echo $registro["id"]; ?>">
                      <input type="hidden" name="condominio" value="">
                      <input type="hidden" name="origem" value="administrativo">
                      <input type="hidden" name="tipo" value="remessa">
                      <input type="hidden" name="email" value="<?php echo $emailacesso; ?>">
                    </div>              
                    <div class="form-group text-left col-md-3">
                      <label for="arquivo">Envio</label>
                      <button type="submit" class="btn btn-danger btn-round btn-block arquivoEnvia" name="botao" value="Enviar"><i class="glyphicon glyphicon-send"></i></button>
                    </div>
                  </div>
                </form>
            -->
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="logoModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">Enviar Logo</h3>
          </div>
          <div class="modal-body">
          <h2 class="modal-title avisoAdm text-center">Carregamento feito com sucesso</h2>
               <form method="post" action="../app/upload" enctype="multipart/form-data">
                  <div class="row formCadAdm">
                    <div class="form-group col-md-9 custom-file">
                      <label for="arquivo">Arquivo (.jpg ou .png)</label>
                      <input type="file" name="arquivo" id="arquivo" class="custom-file-input" accept=".jpg,.png" required>
                      <input type="hidden" name="administradora" value="<?php echo $registro["id"]; ?>">
                      <input type="hidden" name="origem" value="administrativo">
                      <input type="hidden" name="tipo" value="imagem">
                      <input type="hidden" name="email" value="<?php echo $emailacesso; ?>">
                    </div>              
                    <div class="form-group text-left col-md-3">
                      <label for="arquivo">Envio</label>
                      <button type="submit" class="btn btn-danger btn-round btn-block arquivoEnvia" name="botao" value="Enviar"><i class="glyphicon glyphicon-send"></i> Enviar</button>
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