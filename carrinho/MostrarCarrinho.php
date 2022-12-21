<?php

include "../_scripts/functions.php";
include "../_scripts/config.php";


extract($_POST);

if (isset($_POST['mostrar'])) {
    $teste = array();
    $teste =   array(23 => Array ( 11, 13), qtd => );
    $teste = $teste[23];
    $total = 0;
    $carrinho = '<div class="table-responsive-md">
    <table class="table">
        <thead>
            <tr>
                <th>Descrição</th>
                <th class="d-flex justify-content-center" >Quantidade</th>
                <th>Total</th>
                <th ></th>
            </tr>
        </thead>
        <tbody>';

        foreach ($teste as $mesa => $produto) {
          include "../_scripts/config.php";
          $sql = "SELECT * FROM produto where id = '$produto'";
          $query = $mysqli->query($sql);
          $dados = $query->fetch_assoc();

        $carrinho .=  '<tr>
        <td>'.$dados['nome_produto'].'</td>
        <td class="d-flex justify-content-center">
            <div class="wrapper">
                <span onclick="menos(this)" class="menos">-</span>
                <span class="num">01</span>
                <span onclick="mais(this, '.$dados['id'].')" class="mais">+</span>
                <input type="hidden" name="" value="1">
            </div>
        </td>
        <td>'.$dados['valor_unitario'].'</td>
        <td>
            <button type="button" class="tableBtn tableBtnEditar">
            <input type="hidden" name="apagar" value="'.$dados['id'].'">
              <i class="bx bx-trash"></i>                  
            </button>
        </td>
    </tr>';

        $total += $dados['valor_unitario'];


     
          ;}

          $carrinho .= '</tbody>
          </table>
      </div>

      <div class="row mt-2" style="margin-bottom: 70px;">
          <div class="col-6" >
              <span style="color: #3A3A3A; font-size: 2em; margin-left: 20px;">Total</span>
          </div>
          <div class="col-6 text-end">
              <span style="color: #3A3A3A; font-size: 2em; margin-right: 20px;">R$'.number_format($total, 2).'</span>
          </div>
      </div>';
    } echo $carrinho;
    
    ?>


