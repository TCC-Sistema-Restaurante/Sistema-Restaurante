<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mesas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link href="_css/style.css" type="text/css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- <script src="sweetalert2.all.min.js"></script> -->

  </head>

  <body>

  <?php include "../nav_bar/nav.php";?>
 
  
  <section class="topoSection mb-4  ">
      <h1>Mesas</h1>
      <div class="row">

        <div class="col-md-10">
          <div class="containerInput mt-4">
            <div class="mb-3">
              <span class="inlineIcon">
                <i class='bx bx-search'></i>            
              </span>
              <input type="text" id="buscar" class="input-text" placeholder="Pesquisar Mesa"/>
            </div>
          </div>
        </div>

        <div class="col-md-2">
          <div>
            <button class="NovoBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-plus'></i>Add</button>
          </div>
        </div>

    </section>


    <section class="sec3 ">
      <div class="container" id="container">
        
      </div>
    </section>
    <!-- Modal Editar-->
    <div class="modal t-modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditar" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1>Editar Mesa</h1>
            <div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="edit-btn-close"></button>
            </div>
          </div>
          <div class="modal-body">
            <form method="POST" class="formulario" id="form-editar">
              <!-- <input type="text" hidden class="form form-control" id="inputId" placeholder="Id"> -->
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <div class="form-floating">
                            <input required type="number" class="form form-control" id="inputNumero" name="numero" placeholder="Numero da mesa">
                            <label class="formLabel" for="nome">Numero da mesa</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="form-floating">
                            <input required type="text" class=" form form-control" id="inputSituacao" name="situacao" placeholder="situacao">
                            <label class="formLabel" for="nome">situacao</label>
                        </div>                
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-floating">
                            <input required type="text" class=" form form-control" id="inputDisponibilidade" name="disponibilidade" placeholder="Disponibilidade">
                            <label class="formLabel" for="password">Disponibilidade</label>
                        </div>                
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="form-floating">
                            <input type="number" class="form form-control" name="cadeiras" id="inputCadeiras" placeholder="Cadeiras" required>
                            <label class="formLabel" for="nome">Cadeiras</label>
                        </div>
                    </div>
                    <!-- <div class="mb-4 col-md-6">
                        <select name="cargo" class="select wide" aria-label="" id="inputFuncao" required>
                            <option selected disabled>Função</option>
                            <option value="Garçom">Garçom</option>
                            <option value="Cozinheiro">Cozinheiro</option>
                            <option value="Gerente">Gerente</option>
                          </select>
                    </div> -->
                </div>

                <div class="d-grid gap-2">
                    <button class="btnCadastro confirmar" type="submit">Cadastrar</button>
                </div>
            </form>  
          </div>
        </div>
      </div>
    </div>

    <!-- Modal cadastrar -->
    <form action="cadastrar.php" method="post">
        <div class="modal t-modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <input type="hidder" name="acao" value="cadastrar">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar mesa</h1>
                <div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              </div>
              <div class="modal-body">
                
                <div class="form-floating mb-3">
                  <input type="number" class="form form-control" id="numero" name="numero" placeholder="Numero da mesa">
                  <label class="formLabel" for="nome">Numero da mesa</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="number" class="form form-control" id="cadeiras" name="cadeiras" placeholder="Quantidade cadeiras">
                    <label class="formLabel" for="nome">Quantidade de cadeiras</label>
                </div> 
                <div class="form-floating mb-3">
                  <select class="form form-control" name="situacao">
                    <option value="ocupada">Ocupada</option>
                    <option value="vazia" selected>Vazia</option>
                  </select>
                    <label class="formLabel" for="nome">Situação</label>
                </div>

                <div class="form-floating mb-3">
                  <select class="form form-control" name="disponibilidade">
                    <option value="ativa" selected>Ativa </option>
                    <option value="inativa">Inativa</option>
                  </select>
                    <label class="formLabel" for="nome">Situação</label>
                </div>

                <!-- <div class="form-floating">
                    <input type="number" class="form form-control" name="nome" placeholder="Nome">
                    <label class="formLabel" for="nome">Começar a partir de:</label>
                </div>  -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </div>
          </div>
        </div>
      </form>


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
                <input type="text" hidden class="form form-control" name="numeroEditar" id="inputNumeroEdit" placeholder="Numero">
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

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>