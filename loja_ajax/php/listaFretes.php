<?php
echo "FRETE: <select name=\"local\" onChange=\"javascript:Loja('frete', this.options[this.selectedIndex].value);\">";

echo "<option>Escolha o local de entrega</option>";

$res = $conn->query("SELECT DISTINCT(local) FROM frete ORDER BY local");
if ($res->rowCount()>0) {
    foreach ($res->fetchAll() as $dados) {
        $local = $dados['local'];
        echo "<option ";
        if ($local == $localFrete) {
            echo "selected";
            echo "value=\"$local\">$local</option>\n";
        }
    }
}

echo "</select>";