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
  </head>

  <body>

  <?php include "../nav_bar/nav.php";?>

    
      <section class="topoSection mb-4  ">
        <div class="row d-flex align-items-center">
          <div class="col d-flex justify-content-start">
              <h1>Mesas</h1>
          </div>

          <div class="col d-flex justify-content-end">
            <div class=""><button class="addBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-plus'></i>Add mesa</button></div>
          </div>
        </div>

        <div class="containerInput mt-4">
          <div class="mb-3">
            <span class="inlineIcon">
              <i class='bx bx-search'></i>            
            </span>
            <input
              type="text"
              class="form-control input-text"
              placeholder="Pesquisar Mesa"
            />
          </div>
      </div>
    </section>

      <!-- Modal -->
      <div class="modal t-modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar mesa</h1>
              <div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            <div class="modal-body">
              <div class="form-floating mb-3">
                  <input type="number" class="form form-control" id="nome" placeholder="Nome">
                  <label class="formLabel" for="nome">Quantidade de mesas</label>
              </div> 
              
              <div class="form-floating">
                  <input type="number" class="form form-control" id="nome" placeholder="Nome">
                  <label class="formLabel" for="nome">Começar a partir de:</label>
              </div> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Cadastrar</button>
            </div>
          </div>
        </div>
      </div>
  
    <section class="sec3 ">
      <div class="container ">
        <div class="table-responsive-md">
          <table class="table table-borderless ">
            <thead>
              <tr>
                <th scope="col">STATUS</th>
                <th scope="col">MESA</th>
                <th scope="col">CADEIRAS</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td >
                  <label class="toggle"> 
                    <input onclick="checkboxStatus(this)" id="check" class="toggle-checkbox" value="Inativo" type="checkbox">
                    <div  class="toggle-switch"><p class="checkboxText">INATIVO</p></div>
                  </label>
                </td>
                <td>1</td>
                <td>2 cadeiras</td>
                <td>
                  <button type="button" onclick="editar(this)" class="tableBtn tableBtnEditar">
                    <i class='bx bx-edit-alt'></i> </button>
                </td>
                <td>
                  <button type="button" class="tableBtn tableBtnEditar">
                    <i class='bx bx-trash'></i>                  
                  </button>
                </td>
              </tr>
              <tr>
                <td >
                  <label class="toggle"> 
                    <input onclick="checkboxStatus(this)" id="check" class="toggle-checkbox" value="Inativo" type="checkbox">
                    <div  class="toggle-switch"><p class="checkboxText">INATIVO</p></div>
                  </label>
                </td>
                <td>1</td>
                <td>2 cadeiras</td>
                <td>
                  <button type="button" onclick="editar(this)" class="tableBtn tableBtnEditar">
                    <i class='bx bx-edit-alt'></i> </button>
                </td>
                <td>
                  <button type="button" class="tableBtn tableBtnEditar">
                    <i class='bx bx-trash'></i>                  
                  </button>
                </td>
              </tr>
              <tr>
                <td >
                  <label class="toggle"> 
                    <input onclick="checkboxStatus(this)" id="check" class="toggle-checkbox" value="Inativo" type="checkbox">
                    <div  class="toggle-switch"><p class="checkboxText">INATIVO</p></div>
                  </label>
                </td>
                <td>1</td>
                <td>2 cadeiras</td>
                <td>
                  <button type="button" onclick="editar(this)" class="tableBtn tableBtnEditar">
                    <i class='bx bx-edit-alt'></i> </button>
                </td>
                <td>
                  <button type="button" class="tableBtn tableBtnEditar">
                    <i class='bx bx-trash'></i>                  
                  </button>
                </td>
              </tr>
              <tr>
                <td >
                  <label class="toggle"> 
                    <input onclick="checkboxStatus(this)" id="check" class="toggle-checkbox" value="Inativo" type="checkbox">
                    <div  class="toggle-switch"><p class="checkboxText">INATIVO</p></div>
                  </label>
                </td>
                <td>1</td>
                <td>2 cadeiras</td>
                <td>
                  <button type="button" onclick="editar(this)" class="tableBtn tableBtnEditar">
                    <i class='bx bx-edit-alt'></i> </button>
                </td>
                <td>
                  <button type="button" class="tableBtn tableBtnEditar">
                    <i class='bx bx-trash'></i>                  
                  </button>
                </td>
              </tr>
              <tr>
                <td >
                  <label class="toggle"> 
                    <input onclick="checkboxStatus(this)" id="check" class="toggle-checkbox" value="Inativo" type="checkbox">
                    <div  class="toggle-switch"><p class="checkboxText">INATIVO</p></div>
                  </label>
                </td>
                <td>1</td>
                <td>2 cadeiras</td>
                <td>
                  <button type="button" onclick="editar(this)" class="tableBtn tableBtnEditar">
                    <i class='bx bx-edit-alt'></i> </button>
                </td>
                <td>
                  <button type="button" class="tableBtn tableBtnEditar">
                    <i class='bx bx-trash'></i>                  
                  </button>
                </td>
              </tr>
              <tr>
                <td >
                  <label class="toggle"> 
                    <input onclick="checkboxStatus(this)" id="check" class="toggle-checkbox" value="Inativo" type="checkbox">
                    <div  class="toggle-switch"><p class="checkboxText">INATIVO</p></div>
                  </label>
                </td>
                <td>1</td>
                <td>2 cadeiras</td>
                <td>
                  <button type="button" onclick="editar(this)" class="tableBtn tableBtnEditar">
                    <i class='bx bx-edit-alt'></i> </button>
                </td>
                <td>
                  <button type="button" class="tableBtn tableBtnEditar">
                    <i class='bx bx-trash'></i>                  
                  </button>
                </td>
              </tr>
              <tr>
                <td >
                  <label class="toggle"> 
                    <input onclick="checkboxStatus(this)" id="check" class="toggle-checkbox" value="Inativo" type="checkbox">
                    <div  class="toggle-switch"><p class="checkboxText">INATIVO</p></div>
                  </label>
                </td>
                <td>1</td>
                <td>2 cadeiras</td>
                <td>
                  <button type="button" onclick="editar(this)" class="tableBtn tableBtnEditar">
                    <i class='bx bx-edit-alt'></i> </button>
                </td>
                <td>
                  <button type="button" class="tableBtn tableBtnEditar">
                    <i class='bx bx-trash'></i>                  
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"></script>
      <script src="_js/script.js"></script>
  
  
  </body>

</html>