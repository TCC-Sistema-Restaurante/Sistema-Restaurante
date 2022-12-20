<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {       
    $id = $_POST['IdAtivo'];

    $query = $pdo->prepare("UPDATE `produto` SET `status` = 'ativo' WHERE `produto`.`id` = '$id'");
    $query->execute();

    echo json_encode(PDO::FETCH_ASSOC); 

} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}


?>