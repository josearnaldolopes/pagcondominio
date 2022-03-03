<?php
include "../app/constants.php";
include "../app/conexao.php";
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Pag Condominio | Cadastre-se</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta http-equiv="Cache-Control" content="no-cache" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<meta name="description" content="O novo jeito de pagar seu condomínio">
		<meta name="keywords" content="pagamento, fintec, banco, cartão, boleto, pix">
		<meta name="author" content="pagcondominio.com by josearnaldo.net">
		<link rel="icon" type="image/png" href="imagens/logos/icon-32x32.png">
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
		<script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<header id="header"></header>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Cadastre-se</h2>
						<p>Envie um email para: <strong>contato@pagcondominio.com</strong></p>
					</header>
					<div class="box">
						<form>
							<div class="form-row row gtr-50 gtr-uniform">
							  
							<div class="form-group col-6">
							  <label for="NomeCond">Condomínio</label>
							  <select name="condominio" id="NomeCond" required>
							  	<option value="">Escolha</option>
							  	<?php
									$sql = "SELECT condominios.id,condominios.condominio,condominios.liberacao FROM condominios WHERE condominios.exibicao = 1 AND liberacao = 2 ORDER BY condominios.condominio ASC";
									$simples = $conexao->prepare($sql);
									$simples->execute();
									//$registro = $simples->fetch();
									$numero = $simples->rowCount();
									while($registro = $simples->fetch(PDO::FETCH_ASSOC)) {
								  		echo  "<option value=\"".$registro["id"]."\">".$registro["condominio"]."</option>";
									}
								?>
							  </select>
							</div>
							<div class="form-group col-6">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control CPF" id="email" placeholder="Email" value="" required>
							</div>
							<div class="form-group col-6">
							  <label for="documento">CPF</label>
							  <input type="text" name="documento" class="form-control CPF" id="documento" placeholder="CPF" value="" required>
							</div>
							<div class="form-group col-6">
							  <label for="senha">Senha</label>
							  <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" value="" required>
							</div>
							<div class="form-group col-8"></div>
							<div class="form-group col-12">
							  <button type="submit" class="button primary cadastro" name="botao" value="Enviar"><i class="glyphicon glyphicon-ok"></i>  Cadastrar</button>
							  <a href="logar"><button type="button" class="button primary" name="botao" value=""><i class="glyphicon glyphicon-ok"></i>  Já sou cadastrado</button></a>
							  <p id="aviso"></p>
							</div>
							</div>
						  </form>
					</div>
				</section>

			<!-- Footer -->
			<footer id="footer"></footer>

		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/condomino.js"></script>
		<script type="text/babel" src="assets/js/react.js"></script>

	</body>
</html>