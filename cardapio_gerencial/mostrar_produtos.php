<?php

include "../_scripts/functions.php";
include "../_scripts/config.php";


extract($_POST);

if (isset($_POST['mostrar'])) {

 
    $query_1 = $mysqli->query('SELECT * FROM produto a WHERE a.status = "ativo"');

    $item = '
    <h1>Itens ativos</h1>
    <div class="container" id="produtos-ativos">';

    while ($dados = $query_1->fetch_array()) { 
        $item .= '
        <!-- Item -->
        <div class="item">
          <div class="image">
            <img src="' . $dados["img"] . '" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-edit"
                data-bs-whateverId="' . $dados['id'] . '"
                data-bs-whateverNomeProduto="' . $dados['nome_produto'] . '"
                data-bs-whateverNomeCategoria="' . $dados['nome_categoria'] . '"
                data-bs-whateverValorUnitario="' . $dados['valor_unitario'] . '"
                data-bs-whateverDescricao="' . $dados['descricao'] . '"
                data-bs-whateverImg="' . $dados['img'] . '"
                data-bs-whateverStatus="' . $dados['status'] . '"


              >
                <span class="material-symbols-outlined"> border_color </span>
              </button>
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-inativar"
                data-bs-whateverIdInativar="' . $dados['id'] . '"
              >
                <span class="material-symbols-outlined"> cancel </span>
              </button>
            </div>
            <h3 class="name">'.$dados["nome_produto"].'</h3>
          </div>
          <h4 class="description">
            '.$dados["descricao"].'
          </h4>
          <h2 class="price">R$'.$dados["valor_unitario"].',00</h2>
        </div>
 
 ';
    }
$item .= '</div>
        <h1>Itens inativos</h1>
        <div class="container" id="produtos-inativos">';

    $query_2 = $mysqli->query('SELECT * FROM produto a WHERE a.status = "inativo"');

    while ($produto = $query_2->fetch_array()) { 
        $item .= '
        <!-- Item -->
        <div class="item">
          <div class="image">
            <img src="' . $produto["img"] . '" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-edit"
                data-bs-whateverIdAtivar="' . $produto['id'] . '"
                data-bs-whateverNomeProduto="' . $produto['nome_produto'] . '"
                data-bs-whateverNomeCategoria="' . $produto['nome_categoria'] . '"
                data-bs-whateverValorUnitario="' . $produto['valor_unitario'] . '"
                data-bs-whateverDescricao="' . $produto['descricao'] . '"
                data-bs-whateverImg="' . $produto['img'] . '"
                data-bs-whateverStatus="' . $produto['status'] . '"


              >
                <span class="material-symbols-outlined"> border_color </span>
              </button>
              <button
                class="NovoBtn"
                data-bs-toggle="modal"
                data-bs-target="#modal-ativar"
                data-bs-whateverId="' . $produto['id'] . '"
              >
                <span class="material-symbols-outlined"> add_circle </span>
              </button>
            </div>
            <h3 class="name">'.$produto["nome_produto"].'</h3>
          </div>
          <h4 class="description">
            '.$produto["descricao"].'
          </h4>
          <h2 class="price">R$'.$produto["valor_unitario"].',00</h2>
        </div>
 ';
    }

    $item .= '</div>';

    echo $item;
}
