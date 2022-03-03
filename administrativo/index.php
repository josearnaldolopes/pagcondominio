<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="robots" content="noindex, nofollow">
<title>PagCondominio.com | Administrativo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link href="../assets/css/pagcondominio.css" rel="stylesheet">
<link rel="icon" type="image/png" href="../assets/logos/icon-32x32.png">
<style>
.boxlogin {
    background-color: #eee;
    border: 1px solid #ccc;
    padding: 20px 2px 20px 35px;
    border-radius: 5px;
}
.login .sign-btn input.btn {
    width:100%;
}
</style>
</head>

<body class="main">

<div class="login-screen"></div>
<div class="login-center">
    <div class="container min-height" style="padding-top: 20px;">
    	<div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4 boxlogin">
                <div class="login" id="card">
                	<div class="front signin_form"> 
                    <p><img src="../assets/imagens/logos/logo-preto.png" class="img-responsive"></p>
                      <form class="login-form" method="post" style="backface-visibility: hidden;">
                          <div class="form-group" style="backface-visibility: hidden;">
                              <div class="input-group" style="backface-visibility: hidden;">
                                  <input class="form-control" placeholder="E-mail" style="backface-visibility: hidden;" type="email" name="login" id="login" required>
                                  <span class="input-group-addon" style="backface-visibility: hidden;">
                                      <i class="glyphicon glyphicon-user" style="backface-visibility: hidden;"></i>
                                  </span>
                              </div>
                          </div>
                          <div class="form-group" style="backface-visibility: hidden;">
                              <div class="input-group" style="backface-visibility: hidden;">
                                  <input class="form-control" placeholder="Senha" style="backface-visibility: hidden;" type="password" name="senha" id="senha" required>
                                  <span class="input-group-addon" style="backface-visibility: hidden;">
                                      <i class="glyphicon glyphicon-lock" style="backface-visibility: hidden;"></i>
                                  </span>
                              </div>
                          </div>
                          <p id="aviso" class="alert alert-danger" role="alert"></p>
                          <input type="hidden" id="local" value="administrativo">
                          <div class="form-group sign-btn" style="backface-visibility: hidden;">
                              <input type="button" class="btn formLogin" value="Entrar" style="backface-visibility:hidden;">
                          </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="../assets/js/pagcondominio.js?v=0.0.1"></script>
</body>
</html>