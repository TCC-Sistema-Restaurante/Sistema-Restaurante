<?php

include "../_scripts/config_pdo.php";

if (isset($_POST['texto'])) {

  $texto = $_POST['texto'];
  $query = "select * from pedido LEFT JOIN produto
    ON pedido.id_produtos = produto.id where pedido.valor like '%" . $texto . "%'";
}
elseif (isset($_POST['request'])) {

  $request = $_POST['request'];
  $query = "select * from pedido LEFT JOIN produto
    ON pedido.id_produtos = produto.id where pedido.situacao = '$request'";
} 
elseif(isset($_POST['request_date'])) {
  $request = $_POST['request_date'];
  $datas = explode(" ", $request);
  $inicial = date_format(date_create($datas[0]),"Y-m-d");
  $final = date_format(date_create($datas[2]),"Y-m-d");
  
  $query = "SELECT * FROM pedido LEFT JOIN produto
  ON pedido.id_produtos = produto.id WHERE CAST(DATA AS DATE) between '$inicial' AND '$final'";
}else {
  $query = "select * from pedido LEFT JOIN produto
  ON pedido.id_produtos = produto.id";
}

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
                <i class="fa-regular fa-clock mb-2"></i>
                <p>'.date_format(date_create($row["data"]),"d/m").'</p>
                
              </div>

              <div class="col-8 parteDireita">
                <h4 class="">R$'.number_format($row["valor"], 2).'</h4>

                <h6>'.$row["situacao"].'</h6>
                <p>
                '.$row["nome_produto"].'
                </p>
              </div>
          </div>
        </div>
        
    ';
  }
} else {
  $data1 = "Nenhum registro localizado.";
}

echo $data1;
