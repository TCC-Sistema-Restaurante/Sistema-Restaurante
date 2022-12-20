<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
       
    $numero = $_POST['numero_delet'];

    
    $query = $pdo->prepare("DELETE FROM mesa WHERE mesa.numero = '$numero'");
    $query->execute();

    echo json_encode(PDO::FETCH_ASSOC); 



} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}


?>