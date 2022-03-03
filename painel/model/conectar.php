<?php
// die("O raio!!");
//Banco de dados on-line
define("bdhost", "127.0.0.1", true);
define("bdbanco", "pagcondominio", true);
define("bdlogin", "root", true);
define("bdsenha", "120qk87L2728@", true);

//Banco de dados local
$bdhost       = bdhost;
$bdbanco      = bdbanco;
$bdlogin      = bdlogin;
$bdsenha      = bdsenha;

try {
    $conexao = new PDO("mysql:host=".bdhost.";dbname=".bdbanco, bdlogin, bdsenha);
    // set the PDO error mode to exception
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "<p>Bonitamente conectado!</p>";
  } catch(PDOException $erro) {
    // echo "<p>Conexão falhou: " . $erro->getMessage() . "</p>";
  }