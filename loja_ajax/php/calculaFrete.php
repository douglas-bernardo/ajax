<?php
//calcula o peso atual dos carrinhos
$pesoTotal = 0;
foreach ($carrinhoAtual as $id => $quant) {
    $sql = "SELECT peso FROM produto WHERE idProduto = $id";
    $res = $conn->query($sql);
    $dados = $res->fetch();
    $pesoTotal += $quant * $dados['peso'];
}

//define o preco de acordo com o peso e local
if(isset($_GET['frete'])){
    $localFrete = $_GET['frete'];
} elseif (isset($_COOKIE['localFrete'])) {
    $localFrete = $_COOKIE['localFrete'];
} else {
    $localFrete = "";
}

$res = $conn->query("SELECT preco FROM frete WHERE local = '$localFrete' AND pesoLimite > $pesoTotal ORDER BY pesoLimite");

if ($res->rowCount()>0) {
    $dados = $res->fetch();
    $valorFrete = $dados['preco'];
    setcookie('localFrete', $localFrete);
} else {
    $valorFrete = 0;
    setcookie('valorFrete', $valorFrete);
}
