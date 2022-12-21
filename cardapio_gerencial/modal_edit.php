<div class="modal-edit">
  <div class="modal t-modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar produto</h1>
          <div>
            <button type="button" id="edit-btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
        <div class="modal-body">
          <form id="form-editar" action="" class="form-edit">
          <input type="text" hidden class="form form-control" name="idEditar" id="idEditar" placeholder="Id">
          <div>
              <input type="text" placeholder="Nome do produto" id="nomeEditar"/>
              <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" placeholder="Valor unitário" id="valorEditar" />
          </div>
          <div>
              <?php
              include "../_scripts/config_pdo.php";

              $statement = $pdo->prepare("SELECT categoria FROM categoria");
              $statement->execute();
              $result = $statement->fetchAll();
              $rowCount = $statement->rowCount();
              if ($rowCount > 0) {
                  $data ='
                  <select required name="categoria" class="select wide" aria-label="" id="categoriaEditar">
                    <option selected disabled>Categoria</option>';

                  foreach($result as $row){
                    $data .= '<option value="'.$row["categoria"].'">'.$row["categoria"].'</option>';
                  }
                  $data .= '</select>';

                  echo($data);
              } else{
                echo "";
              }

              
              ?>

              <textarea maxlength="500" placeholder="Descrição" id="descricaoEditar"></textarea>
          </div>
              <label class="picture" for="picture-input-edit">
                <span class="picture-image-edit"></span>
            </label>
            <input required type="file" accept="image/png,image/jpeg" name="picture-input-edit" id="picture-input-edit" />

        </div>
          <div class="modal-footer">
            <button type="submit" id="btn-editar" class="btn btn-success" >Salvar item</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
