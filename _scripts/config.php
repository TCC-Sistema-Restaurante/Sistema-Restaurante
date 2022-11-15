<?php
$servidor = 'sql541.main-hosting.eu';
$usuario = 'u668629163_gusteau';
$senha = 'Gusteau@123';
$banco = 'u668629163_gusteau_databa';

//INTANCIAMOS A CLASSE PARA ACESSAR O BANCO
$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

//Verifica se houve erro
if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}