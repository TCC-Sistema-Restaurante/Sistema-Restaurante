<?php

include "../_scripts/functions.php";
include "../_scripts/config.php";


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
         <span class="material-symbols-outlined" data-bs-toggle="modal" data-bs-target="#modalDeletar"  data-bs-whateverIdDelet="' . $dados['id'] . '" > cancel </span>
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




// include "../_scripts/config_pdo.php";
// try {

//   extract($_POST);
//   if (isset($_POST['mostrar'])) {

//     $item = '';

        
//     $query = $pdo->prepare("SELECT * FROM categoria");
//     $query->execute();
//     $query->fetchAll(PDO::FETCH_ASSOC);

//     while ($dados = $query->fetch_array()) {
//       $item .= '<div class="item">
//       <div class="image">
//         <img class="img" src="' . $dados["imagem"] . '" alt="" />
//         <div class="edit-delet">
//           <span class="material-symbols-outlined" data-bs-toggle="modal" data-bs-target="#modalEditar" data-bs-whateverNome="' . $dados['categoria'] . '" data-bs-whateverImg="' . $dados['imagem'] . '" data-bs-whateverId="' . $dados['id'] . '"> border_color </span>
//           <span class="material-symbols-outlined" data-bs-toggle="modal" data-bs-target="#modalDeletar"  ="' . $dados['id'] . '" > cancel </span>
//         </div>
//         <div class="Nome">
//           <h3>'.$dados['categoria'].'</h3>
//         </div>
//       </div>
//     </div>
  
//     ';

//     }
//       echo $item;
//   }
// }

//  catch (PDOException $pe) {
//     echo json_encode(die($pe->getMessage()));
// }


?>