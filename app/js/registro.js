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
    validar_fecha(nacimiento,mensajeError);
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
    var regex_dni = /^\d{8}-[a-zA-Z]$/;

    if (regex_dni.test(dni)){
        partes_dni = dni.split("-")
        numero = partes_dni[0]
        letra = partes_dni[1]
        numero = numero % 23;
        var comprobacion = 'TRWAGMYFPDXBNJZSQVHLCKET';
        comprobacion = comprobacion.substring(numero,numero+1);
        if (letra != comprobacion.toUpperCase()) {
            errores.push("DNI incorrecto")
        }
    }
    else{
        errores.push("Formato del DNI debe de ser el n&uacute;mero y un gui&oacute;n seguido de la letra")
    }
}
function validar_fecha(fecha,errores){
    var partes_fecha = fecha.split("-");
    if (partes_fecha.length != 3){
        errores.push("La fecha tiene que seguir el formato 'dd/mm/aaaa'");
    }
    else{
        var dia = partes_fecha[0];
        var mes = partes_fecha[1];
        var anio = partes_fecha[2];
        var comprobar_dia_mes = /^\d{2}$/;
        var comprobar_anio = /^\d{4}$/;
        if(!comprobar_dia_mes.test(dia) || !comprobar_dia_mes.test(mes) || !comprobar_anio.test(anio)){
            errores.push("La fecha tiene que seguir el formato 'dd/mm/aaaa");
        }
    }
}