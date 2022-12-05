<?php
include "../_scripts/functions.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="cadastro.css" type="text/css" rel="stylesheet">
    <link href="../nav_bar/_CSS/nav.css" type="text/css" rel="stylesheet" >
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>

<?php
    include "../nav_bar/nav.php";
?>

    
    <form class="formulario" method="POST" enctype="multipart/form-data" action="">
        <div class="mb-4"><h1>Cadastrar produto</h1></div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input required type="text" class="form form-control" name="nome" id="nome" placeholder="Nome">
                    <label class="formLabel" for="nome">Nome</label>
                </div>
            </div>
           
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input  required type="number" min="0" name="valor"  class="form form-control" id="valor" placeholder="Valor">
                    <label class="formLabel" for="valor">Valor</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <div class="input-group">
                    <select required name="tamanho" class="select wide" >
                        <option selected disabled>Tamanho</option>
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>
                    <button  class="selectButton"><i class='bx bx-edit' id="editarIcon"></i></button>
                </div>
            </div>

            <div class="mb-3 col-md-6">
                <div class="input-group">   
                    <select required name="categoria" class="select wide" aria-label="">
                        <option selected disabled>Categoria</option>
                        <option value="Sanduíches">Sanduíches</option>
                        <option value="Pizzas">Pizzas</option>
                        <option value="Sobremesas">Sobremesas</option>
                        <option val0ue="Bebidas">Bebidas</option>
                    </select>
                    <button  class="selectButton"><i class='bx bx-edit'></i></button>
                  </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="picture" for="picture-input">
                    <span class="picture-image"></span>
                </label>
                <input required type="file" name="picture-input" id="picture-input" />
            </div>
       
            <div class="col-md-6 mb-3">
                <div class="form-floating mb-3">
                    <textarea required name="descricao" style="height: 150px; resize: none;" class="form form-control" id="descricao"  placeholder="Descrição"></textarea>
                    <label class="formLabel" for="descricao">Descrição</label>
                </div>
                <label for="select">Status:</label>
                <select name="status" class="select" required>
                    <option value="Ativo" selected>Ativo</option>
                    <option value="Desativado">Desativado</option>
                </select>
            </div>
        </div>
    

        <div class="d-grid gap-2">
            <button class="btnCadastro confirmar" type="submit">Cadastrar</button>
            <button class="btnCadastro cancelar" type="button" id="cancelar">Cancelar</button>
        </div>
    </form>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    <script src="script.js"></script>

</body>
</html>

<?php
if (isset($_POST['nome'])) {

    if (cadastrarProduto($_POST, $_FILES)) { ?>

        <script language='javascript'>
            swal.fire({
                icon: "success",
                text: "Cadastrado com sucesso!",
                type: "success"
            }).then(okay => {
                // if (okay) {
                //     window.location.href = "painel.php?r=";
                // }
            });
        </script>
    <?php
    } else { ?>
        <script language='javascript'>
            swal.fire({
                icon: "error",
                text: "Ops! Houve um erro.",
                type: "success"
            }).then(okay => {
                // if (okay) {
                //     window.location.href = "painel.php?r=";
                // }
            });
        </script>
<?php
    }
}
?>