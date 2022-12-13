<?php
include("../_scripts\config.php");
    // if($_REQUEST["acao"]== "pesquisar"){
    //     $numero = $_POST["numero"];
    //     $sql = "SELECT * FROM mesa where numero = '{$numero}'";
    // }
    // else{
    $sql = "SELECT * FROM mesa";
    // }   
    $res = $mysqli->query($sql);
    $qnt = $res->num_rows;
    if($qnt > 0){
    while($row = $res->fetch_object()){ ?>
        <tbody>
        <tr>
            <td >
            <label class="toggle"> 
                <input onclick="checkboxStatus(this)" id="check" class="toggle-checkbox" value="<?php $row->situacao?>" type="checkbox" disabled>
                <div  class="toggle-switch"><p class="checkboxText"><?php print"$row->situacao"?></p></div>
            </label>
            </td>
            <td >
            <label class="toggle"> 
                <input onclick="checkboxDisponibilidade(this)" id="check" class="toggle-checkbox" value="<?php $row->disponibilidade?>" type="checkbox" disabled>
                <div  class="toggle-switch"><p class="checkboxText"><?php print"$row->disponibilidade"?></p></div>
            </label>
            </td>
            <td><?php print "$row->numero"?></td>
            <td><?php print "$row->cadeiras"?></td>
            <td>
            <button type="submit" onclick="editar(this)" class="tableBtn tableBtnEditar">
                <i class='bx bx-edit-alt'></i> </button>
            </td>
            <td>
            <form action="gravar-mesa.php" method="POST">
                <button type="submit" class="tableBtn tableBtnEditar">
                <i class='bx bx-trash'></i>                  
                </button>
                <input type="hidden" name="acao" value="deletar">
                <input type="hidden" name="numero" value="<?php print "$row->numero"?>">
            </form>
            </td>
        </tr>
        </tbody>
    <?php
    }
    }
    else{
    echo "não encontrou mesas";
    }
?>