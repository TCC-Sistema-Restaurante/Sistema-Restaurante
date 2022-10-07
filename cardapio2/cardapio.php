<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="_css/cardapio.css" />
    <link rel="stylesheet" href="../modals/_css/modals.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <title>Cardápio</title>
  </head>
  <body>
    <section class="cardapio">
      <h1>Cardápio</h1>
      <div class="bar">
        <div class="search-bar">
          <span class="material-symbols-outlined"> search </span>
          <input type="text" id="txt-search" placeholder="Buscar..." />
        </div>
        <div class="add-bar"  id="btn-add">
          <h3>Add</h3>
          <span class="material-symbols-outlined"> add </span>
        </div>
      </div>
      <div class="container">
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <span class="material-symbols-outlined" id="btn-edit"> border_color </span>
              <span class="material-symbols-outlined" id="btn-delet"> cancel </span>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <span class="material-symbols-outlined" id="btn-edit"> border_color </span>
              <span class="material-symbols-outlined" id="btn-delet"> cancel </span>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <span class="material-symbols-outlined" id="btn-edit"> border_color </span>
              <span class="material-symbols-outlined" id="btn-delet"> cancel </span>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <span class="material-symbols-outlined" id="btn-edit"> border_color </span>
              <span class="material-symbols-outlined" id="btn-delet"> cancel </span>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
        <div class="item">
          <div class="image">
            <img src="_img/img_exemple.png" alt="foto-item" width="100%" />
            <div class="edit-delet">
              <span class="material-symbols-outlined" id="btn-edit"> border_color </span>
              <span class="material-symbols-outlined" id="btn-delet"> cancel </span>
            </div>
            <h3 class="name">Hamburger</h3>
          </div>
          <h4 class="description">
            Pão da casa, carne ao ponto, molho agre doce,carne ao ponto, queijo
            prato, gergelin, queijo prato, cebola, molho agre doce.
          </h4>
          <h2 class="price">R$ 20,00</h2>
        </div>
      </div>
    </section>
    <section class="modals">
      <?php include"../modals/modal_add.php";?>
      <?php include"../modals/modal_delet.php";?>
      <?php include"../modals/modal_edit.php";?>
    </section>
  </body>
  <script src="../modals/_js/script.js"></script>
</html>
