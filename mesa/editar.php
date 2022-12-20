<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
    $id = $_POST['id_editar'];
    $numero = $_POST['numero_editar'];
    $situacao = $_POST['situacao_editar'];
    $disponibilidade = $_POST['disponibilidade_editar'];
    $cadeiras = $_POST['cadeiras_editar'];


    $query = $pdo->prepare("UPDATE `mesa` SET `numero`='$numero',`situacao`='$situacao',`disponibilidade`='$disponibilidade',
                            `cadeiras`='$cadeiras' WHERE id = '$id' ");
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