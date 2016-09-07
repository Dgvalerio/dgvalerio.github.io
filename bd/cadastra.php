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
</head>
<body class="plBG7">
<div id="content">
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="./ext/logo_transp_branco.png" width="44"> </div> </nav>

        <div id="" class="">

<?php header("Content-Type: text/html; charset=UTF-8",true); $log = 0;

/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Criação do Banco de Dados */ $sql = 'create database if not exists `cafe_login` default character set utf8 collate utf8_general_ci;'; if (mysqli_query($link, $sql)) { echo ""; } else { echo 'Erro criando o banco de dados: ' . mysqli_connect_error() . "\n"; }
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Criação da Tabela */
$sql = 'create table if not exists cafe_users (id int not null auto_increment, usuario varchar(30), nome varchar(40), senha varchar(30), primary key(id)) default charset = utf8;'; if (mysqli_query($link, $sql)) { echo "\n"; } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }

$_POST ["pNome"] = isset ($_POST ["pNome"])? $_POST ["pNome"]:'';
$_POST ["pUser"] = isset ($_POST ["pUser"])? $_POST ["pUser"]:'';
$_POST ["pPass"] = isset ($_POST ["pPass"])? $_POST ["pPass"]:'';

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome	= $_POST ["pNome"];	//atribuição do campo "nome" vindo do formulário para variavel
$usuario	= $_POST ["pUser"];	//atribuição do campo "usuario" vindo do formulário para variavel
$senha	= $_POST ["pPass"];	//atribuição do campo "senha" vindo do formulário para variavel

//Gravando no banco de dados !
if ( $nome != '') { $sql = "insert into cafe_users (usuario, nome, senha) values ('$usuario', '$nome', '$senha');";
    if (mysqli_query($link, $sql)) { echo " <script type='text/javascript'> alert('Cadastro bem sucedido!'); </script>
    
    <script> location.href='index.php'; </script>

    "; } else {echo " <script type='text/javascript'> alert('Cadastro mal sucedido!'); </script> 
    
    <form class='form-custom plBG9' method='post' action='cadastra.php'>
    
        <br/><h1>Cadastro mal sucedido!</h1><br/>
    
        <button id='enter' class='btn btn-danger btn-block btn-lg' type='button'>Voltar</button> <br/>
    
    </form>
    
    "; echo 'Erro: ' . mysqli_connect_error() . "\n";
    }
}
?>

<br/> </div> </div> <br/> </div> </body> </html>