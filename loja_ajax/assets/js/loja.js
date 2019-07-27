//carrega a pagina inicial da loja
window.onload = function(){
    Loja('inicio',0);
}

//envia a requisiçao ao servidor, de acordo com a ação do usuário
function Loja(secao, parametro){
    Aviso(1);//exibe o aviso aguarde...
    var url = "php/loja.php?" + secao + "=" + encodeURIComponent(parametro);
    requisicaoHTTP("GET", url, true);
}

//envia a nova quantidade de produto para atualização no carrinho de compras
function AtualizaQuantidade(campo){
    var id = campo.nome;
    var quant = campo.value;
    Loja('quantidade', id+'-'+quant);
}

//exibe ou oculta a mensagem de espera
function Aviso(exibir){
    var saida = document.getElementById("avisos");
    if (exibir) {
        saida.className = "aviso";
        saida.InnerHTML = "Aguarde... processando!";
    } else {
        saida.className = "";
        saida.InnerHTML = "";
    }
}

//exibe a resposta do servidor
function trataDados() {
    var info = ajax.responseText;
    var saida = document.getElementById("conteudo");
    saida.innerHTML = info;
    Aviso(0); 
}