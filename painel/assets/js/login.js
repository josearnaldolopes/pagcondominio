$(document).ready(function(){
    $("#aviso").hide();
    $("#login").focus();
    //------ Enter no Login ------//
    $('body, .login-form').keypress(function (e) {
        if (e.which == 13) {
          logar();
          e.preventDefault();
          return false;
        }
    });
    
    $(".formLogin").click(function() {
      $("#aviso").hide().html("");
      var localForm = $("#local").val()
      var chaveForm = $("#chave").val()
      var loginForm = $("#login").val()
      var senhaForm = $("#senha").val()
      if (!loginForm || !senhaForm) {
        $("#aviso").show().html("Preencha os campos");
        $("#login").focus();
        return false;
      } else {
        $("#aviso").show().html("Conferindo dados...");
        $.post("controller/logar", {login:loginForm, chave:chaveForm, senha:senhaForm, local:localForm},
        function(data,status) {
            // alert("Data: " + data)

            if (data > 0) {
              $("#aviso").html("Redirecionando...")
              window.location.href = "painel/"+localForm+"#administradora"
              // alert(data)
            } else {
              // alert(data)
              $("#aviso").html("Login ou Senha errado...")
              $("#login").focus()
              return false
            }

          });
        }
    });
});