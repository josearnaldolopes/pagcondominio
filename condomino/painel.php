<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Pag Condominio | Seu Painel</title>
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
				<section id="main" class="container">

					<div class="box">
						<h3>Sobre</h3>
						<p>A PagCondominio Soluções Ltda. fornece a você www.pagcondominio.com para pagamento de sua cota condominial. Por favor, sinta-se livre para navegar, baixar a partir de e fazer outro uso do Site PagCondominio. Ao acessar e usar o Site PagCondominio, você aceita e concorda com os seguintes termos de uso (“Termos de Uso”), sem limitação ou qualificação. Se você não concordar com estes Termos de Uso, por favor não use o Site PagCondominio.</p>
						<div class="row">
							<div class="row-6 row-12-mobilep">
								<?php include "anser/status.php"; ?>
								<h3>Seu cartão <a href="#cartaoADD" rel="modal:open"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
								<?php //include "anser/cartao.php"; ?>
								<?php //include "anser/cartao-cadastro.php"; ?>
								<?php include "anser/cartoes.php"; ?>
								<!-- Link to open the modal -->
								<h3>Pagamentos</h3>
								<p>Texto</p>
							</div>
						</div>
					</div>
				</section>

			<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
					<li><a href="#" class="icon fa-linkedin"><span class="label">Google+</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; 2021 PagCondominio.</li>
				</ul>
			</footer>

		</div>

		<!-- Modal -->
		<div id="cartaoADD" class="modal">
			<h3>Adicionar</h3>
			<form method="post" action="anser/cartao-cadastro.php">
				<div class="row gtr-uniform gtr-50">
					<div class="col-12 col-12-mobilep">
						<input type="text" name="nome" id="nome" value="" placeholder="Nome no cartão" />
					</div>
					<div class="col-12 col-12-mobilep">
						<input type="text" name="numero" id="numero" value="" placeholder="Número" />
					</div>
					<div class="col-4 col-12-mobilep">
						Validade
					</div>
					<div class="col-4 col-12-mobilep">
					  <select name="mes" id="mes">
						<?php
							for ($i=1;$i<13;$i++) {
								echo $i;
								echo "<option value=\"$i\">$i</option>";
							}
						?>
					  </select>
					</div>
					<div class="col-4 col-12-mobilep">
					  <select name="ano" id="ano">
						<?php
							for ($i=date("Y");$i<date("Y")+15;$i++) {
								echo "<option value=\"$i\">$i</option>";
							}
						?>
					  </select>
					</div>
					<div class="col-12">
						<ul class="actions">
							<li><input type="submit" value="Cadastrar" /></li>
							<li><input type="reset" value="Limpar" class="alt" /></li>
						</ul>
					</div>
				</div>
			</form>
		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
		<script type="text/babel" src="assets/js/react-Interno.js"></script>
		<!-- jQuery Modal -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

	</body>
</html>