/* REACT.js */
class Header extends React.Component {
	render() {
	  return (
		<div>
		<h1><a href="https://pagcondominio.com/condomino">PagCondominio.com</a></h1>
		<nav id="nav">
			<ul>
				<li><a href="inicio" class="button" title="Início" alt="Início"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li><a href="inicio#cartoes" class="button" title="Cartões" alt="Cartões"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>
				<li><a href="inicio#pagamentos" class="button" title="Pagamentos" alt="Pagamentos"><i class="fa fa-usd" aria-hidden="true"></i></a></li>
				<li><a href="#dados" rel="modal:open" class="button" title="Dados" alt="Dados"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
				<li><a href="sair" class="button" title="Sair" alt="Sair"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
			</ul>
		</nav>
		</div>
	  );
	}
  }
ReactDOM.render(<Header />, document.getElementById('header'));

class Footer extends React.Component {
	render() {
	  return (
		<div>
			<ul class="icons">
				<li><a href="https://github.com/pagcondominio" target="_blank" rel="noopener" class="icon fa-github"><span class="label">Github</span></a></li>
				<li><a href="https://www.linkedin.com/company/pag-condominio/about/" target="_blank" rel="noopener" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
			</ul>
		<ul class="copyright">
			<li>&copy; 2021 PagCondominio.</li>
			<li><a href="https://www.pagcondominio.com/">Home</a></li>
			<li><a href="https://pagcondominio.com/politica-de-cookies">Política de Cookies</a></li>
			<li><a href="https://pagcondominio.com/politica-de-privacidade">Política de Privacidade</a></li>
			<li><a href="https://pagcondominio.com/sobre">Sobre</a></li>
			<li><a href="https://documentacao.pagcondominio.com/">Desenvolvedores</a></li>
			<li><a href="https://pagcondominio.com/contato">Contato</a></li>
		</ul>
		</div>
	  );
	}
  }
  ReactDOM.render(<Footer />, document.getElementById('footer'));

  /*

class Footer extends React.Component {
	render() {
	  return (
		<form>
		<select>
		  <option value="Ford">Ford</option>
		  <option value="Volvo">Volvo</option>
		  <option value="Fiat">Fiat</option>
		  <option value="Porsche">Porsche</option>
		</select>
		</form>
	  );
  }
ReactDOM.render(<Footer />, document.getElementById('footer'));
*/