function mostrarSenha(event) {
    event.preventDefault();
    var inputSenha = document.getElementById("password");
    var icon = document.getElementById("icon");
    if(inputSenha.type == "password"){
        inputSenha.type = "text";
        icon.className = "fa-regular fa-eye-slash"
    }
    else{
        inputSenha.type = "password";
        icon.className = "fa-regular fa-eye"
    }
}

