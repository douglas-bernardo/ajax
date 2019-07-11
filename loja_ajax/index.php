<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="loja_ajax/assets/css/estilos.css">
    <title>Web interativa com Ajax e PHP</title>
</head>
<body>

    <h2 align="center"><img src="assets/img/figuras/loja.gif" width="278" height="80"></h2>

    <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr align="top">
            <td colspan="3">
                <div align="right">
                    <p>
                        <span id="avisos"></span>
                        <img src="assets/img/figuras/home.gif" width="16" height="16" align="absmiddle">
                        <a href="javascript:Loja('inicio', 0);">Home</a>
                        <img src="assets/img/figuras/carrinho.gif" width="30" height="21" align="absmiddle">
                        <a href="javascript:Loja('carrinho', 0);">Meu Carrinho</a>                        
                    </p>
                </div>
            </td>
        </tr>

        <tr align="top">
            <td width="150" class="fundocinza">
                <p class="titulo">
                    Categorias
                </p>
                <p>
                    <?php include "mostraMenu.php";?>
                </p>
            </td>
            <td width="20"></td>
            <td width="630" class="fundoLaranja">
                <div id="conteudo">
                    
                </div>
            </td>
        </tr>

    </table>


    <p align="center" class="rodape">
        Copyright &copy; Loja Virtual Tabajara - Todos os direitos reservados.
    </p>
    <p align="center">
        &nbsp;
    </p>

    <script type="text/javascript" src="assets/js/bibliotecaAjax.js"></script>
    <script type="text/javascript" src="assets/js/exemplo9.js"></script>
</body>
</html>