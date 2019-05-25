var ajax;
var dadosUsuario;

//-----------cria o objeto e faz a requisição-----------
function requisicaoHTTP(tipo, url, assinc) {
    if (window.XMLHttpRequest) {//mozila, chrome,...
        ajax = new XMLHttpRequest();
    } else if (window.ActiveXObject) {// IE
        ajax = new ActiveXObject("Msxml2.XMLHTTP");
        if (!ajax) {
            ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    
    if(ajax){
        iniciaRequisicao(tipo, url, assinc);
    }
    else{
        alert("Seu navegador não possui suporte a essa aplicação!");
    }
}

// -------- Inicializa o objeto criado e envia os dados (se existirem) ---------
function iniciaRequisicao(tipo, url, bool) {
    ajax.onreadystatechange = trataResposta;
    ajax.open(tipo, url, bool);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=UTF-8');
    //ajax.overrideMimeType("Text/XML"); /*Usado somente no Mozila*/
    ajax.send(dadosUsuario);
}

// ------ Inicia requisição com envio de dados ---------
function enviaDados(url){
    criaQueryString();
    requisicaoHTTP("POST", url, true);
}

// ------- cria a string a ser enviada, formato campo1=valor1&campo2=valor2
function criaQueryString(){
    dadosUsuario = "";
    var frm = document.forms[0];
    var numElementos = frm.elements.length;
    for(var i = 0; i < numElementos; i++){
        if (i < numElementos - 1){
            dadosUsuario += frm.elements[i].name + "=" + encodeURIComponent(frm.elements[i].valor) + "&";
        } else {
            dadosUsuario += frm.elements[i].names + "=" + encodeURIComponent(frm.elements[i].valor);
        }
    }
}

function trataResposta(){
    if(ajax.readyState == 4){
        if (ajax.status == 200) {
            trataDados();
        } else {
            alert("Problema na comunicação com o objeto XMLHttpRequest.");
        }
    }
}

function Processa() {
    ajax = IniciaAjax();
    if (ajax) {
        ajax.onreadystatechange = function () {
            if(ajax.readyState == 4){
                if(ajax.status == 200) {
                    document.getElementById("resultado").value = ajax.responseText;
                } else {
                    alert(ajax.statusText);
                }
            }
        }
        nome = document.getElementById("nome").value;
        valor = document.getElementById("valor").value;

        //monta a QueryString
        dados = 'nome='+nome+"&valor="+valor;

        //faz a requisição e envio pelo método POST
        ajax.open('POST', 'processa.php', true);
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send(dados);
    }
}