<?php
// include "../../../model/conectar.php";
$local       = $_POST["local"];
$login       = $_POST["login"];
$login       = trim($login);
$login       = addslashes($login);
$senha       = $_POST["senha"];
$senha       = trim($senha);
$senha       = addslashes($senha);

// $login = criptografar($login);
// $senha = $local = "administrativo" ? $senha = $senha : $senha = criptografar($senha);
$senha = criptografar($senha);

switch ($local) {
    case "administradora":
		$sql = "SELECT administradora.id,administradora.nome,administradora.email,administradora.senha FROM administradora WHERE administradora.email = '$login' AND administradora.senha = '$senha'";
        break;
    case "administrativo":
		$sql = "SELECT administrativo.id,administrativo.nome,administrativo.email,administrativo.senha FROM administrativo WHERE administrativo.email = '$login' AND administrativo.senha = '$senha'";
        break;
    case "condomino":
		$sql = "SELECT condominos.id,condominos.nome,condominos.email,condominos.cpf,condominos.senha FROM condominos WHERE condominos.email = '$login' OR condominos.cpf = '$login' AND condominos.senha = '$senha'";
        break;
}

$simples = $conexao->prepare($sql);
$simples->execute();
$resultado = $simples->fetch();
$numero = $simples->rowCount();
$idLogin    = criptografar($resultado["id"]);
$emailLogin = criptografar($resultado["email"]);

function logar() {
    global $idLogin, $local, $emailLogin;
    setcookie("acesso", $idLogin, time() + (86400 * 30), "/", "", 1);
    setcookie("chaveacesso", mt_rand().rand(), time() + (86400 * 30), "/", "", 1);
    setcookie("email", $emailLogin, time() + (86400 * 30), "/", "", 1);
    setcookie("local", $local, time() + 3600, "/", "", 1);
    return true;
}

echo $numero ? logar() : false;