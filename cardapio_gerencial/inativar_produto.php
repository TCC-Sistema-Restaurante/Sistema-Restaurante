<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {       
    if(isset($_POST['idInativar'])){
    $id = $_POST['idInativar'];

    $query = $pdo->prepare("UPDATE `produto` SET `status` = 'inativo' WHERE `produto`.`id` = '$id'");
    $query->execute();
    unset($_POST['idInativar']);
    echo json_encode(PDO::FETCH_ASSOC); 
}
} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}


?>