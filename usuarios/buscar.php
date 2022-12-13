<?php

include "../_scripts/config_pdo.php";

if(isset($_POST['texto'])) {

    $texto = $_POST['texto'];
    $query = "select * from usuario where nome like '%".$texto."%' or usuario like '%".$texto."%' or cargo like '%".$texto."%'  or cpf like '%".$texto."%' or senha like '%".$texto."%'";
}

else {
	$query = "select * from usuario";
}

$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();

if ($rowCount > 0) {
	$data = '<div class="table-responsive-md">
    <table class="table table-borderless ">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NOME</th>
          <th scope="col">USUÁRIO</th>
          <th scope="col">CPF</th>
          <th scope="col">Cargo</th>

          <th scope="col">SENHA</th>
          <th scope="col">#</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <tbody>

	';
	foreach($result as $row) {
		$data .= '
        <tr>
            <td>
                '.$row["id"].'
            </td>
            <td >
                '.$row["nome"].'
            </td>

            <td >
                '.$row["usuario"].'
            </td>
            
            <td >
            '.$row["cpf"].'
            </td>

            <td >
                '.$row["cargo"].'

            </td>

            <td >
                '.$row["senha"].'
            </td>
            <td >
                <button type="button" class="tableBtn tableBtnEditar">
                    <i class="bx bx-edit-alt"></i> </button>
                </td>
            <td >
                <button type="button" class="tableBtn tableBtnEditar">
                    <i class="bx bx-trash"></i>                  
                </button>
            </td>
			</tr>
		';
	}

	$data .= '</tbody></table></div>';
}
else {
	$data = "Nenhum registro localizado.";
}

echo $data;

?>
