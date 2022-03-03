<?php
include "criptografia.php";
// echo "Acesso:" . $_COOKIE["acesso"];
// echo "Email:" . descriptografar($_COOKIE["email"]);

// echo $_COOKIE["acesso"] ? "Acessando" : "Faça login";

$_COOKIE["acesso"] ? "" : header("Location: ../administrativo");