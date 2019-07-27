<?php
include 'conecta.php';

$sql = "SELECT * FROM categoria";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $dados) {
        $idCategoria = $dados['idCategoria'];
        $nome = $dados['nome'];
        echo "<a href=\"javascript:Loja('categoria', '$idCategoria');\">$nome</a><br>";
    }

} else {
    echo "Sem dados";
}
?>

<form action="javascript:void()" onsubmit="Loja('busca', this.busca.value); return false;">
    <p>Busca:
        <br>
        <input type="text" name="busca" id="busca" size="10" maxlenght="100">
        <br>
        <input type="submit" value="OK" name="ok" id="ok">
    </p>
</form>