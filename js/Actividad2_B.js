function traerDatos(){
    lista = document.getElementById("listaNueva");
    let lineaLista = ''
    let valor = $("#tabla_usuarios").find(".row_usuarios").each(function(a, b){
        for (let contenidoCelda of b.children) {
            console.log(contenidoCelda.textContent);
            lineaLista += "<li>" + contenidoCelda.textContent + "</li>";
        }
        lista.innerHTML = lineaLista;
    })
}