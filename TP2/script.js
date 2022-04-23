let str_concat = '';
function concat_replace() {

    let str_ini = document.getElementById("str_ini");
    let str_fin = document.getElementById("str_fin");
    let str_needle = document.getElementById("str_needle");
    let str_to = document.getElementById("str_to");

    console.log([str_ini.value, str_fin.value, str_needle.value, str_to.value]);
    str_concat = concat(str_ini.value, str_fin.value);
    console.log(str_concat);
    if (str_needle && str_to) {
        for( var i = 0; i < str_concat.length;i++){
            str_concat= str_concat.replace(str_needle.value,str_to.value);
            console.log(str_concat);
        }
    }
    document.getElementById("resultado").value = str_concat;
}

let concat = (a, b) => a + b;
//let delimiter = (a, b) => a.split(b)

function agregar() {

    let valor = document.getElementById("valor");
    let delimitador = document.getElementById("delimitador");
    let aux;
    aux = concat(valor.value, delimitador.value);

    str_concat = concat(str_concat, aux);
    console.log(str_concat);
    document.getElementById("valor").value = '';
}

function finalizar(){

    let delimitador = document.getElementById("delimitador");
    let listaDePalabras;
    listaDePalabras = str_concat.split(delimitador.value);
    listaDePalabras.splice((listaDePalabras.length-1),1);
    console.log(listaDePalabras);

    let stringLista;

    stringLista = "<ul>";
    for(let a=0; a<listaDePalabras.length; a++){
        stringLista = stringLista + "<li>" + listaDePalabras[a] + "</li>";
    }
    stringLista = stringLista + "</ul>";
    listaHTML = document.getElementById("lista")
    listaHTML.innerHTML = stringLista; 

}

function valid_user(str_nom){
    let reglas = /[a-zA-Z]{6,}[0-9]{2,}$/

    if(reglas.test(str_nom.value)){
        resultado = document.getElementById("resultado")
        resultado.innerHTML = '<span style="color:green">Nombre de Usuario Valido</span>'
        console.log("true")
    }else{
        resultado = document.getElementById("resultado")
        resultado.innerHTML = '<span style="color:red">Nombre de Usuario NO Valido</span>'
        console.log("false")
    }

}