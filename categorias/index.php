<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"/>
    <link rel="stylesheet" href="_css/style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Cardápio</title>
  </head>
  <body>
   
    <?php include "../nav_bar/nav.php";?>

    <section class="topoSection mb-4  ">
      <h1>Categorias</h1>
      <div class="row">

        <div class="col-md-10">
          <div class="containerInput mt-4">
            <div class="mb-3">
              <span class="inlineIcon">
                <i class='bx bx-search'></i>            
              </span>
              <input type="text" class="input-text" placeholder="Pesquisar Mesa"/>
            </div>
          </div>
        </div>

        <div class="col-md-2">
          <div>
            <button class="NovoBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Novo</button>
          </div>
        </div>

      </div>
    </section>


     <!-- Modal -->
     <div class="modal t-modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar categoria</h1>
              <div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            <div class="modal-body">
              <div class="form-floating mb-3">
                  <input type="nome" class="form form-control" id="nome" placeholder="Nome">
                  <label class="formLabel" for="nome">Nome</label>
              </div> 
              
                <label class="picture" for="picture-input">
                    <span class="picture-image"></span>
                </label>
                <input required type="file" name="picture-input" id="picture-input" />
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Cadastrar</button>
            </div>
          </div>
        </div>
      </div>

    <section class="cardapio mt-5">
      <div class="container">
        <div class="item">
          <img src="https://receitinhas.com.br/wp-content/uploads/2016/12/hamburguer-1200x800.jpg" alt="" />
          <div>
            <h3>Hambúrguer</h3>
          </div>
        </div>
        <div class="item">
          <img src="https://img.itdg.com.br/tdg/images/blog/uploads/2022/07/5-itens-necessarios-para-se-tornar-um-pizzaiolo-neste-Dia-da-Pizza.jpg?mode=crop&width={:width=%3E150,%20:height=%3E130}" alt="" />
          <div>
            <h3>Pizza</h3>
          </div>
        </div>
        <div class="item">
          <img src="https://foodbase.com.br/storage/app/media/receitas/2021/01/sorvete-de-flocos-co.jpg" alt="" />
          <div>
            <h3>Sorvete</h3>
          </div>
        </div>

        <div class="item">
          <img src="https://minhasaude.proteste.org.br/wp-content/uploads/2022/06/acai-com-frutas-granola.png" alt="" />
          <div>
            <h3>Açaí</h3>
          </div>
        </div>

        <div class="item">
          <img src="https://www.receiteria.com.br/wp-content/uploads/recheios-de-pastel-0.jpg" alt="" />
          <div>
            <h3>Pastel</h3>
          </div>
        </div>

        <div class="item">
          <img src="https://conteudo.imguol.com.br/c/entretenimento/74/2022/09/13/drinques-bebida-alcoolica-tequila-cerveja-chopp-gim-martini-alcool-copos-tacas-1663094165597_v2_900x506.jpg" alt="" />
          <div>
            <h3>Bebidas</h3>
          </div>
        </div>

      </div>
    </section>
    <!-- Scripts -->
    <script src="_js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
