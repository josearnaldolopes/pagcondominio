<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.ansertecnologia.com/midas-core/v2/creditcard//95ddb4dbb456f17396a01cf30637ae30',
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
echo $response;

/* Lendo o json */
$resposta = json_decode($response);
// echo var_dump($resposta);
echo "<b>Nome no Cartão:</b> ".trim($resposta->creditCard->holderName)."<br>";
echo "<b>Bandeira:</b> ".trim($resposta->creditCard->brand)."<br>";
echo "<b>Validade:</b> ".$resposta->creditCard->expirationMonth."/".$resposta->creditCard->expirationYear."<br>";
echo "<b>".$resposta->creditCard->customer->documentType.":</b> ".trim($resposta->creditCard->customer->documentNumber)."<br>";
// echo $resposta[2];