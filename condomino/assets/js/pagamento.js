$(document).ready(function(){
  function total() {
    var valor = $("#valor").val();
    var parcela = $("#parcela").val();
    // $("#total").html(valor);
    if (parcela == 1) {
      $("#total").html($("#valor").val() / $("#parcela").val());
      // console.log("a vista")
    } else if (parcela > 1) {
      var parcelas = $("#valor").val() / $("#parcela").val();
      var juros = parcelas * 0.05;
      $("#total").html(Math.round( parcelas + juros ));
      // $("#total").html($("#valor").val() / $("#parcela").val());
    }
    // console.log("Parcela"+valor+ " e " +parcela);
  }
  total();
  $("#parcela").change(function() {
    total();
  });
  
  $("#valor").keyup(function() {
    total();
  });

  $("#pagar").click(function(){
    var nom = $("#nome").val();
    var cvv = $("#cvv").val();
    var mes = $("#mes").val();
    var ano = $("#ano").val();
    var numero = $("#numero").val();

    // console.log("Valores: "+nom+" > "+cvv+" > "+mes+" > "+ano+" > "+numero+" > "+valor+" > "+parcela)
      if (nom == "") {
        $("#pagamentocartao").html("Preencha o nome");
        $("#nome").focus();
        return false;
      } else if (numero == "") {
        $("#pagamentocartao").html("Preencha o número");
        $("#numero").focus();
        return false;
      } else if (cvv == "") {
        $("#pagamentocartao").html("Preencha o CVV");
        $("#cvv").focus();
        return false;
      } else if (mes == "") {
        $("#pagamentocartao").html("Preencha o mês");
        $("#mes").focus();
        return false;
      } else if (ano == "") {
        $("#pagamentocartao").html("Preencha o ano");
        $("#ano").focus();
        return false;
      } else {
        $("#pagamentocartao").html("Carregando...");
      }
    $.post("https://pagcondominio.com/api/v1/t/zoop-transacao.php",
    {
      nome: nom,
      cvv: cvv,
      mes: mes,
      ano: ano,
      num: numero
    },
    function(data, status){
      $("#pagamentocartao").html(data);
    });
  
  });


  $("#pagarTeste").click(function(){
    var nom = $("#nome").val();
    var cvv = $("#cvv").val();
    var mes = $("#mes").val();
    var ano = $("#ano").val();
    var numero = $("#numero").val();
    var valor = $("#valor").val();

    // console.log("Valores: "+nom+" > "+cvv+" > "+mes+" > "+ano+" > "+numero+" > "+valor+" > "+parcela)
      if (nom == "") {
        $("#pagamentocartao").html("Preencha o nome");
        $("#nome").focus();
        return false;
      } else if (numero == "") {
        $("#pagamentocartao").html("Preencha o número");
        $("#numero").focus();
        return false;
      } else if (cvv == "") {
        $("#pagamentocartao").html("Preencha o CVV");
        $("#cvv").focus();
        return false;
      } else if (mes == "") {
        $("#pagamentocartao").html("Preencha o mês");
        $("#mes").focus();
        return false;
      } else if (ano == "") {
        $("#pagamentocartao").html("Preencha o ano");
        $("#ano").focus();
        return false;
      } else {
        $("#pagamentocartao").html("Carregando...");
      }
    
    $.post("https://pagcondominio.com/api/v1/transacao/zoop-transacao-teste.php",
    {
      nome: nom,
      cvv: cvv,
      mes: mes,
      ano: ano,
      num: numero,
      valor: valor
    },
    function(data, status){
      $("#pagamentocartao").html(data);
    });
  
  });


  $("#boleto").click(function(){
    $.post("../api/v1/transacao/boleto.php",
    {
      // nome: nom,
      // cvv: cvv,
      // mes: mes,
      // ano: ano,
      // num: numero
    },
    function(data, status){
      $("#pagamentoboleto").html(data);
      console.log(" console.log Boleto");
    });
  });

  $("#pix").click(function(){
    $.post("../api/v1/transacao/pix.php",
    {
      // nome: nom,
      // cvv: cvv,
      // mes: mes,
      // ano: ano,
      // num: numero
    },
    function(data, status){
      $("#pagamentopix").html(data);
      console.log(" console.log do PIX");
    });
  });
  
});