<?php
header('Content-type: application/json');


include "../_scripts/functions.php";
include "../_scripts/config_pdo.php";


try {
       if(isset($_POST['nome']) && isset($_FILES['file'])) {

        $nome = $_POST['nome'];
        $dir = "../_imgBanco";
        $_FILES['file']['name'] = tratar_arquivo_upload(utf8_decode($_FILES['file']['name']), utf8_decode($nome));
        $imgNome = $_FILES['file']['name'];

        $query = $pdo->prepare("SELECT categoria FROM categoria WHERE categoria='$nome'");
        $query->execute();



        if($query->fetchAll(PDO::FETCH_ASSOC) == []){
           move_uploaded_file( $_FILES['file']["tmp_name"], "$dir/" . $imgNome);
        
            $query_2 = $pdo->prepare("INSERT INTO `categoria` (`id`, `categoria`, `imagem`) VALUES (NULL, '$nome','$dir/$imgNome')");
            $query_2    ->execute();

            if($query_2->rowCount()>=1){
                echo json_encode('salvo!'); 
            }else{
                echo json_encode('Falha ao salvar');
            }
        }else{
            echo json_encode("categoria existente");
        }
}


} catch (PDOException $pe) {
    echo json_encode(die($pe->getMessage()));
}


?>
