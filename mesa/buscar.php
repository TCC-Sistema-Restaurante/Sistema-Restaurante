<?php

include "../_scripts/config_pdo.php";

if(isset($_POST['texto'])) {

    $texto = $_POST['texto'];
    $query = "select * from mesa where cadeiras like '%".$texto."%' or numero like '%".$texto."%'";
}

else {
	$query = "select * from mesa";
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
          <th scope="col">MESA</th>
          <th scope="col">STATUS</th>
          <th scope="col">DISPONIBILIDADE</th>
          <th scope="col">CADEIRAS</th>
          

         
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
                '.$row["numero"].'
            </td>
            <td >
                '.$row["situacao"].'
            </td>

            <td >
                '.$row["disponibilidade"].'
            </td>
            
            <td >
            '.$row["cadeiras"].'
            </td>

            <td >
                <button type="button" class="tableBtn tableBtnEditar" data-bs-toggle="modal" data-bs-target="#modalEditar"
                data-bs-whateverNumero="' .$row["numero"]. '"
                data-bs-whateverSituacao="' .$row["situacao"]. '"
                data-bs-whateverDisponibilidade="' .$row["disponibilidade"]. '"
                data-bs-whateverCadeiras="' .$row["cadeiras"]. '"
                
                >
                    <i class="bx bx-edit-alt"></i>
                </button>
            </td>
            <td >
                <button type="button" class="tableBtn tableBtnEditar" data-bs-toggle="modal" data-bs-target="#modalDeletar" data-bs-whateverNumeroDelet="' .$row["numero"]. '" >
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
