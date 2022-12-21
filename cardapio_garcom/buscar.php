<?php

include "../_scripts/config_pdo.php";




if(!isset($_SESSION)){
    session_start();
  }

if(isset($_POST['texto'])) {
    $id_categoria = $_SESSION['id_categoria'];
    $texto = $_POST['texto'];
    $query = "select * from produto where (nome_produto like '%".$texto."%' or descricao like '%".$texto."%') and categoria_id = 5 ";
}


else {
    $id_categoria = $_SESSION['id_categoria']; 
    $query = "select * from produto where categoria_id = 5 "; 
}

$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();

if ($rowCount > 0) {
	$data = '';
	foreach($result as $row) {
		$data .= '
                <label for="flavor1" class="item">
                  <div>
                    <input type="checkbox" name="check-flavor" id="flavor1" />
                    <span class="checkmark"></span>
                    <h4>'. $row['nome_produto'].'</h4>
                  </div>
                  <p>
                    '. $row['descricao'] .' 
                  </p>
                </label>';
	}
}
else {
	$data = "Nenhum registro localizado.";
}

echo $data;

?>