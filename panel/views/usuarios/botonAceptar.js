
var nombreInput = document.querySelector (".usuario");
var passwordInput = document.querySelector (".password");
var botonAceptar = document.querySelector(".aceptar");

botonAceptar.addEventListener ("click", function() {
    var valorNombre = nombreInput.value;
    var valorPassword = passwordInput.value;
    if (valorNombre == "" ) {
        alert ("Nombre es invalido");
        return false;
    }
    if (valorPassword == "" ) {
        alert ("Password es invalido");
        return false;
    }
 
 })
 



















