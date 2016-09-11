<?php header("Content-Type: text/html; charset=UTF-8",true); $estado = 0;
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Criação do Banco de Dados */ $sql = 'create database if not exists `cafe_login` default character set utf8 collate utf8_general_ci;'; if (mysqli_query($link, $sql)) { echo ""; } else { echo 'Erro criando o banco de dados: ' . mysqli_connect_error() . "\n"; }
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Criação da Tabela */ $sql = ' create table if not exists cafe_users ( id int not null auto_increment, usuario varchar(30), nome varchar(40), senha varchar(30), primary key(id) ) default charset = utf8;';
if (mysqli_query($link, $sql)) { echo "\n"; } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }
$result = mysqli_query($link, "select * from cafe_users where usuario = 'Mestre';"); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == 'Mestre') {$estado = 1; } else { } }
if ($estado == 0) { $sql = "insert into cafe_users (usuario, nome, senha) values ('Mestre', 'Super Mestre', 'mister_carter2121');"; if (mysqli_query($link, $sql)) { } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; } }
?>

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
    <link rel="shortcut icon" href="../../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../../bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap.css">
    <script src="../../js/jquery-3.1.0.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/index.js"></script>
</head>
<body class="plBG7">
<div id="content">
    <nav class="navbar-y"> <div class="plBG5 navbar-y"><br/> <br/> <br/> <br/> <br/> </div> </nav>
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="./ext/logo_transp_branco.png" width="44"> </div> </nav>

        <div id="" class="">
        <form class="form-custom plB8" method="post" action="confirma.php">
        <div id="pnFormulario" class="">

<div class="" id="pnBd00">
<br/>

<button id="ini" class="btn btn-primary btn-block btn-lg" type="button"> Iniciar aplicação  </button>
<button id="ini" class="btn btn-primary btn-block btn-lg" type="button"> Acessar base de dados </button>

</div> <br/> </div> </form> <br/> </div> </div> <br/> </div> </body> </html>
