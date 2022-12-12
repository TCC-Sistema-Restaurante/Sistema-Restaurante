<?php

// Login functions
function login($dados){
    include "config.php";

    // Adiciona os valores do inputs ás váriaveis (real_escape_string para previnir sql injector)
    $usuario = $mysqli->real_escape_string($dados['usuario']);
    $senha = $mysqli->real_escape_string($dados['senha']);

    //Código sql para checar na tabela "dados_user" se o úsuario e a senha estão corretos
    $sql = "SELECT * FROM dados_user WHERE usuario = '$usuario' AND senha = '$senha'";
    //Executa o código sql e em caso de falha retorna o erro
    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);

    $user = $query->fetch_assoc();
    // retorna a quantidade de linhas com os dados compatíveis
    $qtd = $query->num_rows;


    if ($qtd == 1) {
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['cargo'] = $user['cargo'];

        if($_SESSION['cargo'] == "Gerente"){
            header("Location: ../menu/menu.html");
        }
        else if($_SESSION['cargo'] == "Cozinha"){
            header("Location: ../pedidos pendentes/index.html");

        }
        else{
            header("Location: ../cardapio_garcom/cardapio.html");
        }
    } else {
    ?>
        <script language='javascript'>
            swal.fire({
                icon: "error",
                text: "Ops! Usuário não encontrado",
                type: "success",
                confirmButtonText: 'Tentar Novamente',
                timer: 7500,
                confirmButtonColor: '#34A323'

            }).then(okay => {

            });
        </script>
    <?php
    }
}

function produtoExiste($nome){
    
    include "config.php";
    $sql = "SELECT nome_produto FROM produto WHERE nome_produto='$nome'";
    $query = $mysqli->query($sql);
    $total = mysqli_num_rows($query);

    return $total;
}

function cadastrarProduto($dados, $upload){
    include "config.php";

    $nome = $dados['nome'];
    $tamanho = $dados['tamanho'];
    $categoria = $dados['categoria'];
    $status = $dados['status'];
    $valor = $dados['valor'];
    $descricao = $dados['descricao'];
    $dir = "../_imgBanco/";
    $img = $_FILES["picture-input"];
    $imgNome = $img["name"];


    if (produtoExiste($nome) == 0 && move_uploaded_file($img["tmp_name"], "$dir/".$imgNome)) {
        $sql = "INSERT INTO `produto` (`id`, `nome_produto`, `data_cadastro`, `tamanho`, `categoria`, `valor`, `descricao`, `img`, `status`) VALUES (NULL, '$nome', current_timestamp(), '$tamanho', '$categoria', '$valor', '$descricao', '$dir/$$imgNome', '$status')";

        $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
        return $query;
    } else {
        return False;
    }
}

function usuarioExiste($cpf)
{
    include "config.php";
    $sql = "SELECT cpf FROM usuario WHERE cpf='$cpf'";
    $query = $mysqli->query($sql);
    $total = mysqli_num_rows($query);

    return $total;
}

function cadastrarUsuario($dados)
{
    include "config.php";

    $nome = $dados['nome'];
    $cpf = $dados['cpf'];
    $usuario = $dados['usuario'];
    $senha = $dados['senha'];
    $cargo = $dados['cargo'];


    if (usuarioExiste($cpf) == 0) {

        $sql = "INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `cpf`, `cargo`) VALUES (NULL, '$nome', '$usuario', '$senha', '$cpf', '$cargo')";

        $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
        return $query;
    } else {
        return False;
    }
}

function mesasPedidosPendentes(){
    include "config.php";
    $sql = "SELECT DISTINCT id_mesa FROM pedido WHERE situacao = 'aguardando preparo'";
    $query = $mysqli->query($sql);
    return $query;
}

function listarPedidosMesa($id_mesa){
    include "config.php";
    $sql = "SELECT * FROM pedido WHERE situacao = 'aguardando preparo' AND id_mesa = '$id_mesa'";
    $query = $mysqli->query($sql);
    return $query;
}

function retornarProduto($id_produto){
    include "config.php";
    $sql = "SELECT nome_produto FROM produto WHERE id = '$id_produto'";
    $query = $mysqli->query($sql);
    $dados = $query->fetch_array();
    return $dados['nome_produto'];
}

?>


