<?php

// Login functions
function login($dados){
    include_once "config.php";

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

?>


