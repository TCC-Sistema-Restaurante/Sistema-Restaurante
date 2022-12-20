<?php
use LDAP\Result;
header('Content-type: application/json');

include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
       
    if (isset($_POST['nomeEditar']) && isset($_FILES['file'])) {
        $id = $_POST['idEditar'];
        $queryIMG = $pdo->prepare("SELECT imagem FROM `categoria` WHERE id = '$id' ");
        $queryIMG->execute();
        $result = $queryIMG->fetch();
        $result = $result[0];

        $nomeEditar = $_POST['nomeEditar'];
        $imgSrc = $_POST['imgSrc'];
        $dir = "../_imgBanco";
        $_FILES['file']['name'] = tratar_arquivo_upload(utf8_decode($_FILES['file']['name']), utf8_decode($nomeEditar));
        $imgNome = $_FILES['file']['name'];
        $dir = "../_imgBanco";


        $query = $pdo->prepare("UPDATE `categoria` SET `categoria`='$nomeEditar',`imagem`='$dir/$imgNome' WHERE id = '$id' ");
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
        $nomeEditar = $_POST['nomeEditar'];
        $id = $_POST['idEditar'];
        $query = $pdo->prepare("UPDATE `categoria` SET `categoria`='$nomeEditar' WHERE id = '$id' ");
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