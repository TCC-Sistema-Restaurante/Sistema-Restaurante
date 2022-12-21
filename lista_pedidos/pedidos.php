<?php

include "../_scripts/config_pdo.php";

if(isset($_POST['texto'])) {

    $texto = $_POST['texto'];
    $query = "select * from pedido where valor like '%".$texto."%' or situacao like '%".$texto."%'";
}

else {
	$query = "select * from pedido";
}

if(isset($_POST['request'])) {

    $request = $_POST['request'];
    $query = "select * from pedido where situacao = '$request'";
}

// if(isset($_POST['request_date'])) {

//     $request = $_POST['request_date'];
//     $query = "select * from pedido where data = '$request'";
// }


$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();
$data1 = '';
if ($rowCount > 0) {
  foreach($result as $row) {
    $data1 .= '
    <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-clock"></i>
              <p>'.$row["data"].'</p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="">'.$row["valor"].'</h4>

              <h6>'.$row["situacao"].'</h6>
              <p>
                10 itens: 1x pizza média: 1/3 marguerita, 1/3 camarão;
                hamburguer...
              </p>
            </div>
          </div>
        </div>  
    ';
  }
    }
      

else {
	$data1 = "Nenhum registro localizado.";
}

echo $data1;

?>
