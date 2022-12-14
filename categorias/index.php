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
      <h1>Categorias</h1>
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
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <input type="file" name="picture-input" id="picture-input" />
                
            </div>
            <div class="modal-footer">
              <button type="submit" id="btnCadastro" class="btn btn-primary">Cadastrar</button>
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
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          </div>
          <div class="modal-body">
            <div class="form-floating mb-3">
                <input type="nome" class="form form-control" name="nomeEditar" id="nomeEditar" placeholder="Nome">
                <label class="formLabel" for="nome">Nome</label>
            </div> 

            <label class="picture" for="picture-input-edit">
                <span class="picture-image-edit"></span>
            </label>
            <input required type="file" name="picture-input-edit" id="picture-input-edit" />
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Cadastrar</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script>
      const modal = document.getElementById('modalEditar')
      modal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget

        const dados_Nome = button.getAttribute('data-bs-whateverNome')
        const dados_Img = button.getAttribute('data-bs-whateverImg')

        const inputNome = modal.querySelector('#nomeEditar')
        inputNome.value = dados_Nome
        
        var pictureImageEdit = document.querySelector(".picture-image-edit");
        const img = document.createElement("img");
        img.src = dados_Img;
        img.classList.add("picture-img");
        pictureImageEdit.innerHTML = "";
        pictureImageEdit.appendChild(img);      
      })

    </script>
      
   <script>
    $(document).ready(function(){
      MostrarCategorias()
    });

    function MostrarCategorias() {
      var displayData="true";
      $.ajax({
        url: 'mostrarCategorias.php',
        type: "post",  
        data: {
          mostrar:displayData
        },

        success: function(data,status){
          // console.log(status)
          $('#container').html(data)
        }
        
      });
      
      };

     $('#form').on("submit",function(e){
        e.preventDefault();
        var nome = $('#nome').val()
        var imagem =  document.getElementById('picture-input').files[0];
        var form_data = new FormData();
        form_data.append("file", imagem);
        form_data.append("nome", nome);

        $.ajax({
          url: 'enviar.php',
          type: "post",
          dataType: "json",
          processData: false,
          contentType: false,  
          data: form_data,

          success: function(data,status){
            if(data.status == 'success'){
              alert("Thank you for subscribing!");
            }
             else if(data.status == 'error'){
                alert("Error on query!");
            }
            console.log(status)
            MostrarCategorias();
          }
          
        });

        
     })

    
   </script>
    <script src="_js/script.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
</html>


