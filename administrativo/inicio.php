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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
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

        <div class="col-md-4 painel">
			<a href="administradora">
				<i class="glyphicon glyphicon-lock"></i>
				<h3>Administradora</h3>
			</a>
        </div>
        <div class="col-md-4 painel">
			<a href="condominio">
				<i class="glyphicon glyphicon-home"></i>
				<h3>Condomínio</h3>
			</a>
        </div>
        <div class="col-md-4 painel">
			<a href="condomino">
				<i class="glyphicon glyphicon-user"></i> 
				<h3>Condomino</h3>
			</a>
        </div>
        <div class="col-md-4 painel">
			<a href="erp">
				<i class="glyphicon glyphicon-hdd"></i> 
				<h3>ERPs</h3>
			</a>
        </div>
        <div class="col-md-4 painel">
			<a href="https://pagcondominio.com/portalcondominio/" target="_blank" rel=”noopener”>
				<i class="glyphicon glyphicon-phone"></i> 
				<h3>Portal Condominio</h3>
			</a>
        </div>
        <div class="col-md-4 painel">
			<a href="https://documentacao.pagcondominio.com/" target="_blank" rel=”noopener”>
				<i class="glyphicon glyphicon-pencil"></i> 
				<h3>Documentação</h3>
			</a>
        </div>
        <div class="col-md-4 painel">
			<a href="https://www.josearnaldo.net/" target="_blank" rel=”noopener”>
				<i class="glyphicon glyphicon-link"></i> 
				<h3>Suporte</h3>
			</a>
        </div>
        <div class="col-md-4 painel">
			<a href="https://pagcondominio.com/" target="_blank" rel=”noopener”>
				<i class="glyphicon glyphicon-link"></i> 
				<h3>Site</h3>
			</a>
        </div>
        <div class="col-md-4 painel">
			<a href="sair">
				<i class="glyphicon glyphicon-log-out"></i> 
				<h3>Sair</h3>
			</a>
        </div>
			<div class="col-md-12" style="padding:30px 10px">
				<footer id="footer"></footer>
			</div>		
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="../assets/js/pagcondominio.js"></script>  
<script type="text/babel" src="../assets/js/react-administrativo.js"></script>  
</body>
</html>