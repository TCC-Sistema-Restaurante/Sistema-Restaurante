<?php

include "../_scripts/functions.php";
include "../_scripts/config.php";


extract($_POST);

if (isset($_POST['mostrar'])) {

    $mostrar = '';
    $produtos = '';
    $valor_total = 0;

    $lista_mesas = mesasPedidosProntos();
    while ($ids_mesa = $lista_mesas->fetch_array()) {
      $produtos = retornarProduto($ids_mesa['id_mesa']);
      echo $produtos;

      // foreach ($dados as $i) {
      // $produtos .= $i[1];
      // $produtos .= '; ';
      // };


        $mostrar .=  '<div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-clock"></i>
              <p>16:42</p>
            </div>

            <div class="col-8 parteDireita">
              <div>
                <h2 class="">Mesa ' . $ids_mesa["id_mesa"] .' </h2>
                <button>X</button>
              </div>';

            $mostrar .= '
            <p>' . $produtos. '</p>';
        

        // $mostrar .= '
        //     <button class="mt-3" data-bs-toggle="modal" data-bs-whateverIdmesa="' . $ids_mesa['id_mesa'] . '" data-bs-target="#modalDeletar">Cancelar</button>
                      
          '</div>
        </div>
      </div>';}
    } echo $mostrar;
    
    ?>