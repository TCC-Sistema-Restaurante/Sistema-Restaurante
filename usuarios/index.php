<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link href="_css/style.css" type="text/css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>

  <body>

  <?php include "../nav_bar/nav.php";?>

    

  <section class="topoSection mb-4  ">
      <h1>Usuários</h1>
      <div class="row">

        <div class="col-md-10">
          <div class="containerInput mt-4">
            <div class="mb-3">
              <span class="inlineIcon">
                <i class='bx bx-search'></i>            
              </span>
              <input type="text" id="buscar" class="input-text" placeholder="Pesquisar usuário"/>
            </div>
          </div>
        </div>

        <div class="col-md-2">
          <div>
            <a>
            <button class="NovoBtn"><i class='bx bx-plus'></i>Add</button>
            </a>
          </div>
        </div>

      </div>
    </section>




  
    <section class="sec3 ">
      <div class="container" id="container">
        
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script>
      function buscar(texto) {
        $.ajax({
          url: 'buscar.php',
          type: "post",  
          data: {
            texto:texto
          },

          success: function(data){
            // console.log(status)
            $('#container').html(data)
          }
          
        });
        
        };

      $(document).ready(function(){
        buscar();

        $('#buscar').keyup(function(){
          var texto = $(this).val();
          if (texto != ''){
            buscar(texto);
          }
          else
          {
            buscar();
          }
        });
      });


 
    
   </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"></script>
      <script src="_js/script.js"></script>
  
  
  </body>

</html>