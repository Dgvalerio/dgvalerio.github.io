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
        setInterval('verificaSenha()',200);
        $(document).keypress(function(e) { if(e.which == 13) $('#enter').click(); });

        function verificaSenha(){
            var senha = document.getElementById('pPass').value;
            var csenha = document.getElementById('pCPass').value;
            if (senha!=0 && csenha!=0) {
                if (csenha != senha) {
                    document.getElementById('pStatus').innerHTML = "As senhas não conferem!";
                    document.getElementById('pnStatus').style="background-color: #ff0028";
                }
                else{
                    document.getElementById('pStatus').innerHTML = "As senhas conferem!";
                    document.getElementById('pnStatus').style="background-color: #34cc33";
                }
            }
            else{
                document.getElementById('pStatus').innerHTML = "";
            }
        }

        function verifica(){
            var login = document.getElementById('pUser').value;
            var nome = document.getElementById('pName').value;
            var senha = document.getElementById('pPass').value;
            var csenha = document.getElementById('pCPass').value;
            var msenha = document.getElementById('pMPass').value;
            if (login==""||nome==""||senha==""||csenha==""||msenha==""){
                alert("Preencha todos os campos!")
            }
            // Coisas que devem ser testadas
            if (0==1/*Login existe no banco*/){
                alert("Este login já está cadastrado, por favor, escolha outro!")
            }
            if (0==1/*Nome do usuário existe no banco*/){
                alert("Este nome de usuário já está cadastrado, por favor, escolha outro!")
            }
            if (csenha != senha) {
                alert("As senhas não são iguais, por favor, verifique a informação")
            }
            if (0==1/*Senha master errada*/){
                alert("A senha master informada é inválida!")
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
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../ext/logo_transp_branco.png" width="100"> </div> </nav>

        <div id="" class="">
            <form class="form-custom plBG9" method="post" action="index.php">
                <div id="pnFormulario" class="">

                    <div class="" id="pnBd00">
                        <br/>

                        <div class="pnBtnLog">
                                <label class="labPer" for="pUser">Login</label>
                            <input name="pUser" id="pUser" type="text" placeholder="Digite seu login" class="form-control" title="Nome"/>
                            <br/>
                            <label class="labPer" for="pName">Nome do usuário</label> <br/>
                            <input name="pName" id="pName" type="text" placeholder="Digite seu nome de usuário" class="form-control" title="Nome"/>
                            <br/>
                                <label class="labPer" for="pPass">Senha</label> <br/>
                                <input name="pPass" id="pPass" type="password" placeholder="Digite sua senha" class="form-control">
                                <br/>
                            <label class="labPer" for="pCPass">Repita a senha</label> <br/>
                            <input name="pCPass" id="pCPass" type="password" placeholder="Repita sua senha" class="form-control">
                            <div id="pnStatus"><span id="pStatus"></span></div>
                            <br/>
                            <label class="labPer" for="pMPass">Senha Master</label> <br/>
                            <input name="pMPass" id="pMPass" type="password" placeholder="Digite a senha Master" class="form-control">
                            <br/>
                            <button id="enter" class="btn btn-primary btn-block btn-lg btnLog" type="button" onclick="verifica()">Cadastre-se</button>
                        </div> <br/>

                    </div> <br/> </div> </form> <br/> </div> </div> <br/> </div> </body> </html>