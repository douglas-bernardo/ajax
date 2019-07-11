<?php
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cash-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
// header("Content-Type: text/html; charset=ISO-8859-1");

$frete = array(
    "CE" => "14.00", 
    "BA"  => "24.00", 
    "PE" => "16.00",
    "AL" => "17.00"
);

$estado = $_GET["estado"];

if (isset($frete[$estado])) {
    echo "O valor do frete é: " . $frete[$estado];
} else {
    echo "Não Disponível";
}
