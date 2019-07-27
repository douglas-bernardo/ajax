<?php
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cash-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
// header("Content-Type: text/html; charset=ISO-8859-1");

include "conecta.php";

if (isset($_GET['inicio']) || isset($_GET['busca']) || $_GET['categoria']) {
    include 'listaProdutos.php';
} elseif (isset($_GET['detalhes'])) {
    include 'mostraDetalhes.php';
} elseif (isset($_GET['carrinho']) || isset($_GET['frete']) || isset($_GET['quantidade'])) {
    include 'carrinho.php';
} elseif (isset($_GET['limpar'])) {
    include 'limpaCarrinho.php';
} elseif (isset($_GET['validaUsuario'])) {
    include 'validaUsuario.php';
} elseif (isset($_GET['novoUsuario'])) {
    include 'novoUsuario.php';
} else {
    echo 'Favor acessar a home da loja';
}