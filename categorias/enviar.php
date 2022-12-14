<?php
header('Content-type: application/json');
echo json_encode($response_array);

include "../_scripts/config.php";
include "../_scripts/functions.php";


extract($_POST);
if(isset($_POST['nome']) && isset($_FILES['file'])) {

    $nome = $_POST['nome'];
    $dir = "../_imgBanco";
    $_FILES['file']['name'] = tratar_arquivo_upload(utf8_decode($_FILES['file']['name']), utf8_decode($nome));
    $imgNome = $_FILES['file']['name'];

    if (categoriaExiste($nome) == 0 && move_uploaded_file( $_FILES['file']["tmp_name"], "$dir/" . $imgNome)) {

        $sql = "INSERT INTO `categoria` (`id`, `categoria`, `imagem`) VALUES (NULL, '$nome','$dir/$imgNome')";
        $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
        if($mysqli->query($sql)){
            $response_array['status'] = 'success';  
        }else {
            $response_array['status'] = 'error';  
        }

    }
}


?>
