<?php
include "../model/conectar.php";
include "../model/criptografia.php";
// include "../model/acesso.php";
$id   = $_POST["id"];
$tabela = $_POST["local"];

try {
    $sql = $conexao->prepare("UPDATE $tabela SET exibicao = :exibicao WHERE id = :id");
    $sql->execute(array(
      ':id'   => $id,
      ':exibicao' => 0
    ));
  
    echo $sql->rowCount();
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }

include "../painel/view/pages/form-$tipo.php";
include "../model/desconectar.php";