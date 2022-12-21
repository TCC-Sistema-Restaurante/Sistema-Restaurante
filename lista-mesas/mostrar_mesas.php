<?php

include "../_scripts/config_pdo.php";


$query = 
"SELECT a.numero, CASE 
	WHEN sum(b.valor) is NULL THEN '0,00'
	ELSE sum(b.valor) 
    END as soma, a.situacao
FROM mesa as a
LEFT JOIN pedido as b
on a.numero = b.id_mesa
WHERE a.disponibilidade='ativa'
GROUP by a.numero";


$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();

if ($rowCount > 0) {
    $data = '';

	foreach($result as $row) {
		$data .= '
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingFor">
                <button
                  class="accordion-button collapsed fs-2 text-white"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#flush-collapse-'.$row["numero"].'"
                  aria-expanded="false"
                  aria-controls="flush-collapse-'.$row["numero"].'"
                >
                  <h2 id="numero-da-mesa" class="mx-3">Mesa '.$row["numero"].'</h2>
                </button>
              </h2>
              <div
                id="flush-collapse-'.$row["numero"].'"
                class="accordion-collapse collapse shadow p-3 mb-0 bg-body rounded"
                aria-labelledby="flush-headingFor"
                data-bs-parent="#accordionFlushExample"
              >
                <div class="accordion-body">
                  <h3 class="text-center">
                    <strong>Valor Total: R$'.$row["soma"].'</strong>
                  </h3>
                  <div class="row justify-content-center">
                    <div class="text-center mt-4">
                    <a onClick="" href="../pedir_conta/pedir_conta.php?'.$row["numero"].'?'.$row["soma"].'" class="pedir-conta">
                        Pedir conta
                      </a>
                      <a href="../cardapio_garcom/cardapio.php?'.$row["numero"].'" class="iniciar-pedido" id="'.$row["numero"].'">
                        Novo pedido
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		';
	}
}
else {
	$data = "Nenhum registro localizado.";
}

echo $data;

?>
