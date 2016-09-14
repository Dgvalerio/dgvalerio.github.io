<?php header("Content-Type: text/html; charset=UTF-8",true); $estado = 0;
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Criação do Banco de Dados */ $sql = 'create database if not exists `cafe_login` default character set utf8 collate utf8_general_ci;'; if (mysqli_query($link, $sql)) { echo ""; } else { echo 'Erro criando o banco de dados: ' . mysqli_connect_error() . "\n"; }
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Criação da Tabela */ $sql = 'create table if not exists cafe_users ( id int not null auto_increment, usuario varchar(30), nome varchar(40), senha varchar(30), primary key(id) ) default charset = utf8;'; if (mysqli_query($link, $sql)) { echo "\n"; } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }
$result = mysqli_query($link, "select * from cafe_users where usuario = 'Mestre';"); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == 'Mestre') {$estado = 1; } else { } }
if ($estado == 0) { $sql = "insert into cafe_users (usuario, nome, senha) values ('Mestre', 'Super Mestre', 'mister_carter2121');"; if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; } }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> C.A.F.E.: Login </title>
    <link rel="shortcut icon" href="ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>

    <script>
        $(function () {
            $('#log').collapse('show');

            $('#log').click(function () {
                $('#pnBd01').collapse('show');
                $('#log').collapse('hide');
            });

            $('#ini').click(function () { location.href='_/CAFE.PHP'; });
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
<body class="plBG7">
<div id="content">
    <nav class="navbar-y"> <div class="plBG5 navbar-y"><br/> <br/> <br/> <br/> <br/> </div> </nav>
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="./ext/logo_transp_branco.png" width="100"> </div> </nav>

        <div id="" class="">
        <form class="form-custom plB8" method="post" action="log.php">
        <div id="pnFormulario" class="">

<div id="pnBd00">
<br/>

<div class="pnBtnLog">
    <div class="collapse" id="pnBd01">
        <label class="labPer" for="pUser">Login</label> <br/>
        <input name="pUser" id="pUser" type="text" placeholder="Digite seu nome de usuário" class="form-control" title="Nome"/> <br/>

        <label class="labPer" for="pPass">Senha</label> <br/>
        <input name="pPass" id="pPass" type="password" placeholder="Digite sua senha" class="form-control">
        <br/>
    </div>

    <button id="log" class="btn btn-primary btn-block btn-lg btnLog collapse" type="button">Login</button>
    <div class="collapse" id="btnDiv">
        <button id="enter" class="btn btn-primary btn-block btn-lg btnLog" type="submit">Entre / Cadastre-se</button>
    </div>
</div> <br/>

<button id="ini" class="btn btn-primary btn-block btn-lg" type="button"> Iniciar aplicação sem fazer login </button>
</div> <br/> </div> </form> <br/> </div> </div> <br/> </div> </body> </html>