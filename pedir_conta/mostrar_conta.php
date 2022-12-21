<?php

$id_mesa = $_POST["id_mesa"];
$soma = $_POST["soma"];


$query = "SELECT a.id id_pedido, a.valor, b.descricao, b.valor_unitario,b.nome_produto
FROM pedido as a
LEFT JOIN produto as b
on b.id LIKE a.id_produtos
WHERE a.id_mesa = $id_mesa and a.situacao != 'pago'";

include "../_scripts/config_pdo.php";

$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();

if ($rowCount > 0) {
    $data = '<h1>R$'.$soma.',00</h1>';
    $IDs = '';

	foreach($result as $row) {
    $IDs .= $row["id_pedido"].',';
		$data .= '
        <div class="card-pedido">
            <h3>R$'.$row["valor"].'</h3>
            <h6>R$'.$row["valor_unitario"].'</h6>
            <h5>
                '.$row["nome_produto"].': '.$row["descricao"].'.
            </h5>
        </div>';
    }
    $data .= '
    <form action="#">
        <input type="text" hidden value="'.$IDs.'" id="idsPedidos" placeholder="Id">
        <button type="submit" id="btn-pagar-conta" class="btn btn-success" >ENVIAR</button>
      </form>';
}
else {
	$data = "Nenhum registro localizado.";
}
// 
echo $data;


?>


