<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
       
    $nomeEditar = $_POST['nomeEditar'];
    $id = $_POST['idEditar'];
    $dir = "../_imgBanco";
    $_FILES['file']['name'] = tratar_arquivo_upload(utf8_decode($_FILES['file']['name']), utf8_decode($nomeEditar));
    $imgNome = $_FILES['file']['name'];
    $imgSrc = $_POST['imgSrc'];
    $imgtest1 = str_replace('../_imgBanco/', '', $imgSrc );
    $imgteste = explode(".", $imgtest1);
    $imgteste1 = $imgteste[0];
    $imgteste1 .= '.';

    if($imgteste1 == $imgNome){
        $query = $pdo->prepare("UPDATE `categoria` SET `categoria`='$nomeEditar' WHERE id = '$id' ");
        $query->execute();

        if($query->rowCount()>=1){
            echo json_encode('salvo!'); 
        }else{
            echo json_encode('Falha ao salvar');
        }

    }else{
        move_uploaded_file( $_FILES['file']["tmp_name"], "$dir/" . $imgNome);
        $query = $pdo->prepare("UPDATE `categoria` SET `categoria`='$nomeEditar',`imagem`='$dir/$imgNome' WHERE id = '$id' ");
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