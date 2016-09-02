<!DOCTYPE html>
<!-- REGRAS PARA ID'S
        - 1º Sempre começar com letras minúsculas;
         - 2º Não são permitidos espaços nem acentos;
          - 3º A primeira letra de cada palavra é maiúscula, só a primeira letra, independentemente de ser uma sigla ou não.
-->
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> ---- </title>
    <link rel="shortcut icon" href="../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>

    <script>
        $(function () {
            $('#log').collapse('show');

            $('#log').click(function () {
                $('#pnBd01').collapse('show');
                $('#log').collapse('hide');
            });

            $('#ini').click(function () { location.href='../index.html'; });
        });

        setTimeout(function(){(setInterval('formLog()',200))},3000);

        function formLog() {
            if ($('#pUser').val() == "" ) {

                $("#pPass").prop("disabled", true);

            } else if ($('#pUser').val() != "" ) {

                $("#pPass").prop("disabled", false);

                if ($("#pPass").val() != "") {

                    $('#btnDiv').collapse('show');

                }
            }
        }
    </script>
</head>
<body class="plBG7"> <!--ext/anim.gif  style="display: none" location.href='index.php'; -->
<!-- <div id="preloader" style="display:block; position: absolute; left: 0; right: 0; bottom: 0; top: 0; background: #1b272e; z-index: 9999;">
    <img id="gif" src="../ext/anim.gif" style="width:640px; height:360px; position:absolute; top:50%; left:50%; margin-top:-180px; margin-left:-320px;">
</div> -->
<div id="content">
    <nav class="navbar-y"> <div class="plBG5 navbar-y"><br/> <br/> <br/> <br/> <br/> </div> </nav>
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="./ext/logo_transp_branco.png" width="44"> </div> </nav>

        <div id="" class="">

<?php header("Content-Type: text/html; charset=UTF-8",true); $log = 0;

/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

    $vnome	= $_POST ["pUser"];
    $vsenha = $_POST ["pPass"];

            $result = mysqli_query($link, "select * from cafe_users"); if (!$result) { die('Invalid query: ' . mysqli_connect_error()); }

            while ($confere = mysqli_fetch_assoc($result) ) {
                if ($confere['nome'] == $vnome) {
                    if ($confere['senha'] == $vsenha) {
                        $log = 1;
                    }
                } else {
                    print(" <script> location.href='cad.php'; </script> ");
                }

            }

            if ($log == 1) { print(" <h1 class='tit'> Uhuuuuuuuuuuuuuuuuu!!! </h1>
                             <h1 class='tit'> Login feito com sucesso! </h1> "); }
            else { print("<h1 class='tit'> Buaaaaaaaaaaaaaaaaaaaa!!! </h1>
                  <h1 class='tit'> Erro no login! </h1>"); }

            ?>

<br/> </div> </div> <br/> </div> </body> </html>