<?php
/*---- Tratando erros ----*/
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
/*---- Fim do Tratando erros ----*/
date_default_timezone_set("America/Sao_Paulo");
$data 	     = date("d/m/Y h:i:s");
$data2 	     = date("Y-m-d");
$data3 	     = date("Y-m-d", strtotime('+10 days'));
$ceps  	     = array("01513000","01513001","01513002","01513003","01513004");
$cep         = $ceps[rand(0, 4)];
$logradouros = array("Rua Bleecker", "Avenida Central");
$logradouro  = $logradouros[rand(0, 1)];
$documento   = "CPF ou CNPJ";
$nome        = "Natasha Romanoff";
$apartamento = "121B";
$bloco       = "B";
$numero      = "177A";
$cidade      = "São Paulo";
$estado      = "SP";
$bairro      = "Vila Greenwich";
$banco       = "Banco Vigente";
$agencia     = "110";
$conta       = "637816";
$agencia     = "0123";
$bandeira    = "Bandeira do cartão";
$cartao      = "5220 2969 7610 5541";
$validade    = "10/04/2023";
$vencimento  = date('d/m/Y', strtotime('+10 days'));
$cvv         = "314";
$telefone    = "10 01234.5678";
$email       = "contato@pagcondominio.com";
$condominios = array("Vila Verde", "Marathon", "Residencial Happy Home", "Central", "Edificio Baxter");
$condominio  = $condominios[rand(0, 4)];
$id          = rand(1, 99);
$erp		 = "1";
$chave       = "{{string individual}}";
$chave2      = "{{chave gerada no cadastro do condominio}}";
?>
<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <title>Portal DEV | PagCondominio</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal DEV | PagCondominio">
    <meta name="author" content="José Arnaldo | www.josearnaldo.net">    
	<link rel="icon" type="image/x-icon" href="favicon.ico" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="https://pagcondominio.com/wp-content/uploads/2020/05/cropped-logopg-2-32x32.png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- FontAwesome JS-->
	  <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" integrity="sha384-9/D4ECZvKMVEJ9Bhr3ZnUAF+Ahlagp1cyPC7h5yDlZdXs4DQ/vRftzfd+2uFUuqS" crossorigin="anonymous"></script>
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/atom-one-dark.min.css?v=0.0.1">
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/theme.css">
</head> 

<body class="docs-page">    
    <header class="header fixed-top">	    
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
					<button id="docs-sidebar-toggler" class="docs-sidebar-toggler docs-sidebar-visible mr-2 d-xl-none" type="button">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </button>
	                <div class="site-logo"><a class="navbar-brand" href="https://documentacao.pagcondominio.com/"><img class="logo-icon mr-2" src="assets/images/logoescuro.png" alt="logo"></a></div>    
                </div>
	            <div class="docs-top-utilities d-flex justify-content-end align-items-center">
	            </div>
            </div>
        </div>
    </header>
    
    <div class="docs-wrapper">
	    <div id="docs-sidebar" class="docs-sidebar">
		    <nav id="docs-nav" class="docs-nav navbar">
			    <ul class="section-items list-unstyled nav flex-column pb-3">
				    <li class="nav-item section-title"><a class="nav-link scrollto active" href="#section-1"><span class="theme-icon-holder mr-2"><i class="fas fa-map-signs"></i></span>Introdução</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#sobre">Sobre</a></li>
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#instalacao"><span class="theme-icon-holder mr-2"><i class="fas fa-arrow-down"></i></span>Instalação</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#tipo-api">Tipo de API</a></li>
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#api"><span class="theme-icon-holder mr-2"><i class="fas fa-box"></i></span>APIs</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#autenticacao">Autenticação</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#testedeacesso">Teste de Acesso</a></li>
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#condominio"><span class="theme-icon-holder mr-2"><i class="fas fa-building"></i></span>Condomínio</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#credenciamento-de-condominio">Credenciamento de condomínio</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#lista-condominios">Lista dos condomínios</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#filtro-condominio">Filtro por condomínio</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#dados-condominio">Obter dados do condomínio</a></li>
					<li class="nav-item"><a class="nav-link scrollto" href="#editar-condominio">Editar condominio</a></li>
				    <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#condomino"><span class="theme-icon-holder mr-2"><i class="fas fa-users"></i></span>Condomino</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#cadastro-de-condomino">Cadastro de condomino</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#lista-condominos">Lista dos condominos</a></li>
					<li class="nav-item"><a class="nav-link scrollto" href="#dados-condomino">Obter dados do condomino</a></li>
				    <li class="nav-item"><a class="nav-link scrollto" href="#editar-condomino">Editar condomino</a></li>
				    <!-- <li class="nav-item"><a class="nav-link scrollto" href="#condomino-endpoint"><small><i class="fas "fa-link></i></small> Endpoint condomino</a></li> -->
				    <!-- <li class="nav-item"><a class="nav-link scrollto" href="#lista-condominio"><i class="fas fa-chart-line" style="color:#d6d6d6;"></i> Lista condominio</a></li> -->
            <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#cartaodecredito"><span class="theme-icon-holder mr-2"><i class="far fa-credit-card"></i></span>Cartão de Crédito</a></li>
            <li class="nav-item"><a class="nav-link scrollto" href="#acessocartaodecredito">Acesso</a></li>
            <li class="nav-item"><a class="nav-link scrollto" href="#cadastrocartaodecredito">Cadastro do cartão</a></li>
            <li class="nav-item"><a class="nav-link scrollto" href="#apagarcartaodecredito">Apagar cartão</a></li>
			<!--
            <li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#pagamentos"><span class="theme-icon-holder mr-2"><i class="far fa-money-bill-alt"></i></span>Pagamentos</a></li>
            <li class="nav-item"><a class="nav-link scrollto" href="#pagamento">Pagamento</a></li>
            <li class="nav-item"><a class="nav-link scrollto" href="#pagamentover">Ver Pagamento</a></li>
			-->
			<li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#cartaoprepago"><span class="theme-icon-holder mr-2"><i class="fas fa-credit-card"></i></span>Cartão Pré Pago</a></li>
            <li class="nav-item"><a class="nav-link scrollto" href="#acesso">Acesso</a></li>
            <li class="nav-item"><a class="nav-link scrollto" href="#contacriar">Criar Conta</a></li>
            <!-- <li class="nav-item"><a class="nav-link scrollto" href="#cartaocriar">Criar Cartão</a></li> -->
            <li class="nav-item"><a class="nav-link scrollto" href="#cartaover">Ver Cartão</a></li>
            <!-- <li class="nav-item"><a class="nav-link scrollto" href="#cartaosaldo">Saldo</a></li> -->
            <li class="nav-item"><a class="nav-link scrollto" href="#cartaotrocarsenha">Trocar Senha</a></li>
            <!-- <li class="nav-item"><a class="nav-link scrollto" href="#cartaotransacao">Transação</a></li> -->
            <li class="nav-item"><a class="nav-link scrollto" href="#cartaotransacoes">Transações</a></li>
			<li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#boleto"><span class="theme-icon-holder mr-2"><i class="fas fa-barcode"></i></span>Boleto</a></li>
			<li class="nav-item"><a class="nav-link scrollto" href="#boletogerar">Gerar</a></li>
			<li class="nav-item"><a class="nav-link scrollto" href="#boletoalterar">Alterar</a></li>
			<li class="nav-item"><a class="nav-link scrollto" href="#boletoconsultar">Consultar</a></li>
			<li class="nav-item"><a class="nav-link scrollto" href="#boletocancelar">Cancelar</a></li>
			<li class="nav-item section-title mt-3"><a class="nav-link scrollto" href="#webhook"><span class="theme-icon-holder mr-2"><i class="fas fa-link"></i></span>Webhook</a></li>
			<li class="nav-item"><a class="nav-link scrollto" href="#consultartransacao">Consultar Transação</a></li>
			<li class="nav-item section-title mt-3"><a class="nav-link" href="https://github.com/pagcondominio" target="_blank"><span class="theme-icon-holder mr-2"><i class="fab fa-github"></i></span>Github</a></li>
			<li class="nav-item section-title mt-3"><a class="nav-link" href="mailto:dev@pagcondominio.com"><span class="theme-icon-holder mr-2"><i class="fas fa-envelope"></i></span><small>dev@pagcondominio.com</small></a></li>
			</ul>

		    </nav>
	    </div>
	    <div class="docs-content">
		    <div class="container">
			    <article class="docs-article" id="section-1">
				    <header class="docs-header">

					    <h1 class="docs-heading">Introdução <span class="docs-time">Última atualização: 02/08/2021</span></h1>
					    <section class="docs-intro">
							<p>Sabemos que exigirá muito trabalho estamos dispostos a trilhar este caminho junto com vocês.</p>
							<p>API criada para envio de dados entre ERP e o PagCondominio</p>
						</section>	
						
				    </header>
				    <section class="docs-section" id="sobre">
						<h2 class="section-heading">Sobre</h2>
						<p>A API do novo jeito de pagar seu condomínio</p>
						<p>É uma fintech de meios de pagamentos que possibilita os condôminos a optarem por uma forma de pagamentos, seja por cartão de credito, cartão de debito, Debito automático ou boleto, facilitando o dia dia do condomínio e reduzindo a inadimplência. Simples e fácil, Já nascemos plugados com grandes players do mercado como adquirentes e seguradoras internacionais.</p>
					</section>
					
			    </article>
			    
			    <article class="docs-article" id="instalacao">
				    <header class="docs-header">
					    <h1 class="docs-heading">Instalação</h1>
					    <section class="docs-intro">
						    <!-- <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius eros interdum suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis. Duis vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in malesuada odio.</p> -->
						</section>
				    </header>
				     <section class="docs-section" id="tipo-api">
						<h2 class="section-heading">Tipo de API</h2>
						<p>API REST</p>
					</section>
			    </article>
			    
			    
			    <article class="docs-article" id="api">
				    <header class="docs-header">
					    <h1 class="docs-heading">APIs</h1>
					    <section class="docs-intro">
						    <p>Fácil instalação e alta performance</p>
						</section>
				    </header>
				    <section class="docs-section" id="autenticacao">
						<h2 class="section-heading">Autenticação</h2>
						<p>Com o cadastro do ERP liberado pela PagCondominio, será enviado um email com login e senha unico e intransferível.</p>
						 <div class="callout-block callout-block-success">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder mr-1">
		                                <i class="fas fa-thumbs-up"></i>
		                            </span><!--//icon-holder-->
	                                Autenticação
	                            </h4>
                                <p>Use Basic Auth com login e senha enviado pelo PagCondominio</p>
                            </div><!--//content-->
                        </div>
						<h3 class="section-heading" id="testedeacesso">Testando Usuário e Senha</h3>
						<div class="callout-block callout-block-warning">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder mr-1">
		                                <i class="fa fa-database" aria-hidden="true"></i>
		                            </span><!--//icon-holder-->
	                                GET
	                            </h4>
                                <p>https://api.pagcondominio.com/status</p>
                            </div><!--//content-->
                        </div>
<small>Resposta sem o login ou senha</small>
<pre class="rounded">
<code class="json hljs">{
    "resultado": "Sem acesso. Tem login e senha?",
    "data": "<?php echo $data ?>"
}
</code>
</pre>
<small>Resposta com erro no login ou senha</small>
<pre class="rounded">
<code class="json hljs">{
    "resultado": "Verifique o acesso, dados errados.",
    "data": "<?php echo $data ?>"
}
</code>
</pre>
<small>Resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "resultado": "Dados ok!",
    "documentacao": "https://documentacao.pagcondominio.com/",
    "email": "contato@pagcondominio.com",
    "id": "Número do ID",
    "data": "<?php echo $data ?>"
}
</code>
</pre>
					</section>
					</article>

					<article class="docs-article" id="condominio">
					<header class="docs-header">
					    <h1 class="docs-heading">Condomínio</h1>
					    <section class="docs-intro">
						    <!-- <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius eros interdum suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis. Duis vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in malesuada odio.</p> -->
						</section>
				    </header>

				    <section class="docs-section" id="credenciamento-de-condominio">
						<h2 class="section-heading">Credenciamento de condomínio</h2>
						<p>Credenciar o condomínio existe duas formas: <br> 1. Através do envio dos dados de CPF ou CNPJ, endereço completo, conta bancária e responsável para <b>contato@pagcondominio.com</b><br> 2. Ou através de nossas Apis abaixo.<br>Dentro de 7 dias, o condomínio estará apto a receber por cartão de crédito e será enviado um email de confirmação</p>
					</section>

					<section class="docs-section" id="credenciamento-de-condominio-endpoint">
						<h2 class="section-heading">URL ENDPOINT</h2>
						 <div class="callout-block callout-block-warning">
                            <div class="content">
                                <h4 class="callout-title">
	                                <span class="callout-icon-holder mr-1">
		                                <i class="fa fa-database" aria-hidden="true"></i>
		                            </span><!--//icon-holder-->
	                                POST
	                            </h4>
                                <p>https://api.pagcondominio.com/erp/condominio</p>
                            </div><!--//content-->
                        </div>
                        <p>header 'content-type: application/json'</p>
					</section>

<small>Json da requisição</small>
<pre class="rounded">
<code class="json hljs">{
    "condominio": "<?php echo $condominio;?>",
    "cep": "<?php echo $cep;?>",
    "logradouro": "<?php echo $logradouro;?>",
    "numero": "<?php echo $numero;?>",
    "bairro": "<?php echo $bairro;?>",
    "cidade": "<?php echo $cidade;?>",
    "estado": "<?php echo $estado;?>",
    "telefone": "<?php echo $telefone;?>",
    "documento": "<?php echo $documento;?>",
    "banco": "<?php echo $banco;?>",
    "agencia": "<?php echo $agencia;?>",
    "conta": "<?php echo $conta;?>"
}
</code>
</pre>

<small>Json de resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": true,
    "mensagem": "Condominio cadastrado",
    "chave": "String do Token",
    "consulta": "https://api.pagcondominio.com/erp/consulta/{{cartao ou boleto}}/{{chave}}"
}
</code>
</pre>

<small>Json de resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "erro": "Descrição do erro"
}
</code>
</pre>

<section class="docs-section" id="lista-condominios">
	<h2 class="section-heading">Obter lista do condomínio</h2>
	<p>Cadastrado, é possivel ver os dados do condominio</p>
</section>

<section class="docs-section" id="credenciamento-de-condominio-endpoint">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				GET
			</h4>
			<p>https://api.pagcondominio.com/erp/condominio/listar</p>
		</div><!--//content-->
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json da resposta</small>
<pre class="rounded">
<code class="json hljs">[
    {
        "id": "1",
        "condominio": "<?php echo $condominio;?>",
        "cep": "<?php echo $cep;?>",
        "logradouro": "<?php echo $logradouro;?>",
        "numero": "123",
        "bairro": "<?php echo $bairro;?>",
        "cidade": "<?php echo $cidade;?>",
        "estado": "<?php echo $estado;?>",
        "chave": "<?php echo $chave;?>"
    },
    {
        "id": "2",
        "condominio": "<?php echo $condominio;?>",
        "cep": "<?php echo $cep;?>",
        "logradouro": "<?php echo $logradouro;?>",
        "numero": "<?php echo $numero;?>",
        "bairro": "<?php echo $bairro;?>",
        "cidade": "<?php echo $cidade;?>",
        "estado": "<?php echo $estado;?>",
        "chave": "<?php echo $chave;?>"
    },
    {
        "id": "3",
        "condominio": "<?php echo $condominio;?>",
        "cep": "<?php echo $cep;?>",
        "logradouro": "<?php echo $logradouro;?>",
        "numero": "<?php echo $numero;?>",
        "bairro": "<?php echo $bairro;?>",
        "cidade": "<?php echo $cidade;?>",
        "estado": "<?php echo $estado;?>",
        "chave": "<?php echo $chave;?>"
    }
]
</code>
</pre>

<section class="docs-section" id="filtro-condominio">
	<h2 class="section-heading">Filtro por condomínio</h2>
	<p>Filtro usando a <?php echo $chave2;?></p>
</section>

<section class="docs-section" id="credenciamento-de-condominio-endpoint">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				GET
			</h4>
			<p>https://api.pagcondominio.com/erp/condomino/condominio/{{chave}}</p>
		</div><!--//content-->
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json da resposta</small>
<pre class="rounded">
<code class="json hljs">[
    {
        "id": "<?php echo $id;?>",
        "nome": "<?php echo $nome;?>",
        "apartamento": "<?php echo $apartamento;?>",
        "bloco": "<?php echo $bloco;?>",
        "chave": "{{chave}}",
        "erp": "1"
    },
    {
        "id": "<?php echo $id;?>",
        "nome": "<?php echo $nome;?>",
        "apartamento": "<?php echo $apartamento;?>",
        "bloco": "<?php echo $bloco;?>",
        "chave": "{{chave}}",
        "erp": "1"
    }
]
</code>
</pre>

<section class="docs-section" id="dados-condominio">
	<h2 class="section-heading">Obter dados do condomínio</h2>
	<p>Uma vez aprovado e com a chave em mãos é possivel ver os dados do condominio</p>
</section>

<section class="docs-section" id="credenciamento-de-condominio-endpoint">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				GET
			</h4>
			<p>https://api.pagcondominio.com/erp/condominio/ver/{{chave}}</p>
		</div><!--//content-->
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json da resposta</small>
<pre class="rounded">
<code class="json hljs">{
	"id": "22",
	"condominio": "Ed. do Sul",
	"cep": "<?php echo $cep;?>",
	"logradouro": "<?php echo $logradouro;?>",
	"numero": "<?php echo $numero;?>",
	"bairro": "<?php echo $bairro;?>",
	"cidade": "<?php echo $cidade;?>",
	"estado": "<?php echo $estado;?>",
	"chave": "{{chave}}"
}
</code>
</pre>

<small>Json da resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "aviso": "Erro ao acessar esse condominio"
}
</code>
</pre>

<section class="docs-section" id="editar-condominio">
	<h2 class="section-heading">Editar condomínio</h2>
	<!-- <p>Uma vez aprovado e com a chave em mãos é possivel ver os dados do condominio</p> -->
</section>

<section class="docs-section" id="credenciamento-de-condominio-endpoint">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				PUT
			</h4>
			<p>https://api.pagcondominio.com/erp/condominio/alterar</p>
		</div><!--//content-->
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json da requisição</small>
<pre class="rounded">
<code class="json hljs">{
    "chave": "<?php echo $chave2;?>",
    "condominio": "<?php echo $condominio;?>",
    "cep": "<?php echo $cep;?>",
    "logradouro": "<?php echo $logradouro;?>",
    "numero": "<?php echo $numero;?>",
    "bairro": "<?php echo $bairro;?>",
    "cidade": "<?php echo $cidade;?>",
    "estado": "<?php echo $estado;?>",
    "telefone": "<?php echo $telefone;?>",
    "documento": "<?php echo $documento;?>",
    "banco": "<?php echo $banco;?>",
    "agencia": "<?php echo $agencia;?>",
    "conta": "<?php echo $conta;?>"
}
</code>
</pre>

<small>Json da resposta</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": true,
    "mensagem": "Condominio Alterado",
    "chave": "<?php echo $chave2;?>"
}
</code>
</pre>

<small>Json da resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": false,
    "mensagem": "Ocorreu um erro ou nao há o que alterar em sua requisicao"
}
</code>
</pre>

</article>

<article class="docs-article" id="condomino">
<header class="docs-header">
	<h1 class="docs-heading">Condomino</h1>
	<section class="docs-intro">
		<!-- <p>Section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque finibus condimentum nisl id vulputate. Praesent aliquet varius eros interdum suscipit. Donec eu purus sed nibh convallis bibendum quis vitae turpis. Duis vestibulum diam lorem, vitae dapibus nibh facilisis a. Fusce in malesuada odio.</p> -->
	</section>
</header>

<section class="docs-section" id="cadastro-de-condomino">
	<h2 class="section-heading">Cadastro de condomino</h2>
	<p>Uma vez credenciado e liberado o condomínio, é possivel manipular os condominos de cada condomínio.</p>
</section>

<section class="docs-section" id="cadastro-de-condomino-endpoint">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				POST
			</h4>
			<p>https://api.pagcondominio.com/erp/condomino</p>
		</div><!--//content-->
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json da requisição</small>
<pre class="rounded">
<code class="json hljs">{
    "chave":"<?php echo $chave2;?>",
    "nome":"<?php echo $nome;?>",
    "apartamento":"<?php echo $apartamento;?>",
    "bloco":"<?php echo $bloco;?>",
    "complemento":"<?php echo $complemento;?>",
    "telefone":"<?php echo $telefone;?>",
    "email":"<?php echo $email;?>",
    "documento":"<?php echo $documento;?>"
}
</code>
</pre>

<small>Json de resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": true,
    "mensagem": "Condomino cadastrado",
    "chave": "A mesma enviada na requisição"
}
</code>
</pre>

<small>Json de resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "aviso": "Erro ao acessar esse condominio"
}
</code>
</pre>

<section class="docs-section" id="lista-condominos">
	<h2 class="section-heading">Obter lista do condomino</h2>
	<p>Cadastrado, é possivel ver os dados do condomino</p>
</section>

<section class="docs-section" id="cadastro-de-condomino-endpoint">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				POST
			</h4>
			<p>https://api.pagcondominio.com/erp/condomino/listar</p>
		</div><!--//content-->
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json de resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">[
    {
        "id": "<?php echo $id;?>",
        "chave":"<?php echo $chave2;?>",
        "nome": "<?php echo $nome;?>",
        "apartamento": "<?php echo $apartamento;?>",
        "bloco": "<?php echo $bloco;?>",
        "complemento": "<?php echo $complemento;?>",
        "erp": "<?php echo $erp;?>"
    },
    {
        "id": "<?php echo $id+1;?>",
        "chave":"<?php echo $chave2;?>",
        "nome": "<?php echo $nome;?>",
        "apartamento": "<?php echo $apartamento;?>",
        "bloco": "<?php echo $bloco;?>",
        "complemento": "<?php echo $complemento;?>",
        "erp": "<?php echo $erp;?>"
    }
]
</code>
</pre>

<!-- <small>Json de resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "aviso": "Erro ao acessar esse condominio"
}
</code>
</pre> -->

</article>

<article class="docs-article" id="">

<section class="docs-section" id="dados-condomino">
	<h2 class="section-heading">Obter dados do condomino</h2>
</section>

<section class="docs-section" id="">
	<h2 class="section-heading">URL ENDPOINT</h2>
		<div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span>
				GET
			</h4>
			<p>https://api.pagcondominio.com/erp/condomino/ver/{{id}}</p>
		</div>
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json de resposta</small>
<pre class="rounded">
<code class="json hljs">{
    "id": "<?php echo $id;?>",
    "chave": "<?php echo $chave2;?>",
    "nome": "<?php echo $nome;?>",
    "apartamento": "<?php echo $apartamento;?>",
    "bloco": "<?php echo $bloco;?>",
    "complemento": "<?php echo $complento;?>",
    "documento": "<?php echo $documento;?>",
    "telefone": <?php echo $telefone;?>,
    "email": "<?php echo $email;?>",
    "erp": "<?php echo $erp;?>"
}
</code>
</pre>

<section class="docs-section" id="editar-condomino">
	<h2 class="section-heading">Editar condomino</h2>
	<!-- <p>Uma vez credenciado e liberado o condomínio, é possivel manipular os condominos de cada condomínio.</p> -->
</section>

<section class="docs-section" id="editar-condomino-endpoint">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				PUT
			</h4>
			<p>https://api.pagcondominio.com/erp/condomino/alterar</p>
		</div><!--//content-->
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json da requisição</small>
<pre class="rounded">
<code class="json hljs">{
    "id": "XX",
    "chave":"<?php echo $chave2;?>",
    "nome":"<?php echo $nome;?>",
    "apartamento":"<?php echo $apartamento;?>",
    "bloco":"<?php echo $bloco;?>",
    "complemento":"<?php echo $complemento;?>",
    "telefone":"<?php echo $telefone;?>",
    "email":"<?php echo $email;?>",
    "documento":"<?php echo $documento;?>"
}
</code>
</pre>

<small>Json de resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": true,
    "mensagem": "Condomino Alterado",
    "chave": "<?php echo $chave2;?>"
}
</code>
</pre>

<small>Json de resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": false,
    "mensagem": "Ocorreu um erro ou nao há o que alterar em sua requisicao"
}
</code>
</pre>

<section class="docs-section" id="editar-condomino">
	<h2 class="section-heading">Editar condomino</h2>
	<!-- <p>Uma vez credenciado e liberado o condomínio, é possivel manipular os condominos de cada condomínio.</p> -->
</section>

<section class="docs-section" id="editar-condomino-endpoint">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				PUT
			</h4>
			<p>https://api.pagcondominio.com/erp/condomino</p>
		</div><!--//content-->
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json da requisição</small>
<pre class="rounded">
<code class="json hljs">{
    "id": "<?php echo $id;?>",
    "chave":"<?php echo $chave2;?>",
    "nome":"<?php echo $nome;?>",
    "apartamento":"<?php echo $apartamento;?>",
    "bloco":"<?php echo $bloco;?>",
    "complemento":"<?php echo $complemento;?>",
    "telefone":"<?php echo $telefone;?>",
    "email":"<?php echo $email;?>",
    "documento":"<?php echo $documento;?>"
}
</code>
</pre>

<small>Json de resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": true,
    "mensagem": "Condomino Alterado",
    "chave": "<?php echo $chave2;?>"
}
</code>
</pre>

<small>Json de resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": false,
    "mensagem": "Ocorreu um erro ou nao há o que alterar em sua requisicao"
}
</code>
</pre>

</article>

<article class="docs-article" id="cartaodecredito">
<header class="docs-header">
	<h1 class="docs-heading">Cartão de Crédito</h1>
	<section class="docs-intro">
	<p>A Plataforma Pag condomínio é um conjunto de APIs que permite que, uma vez integrado, você consiga realizar cobranças de condomínios no cartão de crédito diretamente de seu ERP  essas cobranças são realizadas com base nos dados impressos no cartão digitados em um formulário pelo próprio portador.
De maneira totalmente segura e escalável, sem necessidade de leitura dos dados através de maquininhas ou outros dispositivos presentes no momento da captura da transação, esse modelo foi criado para facilitar a realização de cobranças da cota condominial  on-line,.</p>
	</section>
</header>

<section class="docs-section">
<h2 class="section-heading">Funcionalidades</h2>

<h3 class="section-heading">Armazenamento de Cartões (Tokenização)</h3>
<p>Você pode armazenar os dados de cartão do seu cliente de ate 2 cartões de maneira rápida e segura, facilitando a cobrança do condomínio, Escalável Nossa plataforma é capaz de processar rapidamente um grande número de transações por minuto.</p>

<h3 class="section-heading">Seguro</h3>
<p>A segurança em serviços financeiros é a maior prioridade da Pag Condomínio. Como cliente da, você se beneficiará de um serviço de pagamentos criado para cumprir todos os requisitos do PCI e atender as mais rigorosas demandas de segurança de grandes organizações.
Confiável</p>
<p>Um ambiente de processamento de pagamentos altamente confiável. Empregamos as melhores políticas de gestão de mudanças, gestão de incidentes e garantia da qualidade no nosso processo de desenvolvimento, incluindo a execução de testes automatizados de unidade, integração, contrato, carga, segurança e interface a cada novo release.</p>
</section>

<section class="docs-section" id="acessocartaodecredito">
	<h2 class="section-heading">Acesso</h2>
	<p>O acesso é o comum da API e pode ser consultado em <a href="#autenticacao">Autenticação</a></p>
</section>

<section class="docs-section" id="cadastrocartaodecredito">
	<h2 class="section-heading">Cadastro do Cartão</h2>
</section>

<section class="docs-section" id="">
	<h2 class="section-heading">URL ENDPOINT</h2>
		<div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				POST
			</h4>
			<p>https://api.pagcondominio.com/erp/cartao</p>
		</div><!--//content-->
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json da requisição</small>
<pre class="rounded">
<code class="json hljs">{
    "idcondomino":"<?php echo $id;?>",
    "chave":"<?php echo $chave;?>",
    "documento":"<?php echo $documento;?>",
    "bandeira":"<?php echo $bandeira;?>",
    "numero":"<?php echo $bandeira;?>",
    "nome":"<?php echo $nome;?>",
    "validade":"<?php echo $validade;?>",
    "cvv":"<?php echo $cvv;?>"
}
</code>
</pre>

<small>Json de resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": true,
    "mensagem": "Cartao cadastrado",
    "token": "{{token para uso do cartao}}"
}
</code>
</pre>

<small>Json de resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "erro": "Descrição do erro"
}
</code>
</pre>

<section class="docs-section" id="apagarcartaodecredito">
	<h2 class="section-heading">Apagar do Cartão</h2>
</section>

<section class="docs-section" id="">
	<h2 class="section-heading">URL ENDPOINT</h2>
		<div class="callout-block callout-block-danger">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span>
				DEL
			</h4>
			<p>https://api.pagcondominio.com/erp/cartao/apagar/{{token}}</p>
		</div>
	</div>
	<p>header 'content-type: application/json'</p>
</section>

<small>Json de resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": true,
    "mensagem": "Cartao apagado"
}
</code>
</pre>

<small>Json de resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": false,
    "mensagem": "Cartao ja apagado ou nao encontrado",
    "numero": 0
}
</code>
</pre>

</article>

<article class="docs-article" id="pagamentos">
<header class="docs-header">
	<h1 class="docs-heading">Pagamentos</h1>
	<!--
	<section class="docs-intro">
	<p>A Plataforma Pag condomínio é um conjunto de APIs que permite que, uma vez integrado, você consiga realizar cobranças de condomínios no cartão de crédito diretamente de seu ERP  essas cobranças são realizadas com base nos dados impressos no cartão digitados em um formulário pelo próprio portador.
De maneira totalmente segura e escalável, sem necessidade de leitura dos dados através de maquininhas ou outros dispositivos presentes no momento da captura da transação, esse modelo foi criado para facilitar a realização de cobranças da cota condominial  on-line,.</p>
	</section>
	-->
</header>

<!--
<section class="docs-section" id="pagamento">
	<h2 class="section-heading">Pagamento</h2>
</section>

<section class="docs-section" id="">
	<h2 class="section-heading">URL ENDPOINT</h2>
		<div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span>
				POST
			</h4>
			<p>https://api.pagcondominio.com/pagamento</p>
		</div>
	</div>
	<p>header 'content-type: application/json'</p>
</section>
-->

<!--
<small>Json da requisição</small>
<pre class="rounded">
<code class="json hljs">  [
    {
     <span class="hljs-attr">"condominio"</span>: <span class="hljs-string">"Número do Condomínio"</span>,
     <span class="hljs-attr">"token"</span>: <span class="hljs-string">"Token gerado no cadastro"</span>,
     <span class="hljs-attr">"documento"</span>: <span class="hljs-string">"CPF"</span>,
     <span class="hljs-attr">"descricao"</span>: <span class="hljs-string">"Descrição do pagamento"</span>,
     <span class="hljs-attr">"valor"</span>: <span class="hljs-string">"Valor total do pagamento</span>,
     <span class="hljs-attr">"expiracaodia"</span>: <span class="hljs-string">"Dia"</span>,
     <span class="hljs-attr">"expiracaomes"</span>: <span class="hljs-string">"Mês"</span>,
     <span class="hljs-attr">"expiracaoano"</span>: <span class="hljs-string">"Ano"</span>,
    }
  ]
</code>
</pre>

<small>Json de resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">  [
    }
     <span class="hljs-attr">"status"</span>: <span class="hljs-string">"Pagamento efetuado com sucesso"</span>
    }
  ]
</code>
</pre>

<small>Json de resposta com erro</small>
<pre class="rounded">
<code class="json hljs">  [
    }
     <span class="hljs-attr">"status"</span>: <span class="hljs-string">"Ocorreu um erro no pagamento do cartão"</span>
    }
  ]
</code>
</pre>
-->

<!--
<section class="docs-section" id="pagamentover">
	<h2 class="section-heading">Ver Pagamento</h2>
</section>

<section class="docs-section" id="">
	<h2 class="section-heading">URL ENDPOINT</h2>
		<div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span>
				GET
			</h4>
			<p>https://api.pagcondominio.com/pagamento</p>
		</div>
	</div>
	<p>header 'content-type: application/json'</p>
</section>
-->

<!--
<small>Json da requisição</small>
<pre class="rounded">
<code class="json hljs">  [
    {
     <span class="hljs-attr">"condominio"</span>: <span class="hljs-string">"Número do Condomínio"</span>,
     <span class="hljs-attr">"token"</span>: <span class="hljs-string">"Token gerado no cadastro"</span>,
     <span class="hljs-attr">"documento"</span>: <span class="hljs-string">"CPF"</span>,
     <span class="hljs-attr">"descricao"</span>: <span class="hljs-string">"Descrição do pagamento"</span>,
     <span class="hljs-attr">"valor"</span>: <span class="hljs-string">"Valor total do pagamento</span>,
     <span class="hljs-attr">"expiracaodia"</span>: <span class="hljs-string">"Dia"</span>,
     <span class="hljs-attr">"expiracaomes"</span>: <span class="hljs-string">"Mês"</span>,
     <span class="hljs-attr">"expiracaoano"</span>: <span class="hljs-string">"Ano"</span>,
    }
  ]
</code>
</pre>

<small>Json de resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">  [
    }
     <span class="hljs-attr">"status"</span>: <span class="hljs-string">"Pagamento efetuado com sucesso"</span>
    }
  ]
</code>
</pre>

<small>Json de resposta com erro</small>
<pre class="rounded">
<code class="json hljs">  [
    }
     <span class="hljs-attr">"status"</span>: <span class="hljs-string">"Ocorreu um erro no pagamento do cartão"</span>
    }
  ]
</code>
</pre>
-->

<section class="docs-section" id="cartaoprepago">
	<h1 class="docs-heading">Cartão Pré Pago</h1>
	<p>O Cartão pré-pago  Pag condominio É um benefício que oferecemos a mais entre nossas soluções de pagamento para seu condominio</p>
</section>

<section class="docs-section" id="acesso">
	<h2 class="section-heading">Acesso</h2>
</section>

<section class="docs-section">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span>
				POST
			</h4>
			<p>https://auth.caradhras.io/oauth2/token</p>
		</div>
	</div>
	<p>header 'content-type: application/x-www-form-urlencoded'</p>
	<p>header 'grant_type: client_credentials'</p>
</section>

<section class="docs-section" id="contacriar">
	<h2 class="section-heading">Criar Conta</h2>
</section>

<section class="docs-section">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span>
				POST
			</h4>
			<p>https://api.caradhras.io/v2/individuals/accounts</p>
		</div>
	</div>
	<p>Authorization 'Authorization token'</p>
	<p>Content-Type 'application/json'</p>
	<p>idAccount 'Account identification code'</p>
	<h4>Query String</h4>
	<p>isPepReturn 'Indicates if the isPep field is returned in the response codes 201 and 202'</p>
	<h4>Request Body</h4>
	<pre class="rounded">
	<code class="json hljs">[
  {
	"name": "Seiya de Pegaso",
	"preferredName": "Seiya",
	"motherName": "Saori Kido",
	"birthDate": "1985-12-09",
	"gender": "M",
	"document": "03967703045",
	"emancipatedMinor": false,
	"idNumber": "6537265",
	"printedName": "SEIYA PEGASO",
	"identityIssuingEntity": "SSP",
	"federativeUnit": "SP",
	"issuingDateIdentity": "2000-02-01",
	"idMaritalStatus": 1,
	"idProfession": "1",
	"idOccupationType": 1,
	"idNationality": 1,
	"fatherName": "Matsumada Kido",
	"bankNumber": 9999,
	"branchNumber": 29999,
	"accountNumber": "99999999",
	"email": "teste@teste.com",
	"companyName": "teste",
	"idBusinessSource": 1,
	"idProduct": 1,
	"dueDate": 10,
	"incomeValue": 999,
	"isPep": true,
	"isPepSince": "2019-10-10",
	"address": {
		"idAddressType": 1,
		"zipCode": "04472200",
		"street": "Travessa Oceano",
		"number": 777,
		"complement": "Complemento 120",
		"referencePoint": "Em frente à Drogasil",
		"neighborhood": "Pinheiros",
		"city": "São Paulo",
		"federativeUnit": "SP",
		"country": "Brasil",
		"mailingAddress": true
	},
	"phone": {
		"idPhoneType": 1,
		"areaCode": "011",
		"number": "978789564"
	},
	"termsAndConditionsTokens": [
		"e8b90f67-09a8-428e-bab5-d6f271128b5b",
		"0229ad42-2fef-41eb-ba10-d7ebca5f70c0"
	],
	"deviceIdentification": {
		"fingerprint": "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0#1.160.10.240"
	}
  }
]
	</code>
	</pre>

	<h4>Responses</h4>

	<pre class="rounded">
	<code class="json hljs">[
  {
	"registrationId": "1f5e4b37-2456-40ba-8e7b-37b795ab863a",
	"status": "WAITING_DOCUMENTS"
  }
]
	</code>
	</pre>

</section>

<!--
<section class="docs-section" id="cartaocriar">
	<h2 class="section-heading">Criar Cartão</h2>
	<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a metus ac erat bibendum viverra. Maecenas aliquet ligula sit amet purus tincidunt, in ullamcorper lorem feugiat. Curabitur pretium diam nec ante condimentum.</p>
</section>

<section class="docs-section">
	<h2 class="section-heading">Cartão fisico</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span>
				POST
			</h4>
			<p>https://api.caradhras.io/contas/{idAccount}/gerar-cartao-grafica</p>
		</div>
	</div>
	<p>idAccount 'Account identification code'</p>
	<p>Authorization 'Authorization token'</p>
	<p>Content-Type 'application/json'</p>
	<h4>Body</h4>
	<p>id_pessoa 'Person ID (idIndividuals)'</p>
	<p>id_tipo_plastico 'Indicates the card design, this field is set during the issuer setup.'</p>
	<p>idImagem 'Identification code of the card image.'</p>
</section>
-->

<section class="docs-section" id="vercartao">
	<h2 class="section-heading">Ver Cartão</h2>
	<p class="d-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a metus ac erat bibendum viverra. Maecenas aliquet ligula sit amet purus tincidunt, in ullamcorper lorem feugiat. Curabitur pretium diam nec ante condimentum.</p>
</section>

<section class="docs-section">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				POST
			</h4>
			<p>https://api.pagcondominio.com/cartaoprepago/criarcartao</p>
		</div><!--//content-->
	</div>
	<p>header 'accept: application/json'</p>
	<p>header 'content-type: application/json'</p>
</section>

<section class="docs-section" id="cartaover">
	<h2 class="section-heading">Ver o Cartão</h2>
</section>

<section class="docs-section">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				POST
			</h4>
			<p>https://api.caradhras.io/cartoes</p>
		</div><!--//content-->
	</div>
	<p>Authorization 'Authorization token'</p>
</section>

<section class="docs-section" id="cartaosaldo">
	<h2 class="section-heading">Saldo do Cartão</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a metus ac erat bibendum viverra. Maecenas aliquet ligula sit amet purus tincidunt, in ullamcorper lorem feugiat. Curabitur pretium diam nec ante condimentum.</p>
</section>

<section class="docs-section">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				POST
			</h4>
			<p>https://api.pagcondominio.com/cartaoprepago/saldo</p>
		</div><!--//content-->
	</div>
	<p>header 'accept: application/json'</p>
	<p>header 'content-type: application/json'</p>
</section>

<section class="docs-section" id="cartaotrocarsenha">
	<h2 class="section-heading">Trocar Senha</h2>
</section>

<section class="docs-section">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				POST
			</h4>
			<p>https://api.caradhras.io/cartoes/{idCard}/cadastrar-senha</p>
		</div><!--//content-->
	</div>
	<!--
	<p>idCard 'Card identification code'</p>
	-->
	<h4>Headers</h4>
	<!--
	<p>Authorization 'Authorization token'</p>
	-->
	<p>Content-Type 'application/json'</p>
	<!--
	<p>senha 'Card password'</p>
	-->

</section>

<section class="docs-section" id="cartaotransacoes">
	<h2 class="section-heading">Transações</h2>
	<p>Saiba em tempo real, a despesa do condomínio sem burocracia</p>
</section>

<section class="docs-section">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span><!--//icon-holder-->
				POST
			</h4>
			<p>https://api.caradhras.io/accounts/{idAccount}/transactions</p>
		</div><!--//content-->
	</div>
	<p>idAccount 'Account identification code'</p>
	<h4>Headers</h4>
	<p>Authorization 'Authorization token'</p>
</section>

</article>

<article class="docs-article" id="boleto">
<header class="docs-header">
	<h1 class="docs-heading">Boleto</h1>
	<section class="docs-intro">
	<p>O nosso boleto é web service que disponibiliza operações de cobrança de condomínios de maneira totalmente segura e escalável. Ele foi criado para facilitar aos ERPs e  Softwares de Gestão o recebimento de pagamentos da cota condominial.</p>
	</section>
</header>
</article>

<article class="docs-article" id="boletogerar">
<header class="docs-header">
	<h1 class="docs-heading">Boleto Gerar</h1>
</header>

<section class="docs-section">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span>
				POST
			</h4>
			<p>https://api.pagcondominio.com/erp/boleto</p>
		</div>
	</div>
	<h4>Headers</h4>
	<p>Content-Type 'application/json'</p>
</section>

<pre class="rounded">
<code class="json hljs">{
    "tipo": "boleto",
    "externo": "123456",
    "referencia": "Texto livre",
    "chave": "<?php echo $chave;?>",
    "condominionome": "<?php echo $condominio;?>",
    "consumidor": {
        "nome": "<?php echo $nome;?>",
        "documento": "<?php echo $documento;?>",
        "email": "<?php echo $email;?>",
        "telefone": "<?php echo $telefone;?>",
        "endereco": {
            "cep": "<?php echo $cep;?>",
            "logradouro": "<?php echo $logradouro;?>",
            "numero": "<?php echo $numero;?>",
            "complemento": "<?php echo $complemento;?>",
            "bairro": "<?php echo $bairro;?>",
            "cidade": "<?php echo $cidade;?>",
            "estado": "<?php echo $estado;?>"
        }
    },
    "produtos": [
        {
            "code": "001",
            "descricao": "Condominio",
            "valor": 440.90,
            "quantidade": 1
        }
    ],
    "pagamento": {
        "descricao": "Pagamento mensal do condminio mais os serviços",
        "instrucoes": "Texto de instruções",
        "mensagens": [
            "Mensagem um",
            "Mensagem dois"
        ],
        "vencimento": "<?php echo $vencimento;?>"
    }
}
</code>
</pre>

<small>Resposta</small>
<pre class="rounded">
<code class="json hljs">{
    "externo": "123456",
    "interno": 15825421,
    "tipo": "boleto",
    "documento": "24389180045",
    "valor": 442.55,
    "linhadigitavel": "03399065964100000048347470701013887690000044255",
    "codigodebarras": "03398876900000442559065941000000484747070101",
    "link": "https://api.pagcondominio.com/gerarboleto/boleto/{{interno}}/pdf",
    "situacao": {
 	"erros": false,
        "condicao": "pendente",
        "mensagem": "Aguardando o pagamento. Após o pagamento, o boleto poderá levar até dois dias úteis para ser compensado.",
        "data": "<?php echo $data;?>"
    }
}
</code>
</pre>
					
</article>

<article class="docs-article" id="boletoalterar">
	<header class="docs-header">
		<h1 class="docs-heading">Boleto Alterar</h1>
		<!-- <section class="docs-intro">
		<p>O nosso boleto é web service que disponibiliza operações de cobrança de condomínios de maneira totalmente segura e escalável. Ele foi criado para facilitar aos ERPs e  Softwares de Gestão o recebimento de pagamentos da cota condominial.</p>
		</section> -->
	</header>

	<section class="docs-section">
		<h2 class="section-heading">URL ENDPOINT</h2>
		<div class="callout-block callout-block-warning">
			<div class="content">
				<h4 class="callout-title">
					<span class="callout-icon-holder mr-1">
						<i class="fa fa-database" aria-hidden="true"></i>
					</span>
					POST
				</h4>
				<p>https://api.pagcondominio.com/erp/boleto/alterar</p>
			</div>
		</div>
		<h4>Headers</h4>
		<p>Content-Type 'application/json'</p>
	</section>

<pre class="rounded">
<code class="json hljs">{
    "externo": "36913a",
    "interno": 15815907,
    "boleto": {
        "desconto": "",
        "descontovalor": "100",
        "data": "10/10/2021"
    }
}
</code>
</pre>

<small>Resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "externo": "123456",
    "interno": 15825421,
    "tipo": "boleto",
    "documento": "24389180045",
    "valor": 442.55,
    "linhadigitavel": "03399065964100000048347470701013887690000044255",
    "codigodebarras": "03398876900000442559065941000000484747070101",
    "link": "https://api.pagcondominio.com/gerarboleto/boleto/{{interno}}/pdf",
    "situacao": {
        "erros": false,
        "condicao": "pendente",
        "mensagem": "Aguardando o pagamento. Após o pagamento, o boleto poderá levar até dois dias úteis para ser compensado.",
        "data": "2021/07/04 08:02:00"
    }
}
</code>
</pre>

<small>Resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": false,
    "mensagem": "Ambiente da transação incompatível com token informado."
}
</code>
</pre>
</article>

<article class="docs-article" id="boletoconsultar">
	<header class="docs-header">
		<h1 class="docs-heading">Boleto Consultar</h1>
		<!-- <section class="docs-intro">
		<p>O nosso boleto é web service que disponibiliza operações de cobrança de condomínios de maneira totalmente segura e escalável. Ele foi criado para facilitar aos ERPs e  Softwares de Gestão o recebimento de pagamentos da cota condominial.</p>
		</section> -->
	</header>

	<section class="docs-section">
		<h2 class="section-heading">URL ENDPOINT</h2>
		<div class="callout-block callout-block-warning">
			<div class="content">
				<h4 class="callout-title">
					<span class="callout-icon-holder mr-1">
						<i class="fa fa-database" aria-hidden="true"></i>
					</span>
					GET
				</h4>
				<p>https://api.pagcondominio.com/erp/boleto/ver/{{id}}</p>
			</div>
		</div>
	</section>

<small>Resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "interno": 15816129,
    "mensagem": "Pendente",
    "data": "<?php echo $data2;?>",
    "valor": 442.55,
    "consumidor": {
        "nome": "<?php echo $nome;?>",
        "documento": "<?php echo $documento;?>",
        "endereco": {
            "logradouro": "<?php echo $logradouro;?>",
            "numero": "<?php echo $numero;?>",
            "complemento": "<?php echo $complemento;?>",
            "bairro": "<?php echo $bairro;?>",
            "cidade": "<?php echo $cidade;?>",
            "estado": "<?php echo $sp;?>"
        },
        "pagamento": {
            "data": "<?php echo $data3;?>",
            "linhadigitavel": "03399065964100000048347313901010187690000044255",
            "codigodebarras": "03391876900000442559065941000000484731390101"
        }
	}
}
</code>
</pre>

<small>Resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": false,
    "mensagem": "Ocorreu um erro não catalogado"
}
</code>
</pre>

</article>

<article class="docs-article" id="boletocancelar">
	<header class="docs-header">
		<h1 class="docs-heading">Boleto Cancelar</h1>
		<!-- <section class="docs-intro">
		<p>O nosso boleto é web service que disponibiliza operações de cobrança de condomínios de maneira totalmente segura e escalável. Ele foi criado para facilitar aos ERPs e  Softwares de Gestão o recebimento de pagamentos da cota condominial.</p>
		</section> -->
	</header>

	<section class="docs-section">
		<h2 class="section-heading">URL ENDPOINT</h2>
		<div class="callout-block callout-block-warning">
			<div class="content">
				<h4 class="callout-title">
					<span class="callout-icon-holder mr-1">
						<i class="fa fa-database" aria-hidden="true"></i>
					</span>
					DELETE
				</h4>
				<p>https://api.pagcondominio.com/erp/boleto/apagar</p>
			</div>
		</div>
		<h4>Headers</h4>
		<p>Content-Type 'application/json'</p>
	</section>

<pre class="rounded">
<code class="json hljs">{
    "interno": "15816129"
}
</code>
</pre>

<small>Resposta com sucesso</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": true,
    "mensagem": "Boleto apagado",
    "registros": 1
}
</code>
</pre>

<small>Resposta com erro</small>
<pre class="rounded">
<code class="json hljs">{
    "sucesso": false,
    "mensagem": "Boleto ja apagado ou nao encontrado",
    "registros": 0
}
</code>
</pre>

</article>

<article class="docs-article" id="webhook">
<header class="docs-header">
	<h1 class="docs-heading">Webhook</h1>
	<!--
	<section class="docs-intro">
	<p>O nosso boleto é web service que disponibiliza operações de cobrança de condomínios de maneira totalmente segura e escalável. Ele foi criado para facilitar aos ERPs e  Softwares de Gestão o recebimento de pagamentos da cota condominial.</p>
	</section>
    -->
</header>
</article>

<article class="docs-article" id="consultartransacao">
<header class="docs-header">
	<h1 class="docs-heading">Consultar Transação</h1>
</header>

<section class="docs-section">
	<h2 class="section-heading">URL ENDPOINT</h2>
	 <div class="callout-block callout-block-warning">
		<div class="content">
			<h4 class="callout-title">
				<span class="callout-icon-holder mr-1">
					<i class="fa fa-database" aria-hidden="true"></i>
				</span>
				GET
			</h4>
			<p>https://api.pagcondominio.com/erp/webhook/{{cartao ou boleto}}/{{id transacao}}</p>
		</div>
	</div>
	<h4>Headers</h4>
	<p>Content-Type 'application/json'</p>
</section>

<small>Resposta</small>
<pre class="rounded">
<code class="json hljs">{
    "status": {{true ou false}},
    "pagamento": "{{cartao ou boleto}}",
    "token": "{{id transacao}}",
    "message": "{{Mensagem}}"
}
</code>
</pre>
					
</article>

			    <footer class="footer"></footer>
		    </div> 
	    </div>
    </div>

<!-- Javascript -->          
<script src="assets/plugins/jquery-3.4.1.min.js"></script>
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
<!-- Page Specific JS -->
<!-- <script src="assets/js/highlight-custom.js"></script>   -->
<script src="assets/plugins/jquery.scrollTo.min.js"></script>
<!-- <script src="assets/plugins/lightbox/dist/ekko-lightbox.min.js"></script>  -->
<script src="assets/js/docs.js"></script>
</body>
</html>