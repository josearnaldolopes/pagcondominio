<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PagCondominio.com | Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/css/login.min.css?v=001" rel="stylesheet" id="bootstrap-css">
    <link rel="icon" type="image/png" href="assets/icons/icon-32x32.png">
  </head>
  <body>
      <div class="wrapper fadeInDown">
        <div id="formContent">

          <div class="fadeIn first"></div>

            <form method="post">
              <input type="email" id="login" class="fadeIn second" name="login" placeholder="email" value="email@email.com" required>
              <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="senha" value="senha" required>
              <p id="aviso" class="alert alert-danger" role="alert"></p>
              <input type="hidden" id="local" name="local" value="<?php echo $_GET["a"]?>">
              <input type="button" class="fadeIn fourth formLogin" value="Entrar">
            </form>

          <div id="formFooter">
            <a class="underlineHover" href="esqueci-a-senha">Esqueci a senha</a>
          </div>

        </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="assets/js/login.js"></script>
  </body>
</html>
