function comprobar_datos(){
    var nombre = document.registrarse.nombre.value;
    var apellidos = document.registrarse.apellidos.value;
    var email = document.registrarse.email.value;
    var dni = document.registrarse.dni.value;
    var telefono = document.registrarse.telefono.value;
    var nacimiento = document.registrarse.nacimiento.value;
    var password = document.registrarse.password.value;
    var error = document.getElementById("error");
    var regex_nombre = /^[A-Za-z\s]+$/;
    console.log("Enviando formulario...");

    var mensajeError = [];

    if (nombre === null || nombre === ''){
        mensajeError.push("Introduzca su nombre");
    }
    else if (!regex_nombre.test(nombre)){
        mensajeError.push("Solo se pueden introducir letras")
    }
    if (apellidos === null || apellidos === ''){
        mensajeError.push("Introduzca sus apellidos");
    }
    else if (!regex_nombre.test(apellidos)){
        mensajeError.push("Solo se pueden introducir letras")
    }
    validar_email(email,mensajeError);
    validar_dni(dni,mensajeError);
    if (telefono === null || telefono === '' || telefono.length != 9){
        mensajeError.push("Introduzca un n&uacute;mero de tel&eacute;fono de nueve d&iacute;gitos");
    }
    if (nacimiento.value === null || nacimiento.value === ''){
        mensajeError.push("Introduzca su fecha de nacimiento");
    }
    if (password === null || password === ''){
        mensajeError.push('Introduzca su contrase&ntilde;a');
    }
    error.innerHTML = mensajeError.join("<br>");
    return false;
}
function validar_email(email,errores){
    var regex_email = /\S+@\S+\.\S+/;
    if (!regex_email.test(email)){
        errores.push("Formato del email incorrecto");
    }
}
function validar_dni(dni,errores){
    var num;
    var letra;
    var regex_dni = /^\d{8}[a-zA-Z]$/;

    if (regex_dni.test(dni)){
        numero = dni.substr(0,dni.length-1);
        letra = dni.substr(dni.length-1,1);
        numero = numero % 23;
        var comprobacion = 'TRWAGMYFPDXBNJZSQVHLCKET';
        comprobacion = comprobacion.substring(numero,numero+1);
        if (letra != comprobacion.toUpperCase()) {
            errores.push("DNI incorrecto")
        }
    }
    else{
        errores.push("Formato del DNI incorrecto")
    }
}