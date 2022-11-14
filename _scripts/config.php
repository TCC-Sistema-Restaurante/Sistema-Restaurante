<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'gusteau_database';

//INTANCIAMOS A CLASSE PARA ACESSAR O BANCO
$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

//Verifica se houve erro
if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}