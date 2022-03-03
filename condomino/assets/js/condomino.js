$(function(){
    $(".cadastro").click(function() {
        var condominio = $("#NomeCond").val();
        var email      = $("#email").val();
        var documento  = $("#documento").val();
        var senha      = $("#senha").val();
        if (condominio && email && documento && senha) {
            //console.log("Valores: "+condominio+ " " + email + " " + documento + " " + senha)
            $.post("../app/condomino/cadastro",
            {
                condominio: condominio,
                email: email,
                documento: documento,
                senha: senha
            },
            function(data, status){
              if (data) {
               $("#aviso").html("Cadastro feito com sucesso");                 
            } else {
               $("#aviso").html("");                 
            }
              console.log(data)
            });

        } else {
            $("#aviso").html("Preencha todos os campos");   
        }
    });

    $(".btpgto").click(function() {
        var pgto = $(this).data("pgto");
        var valor = $(this).data("valor");
        console.log("Data: "+pgto+ ". Valor: " +valor)
        $("#valor").val(valor);
        //$("#aviso").hide().html("");
        //logar();
    });

    $(".btpagar").click(function() {
        // var pago = $(this).data("pago");
        // console.log("Data: "+pago);
        //$("#aviso").hide().html("");
        //logar();
        var cartao    = $("#cartoes").val();
        var cvv       = $("#cvv").val();
        var valor     = $("#valor").val();
        var documento = $("#documento").val();
        // console.log("Valores"+cartao+cvv+valor+documento)
        $.post("anser/cartao-pagamento",
        {
            cartoes: cartao,
            cvv: cvv,
            documento: documento,
            valor: valor
        },
        function(data, status){
          if (data) {
           $("#avisoPgto").html(data);                 
        } else {
           $("#avisoPgto").html("");                 
        }
          console.log(data)
        });
    });

    $(".btpago").click(function() {
        var pago = $(this).data("pago");
        console.log("Data: "+pago)
        //$("#aviso").hide().html("");
        //logar();
    });

    $("#fade").modal({
        fadeDuration: 100
    });

});