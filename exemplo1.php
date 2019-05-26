<?php
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cash-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//array de preços
$produto = array(
    "P1" => "29.90",
    "P2" => "35.00",
    "P3" => "40.50",
    "P4" => "50.90",
    "P5" => "120.00"
);

$codigo = $_GET["cod"];
if (isset($produto[$codigo])) {
    echo $produto[$codigo];
} else {
    echo "0.00";
}
