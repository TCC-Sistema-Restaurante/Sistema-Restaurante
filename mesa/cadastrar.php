<?php
include("../_scripts\config.php");
    switch($_REQUEST["acao"]){
        case 'cadastrar':
            $numero = $_POST["numero"];
            $mesas = "SELECT * FROM mesa where numero = '{$numero}'";
            $res = $mysqli->query($mesas);
            $row = mysqli_num_rows($res);

            if($row > 0){
                print "<p class = 'alert alert danger'> mesa já cadastrada</p>";
                header('Location:../mesa');
            }
            else{
                $situacao = $_POST["situacao"];
                $disponibilidade = $_POST["disponibilidade"];
                $cadeiras = $_POST["cadeiras"];
    
                $sql = "INSERT INTO mesa (numero,situacao,disponibilidade,cadeiras)
                VALUES('{$numero}','{$situacao}','{$disponibilidade}', '{$cadeiras}')";
    
                $res = $mysqli->query($sql);
                if($res ==  true){ 
                    header('Location:../mesa');
           }
        } 
            break;
    }