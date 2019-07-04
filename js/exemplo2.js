function trataDados() {
    var documentoXML = ajax.responseXML; //obtem resposta como XML
    var raiz = documentoXML.getElementsByTagName('raiz').item(0);
    var info = raiz.firstChild.data;
    document.getElementById("campoResposta").style.backgroundColor="yellow";
    document.getElementById("campoResposta").innerHTML = info;
}