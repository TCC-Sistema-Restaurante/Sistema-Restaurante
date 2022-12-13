function checkboxStatus(element) {
  checkbox = element
  texto = checkbox.nextElementSibling.firstChild
  
  if(checkbox.value == "ocupada"){
    texto.textContent = "vazia"
    checkbox.value = "vazia"
    texto.style = " margin-left: 50px;"

  }
  else{
    checkbox.value = "ocupada"
    texto.textContent = "ocupada"
    texto.style = "margin-left: 8px; "

  }
}

function checkboxDisponibilidade(element) {
  checkbox = element
  texto = checkbox.nextElementSibling.firstChild
  
  if(checkbox.value == "inativa"){
    texto.textContent = "ativa"
    checkbox.value = "ativa"
    texto.style = " margin-left: 50px;"

  }
  else{
    checkbox.value = "inativa"
    texto.textContent = "inativa"
    texto.style = "margin-left: 8px; "

  }
}

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
function editar(elemento){
  divPai = elemento.parentNode.parentNode
  checkbox = divPai.children[0]
  checkbox_disp = divPai.children[1]
  mesa = divPai.children[2]
  cadeira = divPai.children[3]
  editarBtn = divPai.children[4]
  
  // divPai.removeChild(mesa)

  numMesa = mesa.textContent
  numCadeiras = cadeira.textContent.split("")

  // var mesaInput = document.createElement('input');
  mesa.innerHTML = '<div class="d-flex justify-content-center"> <input value="' + numMesa + '" type="number" id="inputMesa" min="1" name="mesas" class="form-control inputTest" required></div>';
  cadeira.innerHTML = '<div class="d-flex justify-content-center"> <input value="' + numCadeiras[0] + '" type="number" id="inputCadeira" min="1" name="cadeiras" class="form-control inputTest" required></div>';
  editarBtn.innerHTML = ' <button type="button" onclick="atualizarTable(this)" class="tableBtn tableBtnConfirmar"> <i class="bx bx-check"></i> </button>'

}

function atualizarTable(elemento){
  divPai = elemento.parentNode.parentNode
  checkbox = divPai.children[0].children[0].children[0]
  checkbox_disp = divPai.children[1]
  mesa = divPai.children[2]
  cadeira = divPai.children[3]
  editarBtn = divPai.children[4]

  numMesa = document.querySelector("#inputMesa").value;
  numMesatamanho = numMesa.lenght
  numCadeiras = document.querySelector("#inputCadeira").value

  checkbox.setAttribute("disabled", "disabled")
  if (numCadeiras == 1){
    cadeira.innerHTML = numCadeiras + ' cadeira'
  }else{
    cadeira.innerHTML =  numCadeiras + ' cadeiras'
  }

  mesa.innerHTML = numMesa

  console.log(checkbox)

  editarBtn.innerHTML = '<button type="button" onclick="editar(this)" class="tableBtn tableBtnEditar"><i class="bx bx-edit-alt"></i> </button>'

}