<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.ansertecnologia.com/midas-core/v2/customer/CPF/28044488863/creditcard',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic cGFnY29uZG9taW5pby1oZWxib3I6SW5FdjJJQmlYTDFkWlJRdlpkbnVpQ0N6SktEVFd3PT0='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
// var_dump($response);

//faz o parsing da string, criando o array "cartoes"
$jsonObj = json_decode($response);
$cartoes = $jsonObj->creditCards;

//navega pelos elementos do array, imprimindo cada empregado
foreach ( $cartoes as $cartao )
{ 
  echo "<div class=\"col-4 col-12-mobilep\">";
    echo "<ul class=\"alt\">";
      echo "<li>";
      echo "<p><b>Cartão</b>: $cartao->brand <br> <b>Nome</b>: $cartao->holderName <br> <b>Número</b>: **** **** $cartao->panLastDigits <br> <b>Validade</b>: $cartao->expirationMonth/$cartao->expirationYear<br>";
        echo "<a href=\"cartao-apagar?token=$cartao->token\" class=\"button small\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a>";
        //echo "<a href=\"pagar?token=$cartao->token\" class=\"button small\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></a>";
      echo "</p>";
      echo "</li>";
    echo "</ul>";
  echo "</div>";
}