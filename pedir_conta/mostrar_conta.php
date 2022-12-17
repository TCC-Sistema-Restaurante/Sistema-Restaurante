<?php

$id_mesa = $_POST["id_mesa"];
$soma = $_POST["soma"];


$query = "SELECT *
FROM pedido as a
LEFT JOIN produto as b
on b.id LIKE a.id_produtos
WHERE a.id_mesa =$id_mesa;";

include "../_scripts/config_pdo.php";

$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();

if ($rowCount > 0) {
    $data = '<h1>R$'.$soma.'</h1>';

	foreach($result as $row) {
		$data .= '
        <div class="card-pedido">
            <h3>R$'.$row["valor"].'</h3>
            <h5>
                '.$row["nome_produto"].': '.$row["descricao"].'.
            </h5>
        </div>';
    }

    $data .= '
    <form action="#">
        <h3>Forma de pagamento:</h3>
        <div>
          <input
            type="radio"
            name="payment"
            id="cash"
            class="input-hidden"
            required
          />
          <label for="cash">
            <img src="_img/cash.png" />
            <h4>Dinheiro</h4>
          </label>

          <input
            type="radio"
            name="payment"
            id="credt_card"
            class="input-hidden"
            required
          />
          <label for="credt_card">
            <img src="_img/credt_card.png" />
            <h4>Cartão</h4>
          </label>

          <input
            type="radio"
            name="payment"
            id="pix"
            class="input-hidden"
            required
          />
          <label for="pix">
            <img src="_img/pix.png"/>
            <h4>PIX</h4>
          </label>
        </div>
        <h3>Valor recebido:</h3>
        <input type="number" name="" id="" required />
        <input type="submit" value="ENVIAR" />
      </form>';
}
else {
	$data = "Nenhum registro localizado.";
}

echo $data;
?>


