<?php

// Login functions
function login($dados){
    include "config.php";

    // Adiciona os valores do inputs ás váriaveis (real_escape_string para previnir sql injector)
    $usuario = $mysqli->real_escape_string($dados['usuario']);
    $senha = $mysqli->real_escape_string($dados['senha']);

    //Código sql para checar na tabela "dados_user" se o úsuario e a senha estão corretos
    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha'";
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
        else if($_SESSION['cargo'] == "Cozinheiro"){
            header("Location: ../pedidos pendentes/index.html");

        }
        else if($_SESSION['cargo'] == "Garçom"){
            header("Location: ../cardapio_garcom/cardapio.html");

        }
        else{
            ?>
            <script language='javascript'>
                swal.fire({
                    icon: "error",
                    text: "Usuário não possui cargo definido",
                    type: "success",
                    confirmButtonText: 'Tentar Novamente',
                    timer: 7500,
                    confirmButtonColor: '#34A323'
    
                }).then(okay => {
    
                });
            </script>
        <?php
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

// Cadastro de Produto

function produtoExiste($nome){
    
    include "config.php";
    $sql = "SELECT nome_produto FROM produto WHERE nome_produto='$nome'";
    $query = $mysqli->query($sql);
    $total = mysqli_num_rows($query);

    return $total;
}

function tratar_arquivo_upload($string, $nomeProduto){
    // pegando a extensao do arquivo
    $partes 	= explode(".", $string);
    $extensao 	= $partes[count($partes)-1];	
    // somente o nome do arquivo
    $nome	= preg_replace('/\.[^.]*$/', '', $nomeProduto);	
    // removendo simbolos, acentos etc
    $aleatorio = rand(1000, 10000);
    $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
    $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
    $nome = strtr($nome, utf8_decode($a), $b);
    $nome = str_replace(".","-",$nome);
    $nome = preg_replace( "/[^0-9a-zA-Z\.]+/",'-',$nome);
    return utf8_decode(strtolower($nome."(".$aleatorio.").".$extensao));
}

function cadastrarProduto($dados, $upload){
    include "config.php";

    $nome = $dados['nome'];
    $categoria_id = $dados['categoria'];
    $valor = $dados['valor'];
    $descricao = $dados['descricao'];
    $status = $dados['status'];
    $dir = "../_imgBanco";
    $img = $_FILES["picture-input"];
    $img["name"] = tratar_arquivo_upload(utf8_decode($img['name']), utf8_decode($nome));
    $imgNome = $img["name"];

    if (produtoExiste($nome) == 0 && move_uploaded_file($img["tmp_name"], "$dir/".$imgNome)) {

        $sql = "INSERT INTO `produto` (`id`, `nome_produto`, `categoria_id`, `valor_unitario`, `descricao`, `img`, `status`) VALUES (NULL, '$nome', '$categoria_id', '$valor', '$descricao', '$dir/$imgNome', '$status')";

        $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
        return $query;
    } else {
        return False;
    }
}

// Cadastro de Categoria
function categoriaExiste($nome)
{
    include "config.php";
    $sql = "SELECT categoria FROM categoria WHERE categoria='$nome'";
    $query = $mysqli->query($sql);
    $total = mysqli_num_rows($query);

    return $total;
}

function cadastrarCategoria($dados, $upload)
{
    include "config.php";

    $nome = $dados['categoria'];
    $dir = "../_imgBanco";
    $img = $_FILES["picture-input"];
    $img["name"] = tratar_arquivo_upload(utf8_decode($img['name']), utf8_decode($nome));
    $imgNome = $img["name"];

    if (usuarioExiste($cpf) == 0) {

        $sql = "INSERT INTO `categoria` (`id`, `categoria`, `imagem`) VALUES (NULL, '$nome','$dir/$imgNome')";

        $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
        return $query;
    } else {
        return False;
    }
}

function editarCategoria($dados, $upload)
{
    include "config.php";
    $id = $dados['id'];
    $nome = $dados['nomeProduto'];
    $url = $dados['link'];

    $sql = "UPDATE categoria SET  nome_produto='$nome', fornecedor='$fornecedor', custo_produto='$custo', valor_venda='$valor', estoque_qtd='$qtd', codigo_produto='$codigo', url_img='$url' WHERE id='$id'";

    $query = $mysqli->query($sql) or die("ERRO: " . $mysqli->error);
    return $query;
}

// Cadastro de Usuario

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
    $sql = "SELECT DISTINCT id_mesa, data FROM pedido WHERE situacao = 'aguardando preparo' ORDER BY data";
    $query = $mysqli->query($sql);
    return $query;
}

function listarPedidosMesa($id_mesa){
    include "config.php";
    $sql = "SELECT * FROM pedido WHERE situacao = 'aguardando preparo' AND id_mesa = '$id_mesa'";
    $query = $mysqli->query($sql);
    return $query;
}

function retornarProduto($id_mesa){
    include "config.php";
    $sql = "SELECT nome_produto FROM `produto`
    INNER JOIN pedido on produto.id = pedido.id_produtos  WHERE id = '$id_mesa'";
    $query = $mysqli->query($sql);
    return $query;
}

function retornarPedidoaCancelar($id_mesa){
    include "config.php";
    $sql = "SELECT valor_unitario , nome_produto, TIME_FORMAT(data, '%H:%i') as hora FROM `produto`
    INNER JOIN pedido on produto.id = pedido.id_produtos 
    WHERE situacao = 'aguardando preparo' AND id_mesa = $id_mesa";
    $query = $mysqli->query($sql);
    $dados = mysqli_fetch_all($query);
    return $dados;
}

function mesasPedidosProntos(){
    include "config.php";
    $sql = "SELECT DISTINCT id_mesa FROM pedido WHERE situacao = 'pronto'";
    $query = $mysqli->query($sql);
    return $query;
}

// Dashboard
function vendasDia(){
    include '../_scripts/config.php';
    
    $sql= "SELECT SUM(id) FROM consulta_venda WHERE DATE(data_venda) = CURRENT_DATE()";
    $query = $mysqli->query($sql);
    $result= $query->fetch_array();
    return intval($result[0]);

}


function qtdPedidosMensal(){
    include '../_scripts/config.php';
    $sql= "SELECT count(id) as 'soma' FROM pedido WHERE MONTH(data) =MONTH(CURRENT_DATE()) and situacao = 'pago'";
    $query = $mysqli->query($sql);
    $result= $query->fetch_array();
    return intval($result[0]);

}


function faturamentoMensal(){
    include '../_scripts/config.php';
    $sql= "SELECT sum(valor_produto) as 'valor' FROM pedido WHERE MONTH(data) =MONTH(CURRENT_DATE()) and situacao = 'pago'";
    $query = $mysqli->query($sql);
    $result= $query->fetch_array();
    $numero = intval($result[0]);
    return number_format($numero, 2);

}

function qtdPedidosdiario(){
    include '../_scripts/config.php';
    $sql= "SELECT count(id) as 'soma' FROM pedido WHERE DAY(data) =DAY(CURRENT_DATE())  and situacao = 'pago'";
    $query = $mysqli->query($sql);
    $result= $query->fetch_array();
    return intval($result[0]);

}


function faturamentodiario(){
    include '../_scripts/config.php';
    $sql= "SELECT sum(valor_produto) as 'valor' FROM pedido WHERE DAY(data) =DAY(CURRENT_DATE()) and situacao = 'pago'";
    $query = $mysqli->query($sql);
    $result= $query->fetch_array();
    $numero = intval($result[0]);
    return number_format($numero, 2);

}
function PratosMaisPedidos(){
    include '../_scripts/config.php';
    $i=0;
    $b=array();
    
    $sql= "SELECT COUNT(id) as soma, (SELECT nome_produto from produto WHERE id= id_produtos) as nome FROM pedido GROUP BY id_produtos ORDER BY COUNT(id) DESC LIMIT 10";
    $query = $mysqli->query($sql);
    while ($result=$query->fetch_array()){
        $b[$i]= array('country'=> $result['nome'], 'value' =>intval($result['soma']));
    
        $i++;
    }
    return json_encode($b);  

}

function FaturamentoAnual(){
    include '../_scripts/config.php';
    $i=0;
    $b=array();
    
    $sql= "select case 
	when month(data) = 1 then 'Janeiro'
	when month(data) = 2 then 'Fevereiro'
	when month(data) = 3 then 'Março'
	when month(data) = 4 then 'Abril'
	when month(data) = 5 then 'Maio'
    when month(data) = 6 then 'Junho'
    when month(data) = 7 then 'Julho'
    when month(data) = 8 then 'Agosto'
    when month(data) = 9 then 'Setembro'
    when month(data) = 10 then 'Outubro'
    when month(data) = 11 then 'Novembro'
    when month(data) = 12 then 'Dezembro'
end as 'Mês', sum(valor_produto) as 'valor' from pedido Where situacao = 'pago' GROUP BY month(data) ORDER By month(data) asc";
    $query = $mysqli->query($sql);
    while ($result=$query->fetch_array()){
        $b[$i]= array('country'=> $result['Mês'], 'value' =>intval($result['valor']));
    
        $i++;
    }
    return json_encode($b);  

}

function horariosMaisMovimentados(){
    include '../_scripts/config.php';
    $i=0;
    $b=array();
    
    $sql= "select case 
	when hour(data) = 0 then '00:00'
	when hour(data) = 1 then '01:00'
	when hour(data) = 2 then '02:00'
	when hour(data) = 3 then '03:00'
	when hour(data) = 4 then '04:00'
    when hour(data)= 5 then '05:00'
    when hour(data) = 6 then '06:00'
    when hour(data) = 7 then '07:00'
    when hour(data) = 8 then '08:00'
    when hour(data) = 9 then '09:00'
    when hour(data) = 10 then '10:00'
    when hour(data) = 11 then '11:00'
    when hour(data) = 12 then '12:00'
    when hour(data) = 13 then '13:00'
    when hour(data) = 14 then '14:00'
    when hour(data) = 15 then '15:00'
    when hour(data) = 16 then '16:00'
    when hour(data) = 17 then '17:00'
    when hour(data) = 18 then '18:00'
    when hour(data) = 19 then '19:00'
    when hour(data) = 20 then '20:00'
    when hour(data) = 21 then '21:00'
    when hour(data) = 22 then '22:00'
    when hour(data) = 23 then '23:00'
end as 'Hora', COUNT(id) as 'valor' from pedido Where situacao = 'pago' GROUP BY hour(data) ORDER By COUNT(id) desc";
    $query = $mysqli->query($sql);
    while ($result=$query->fetch_array()){
        $b[$i]= array('year'=> $result['Hora'], 'value' =>intval($result['valor']));
    
        $i++;
    }
    return json_encode($b);  

}



?>


