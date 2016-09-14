<?php header("Content-Type: text/html; charset=UTF-8",true);
$vuser	= isset ($_POST ["l_vuser"])? $_POST ["l_vuser"]:'';
if ($vuser == '') { $vuser	= isset ($_POST ["c_user"])? $_POST ["c_user"]:''; }
if ($vuser == '') {print(" <script> location.href = '../index.php'; </script>"); } // Logado?
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> C.A.F.E. </title>
    <link rel="shortcut icon" href="../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
    <script>
        function subAction(page) {
            document.formIndex.action = page;
            document.formIndex.submit();
        }
    </script>
    <?php
    if ($vuser == 'Mestre') { print ("
        <style>     #uA { display: none; }                          </style>
        <script>    $(function () { $('.mst').collapse('show'); }); </script>
    "); }
    ?>
</head>
<body class="plBG7">
<div id="content">
    <nav class="navbar-y"> <div class="plBG5 navbar-y"><br/> <br/> <br/> <br/> <br/> </div> </nav>
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../ext/logo_transp_branco.png" width="100"> </div> </nav>
        <div class="floatMenu collapse"> <div class="btn-group-vertical" role="group">
                <button class="labPer btn btn-primary btn-lg btn-block" onclick="toLocal(13)"> Aplicação </button>
                <button class="labPer btn btn-primary btn-lg btn-block" onclick="toLocal(45)"> Base de dados </button>
                <button class="labPer btn btn-primary btn-lg btn-block" onclick="toLocal(14)"> Página inicial </button>
                <button class="labPer btn btn-primary btn-lg btn-block" onclick="toLocal(18)"> Logout </button>
            </div> </div> <div class="btnMenu" onclick="displaymenu()"> <img class="m-a-p" src="./../ext/logo_miniatura.png" width="30"> </div>
        <form name="formMenu" id="formMenu" method="post" action="">
            <?php print ("<input type='text' value='$vuser' name='c_user' class='collapse'>");?>
        </form>
        <div>
            <form name='formIndex' class="form-custom plBG9" method="post" action="">
                <div id="pnFormulario" class="">
                    <div class="" id="pnBd00">
                        <?php print ("<input type='text' value='$vuser' name='c_user' class='collapse'>");?>
                        <br/><h1>Olá <span class="destac"><?php echo"$vuser";?></span><span id="uA">, seja bem-vindo! Este é o CAFE, aplicativo virtual de Cálculo de Acompanhamento Físico e Energético, ele está aqui para te ajudar</span>. Como desejas continuar? </h1><br/>
                        <button onclick="subAction('CAFE.php')" class="btn btn-primary btn-block btn-lg" type="button"> Iniciar aplicação </button>
                        <button onclick="subAction('_/salvos.php')" class="btn btn-primary btn-block btn-lg" type="button"> Acessar base de dados </button>
                        <button onclick="subAction('_/cadastrados.php')" class="btn btn-primary btn-block btn-lg collapse mst" type="button"> Gerenciar usuários </button>
                    </div> <br/>
                </div>
            </form> <br/>
        </div>
    </div> <br/>
</div>
</body>
</html>