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
						<h2>Login</h2>
						<p>Envie um email para: <strong>contato@pagcondominio.com</strong></p>
					</header>
					<div class="box">
						<form method="post">
							<div class="form-row row gtr-50 gtr-uniform">
								<div class="form-group col-6">
									<label for="login">Login (Email ou CPF)</label>
									<input type="text" name="login" class="form-control CPF" id="login" placeholder="Login" value="" required>
								</div>
								<div class="form-group col-6">
								<label for="senha">Senha</label>
								<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" value="" required>
								</div>
								<div class="form-group col-6">
									<input type="hidden" id="local" value="condomino">
                          			<input type="hidden" id="chave" value="condomino">
									<button type="button" class="button primary formLogin" name="botao" value="Entrar"> Entrar</button>
								</div>
								<!--
								<div class="col-6 col-12-narrower">
									<input type="checkbox" id="conectado" name="conectado" checked>
									<label for="conectado">Manter conectado</label> <a href="#">Esqueci minha senha</a>
								</div>
								-->
								<p id="aviso" class="alert alert-danger" role="alert"></p>
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
		<script src="../assets/js/pagcondominio.js"></script>
		<script type="text/babel" src="assets/js/react.js"></script>

	</body>
</html>