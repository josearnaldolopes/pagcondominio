<?php
//Criptpografia
$cripMetodo = 'aes128';
$cripSenha = 'dmlkYSBsb25nYSBlIHByb3NwZXJh';

function criptografia($valor) {
	$valor = md5($valor);
	return $valor;
}
function criptografar($valor) {
	global $cripMetodo, $cripSenha;
	$valor = openssl_encrypt($valor, $cripMetodo, $cripSenha);
	return $valor;
}
function descriptografar($valor) {
	global $cripMetodo, $cripSenha;
	$valor = openssl_decrypt($valor, $cripMetodo, $cripSenha);
	return $valor;
}