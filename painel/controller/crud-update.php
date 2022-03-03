<?php
include "../model/conectar.php";
include "../model/criptografia.php";
// include "../model/acesso.php";
$id   = $_POST["id"];
$nome = $_POST["nome"];
$responsavel = $_POST["responsavel"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$tabela = $_POST["tipo"];

try {
    $sql = $conexao->prepare("UPDATE $tabela SET nome = :nome, responsavel = :responsavel, telefone = :telefone, email = :email WHERE id = :id");
    $sql->execute(array(
      ':id'   => $id,
      ':nome' => $nome,
      ':responsavel' => $responsavel,
      ':telefone' => $telefone,
      ':email' => $email
    ));
  
    echo $sql->rowCount();
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }

include "../painel/view/pages/form-$tipo.php";
include "../model/desconectar.php";