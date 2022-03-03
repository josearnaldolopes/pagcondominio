<?php
include "../model/conectar.php";
include "../model/criptografia.php";
// include "../model/logar.php";
$id   = $_POST["id"];
$tipo = $_POST["tipo"];
$acao = $_POST["acao"];
// die($acao);
// echo "ID: ".$id.". Tipo: ".$tipo.$_COOKIE["chaveacesso"].descriptografar($_COOKIE["email"]);

$simples = $conexao->prepare("SELECT * FROM $tipo WHERE id = $id");
$simples->execute();
$resultado = $simples->fetch();
$numero = $simples->rowCount();
// echo $resultado["nome"]." (".$numero." registro)";

include "../painel/view/pages/form-$tipo.php";

include "../model/desconectar.php";