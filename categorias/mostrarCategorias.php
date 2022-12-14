<?php

include "../_scripts/config.php";
include "../_scripts/functions.php";

extract($_POST);

if (isset($_POST['mostrar'])) {

    $item = '';

    $sql = "SELECT * FROM categoria";
    $query = $mysqli->query($sql);
    while ($dados = $query->fetch_array()) {
        $item .= '<div class="item">
   <div class="image">
     <img class="img" src="' . $dados["imagem"] . '" alt="" />
     <div class="edit-delet">
         <span class="material-symbols-outlined" data-bs-toggle="modal" data-bs-target="#modalEditar" data-bs-whateverNome="' . $dados['categoria'] . '" data-bs-whateverImg="' . $dados['imagem'] . '" data-bs-whateverId="' . $dados['id'] . '"> border_color </span>
         <span class="material-symbols-outlined" data-bs-toggle="modal" data-bs-target="#modalDeletar"> cancel </span>
         <input type="text" value="'. $dados['id'] .'" hidden class="form form-control" name="idApagar" id="inputIdApagar" placeholder="Id">
     </div>
     <div class="Nome">
       <h3>'.$dados['categoria'].'</h3>
     </div>
   </div>
 </div>
 
 ';

    }
    echo $item;
}
?>