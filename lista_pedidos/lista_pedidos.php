<?php
include "../_scripts/functions.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de pedidos</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="_css/lista_pedidos.css" type="text/css" rel="stylesheet" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  </head>

  <body>
    <?php include "../nav_bar/nav.php";?>
    <!-- NAV -->
    <div id="title">
      <h1 >Pedidos</h1>
    </div>
    <div class="inputs">
      <div class="containerInput">
        <div class="mb-3">
          <span class="inlineIcon">
            <i class="bx bx-search"></i>
          </span>
          <input type="text" class="input-text" placeholder="Pesquisar" />
        </div>
      </div>
      <div>
        <div>
          <div class="input-group">   
            <select required name="categoria" class="select wide" aria-label="">
                <option value="Aguardando">AGUARDANDO</option>
                <option value="Em_preparo">EM PREPARO</option>
                <option value="Pronto">PRONTO</option>
                <option value="Entregue">ENTREGUE</option>
                <option val0ue="Pago">PAGO</option>
            </select>
            <button  class="selectButton"><span class="material-symbols-outlined">filter_alt</span></button>
           </div>
           <div class="input-group">   
             <select required name="categoria" class="select wide" aria-label="">
                <option value="Aguardando">AGUARDANDO</option>
                <option value="Em_preparo">EM PREPARO</option>
                <option value="Pronto">PRONTO</option>
                <option value="Entregue">ENTREGUE</option>
                <option val0ue="Pago"  selected >PAGO</option>
             </select>
             <button  class="selectButton"><span class="material-symbols-outlined">filter_alt</span></button>
            </div>
          </div>
          <div>
            <input type="date" name="data-inicio" id="" />
            <input type="date" name="data-fianal" id="" />
          </div>
      </div>

    </div>
    <hr />
    <section>
      <div class="container_">
        <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-clock"></i>
              <p>16:42</p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="">R$260,00</h4>

              <h6>PRONTO</h6>
              <p>
                10 itens: 1x pizza média: 1/3 marguerita, 1/3 camarão;
                hamburguer...
              </p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-clock"></i>
              <p>16:42</p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="">R$260,00</h4>

              <h6>PRONTO</h6>
              <p>
                10 itens: 1x pizza média: 1/3 marguerita, 1/3 camarão;
                hamburguer 1/3 camarão;
                hamburguer 1/3 camarão;
                hamburguer 10 itens: 1x pizza média: ...
              </p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-clock"></i>
              <p>16:42</p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="">R$260,00</h4>

              <h6>PRONTO</h6>
              <p>
                10 itens: 1x pizza média: 1/3 marguerita, 1/3 camarão;
                hamburguer...
              </p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-clock"></i>
              <p>16:42</p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="">R$260,00</h4>

              <h6>PRONTO</h6>
              <p>
                10 itens: 1x pizza média: 1/3 marguerita, 1/3 camarão;
                hamburguer...
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="container_">
        <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-credit-card"></i>
              <p>16:42</p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="">R$260,00</h4>

              <h6>PAGO</h6>
              <p>
                10 itens: 1x pizza média: 1/3 marguerita, 1/3 camarão;
                hamburguer...
              </p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-credit-card"></i>
              <p>16:42</p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="">R$260,00</h4>

              <h6>PAGO</h6>
              <p>
                10 itens: 1x pizza média: 1/3 marguerita, 1/3 camarão;
                hamburguer...
              </p>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="row">
            <div class="col-4 text-center parteEsquerda">
              <i class="fa-regular fa-credit-card"></i>
              <p>16:42</p>
            </div>

            <div class="col-8 parteDireita">
              <h4 class="">R$260,00</h4>

              <h6>PAGO</h6>
              <p>
                10 itens: 1x pizza média: 1/3 marguerita, 1/3 camarão;
                hamburguer...
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Scripts -->
    <script src="_js/script.js"></script>

  </body>
</html>
