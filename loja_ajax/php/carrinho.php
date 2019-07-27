<?php
//obtém o carrinho atual
if ($_COOKIE['carrinhoAtual']) {
    $carrinhoAtual = $_COOKIE['carrinhoAtual'];
} else {
    $carrinhoAtual = array();
}

//se houver produto novo, insere no carrinho:
if ($_GET['carrinho']!=0) {
    $id = $_GET['carrinho'];
    if (!$carrinhoAtual[$id]) {
        $carrinhoAtual[$id] = 1;
        setcookie("carrinhoAtual[$id]", $carrinhoAtual[$id]);
    }
}

//altera a quantidade do produto
if (isset($_GET['quantidade'])) {
    $partes = explode('-', $_GET['quantidade']);
    $idProd = $partes[0];
    $novaQuant = $partes[1];

    if ($novaQuant==0) {
        setcookie("carrinhoAtual[$idProd]", false);
        unset($carrinhoAtual[$idProd]);
    } else {
        setcookie("carrinhoAtual[$idProd]", $novaQuant);
        $carrinhoAtual[$idProd] = $novaQuant;
    }
    
}

//calcula o frete:
include 'calculaFrete.php';

//exibe o carrinho de compras
echo "<form action =\"javascript:void()\">";
echo "<p class=\"titulo\">Seu carrinho de compras</p>";
echo "<div align=\"center\">";
echo "<p><table width=\"90%\" borde=\"1\">";
echo "<tr class=\"fundocinza\">";
echo    "<td>Qtd</td>";
echo    "<td>Produto</td>";
echo    "<td>Preço</td>";
echo "</tr>";

$valorTotal = 0;

foreach ($carrinhoAtual as $id => $quant) {
    $sql = "SELECT * FROM produto WHERE idProduto = $id";
    $result = $conn->query($sql);
    $dados = $result->fetch();
    $nome = $dados['nome'];
    $preco = $dados['preco'];
    $precoPromocao = $dados['precoPromocao'];

    if ($precoPromocao>0) {
        $precoPromocao *= $quant;
        $valorTotal += $precoPromocao;
        $preco = number_format($precoPromocao,2,',','.');
    } else {
        $preco *= $quant;
        $valorTotal += $preco;
        $preco = number_format($preco,2,',','.');
    }

    echo "<tr>";
    echo "<td><input type=\"text\" name=\"$id\" value=\"$quant\" size=\"1\" maxlength=\"2\" onblur=\"javascript:AtualizaQuantidade(this);\"></td>";
    echo "<td>$nome</td>";
    echo "<td>R\$ $preco</td>";
    echo "</tr>";
}

//lista de seleção do frete:
echo "<tr class=\"fundocinza\">";
echo "<td>&nbsp</td>";
echo "<td>";
include 'listaFretes.php';
echo "</td>";
echo "<td><span id=\"valorFrete\" class=\"frete\">";
if ($valorFrete>0) {
    echo "R\$ " . $valorFrete;
} else {
    echo "N/D";
}
echo "</span></td>";
echo "</tr>";

//mostra total da compra
$valorTotal += $valorFrete;

echo "<tr class=\"fundocinza\">";
echo "<td>&nbsp</td>";
echo "<td class=\"preco\">TOTAL DA COMPRA</td>";
echo "<td class=\"preco\">R\$ $valorTotal</td>";
echo "</tr>";
echo "</table></p></div></form>";

echo "<p align=\"center\" class=\"descricao\" >Ao alterar qualquer quantidade, clique em</br> qualquer lugar da pagina para atualizar o carrinho</p>";
echo "<p align=\"center\"><a href=\"javascript:Loja('limpar',0);\"><img src=\"assets/img/figuras/limpar.gif\" border=\"0\"></a> ";
echo "&nbsp&nbsp&nbsp; <a href=\"javascript:Loja('validaUsuario',0);\"><img src=\"assets/img/figuras/fechar.gif\" border=\"0\"></a></p>";