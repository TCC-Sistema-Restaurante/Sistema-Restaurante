<?php
    header('Content-type: application/json');
    include "../_scripts/functions.php";
    include "../_scripts/config.php";

       
    $id_mesa = $_POST['id_mesa'];
    $sql = "UPDATE pedido SET situacao = 'pronto' WHERE id_mesa= '$id_mesa'";
    $query = $mysqli->query($sql);

    if($query){
        echo json_encode('Entregue'); 
    }else{
        echo json_encode('Falha ao entregar');
    }


?>