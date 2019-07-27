<?php
$id = $_GET['detalhes'];
$sql = "SELECT * FROM produto WHERE idProduto = $id";
$result = $conn->query($sql);

if ($result->rowCount()>0) {
    $dados = $result->fetch(\PDO::FETCH_ASSOC);
    $idProduto = $dados['idProtuto'];
    $nome = $dados['nome'];
    $descricao = $dados['descricao'];
    $preco = $dados['preco'];
    $promocao = $dados['precoPromocao'];
    $peso = $dados['peso'];
    $idCategoria = $dados['idCategoria'];
        
    echo "<p><img src=\"assets/img/figuras/item.gif\" width=\"14\" height=\"14\">$nome</p>";
    echo "<p class=\"descricao\">$descricao</p>";

    if($promocao == '0.00'){
        echo "<span class=\"preco\">Preço: R\$ $preco</span><br>";
    } else {
        echo "<span class=\"preco\">Promoção: de <span class=\"promocao\">R\$ $preco</span> por R\$ $promocao</span><br>";
    }

    echo "<a href=\"javascript:Loja('carrinho', '$id');\"><img src=\"assets/img/figuras/comprar.gif\" border=\"0\"></a>";

} else {
    # code...
}
