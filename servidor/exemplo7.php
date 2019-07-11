<?php
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cash-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
// header("Content-Type: text/html; charset=ISO-8859-1");

$usuarios = array("jackson", "douglas", "bernardo", "feijão");

$username = strtolower($_GET["username"]);
$valido = 1;
for ($i=0; $i < sizeof($usuarios); $i++) { 
    if ($usuarios[$i]==$username) {
        $valido = 0;   
    }
}

if ($valido) {
    echo "Username OK";
} else {
    echo "Usuário já existe";
}
