<?php
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cash-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
// header("Content-Type: text/html; charset=ISO-8859-1");

$dicionario = array(
    "book" => "livro", 
    "dog"  => "cachorro", 
    "cat" => "gato",
    "monkey" => "macaco",
    "orange" => "laranja"
);

$palavra = $_GET["palavra"];

if (isset($dicionario[$palavra])) {
    echo $dicionario[$palavra];
} else {
    echo "Palavra não encontrada";
}
