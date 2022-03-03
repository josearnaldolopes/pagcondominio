<?php
//include "anser/status.php";
include "../app/function.php";
include "../app/variaveis.php";
include "../app/constants.php";
include "../app/conexao.php";

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
?>
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
						<h3><b>Olá</b> <?php echo $emailacesso; ?></h3>
						<p>A PagCondominio Soluções Ltda. fornece a você www.pagcondominio.com para pagamento de sua cota condominial. Por favor, sinta-se livre para navegar, baixar a partir de e fazer outro uso do Site PagCondominio. Ao acessar e usar o Site PagCondominio, você aceita e concorda com os seguintes termos de uso (“Termos de Uso”), sem limitação ou qualificação. Se você não concordar com estes Termos de Uso, por favor não use o Site PagCondominio.</p>
					</div>

					<a name="cartoes"></a>
					<section class="box">
						<h3>Cartões <a href="#cartaoADD" rel="modal:open"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
						<div class="row">
								<?php //include "anser/cartao.php"; ?>
								<?php //include "anser/cartao-cadastro.php"; ?>
								<?php include "anser/cartoes.php"; ?>
						</div>
					</section>

					<!-- Pagamentos -->
					<a name="pagamentos"></a>
					<section class="box">
						<h3>Pagamentos</h3>
						<div class="table-wrapper">
							<table>
								<thead>
									<tr>
										<th>Pagamento</th>
										<th>Descrição</th>
										<th>Valor</th>
										<th class="align-center">Ação</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$sql = "SELECT * FROM pagamento WHERE documento = '28044488863' ORDER BY dataPgto DESC";
								$simples = $conexao->prepare($sql);
								$simples->execute();
								$numero = $simples->rowCount();
								
								if ($numero > 0) {
									while($registro = $simples->fetch(PDO::FETCH_ASSOC)) {
										$pagamento = ($registro["status"] != "0") ? "<a href=\"#pagamento\" rel=\"modal:open\" class=\"button small btpgto\" data-valor=\"".$registro["valor"]."\" data-pgto=\"".aleatorio()."".$registro["id"]."-".$registro["status"]."\"><i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i></a>" : "<a href=\"#recibo\" rel=\"modal:open\" class=\"button alt small btpago\" data-pago=\"".aleatorio()."".$registro["id"]."-".$registro["status"]."\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></a>";
										$valor = round($registro["valor"]/100,2);
										echo "<tr>
												<td>".date('d/m/Y', strtotime($registro["data"]))."</td>
												<td>".$registro["descricao"]."</td>
												<td><b>R$</b>".number_format($valor, 2, ',', '.')."</td>
												<td class=\"align-center\">".$pagamento."</td>
											 </tr>";
										}
									} else {
										echo "Sem pagamentos";
									}

								?>
								<!--
									<tr>
										<td>10/06/2021</td>
										<td>Condomínio</td>
										<td>R$629,99 <a href="painel#pagar">Pagar</a></td>
									</tr>
									<tr>
										<td>10/05/2021</td>
										<td>Condomínio</td>
										<td>R$629,99 <b>Pago</b></td>
									</tr>
									<tr>
										<td>10/04/2021</td>
										<td>Condomínio</td>
										<td>R$629,99 <b>Pago</b></td>
									</tr>
								-->
								</tbody>
							</table>
						</div>
					</section>


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

		<div id="dados" class="modal">
			<h3>Dados pessoais</h3>
			<form method="post" action="anser/dados-pessoais.php">
				<div class="row gtr-uniform gtr-50">
					<div class="col-12 col-12-mobilep">
						<input type="text" name="cpf" id="cpf" value="" placeholder="CPF" />
					</div>
					<div class="col-12 col-12-mobilep">
						<input type="email" name="email" id="email" value="" placeholder="Email" />
					</div>
					<div class="col-12 col-12-mobilep">
						<input type="password" name="senha" id="senha" value="" placeholder="Senha" />
					</div>
					<div class="col-12">
						<ul class="actions">
							<li><input type="submit" value="Alterar" /></li>
						</ul>
					</div>
				</div>
			</form>
		</div>

		<div id="pagamento" class="modal">
			<h3>Pagamento</h3>
			<form method="post" action="" id="formPgto">
				<div class="row gtr-uniform gtr-50">
					<div class="col-12 col-12-mobilep">
						<label for="cartoes">Escolha o Cartão:</label>
						<select name="cartoes" id="cartoes">
						<?php
							foreach ($cartoes as $cartao)
							{ 
								echo "<option value=".$cartao->token.">".$cartao->brand."</option>";
							}
						?>
						</select>
					</div>
					<div class="col-12 col-12-mobilep">
						<input type="password" name="cvv" id="cvv" value="" placeholder="CVV" />
					</div>
					<div class="col-12">
						<ul class="actions">
							<li><input type="button" class="btpagar" value="Pagar" /></li>
						</ul>
					</div>
				<p id="avisoPgto"></p>
				</div>
				<input type="hidden" id="valor" name="valor" value="" />
				<input type="hidden" id="documento" name="documento" value="<?php echo $cartao->customer->documentNumber; ?>" />
			</form>
		</div>

		<div id="recibo" class="modal">
			<h3>Recibo</h3>
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
		<script type="text/babel" src="assets/js/react-Interno.js"></script>
		<!-- jQuery Modal -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

	</body>
</html>