function comprobrarEmail(){
    email =document.getElementById("example").value
    $.ajax({
        // En data puedes utilizar un objeto JSON, un array o un query string
        data: email,
        //Cambiar a type: POST si necesario
        type: "POST",
        // URL a la que se enviará la solicitud Ajax
        url: "login/verificaremail",
        success: function(datos){
            console.log(datos)
            var json = JSON.parse(datos)
            console.log(json.mensaje);
        }
    })
}