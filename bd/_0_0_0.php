<?php header("Content-Type: text/html; charset=UTF-8",true);

/* Conexão */
$link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Criação do Banco de Dados */
$sql = 'create database if not exists `cafe_login` default character set utf8 collate utf8_general_ci;'; if (mysqli_query($link, $sql)) { echo ""; } else { echo 'Erro criando o banco de dados: ' . mysqli_connect_error() . "\n"; }
/* Uso do Banco de Dados */
$db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Criação da Tabela */
$sql = 'create table if not exists cafe_users ( id int not null auto_increment, nome varchar(30), senha varchar(30), primary key(id)) default charset = utf8;'; if (mysqli_query($link, $sql)) { echo "\n"; } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }

$_POST ["pUser"] = isset ($_POST ["pUser"])? $_POST ["pUser"]:'';
$_POST ["pPass"] = isset ($_POST ["pPass"])? $_POST ["pPass"]:'';
$_POST ["pHipPass"] = isset ($_POST ["pHipPass"])? $_POST ["pHipPass"]:'';
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome	= $_POST ["pUser"];	//atribuição do campo "nome" vindo do formulário para variavel
$senha	= $_POST ["pPass"];	//atribuição do campo "senha" vindo do formulário para variavel
$mestre	= $_POST ["pHipPass"];	//atribuição do campo "senha" vindo do formulário para variavel
//Gravando no banco de dados !

if ( $nome != '') { $sql = "insert into cafe_users (nome, senha) values ('$nome', '$senha');"; if (mysqli_query($link, $sql)) { echo "<script type='text/javascript'> alert('Cadastro bem sucedido!'); </script> "; } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; } }
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
    <title> C.A.F.E. </title>
    <link rel="shortcut icon" href="../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../bootstrap.css">
    <LINK rel="stylesheet" type="text/css" href="../bootstrap.css">
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>


    <script>
        $(function () {
            $("#pPass").prop("disabled", true);
            $('#pn00').collapse('show');
            $('#pn01').collapse('show');

            $('#cad').click(function () {
                $('#pn00').collapse('hide');
                $('#pn01').collapse('hide');
                $('#pn02').collapse('show');
            });

            $('#vol').click(function () {
                $('#pn02').collapse('hide');
                $('#pn01').collapse('show');
                $('#pn00').collapse('show');
            });
        });

        setTimeout(function(){(setInterval('formLog()',200))},3000);

        function formLog() { if ($('#pUser').val() == "" ) { $("#pPass").prop("disabled", true); } else if ($('#pUser').val() != "" ) { $("#pPass").prop("disabled", false); if ($("#pPass").val() != "") { $('#btnDiv').collapse('show'); } } }
    </script>
</head>
<body class="plBG7"> <!--ext/anim.gif  style="display: none" location.href='index.php'; -->
<!-- <div id="preloader" style="display:block; position: absolute; left: 0; right: 0; bottom: 0; top: 0; background: #1b272e; z-index: 9999;">
    <img id="gif" src="../ext/anim.gif" style="width:640px; height:360px; position:absolute; top:50%; left:50%; margin-top:-180px; margin-left:-320px;">
</div> -->
<div id="content">
    <nav class="navbar-y"> <div class="plBG5 navbar-y"><br/> <br/> <br/> <br/> <br/> </div> </nav>
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../ext/logo_transp_branco.png" width="100"> </div> </nav>

        <div id="" class="">
            <form class="form-custom plBG9" method="post" action="index.php">
                <div id="pnFormulario" class="collapse">

                    <div class="collapse" id="pn01">
                        <label class="labPer" for="pUser">Nome de Usuário</label> <br/>
                        <input name="pUser" id="pUser" type="text" placeholder="Digite seu nome de usuário" class="form-control" title="Nome"/> <br/>

                        <label class="labPer" for="pPass">Senha</label> <br/>
                        <input name="pPass" id="pPass" type="password" placeholder="Digite sua senha" class="form-control">
                        <br/>
                    </div>

                    <div class="collapse" id="pn02">
                        <label class="labPer" for="pPass">Senha mestre (para efetuar o cadastro)</label> <br/>
                        <input id="pHipPass" name="pHipPass" type="password" placeholder="Digite sua senha" class="form-control">
                        <br/>
                        <button id="vol" class="btn btn-danger col-md-5 btn-lg" type="button">Voltar</button>
                        <button id="con" class="btn btn-success col-md-5 btn-lg f-right" type="submit">Confirmar</button><br/><br/>
                    </div>

                    <div class="collapse"  id="pn00">
                        <br/>
                        <div class="collapse" id="btnDiv">
                            <button id="cad" class="btn btn-primary col-md-5 btn-lg btnLog" type="button">Cadastrar</button>
                            <button id="ent" class="btn btn-primary col-md-5 btn-lg btnLog f-right" type="button">Entrar</button>
                        </div>
                        <br/>
                        <button id="ini" class="btn btn-primary btn-block btn-lg m-x-0" type="button" onclick="location.href='../index.html';">Iniciar aplicação sem fazer login</button>
                    </div>
                    <br/>
                </div>
            </form>
            <br/>
        </div>

    </div> <br/>

</div>
</body>
</html>