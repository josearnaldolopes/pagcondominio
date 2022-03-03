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

            <div class="col-md-6 uppercase bold"><h2>ERP</h2></div>
            <div class="col-md-6 uppercase bold text-right"><h2><a href="" class="btn btn-danger btn-round dataModal addERP" data-id="1" data-toggle="modal" data-target="#Modal" ><i class="glyphicon glyphicon-plus"></i></a></h2></div>

            <div class="col-md-12">
            <?php
            if (isset($a)) {
              $sql = "SELECT erp.id,erp.nome,erp.cep,erp.logradouro,erp.numero,erp.bairro,erp.cidade,erp.estado,erp.complemento,erp.documento,erp.telefone,erp.usuario,erp.senha FROM erp WHERE id = '$a'";
              $simples = $conexao->prepare($sql);
              $simples->execute();
              $registro = $simples->fetch();
              $registro["usuario"] = $registro["usuario"] ? $registro["usuario"] : "<i>Sem usuário registrado.</i>";
              $registro["senha"] = $registro["senha"] ? $registro["senha"] : "<i>Sem senha registrada.</i>";
              $usuarioModalERP = $registro["usuario"] ? $registro["usuario"] : "";
              $senhaModalERP = $registro["senha"] ? $registro["senha"] : "";

              echo "<ul class=\"list-group\">";

              echo "<li class=\"list-group-item active\">";
                echo "<div class=\"row\">";
                  echo "<div class=\"col-md-12\">";
                    echo "<div class=\"col-md-7 vermelho\"><h4><b>".$registro["nome"]."</b></h4></div>";
                    echo "<div class=\"col-md-5 vermelho text-right\">";
                        //echo "<a href=\"\" class=\"btn btn-danger btn-round logoModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#logoModal\" ><i class=\"glyphicon glyphicon-picture\"></i></a> ";
                        echo "<a href=\"\" class=\"btn btn-danger btn-round dataModal editarERPModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#ModalEditar\" ><i class=\"glyphicon glyphicon-edit\"></i></a> ";
                        echo "<a href=\"\" class=\"btn btn-danger btn-round dataModal userERPModal\" data-id=\"$a\" data-toggle=\"modal\" data-target=\"#usuario\" ><i class=\"glyphicon glyphicon-user\"></i></a> ";
                        echo $registro["exibicao"] ? "<p class=\"btn btn-danger btn-round exibicao\" data-id=\"$a\" data-banco=\"administradora\" data-liberacao=\"nao\"><i class=\"glyphicon glyphicon-trash\"></i></p>" : "<p class=\"btn btn-danger btn-round exibicao\" data-id=\"$a\" data-banco=\"administradora\" data-liberacao=\"sim\"><i class=\"glyphicon glyphicon-refresh\"></i></p>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</li>";

              echo "<li class=\"list-group-item\">";
              echo "<div class=\"row\">";
                echo "<div class=\"col-md-6 lista\">";
                    echo "<div class=\"col-md-12\"><b>Responsável:</b> ".$registro["nome"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Logradouro: </b> ".$registro["logradouro"]."</div>";
                    echo "<div class=\"col-md-12\"><b>CNPJ: </b>".$registro["documento"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Telefone: </b>".$registro["telefone"]."</div>";
                echo "</div>";
                echo "<div class=\"col-md-6 lista\">";
                    echo "<div class=\"col-md-12\"><b>Usuário: </b>".$registro["usuario"]."</div>";
                    echo "<div class=\"col-md-12\"><b>Senha: </b>".$senhaModalERP."</div>";
                echo "</div>";
              echo "</div>";
              echo "</li>";
              
              echo "</ul>";
              /*
              echo "<h6><b>Token</b></h6>";
              echo "<p class=\"valueToken tokenGerado\">".$registro["token"]."</p>";
              echo "<p><span class=\"gerarToken btn btn-danger btn-round\">Gerar um Token?</span> <span class=\"gravarToken\"></span></p>";
              echo "<p><a href=\"erp\" class=\"btn btn-danger btn-round\"><span class=\"glyphicon glyphicon-circle-arrow-left\"></span> Voltar para a lista</a></p>";
              */              
            } else {
              
              $sql = "SELECT erp.id,erp.nome,logradouro,erp.numero FROM erp ORDER BY erp.id ASC";
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
                        echo "<div class=\"col-md-6 vermelho\">Nome</div>";
                        echo "<div class=\"col-md-6 vermelho\">Endereço</div>";
                      echo "</div>";
                    echo "</div>";
                  echo "</li>";

                    while($registro = $simples->fetch(PDO::FETCH_ASSOC)) {
                      echo "<li class=\"list-group-item\">";

                      echo "<div class=\"row\">";
                        echo "<div class=\"col-md-12 lista\">";
                            echo "<div class=\"col-md-6\"><a href=\"erp-".$registro["id"]."\" class=\"\">".$registro["nome"]."</a></div>";
                            echo "<div class=\"col-md-6\">".$registro["logradouro"].", ".$registro["numero"]."</div>";
                        echo "</div>";
                      echo "</div>";

                      echo "</li>";
                    }

                  echo "<li class=\"list-group-item active\">";
                    echo "<div class=\"row\">";
                      echo "<div class=\"col-md-12\">";
                        echo "<div class=\"col-md-6 vermelho\">Nome</div>";
                        echo "<div class=\"col-md-6 vermelho\">Endereço</div>";
                      echo "</div>";
                    echo "</div>";
                  echo "</li>";

                echo "</ul>";
                } else {
                    echo "Sem ERPs";
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

    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">Cadastrar ERP</h3>
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
                  <label for="documento">Documento</label>
                  <input type="text" name="documento" class="form-control" id="documento" placeholder="Documento" required>                    
                </div>
                <div class="form-group col-md-3">
                  <label for="cep">CEP</label>
                  <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP" required>
                </div>
                <div class="form-group col-md-9">
                  <label for="logradouro">Endereço</label>
                  <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Endereço">
                </div>
                <div class="form-group col-md-3">
                  <label for="numero">Número</label>
                  <input type="text" name="numero" id="numero" class="form-control" placeholder="Num.">
                </div>
                <div class="form-group col-md-9">
                  <label for="complemento">Complemento</label>
                  <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento">
                </div>
                <div class="form-group col-md-5">
                  <label for="bairro">Bairro</label>
                  <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">
                </div>
                <div class="form-group col-md-5">
                  <label for="cidade">Cidade</label>
                  <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade">
                </div>
                <div class="form-group col-md-2">
                  <label for="estado">Estado</label>
                  <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado">
                </div>
                <div class="form-group col-md-12">
                  <button type="button" class="btn btn-danger btn-round addERP"><i class="glyphicon glyphicon-plus"></i>  Cadastrar ERP</button>
                </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">Editar ERP</h3>
          </div>
          <div class="modal-body">
          <h2 class="modal-title avisoERP text-center">Editado com sucesso</h2>
              <form method="post" action="">
                <div class="row formCadERP">
                <div class="form-group col-md-6">
                  <label for="nomeERP">Nome</label>
                  <input type="text" name="nomeERP" id="nomeERP" class="form-control" placeholder="Nome" value="<?php echo $registro["nome"]; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="documentoERP">Documento</label>
                  <input type="text" name="documentoERP" class="form-control" id="documentoERP" placeholder="Documento" value="<?php echo $registro["documento"]; ?>">                    
                </div>
                <div class="form-group col-md-3">
                  <label for="cepERP">CEP</label>
                  <input type="text" name="cepERP" id="cepERP" class="form-control" placeholder="CEP" value="<?php echo $registro["cep"]; ?>">
                </div>
                <div class="form-group col-md-9">
                  <label for="logradouroERP">Endereço</label>
                  <input type="text" name="logradouroERP" id="logradouroERP" class="form-control" placeholder="Endereço" value="<?php echo $registro["logradouro"]; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="numeroERP">Número</label>
                  <input type="text" name="numero" id="numero" class="form-control" placeholder="Num." value="<?php echo $registro["numero"]; ?>">
                </div>
                <div class="form-group col-md-9">
                  <label for="complementoERP">Complemento</label>
                  <input type="text" name="complementoERP" id="complementoERP" class="form-control" placeholder="Complemento" value="<?php echo $registro["complemento"]; ?>">
                </div>
                <div class="form-group col-md-5">
                  <label for="bairroERP">Bairro</label>
                  <input type="text" name="bairroERP" id="bairroERP" class="form-control" placeholder="Bairro" value="<?php echo $registro["bairro"]; ?>">
                </div>
                <div class="form-group col-md-5">
                  <label for="cidadeERP">Cidade</label>
                  <input type="text" name="cidadeERP" id="cidadeERP" class="form-control" placeholder="Cidade" value="<?php echo $registro["cidade"]; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="estadoERP">Estado</label>
                  <input type="text" name="estadoERP" id="estadoERP" class="form-control" placeholder="Estado" value="<?php echo $registro["estado"]; ?>">
                </div>
                <div class="form-group col-md-12">
                  <button type="button" class="btn btn-danger btn-round editarERP"><i class="glyphicon glyphicon-ok"></i>  Editar ERP</button>
                  <input type="hidden" name="id" id="idERP" value="<?php echo $a; ?>" required>  
                </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="usuario" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="modal-title text-center" id="ModalLabel">Usuário ERP</h3>
          </div>
          <div class="modal-body">
          <h2 class="modal-title avisoERP text-center">Cadastrado com sucesso</h2>
                <form method="post" class="formUserERP">
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="login">Usuário</label>
                    <input type="text" name="login" id="login" class="form-control" placeholder="Usuário" value="<?php echo $usuarioModalERP; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="senha">Senha</label>
                    <input type="text" name="senha" class="form-control" id="senha" placeholder="Senha" value="<?php echo $senhaModalERP; ?>">                    
                  </div>
                    <input type="hidden" name="id" id="idUser" value="">                    
                  <div class="form-group col-md-12">
                    <button type="button" class="btn btn-danger btn-round userERP"><i class="glyphicon glyphicon-ok"></i>  Alterar</button>
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