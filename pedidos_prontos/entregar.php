<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
    $id_entregar = $_POST['id_entregar'];
    $query = $pdo->prepare("UPDATE pedido SET situacao = 'entregue' WHERE situacao= 'pronto' and id_mesa= '$id_entregar';");

    $query->execute();

    if($query->rowCount()>=1){
        echo json_encode('salvo!'); 
    }else{
        echo json_encode('Falha ao salvar');
    }



} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}


?>