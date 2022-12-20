<?php

$IDs_pedidos = $_POST["IDs_pedidos"];

$query = "UPDATE pedido SET situacao = 'pago' WHERE id in ($IDs_pedidos);";

include "../_scripts/config_pdo.php";

$statement = $pdo->prepare($query);
$statement->execute();

if($statement->rowCount()>=1){
    echo json_encode('salvo!'); 
}else{
    echo json_encode('Falha ao salvar');
}

?>