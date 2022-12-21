<?php

include "../_scripts/functions.php";
include "../_scripts/config.php";


extract($_POST);

if (isset($_POST['mostrar'])) {

  $mostrar = '';
  $produtos = '';
  $hora ='';
  $lista_mesas = mesasPedidosPendentes();
  while ($ids_mesa = $lista_mesas->fetch_array()) {
    $dados = retornarPedidoaCancelar($ids_mesa['id_mesa']);
    $produtos = '';

    foreach ($dados as $i) {
      $produtos .= $i[1];
      $produtos .= '; ';
      $hora = $i[2];
    }
    ;

    $mostrar .= '
        <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <p>MESA</p>
              <p>' . $ids_mesa['id_mesa'] . '</p>

              <i class="fa-regular fa-clock"></i>
              <p>'.$hora.'</p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="">Detalhes do Pedido</h4>
              <p>' . $produtos . '</p>';

              


    $mostrar .=
      '<button class="mt-1 btnPreparar" id="btnPreparar" data-bs-toggle="modal" data-bs-target="#modal" data-bs-whatevermesaID="' . $ids_mesa["id_mesa"]  .'" data-bs-whateverHora="'. $hora .'" data-bs-whateverProdutos="'. $produtos .'" >Preparar</button>


            </div>
          </div>
        </div>
        ';

  }

  echo $mostrar;

}
    
    ?>