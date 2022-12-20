<?php
header('Content-type: application/json');
include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";
try {
    if (isset($_POST['numero']) && isset($_POST['cadeiras']) && isset($_POST['disponibilidade']) && isset($_POST['situacao'])) {
        $numero = $_POST['numero'];
        $cadeiras = $_POST['cadeiras'];
        $disponibilidade = $_POST['disponibilidade'];
        $situacao = $_POST['situacao'];

        $query = $pdo->prepare("INSERT INTO mesa (numero,situacao,disponibilidade,cadeiras)
        VALUES('{$numero}','{$situacao}','{$disponibilidade}', '{$cadeiras}')");
        $query->execute();

        if ($query->rowCount() >= 1) {
            echo json_encode('salvo!');
        } else {
            echo json_encode('Falha ao salvar');
        }


    } else {
        echo json_encode('Falha ao salvar');
    }
} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}
?>