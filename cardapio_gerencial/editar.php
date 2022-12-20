<?php
use LDAP\Result;
header('Content-type: application/json');

include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
    $id = $_POST['idEditar'];
    $nomeProduto = $_POST['nomeProduto'];
    $nomeCategoria = $_POST['nomeCategoria'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
       
    if (isset($_POST['nomeProduto']) && isset($_FILES['file'])) {
        $queryIMG = $pdo->prepare("SELECT img FROM `produto` WHERE id = '$id' ");
        $queryIMG->execute();
        $result = $queryIMG->fetch();
        $result = $result[0];

        $imgSrc = $_POST['imgSrc'];
        $dir = "../_imgBanco";
        $_FILES['file']['name'] = tratar_arquivo_upload(utf8_decode($_FILES['file']['name']), utf8_decode($nomeProduto));
        $imgNome = $_FILES['file']['name'];
        $dir = "../_imgBanco";


        $query = $pdo->prepare("UPDATE `produto` SET `nome_produto`='$nomeProduto',`nome_categoria`='$nomeCategoria',`valor_unitario`='$valor',`descricao`='$descricao',`img`='$dir/$imgNome' WHERE id = $id.");
        $query->execute();

        if($query){
            echo json_encode('salvo!');
            unlink($result);
            move_uploaded_file( $_FILES['file']["tmp_name"], "$dir/" . $imgNome);

        }else{
            echo json_encode('Falha ao salvar');
        }
    }
    else{
        $query = $pdo->prepare("UPDATE `produto` SET `nome_produto`='".$nomeProduto."',`nome_categoria`='".$nomeCategoria."',
        `valor_unitario`='".$valor."',`descricao`='".$descricao."' WHERE id = '$id' ");
        $query->execute();

        if($query->rowCount()>=1){
            echo json_encode('salvo!'); 
        }else{
            echo json_encode('Falha ao salvar');
        }

    }
   

} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}


?>