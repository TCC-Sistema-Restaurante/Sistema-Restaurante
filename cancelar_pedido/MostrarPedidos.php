<?php

include "../_scripts/functions.php";
include "../_scripts/config.php";


extract($_POST);

if (isset($_POST['mostrar'])) {

    $mostrar = '';
    $produtos = '';
    $valor_total = 0;

    $lista_mesas = mesasPedidosPendentes();
    while ($ids_mesa = $lista_mesas->fetch_array()) {
      $dados = retornarPedidoaCancelar($ids_mesa['id_mesa']);

      foreach ($dados as $i) {
      $valor_total += floatval($i[0]);
      $produtos .= $i[1];
      $produtos .= '; ';
      };

        $mostrar .= '<div class="box mb-3">
        <div class="row">
          <div class="col-4 text-center parteEsquerda">
            <p>MESA</p>
            <p>' . $ids_mesa["id_mesa"] . '</p>
          </div>

          <div class="col-8 parteDireita">
            <h4 class="mt-3 mb-3">R$' . number_format($valor_total, 2) . '</h4>
            
            <h6>AGUARDANDO PREPARO</h6> ';

            $mostrar .= '
            <h7>' . $produtos . '</h7>';
        

        $mostrar .= '
            <button class="mt-3" data-bs-toggle="modal" data-bs-whateverIdmesa="' . $ids_mesa['id_mesa'] . '" data-bs-target="#modalDeletar">Cancelar</button>
                      
          </div>
        </div>
      </div>';}
    } echo $mostrar;
    
    ?>