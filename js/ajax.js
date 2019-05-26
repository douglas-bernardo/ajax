function IniciaAjax() {
    var ajax;
    if (window.XMLHttpRequest) {
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
    return ajax;
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