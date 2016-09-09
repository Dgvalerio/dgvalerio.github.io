<?php header("Content-Type: text/html; charset=UTF-8",true);
$vuser	= isset ($_POST ["c_vuser"])? $_POST ["c_vuser"]:'';
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
    <link rel="shortcut icon" href="../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/cad.js"></script>
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
            <form name="formcadastro" id="formcadastro" class="form-custom plB8" method="post" action="cadastra.php">
                <div id="pnFormulario" class="">

                    <div class="" id="pnBd00">
                        <br/>
                        <div class="pnBtnLog">
                            <div class="collapse" id="pnBd01">
                                <label class="labPer" for="pUser">Login</label>
                                <?php print(" <input value='$vuser' name='pUser' id='pUser' type='text' placeholder='Digite seu login' class='form-control' title='Nome'/> ");?>
                                <br/>
                                <label class="labPer" for="pNome">Nome do Usuário</label> <br/>
                                <input name="pNome" id="pNome" type="text" placeholder="Digite seu nome de usuário" class="form-control" title="Nome"/>
                                <br/>
                                <label class="labPer" for="pPass">Senha</label> <br/>
                                <input name="pPass" id="pPass" type="password" placeholder="Digite sua senha" class="form-control">
                                <br/>
                                <sup class="f-right">*A Senha deve conter <b>letras</b>, <b>números</b> e no <b>mínimo 5 caracteres</b>!</sup> <br/>
                                <label class="labPer" for="pCPass">Repita a senha</label> <br/>
                                <input name="pCPass" id="pCPass" type="password" placeholder="Repita sua senha" class="form-control">
                                <div id="pnStatus"><span id="pStatus"></span></div>
                                <div class="collapse" id="pnMaster">
                                    <br/>
                                    <label class="labPer" for="pMPass">Senha Master</label> <br/>
                                    <input name="pMPass" id="pMPass" type="password" placeholder="Digite a senha Master" class="form-control">
                                    <br/>
                                </div>
                            </div>

                            <div class="pnBtnLog collapse" id="cadd">
                                <button id="btnEnter" class="btn btn-primary btn-block btn-lg btnLog" type="button">Cadastre-se</button>
                            </div>
                        </div> <br/>

                        <button id="ini" class="btn btn-primary btn-block btn-lg" type="button"> Iniciar aplicação sem fazer login </button>
                    </div> <br/> </div> </form> <br/> </div> </div> <br/> </div> </body> </html>