<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
       
    $idApagar = $_POST['id_delet'];

    
    $query = $pdo->prepare("DELETE FROM categoria WHERE categoria.id = '$idApagar'");
    $query->execute();

    echo json_encode(PDO::FETCH_ASSOC); 



} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}


?>