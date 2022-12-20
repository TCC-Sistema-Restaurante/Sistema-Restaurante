<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mesas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link href="_css/style.css" type="text/css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>

  <body>

  <?php include "../nav_bar/nav.php";?>
 
  
  <section class="topoSection mb-4  ">
      <h1>Mesas</h1>
      <div class="row">

        <div class="col-md-10">
          <div class="containerInput mt-4">
            <div class="mb-3">
              <span class="inlineIcon">
                <i class='bx bx-search'></i>            
              </span>
              <input type="text" id="buscar" class="input-text" placeholder="Pesquisar Mesa"/>
            </div>
          </div>
        </div>

        <div class="col-md-2">
          <div>
            <button class="NovoBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='bx bx-plus'></i>Add</button>
          </div>
        </div>

    </section>

    <section class="sec3 ">
      <div class="container" id="container">
        
      </div>
    </section>
    <!-- Modal Editar-->
    <div class="modal t-modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditar" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1>Editar Mesa</h1>
            <div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="edit-btn-close"></button>
            </div>
          </div>
          <div class="modal-body">
            <form method="POST" class="formulario" id="form-editar">
              <input type="text" hidden class="form form-control" id="inputId" placeholder="Id">
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <div class="form-floating">
                            <input required type="number" class="form form-control" id="inputNumero" name="numero" placeholder="Numero da mesa">
                            <label class="formLabel" for="nome">Numero da mesa</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <div class="form-floating">
                            <input type="number" class="form form-control" name="cadeiras" id="inputCadeiras" placeholder="Cadeiras" required>
                            <label class="formLabel" for="nome">Cadeiras</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="form-floating">
                        <select class="select wide" aria-label="" id="situacaoSelect" required name="situacao">
                          <option value="ocupada">Ocupada</option>
                          <option selected value="vazia">Vazia</option>
                        </select>
                        </div>                
                    </div>
                    <div class="mb-3 col-md-6">
                        <div class="form-floating">
                            <select class="select wide" id="disponibilidadeSelect" required name="disponibilidade">
                      <option selected value="ativa">Ativa </option>
                        <option value="inativa">Inativa</option>
                      </select>
                        </div>                
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btnCadastro confirmar" type="submit">Cadastrar</button>
                </div>
            </form>  
          </div>
        </div>
      </div>
    </div>

    <!-- Modal cadastrar -->
    <form method="post" id="cadastrarForm">
        <div class="modal t-modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar mesa</h1>
                <div>
                  <button type="button" id="cadBtnClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              </div>
              <div class="modal-body">
                
                <div class="form-floating mb-3">
                  
                  <input type="number" class="form form-control" id="numero" name="numero" placeholder="Numero da mesa">
                  <label class="formLabel" for="nome">Numero da mesa</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="number" class="form form-control" id="cadeiras" name="cadeiras" placeholder="Quantidade cadeiras">
                    <label class="formLabel" for="nome">Quantidade de cadeiras</label>
                </div> 
                <div class="form-floating mb-3">
                  <select class="select wide" aria-label="" id="situacaoSelect" required name="situacao">
                  <option selected disabled>Situação</option>
                    <option value="ocupada">Ocupada</option>
                    <option value="vazia">Vazia</option>
                  </select>
                </div>

                <div class="form-floating mb-3">
                  <select class="select wide" id="disponibilidadeSelect" required name="disponibilidade">
                  <option selected disabled>Disponibilidade</option>
                  <option value="ativa">Ativa </option>
                    <option value="inativa">Inativa</option>
                  </select>
                </div>

                <!-- <div class="form-floating">
                    <input type="number" class="form form-control" name="nome" placeholder="Nome">
                    <label class="formLabel" for="nome">Começar a partir de:</label>
                </div>  -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </div>
          </div>
        </div>
      </form>


    <!-- Modal deletar -->
    <div class="modal-delet">
      <div class="modal t-modal fade" id="modalDeletar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              
              <div>
                <button type="button" class="btn-close" id="delet-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            <div class="modal-body">
              <div class="modal-delet">
                <span class="material-symbols-outlined"> warning </span>
                <h3>Tem certeza que deseja excluir esse item?</h3>
                <input type="text" hidden class="form form-control" name="numeroEditar" id="inputNumeroEdit" placeholder="Numero">
              </div>
            </div>
              <div class="modal-footer">
                <button id="deletar-item" class="btn btn-danger">Deletar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="_js/ajax_functions.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        !function(e){e.fn.niceSelect=function(t){function s(t){t.after(e("<div></div>").addClass("nice-select").addClass(t.attr("class")||"").addClass(t.attr("disabled")?"disabled":"").attr("tabindex",t.attr("disabled")?null:"0").html('<span class="current"></span><ul class="list"></ul>'));var s=t.next(),n=t.find("option"),i=t.find("option:selected");s.find(".current").html(i.data("display")||i.text()),n.each(function(t){var n=e(this),i=n.data("display");s.find("ul").append(e("<li></li>").attr("data-value",n.val()).attr("data-display",i||null).addClass("option"+(n.is(":selected")?" selected":"")+(n.is(":disabled")?" disabled":"")).html(n.text()))})}if("string"==typeof t)return"update"==t?this.each(function(){var t=e(this),n=e(this).next(".nice-select"),i=n.hasClass("open");n.length&&(n.remove(),s(t),i&&t.next().trigger("click"))}):"destroy"==t?(this.each(function(){var t=e(this),s=e(this).next(".nice-select");s.length&&(s.remove(),t.css("display",""))}),0==e(".nice-select").length&&e(document).off(".nice_select")):console.log('Method "'+t+'" does not exist.'),this;this.hide(),this.each(function(){var t=e(this);t.next().hasClass("nice-select")||s(t)}),e(document).off(".nice_select"),e(document).on("click.nice_select",".nice-select",function(t){var s=e(this);e(".nice-select").not(s).removeClass("open"),s.toggleClass("open"),s.hasClass("open")?(s.find(".option"),s.find(".focus").removeClass("focus"),s.find(".selected").addClass("focus")):s.focus()}),e(document).on("click.nice_select",function(t){0===e(t.target).closest(".nice-select").length&&e(".nice-select").removeClass("open").find(".option")}),e(document).on("click.nice_select",".nice-select .option:not(.disabled)",function(t){var s=e(this),n=s.closest(".nice-select");n.find(".selected").removeClass("selected"),s.addClass("selected");var i=s.data("display")||s.text();n.find(".current").text(i),n.prev("select").val(s.data("value")).trigger("change")}),e(document).on("keydown.nice_select",".nice-select",function(t){var s=e(this),n=e(s.find(".focus")||s.find(".list .option.selected"));if(32==t.keyCode||13==t.keyCode)return s.hasClass("open")?n.trigger("click"):s.trigger("click"),!1;if(40==t.keyCode){if(s.hasClass("open")){var i=n.nextAll(".option:not(.disabled)").first();i.length>0&&(s.find(".focus").removeClass("focus"),i.addClass("focus"))}else s.trigger("click");return!1}if(38==t.keyCode){if(s.hasClass("open")){var l=n.prevAll(".option:not(.disabled)").first();l.length>0&&(s.find(".focus").removeClass("focus"),l.addClass("focus"))}else s.trigger("click");return!1}if(27==t.keyCode)s.hasClass("open")&&s.trigger("click");else if(9==t.keyCode&&s.hasClass("open"))return!1});var n=document.createElement("a").style;return n.cssText="pointer-events:auto","auto"!==n.pointerEvents&&e("html").addClass("no-csspointerevents"),this}}(jQuery);
  
        $(document).ready(function() {
          $('.select').niceSelect();
        });

    </script>
  </body>
</html>