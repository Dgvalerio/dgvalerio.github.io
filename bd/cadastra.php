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
    <script src="../js/jquery-3.1.0.min.js">    </script>
    <script src="../js/bootstrap.js">           </script>
    <script src="../js/bootstrap.min.js">       </script>
    <script src="../js/index.js">               </script>
</head>
<body class="plBG7"> <div id="content"> <div class="container" align="center"> <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="./ext/logo_transp_branco.png" width="44"> </div> </nav> <div>

<?php header("Content-Type: text/html; charset=UTF-8",true); $log = 0; $estado = 0; $tst_one = 0;
/* Conexão */ $p_link = $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Criação do Banco de Dados */ $sql = 'create database if not exists `cafe_login` default character set utf8 collate utf8_general_ci;'; if (mysqli_query($link, $sql)) { echo ""; } else { echo 'Erro criando o banco de dados: ' . mysqli_connect_error() . "\n"; }
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Criação da Tabela */ $sql = 'create table if not exists cafe_users (id int not null auto_increment, usuario varchar(30), nome varchar(40), senha varchar(30), primary key(id)) default charset = utf8;'; if (mysqli_query($link, $sql)) { echo "\n"; } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }

$_POST ["pNome"]    = isset ($_POST ["pNome"])?     $_POST ["pNome"]:'';
$_POST ["pUser"]    = isset ($_POST ["pUser"])?     $_POST ["pUser"]:'';
$_POST ["pPass"]    = isset ($_POST ["pPass"])?     $_POST ["pPass"]:'';
$_POST ["pMPass"]   = isset ($_POST ["pMPass"])?    $_POST ["pMPass"]:'';

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$p_nome         = $nome	        = $_POST ["pNome"];     //atribuição do campo "nome" vindo do formulário para variavel
$p_usuario      = $usuario	    = $_POST ["pUser"];     //atribuição do campo "usuario" vindo do formulário para variavel
$p_senha        = $senha	    = $_POST ["pPass"];     //atribuição do campo "senha" vindo do formulário para variavel
                $mester_senha	= $_POST ["pMPass"];    //atribuição do campo "mestre" vindo do formulário para variavel
                $pLetra = substr($usuario, 0, 1);       //pega a primeira letra letra do usuário

function cadastra ($p_usuario, $p_nome, $p_senha, $p_link) { //Gravando no banco de dados !
    $sql = "insert into cafe_users (usuario, nome, senha) values ('$p_usuario', '$p_nome', '$p_senha');";
if (mysqli_query($p_link, $sql)) { echo " 
    <form class='form-custom plBG9' method='post'>
    <br/><h1>Cadastro mal sucedido!</h1><br/>
    <button id='enter' class='btn btn-danger btn-block btn-lg' type='button' onclick='toPage(3)'/>Voltar para o cadastro</button> <br/>
    </form>
    <script type='text/javascript'> alert('Cadastro bem sucedido!'); </script>
    <script> location.href='index.php'; </script> 
"; }
}
function erro_cadastro () { echo "        
    <form class='form-custom plBG9' method='post'>
    <br/><h1>Cadastro mal sucedido!</h1><br/>
    <button id='enter' class='btn btn-danger btn-block btn-lg' type='button' onclick='toPage(3)'/>Voltar para o cadastro</button> <br/>
    </form>
"; }

$result = mysqli_query($link, "select * from cafe_users where usuario = 'Mestre';"); if (!$result) {}
while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == 'Mestre' &&  $confere['senha'] == $mester_senha ) { $tst_one = 1; } else { $tst_one = 2; } }

if ($tst_one == 1) {
    $estado = 1;
    $result = mysqli_query($link, "select * from cafe_users where usuario like '$pLetra%';"); if (!$result) {}
    while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == $usuario)  { $estado = 2; } else { $estado = 1; } }
} elseif ($tst_one == 2) {
    $estado = 2;
}

if ($estado == 1) { cadastra($usuario, $nome, $senha, $link); } elseif ($estado == 2) { erro_cadastro(); }
?>

<br/> </div> </div> <br/> </div> </body> </html>