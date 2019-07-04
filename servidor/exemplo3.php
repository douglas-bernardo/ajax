<?php
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cash-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//obtem os dados do formulário:
$nome   = $_POST['nome'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$pais   = $_POST['pais'];

//cria uma string XML:
$meuXML  = '<?xml version="1.0"?>';
$meuXML .= "<dados>";
$meuXML .= "<nome>$nome</nome>";
$meuXML .= "<cidade>$cidade</cidade>";
$meuXML .= "<estado>$estado</estado>";
$meuXML .= "<pais>$pais</pais>";
$meuXML .= "</dados>";

//retorna os dados ao navegador:
header("Content-type: text/xml");
echo $meuXML;