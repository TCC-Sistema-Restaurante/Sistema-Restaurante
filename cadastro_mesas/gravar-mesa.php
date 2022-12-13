<?php
include("../_scripts\config.php");
session_start();
    switch($_REQUEST["acao"]){
    case 'cadastrar':
            $numero = $_POST["numero"];
            $mesas = "SELECT * FROM mesa where numero = '{$numero}'";
            $res = $mysqli->query($mesas);
            $row = mysqli_num_rows($res);

            if($row > 0){
                $_SESSION['erro'] = true;
                print "<p class = 'alert alert danger'> mesa já cadastrada</p>";
                header('Location:../cadastro_mesas');
            }
            else{
                $situacao = $_POST["situacao"];
                $disponibilidade = $_POST["disponibilidade"];
                $cadeiras = $_POST["cadeiras"];
    
                $sql = "INSERT INTO mesa (numero,situacao,disponibilidade,cadeiras)
                VALUES('{$numero}','{$situacao}','{$disponibilidade}', '{$cadeiras}')";
    
                $res = $mysqli->query($sql);
                if($res ==  true){
                    $_SESSION['erro'] = false;
                    header('Location:../cadastro_mesas');
                }
            }
            break;
        case 'deletar':
            // Swal.fire({
            //     title: 'Are you sure?',
            //     text: "You won't be able to revert this!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Yes, delete it!'
            //   }).then((result) => {
            //     if (result.isConfirmed) {
            //       Swal.fire(
            //         'Deleted!',
            //         'Your file has been deleted.',
            //         'success'
            //       )
            //     }
            // })
            $numero = $_POST["numero"];
            $sql = "DELETE FROM mesa where numero = '{$numero}'";
            $res = $mysqli->query($sql);
            if($res ==  true){
                header('Location:../cadastro_mesas');
            }
            break;
    }