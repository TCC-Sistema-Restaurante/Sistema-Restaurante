<?php

include "../_scripts/functions.php";
include "../_scripts/config.php";


extract($_POST);

if (isset($_POST['mostrar'])) {

    $mostrar = '';

    $lista_mesas = mesasPedidosPendentes();
    while ($ids_mesa = $lista_mesas->fetch_array() && $pedido = $pedidos_pendentes->fetch_array()) {
        $mostrar .= '<div class="box mb-3">
        <div class="row">
          <div class="col-4 text-center parteEsquerda">
            <p>MESA</p>
            <p>' . $ids_mesa["id_mesa"] . '</p>
          </div>

          <div class="col-8 parteDireita">
            <h4 class="mt-3 mb-3">R$' . retornarPrecoPedidoaCancelar($ids_mesa['id_mesa']) . '</h4>
            
            <h6>AGUARDANDO PREPARO</h6> 
            <h7>' . retornarProduto($pedido['id_produtos']) . '</h7>';
        }

        $mostrar .= '
            <button class="mt-3" data-bs-toggle="modal" data-bs-whateverIdmesa="' . $ids_mesa['id_mesa'] . '" data-bs-target="#modalDeletar">Cancelar</button>
                      
          </div>
        </div>
      </div>';
     echo $mostrar;
}
    
    ?>