<?php header("Content-Type: text/html; charset=UTF-8",true);
$vuser	= isset ($_POST ["l_vuser"])? $_POST ["l_vuser"]:'';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> CAFE </title>
    <link rel="shortcut icon" href="../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
    <script>
        function acess(){
            document.acessar.submit();
        }
    </script>
    <?php
    if ($vuser == 'Mestre') { print ("
        <style>
            #uA { display: none; }
        </style>
        <script>
            $(function () {
                $('.mst').collapse('show');
            });
        </script>
    "); }
    ?>
</head>
<body class="plBG7">
<form class='collapse' name="acessar" id="acessar" action="_/salvos.php">
    <?php print ("<input type='text' value='$vuser' name='c_user' class='collapse'>");?>
</form>
<div id="content">
    <nav class="navbar-y"> <div class="plBG5 navbar-y"><br/> <br/> <br/> <br/> <br/> </div> </nav>
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../ext/logo_transp_branco.png" width="100"> </div> </nav>

        <div>
            <form class="form-custom plBG9" method="post" action="CAFE.php">
                <div id="pnFormulario" class="">
                    <div class="" id="pnBd00">
                        <?php print ("<input type='text' value='$vuser' name='c_user' class='collapse'>");?>
                        <br/><h1>Olá <span class="destac"><?php echo"$vuser";?></span><span id="uA">, seja bem-vindo! Este é o CAFE, aplicativo virtual de Cálculo de Acompanhamento Físico e Energético, ele está aqui para te ajudar</span>. Como desejas continuar? </h1><br/>
                        <button id="ini" class="btn btn-primary btn-block btn-lg" type="submit"> Iniciar aplicação </button>
                        <button id="ini" class="btn btn-primary btn-block btn-lg" type="button" onclick="acess()"> Acessar base de dados </button>
                        <button id="ini" class="btn btn-primary btn-block btn-lg collapse mst" type="button" onclick="toPage(11)"> Gerenciar usuários </button>
                    </div> <br/>
                </div>
            </form> <br/>
        </div>
    </div> <br/>
</div>
</body>
</html>