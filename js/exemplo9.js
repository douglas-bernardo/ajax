
window.onload = function () {
    var estado = document.getElementById("estado");
    if (estado != null) {
        estado.onchange = function () {
            exibeFrete(estado);
        }
    }
}

function exibeFrete(estado) {
    if (estado == null) {return;}
        var selecionado = estado.options[estado.selectedIndex].value;
        var url = "servidor/exemplo9.php?estado="+encodeURIComponent(selecionado);
        requisicaoHTTP("GET", url, true);
    
}

function trataDados() {
    var info = ajax.responseText;
    var resposta = document.getElementById("frete");
    resposta.innerHTML = info;
}