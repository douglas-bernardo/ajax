<?php
include 'conecta.php';

$sql = "SELECT * FROM categoria";
$dados = $conn->query($sql);

if ($dados->rowCount() > 0) {
    // foreach ($dados->fetchAll(\PDO::FETCH_ASSOC) AS $dado) {
        
    // }


    $dados = $dados->fetchAll(\PDO::FETCH_ASSOC);

    echo "<pre>";
    var_dump($dados);
    echo "</pre>";

} else {
    echo "Sem dados";
}
