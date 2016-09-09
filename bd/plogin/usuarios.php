<!DOCTYPE html>
<!-- REGRAS PARA ID'S
        - 1º Sempre começar com letras minúsculas;
        - 2º Não são permitidos espaços nem acentos;
        - 3º A primeira letra de cada palavra é maiúscula, só a primeira letra, independentemente de ser uma sigla ou não.
-->
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Usuários </title>
    <link rel="shortcut icon" href="../../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../../bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap.css">
    <script src="../../js/jquery-3.1.0.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/index.js"></script>

</head>

<body>
<div id="content">
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../ext/logo_transp_branco.png" width="100"> </div> </nav>
        <br/>
        <div class="result-custom pC9 crPreta" id="pnResposta">
            <div id="pnImprime">
                <table class='table table-striped pC9 crPreta'>
                    <thead class='thead-inverse'> <tr> <th class='col-md-3'>ID</th> <th class='col-md-3'>Nome do avaliado</th> <th class='col-md-3'>Cadastrado por</th> <th class='col-md-3'>Data</th> </tr> </thead> <tbody>
                    <tr onclick="alert('teste')" style="cursor: hand"> <th class='col-md-3' scope='row'>[id]</th> <td class='col-md-3'>[nome]</td> <td class='col-md-3'>[usuario]</td> <td class='col-md-3'>[data]</td> </tr>
                    <tr onclick="alert('teste2')" style="cursor: hand"> <th class='col-md-3' scope='row'>[id]</th> <td class='col-md-3'>[nome]</td> <td class='col-md-3'>[usuario]</td> <td class='col-md-3'>[data]</td> </tr>
                    </tbody> </table>

            </div>
        </div>
    </div> <br/>

</div>
</body>
</html>