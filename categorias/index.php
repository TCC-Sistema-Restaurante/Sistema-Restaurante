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
    <title>Categorias</title>
  </head>
  <body>
   
    <?php include "../nav_bar/nav.php";?>

    <section class="topoSection mb-4  ">
      <h1 onclick="deletar_objt()">Categorias</h1>
      <div class="row">

        <div class="col-md-10">
          <div class="containerInput mt-4">
            <div class="mb-3">
              <span class="inlineIcon">
                <i class='bx bx-search'></i>            
              </span>
              <input type="text" class="input-text" placeholder="Pesquisar categoria"/>
            </div>
          </div>
        </div>

        <div class="col-md-2">
          <div>
            <button class="NovoBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class='bx bx-plus'></i>Add</button>
          </div>
        </div>

      </div>
    </section>

    <section class="cardapio mt-5">
      <div id="container" class="container">
       


      </div>
    </section>

    <!-- Modal Cadastro-->
    <div class="modal t-modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar categoria</h1>
            <div>
              <button type="button" id="form-btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <form method="POST" id="form" enctype="multipart/form-data" >
            <div class="modal-body">
              <div class="form-floating mb-3">
                  <input type="nome" required class="form form-control" name="nome" id="nome" placeholder="Nome">
                  <label class="formLabel" for="nome">Nome</label>
              </div> 
              
                <label class="picture" for="picture-input">
                    <span class="picture-image"></span>
                </label>
                <input type="file" accept="image/png,image/jpeg" name="picture-input" id="picture-input" />
                
            </div>
            <div class="modal-footer">
              <button type="submit" id="btnCadastro" class="btn btn-primary" >Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Editar-->
    <div class="modal t-modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditar" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar categoria</h1>
            <div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="edit-btn-close"></button>
            </div>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
                <input type="nome" class="form form-control" name="nomeEditar" id="nomeEditar" placeholder="Nome">
                <label class="formLabel" for="nome">Nome</label>
            </div> 
            <input type="text" hidden class="form form-control" name="idEditar" id="inputId" placeholder="Id">

            <label class="picture" for="picture-input-edit">
                <span class="picture-image-edit"></span>
            </label>
            <input required type="file" accept="image/png,image/jpeg" name="picture-input-edit" id="picture-input-edit" />
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-editar">Salvar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal deletar -->
<div class="modal-delet">
  <div class="modal t-modal fade" id="modalDeletar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          
          <div>
            <button type="button" class="btn-close" id="delet-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
        <div class="modal-body">
          <div class="modal-delet">
            <span class="material-symbols-outlined"> warning </span>
            <h3>Tem certeza que deseja excluir esse item?</h3>
            <input type="text" hidden class="form form-control" name="idEditar" id="inputIdEdit" placeholder="Id">
          </div>
        </div>
          <div class="modal-footer">
            <button id="deletar-item" class="btn btn-danger">Deletar</button>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="_js/ajax_functions.js"></script>
    <script src="_js/script.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
</html>

