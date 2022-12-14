<div class="modal-edit">
  <div class="modal t-modal fade" id="modal-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar produto</h1>
          <div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
        <div class="modal-body">
          <form action="" class="form-edit">
      
          <div>
              <input type="text" placeholder="Nome" />
              <input type="text" placeholder="Valor" />
          </div>
          <div>
              <select name="select">
              <option value="valor1">Valor 1</option>
              <option value="valor2">Valor 2</option>
              <option value="valor3">Valor 3</option>
              </select>
              <select name="select">
              <option value="valor1">Valor 1</option>
              <option value="valor2">Valor 2</option>
              <option value="valor3">Valor 3</option>
              </select>
          </div>

          <div>
              <label class="picture" for="picture-input">
              <span class="picture-image"></span>
              </label>
              <input type="file" name="picture-input" id="picture-input" />
              <textarea maxlength="500" placeholder="Descrição"></textarea>
          </div>
          </form>
        </div>
          <div class="modal-footer">
            <button class="btn btn-success" >Salvar item</button>
        </div>
      </div>
    </div>
  </div>
</div>