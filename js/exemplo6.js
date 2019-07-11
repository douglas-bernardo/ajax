var timeEscolhido;

function obtemInfo(time) {
    
    if (time) {
        timeEscolhido = time;
        var url = "servidor/exemplo6.php?time="+time;
        requisicaoHTTP("GET", url, true);
    }
}

function trataDados() {
    var info = ajax.responseText;
    var div = document.getElementById("saida");
    div.className = timeEscolhido;
    div.innerHTML=info;
}