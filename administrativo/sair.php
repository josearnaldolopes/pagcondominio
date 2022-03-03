<?php
include "../app/constants.php";
// setcookie("administrativo", "", (time() + (2 * 3600)), dominio."/administrativo");
setcookie("acesso", "");
setcookie("chaveacesso", "");
setcookie("email", "");
setcookie("emaillog", "");
setcookie("administrativo", "");
setcookie("administradora", "");
header ("Location: index");