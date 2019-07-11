<?php
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cash-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
// header("Content-Type: text/html; charset=ISO-8859-1");

$times = array(
    "gremio" => "Time de Porto Alegre (RS) <br> Estádio: Olímpico",
    "palmeiras" => "Time de São Paulo (SP) <br> Estádio: Palestra Itália",
    "cruzeiro" => "Time de Belo Horizonte (MG) <br> Estádio: Mineirão",
    "flamengo" => "Time do Rio de Janeiro (RS) <br> Estádio: Maracanã",
    "criciuma" => "Time de Criciúma (SC) <br> Estádio: Heriberto Hulce"
);

$time = $_GET["time"];
if (isset($times[$time])) {
    echo $times[$time];
} else {
    echo "Time não encontrado.";
}
