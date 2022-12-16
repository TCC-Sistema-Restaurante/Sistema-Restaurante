<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
       

    $id = $_POST['id_editar'];
    $nome = $_POST['nome_editar'];
    $usuario = $_POST['usuario_editar'];
    $senha = $_POST['senha_editar'];
    $cpf = $_POST['cpf_editar'];
    $funcao = $_POST['funcao_editar'];



    $query = $pdo->prepare("UPDATE `usuario` SET `nome`='$nome',`usuario`='$usuario',`senha`='$senha',
                            `cpf`='$cpf',`cargo`='$funcao'  WHERE id = '$id' ");
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