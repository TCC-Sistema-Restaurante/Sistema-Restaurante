<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
       
    $id_cancelar = $_POST['id_cancelar'];
    $query = $pdo->prepare("UPDATE pedido SET situacao = 'cancelado' WHERE situacao= 'aguardando preparo' and id_mesa= '$id_cancelar';");

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