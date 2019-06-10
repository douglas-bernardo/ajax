//função responsável por iniciar o objeto XMLHttpRequest
function IniciaAjax() {
    var ajax;
    if (window.XMLHttpRequest) {//verifica se o navegador possui suporte nativo ao obj XMLHttpRequest
        ajax = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        ajax = new ActiveXObject("Msxml2.XMLHTTP");
        if (!ajax) {
            ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    else{
        alert("Seu navegador não possui suporte a essa aplicação!");
    }
    return ajax; //retorna o obj ao programa principal
}


function Processa() {
    ajax = IniciaAjax();
    if (ajax) {
        //trata a resposta do servidor:
        ajax.onreadystatechange = function () {
            if(ajax.readyState == 4){
                if(ajax.status == 200) {
                    document.getElementById("resultado").value = ajax.responseText;
                } else {
                    alert(ajax.statusText);
                }
            }
        }
        //captura os dados do formulário
        nome = document.getElementById("nome").value;
        valor = document.getElementById("valor").value;
        //utilizando os dados do formulário, monta a QueryString para envio no método send 
        //Ex: nome=valor&outronome=outrovalor&cidade=vaisumvalor
        dados = 'nome='+nome+"&valor="+valor;

        //faz a requisição e envio pelo método POST ao servidor (os dados serão recebidos no PHP)
        ajax.open('POST', 'servidor/processa.php', true);
        //altera o tipo MIME da requisição, necessário quando utilizar o método POST
        ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        ajax.send(dados);
    }
}