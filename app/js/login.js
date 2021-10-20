function comprobar_datos(){
    var email = document.login.email.value;
    var password = document.login.password.value;
    console.log("Enviando formulario...");
    validar_email(email);
    if (password === null || password === ''){
        alert('Introduzca su contrase\361a');
    }
}
function validar_email(email){
    var regex_email = /\S+@\S+\.\S+/;
    if (!regex_email.test(email)){
        alert("Formato del email incorrecto");
    }
}