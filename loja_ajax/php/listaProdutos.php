<?php
if (isset($_GET['inicio'])) {
    echo "<p class=\"titulo\">Destaques</p>";
    $sql = "SELECT * FROM produto LIMIT 10";
} elseif (isset($_GET['categoria'])) {
    $cat = $_GET['categoria'];
    $sql = "SELECT * FROM produto WHERE idCategoria = $cat";
} else {
    $palavra = $_GET['busca'];
    $sql = "SELECT * FROM produto WHERE nome like '%$palavra%'";
}

$result = $conn->query($sql);

if ($result->rowCount()>0) {
    foreach ($result->fetchAll(\PDO::FETCH_ASSOC) as $res) {
        $id = $res['idProduto'];
        $nome = $res['nome'];
        $preco = $res['preco'];
        $promocao = $res['precoPromocao'];
        
        echo "<p><img src=\"assets/img/figuras/item.gif\" width=\"14\" height=\"14\">$nome</p>";
        if($promocao=='0.00'){
            echo "<span class=\"preco\">Preço: R\$ $preco</span><br>";
        } else {
            echo "<span class=\"preco\">Promoção: de <span class=\"promocao\">R\$ $preco</span> por R\$ $promocao</span><br>";
        }

        echo "<a href=\"javascript:Loja('detalhes', '$id');\"><img src=\"assets/img/figuras/detalhes.gif\" border=\"0\"></a>";

        echo "<a href=\"javascript:Loja('carrinho', '$id');\"><img src=\"assets/img/figuras/comprar.gif\" border=\"0\"></a>";

    }

} else {
    echo "<p class=\"titulo\">Nenhum produto encontrado</p>";
}
