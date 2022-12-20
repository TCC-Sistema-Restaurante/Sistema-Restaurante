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
      '<button class="mt-1 btnPreparar" id="' . $ids_mesa['id_mesa'] . '" data-bs-toggle="modal" data-bs-target="#staticBackdrop' . $ids_mesa['id_mesa'] . '">Preparar</button>


            </div>
          </div>
        </div>
        
        <div class="modal t-modal fade" id="staticBackdrop' . $ids_mesa['id_mesa'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content PrepararModal">
                      <div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="boxPreparar">
                    <div class="row">
                      <div class="col-4 text-center parteEsquerdaPreparar">
                        <p>MESA</p>
                        <p>' . $ids_mesa['id_mesa'] . '</p>

                        <i class="fa-regular fa-clock"></i>
                        <p>'.$hora.'</p>
                      </div>

                      <div class="col-8 parteDireitaPreparar">
                        <h4 class="">Detalhes do Pedido</h4>
                        <p> ' . $produtos . '</p>
                        
                        
                        <button id="' . $ids_mesa['id_mesa'] . '" class="mt-1 btnEntregarPreparar">Entregar</button>
                        

                      </div>

                    </div>
                  </div>
                </div>
              </div>
              </div>';

  }

  echo $mostrar;

}
    
    ?>