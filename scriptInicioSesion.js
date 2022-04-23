function Usuario(email, contrasenia){
    this.email = email.value;
    this.contrasenia = contrasenia.value;
    this.alertaMensaje = alert('e-mail: ' + this.email + '   | contraseña: ' + this.contrasenia);
}

function mostrar_Mensaje(email, contrasenia){
    let usuario = new Usuario(email,contrasenia);
    usuario.alertaMensaje
}