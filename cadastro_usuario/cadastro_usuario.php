<?php
    include "../_scripts/functions.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="cadastro_usuario.css" type="text/css" rel="stylesheet">
    <link href="nav.css" type="text/css" rel="stylesheet" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.34/sweetalert2.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
    <?php
    include "../nav_bar/nav.php";
?>


    <form method="POST" class="formulario">
        <div class="mb-4"><h1>Cadastrar usuário</h1></div>
        
        <div class="row">
            <div class="mb-3 col-md-12">
                <div class="form-floating">
                    <input required type="text" class="form form-control" id="nome" name="nome" placeholder="Nome">
                    <label class="formLabel" for="nome">Nome</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <div class="form-floating">
                    <input required type="text" class=" form form-control" id="usuario" name="usuario" placeholder="Usuário">
                    <label class="formLabel" for="nome">Usuário</label>
                </div>                
            </div>
            <div class="mb-3 col-md-6">
                <div class="form-floating">
                    <input required type="password" class=" form form-control" id="senha" name="senha" placeholder="Senha">
                    <label class="formLabel" for="password">Senha</label>
                </div>                
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <div class="form-floating">
                    <input type="text" class="form form-control" name="cpf" id="cpf" placeholder="CPF" required>
                    <label class="formLabel" for="cpf">CPF</label>
                </div>
            </div>
            <div class="mb-4 col-md-6">
                <select name="cargo" class="select wide" aria-label="" required>
                    <option selected disabled>Função</option>
                    <option value="Garçom">Garçom</option>
                    <option value="Cozinheiro">Cozinheiro</option>
                    <option value="Gerente">Gerente</option>
                  </select>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button class="btnCadastro confirmar" type="submit">Cadastrar</button>
            <button class="btnCadastro cancelar" type="button" id="cancelar">Cancelar</button>
        </div>
    </form>

    <script src="../_js/mascara.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        !function(e){e.fn.niceSelect=function(t){function s(t){t.after(e("<div></div>").addClass("nice-select").addClass(t.attr("class")||"").addClass(t.attr("disabled")?"disabled":"").attr("tabindex",t.attr("disabled")?null:"0").html('<span class="current"></span><ul class="list"></ul>'));var s=t.next(),n=t.find("option"),i=t.find("option:selected");s.find(".current").html(i.data("display")||i.text()),n.each(function(t){var n=e(this),i=n.data("display");s.find("ul").append(e("<li></li>").attr("data-value",n.val()).attr("data-display",i||null).addClass("option"+(n.is(":selected")?" selected":"")+(n.is(":disabled")?" disabled":"")).html(n.text()))})}if("string"==typeof t)return"update"==t?this.each(function(){var t=e(this),n=e(this).next(".nice-select"),i=n.hasClass("open");n.length&&(n.remove(),s(t),i&&t.next().trigger("click"))}):"destroy"==t?(this.each(function(){var t=e(this),s=e(this).next(".nice-select");s.length&&(s.remove(),t.css("display",""))}),0==e(".nice-select").length&&e(document).off(".nice_select")):console.log('Method "'+t+'" does not exist.'),this;this.hide(),this.each(function(){var t=e(this);t.next().hasClass("nice-select")||s(t)}),e(document).off(".nice_select"),e(document).on("click.nice_select",".nice-select",function(t){var s=e(this);e(".nice-select").not(s).removeClass("open"),s.toggleClass("open"),s.hasClass("open")?(s.find(".option"),s.find(".focus").removeClass("focus"),s.find(".selected").addClass("focus")):s.focus()}),e(document).on("click.nice_select",function(t){0===e(t.target).closest(".nice-select").length&&e(".nice-select").removeClass("open").find(".option")}),e(document).on("click.nice_select",".nice-select .option:not(.disabled)",function(t){var s=e(this),n=s.closest(".nice-select");n.find(".selected").removeClass("selected"),s.addClass("selected");var i=s.data("display")||s.text();n.find(".current").text(i),n.prev("select").val(s.data("value")).trigger("change")}),e(document).on("keydown.nice_select",".nice-select",function(t){var s=e(this),n=e(s.find(".focus")||s.find(".list .option.selected"));if(32==t.keyCode||13==t.keyCode)return s.hasClass("open")?n.trigger("click"):s.trigger("click"),!1;if(40==t.keyCode){if(s.hasClass("open")){var i=n.nextAll(".option:not(.disabled)").first();i.length>0&&(s.find(".focus").removeClass("focus"),i.addClass("focus"))}else s.trigger("click");return!1}if(38==t.keyCode){if(s.hasClass("open")){var l=n.prevAll(".option:not(.disabled)").first();l.length>0&&(s.find(".focus").removeClass("focus"),l.addClass("focus"))}else s.trigger("click");return!1}if(27==t.keyCode)s.hasClass("open")&&s.trigger("click");else if(9==t.keyCode&&s.hasClass("open"))return!1});var n=document.createElement("a").style;return n.cssText="pointer-events:auto","auto"!==n.pointerEvents&&e("html").addClass("no-csspointerevents"),this}}(jQuery);
    
        $(document).ready(function() {
          $('.select').niceSelect();
        });

    </script>
    
</body>
</html>

<?php

if (!empty($_POST['nome']) || !empty($_POST['cpf'])) {

    if (cadastrarUsuario($_POST)) { ?>        

        <script language='javascript'>
            swal.fire({ 
                icon:"success",
                text: "Feito com Sucesso!",
                type: "success"}).then(okay => {
                    // if (okay) {
                    //     window.location.href = "painel.php?r=";
                    // }
                });
            </script>
            <?php }else { ?>
        <script language='javascript'>
            swal.fire({ 
                icon:"error",
                text: "Ops! Ouve um erro.",
                type: "success"}).then(okay => {
                    // if (okay) {
                    //     window.location.href = "painel.php?r=";
                    // }
                });
            </script>
            <?php }

    }
?>