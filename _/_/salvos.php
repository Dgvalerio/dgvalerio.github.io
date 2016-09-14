<?php header("Content-Type: text/html; charset=UTF-8",true); $estado = 0;
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Criação do Banco de Dados */ $sql = 'create database if not exists `cafe_login` default character set utf8 collate utf8_general_ci;'; if (mysqli_query($link, $sql)) { echo ""; } else { echo 'Erro criando o banco de dados: ' . mysqli_connect_error() . "\n"; }
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
$vuser	= isset ($_POST ["c_user"])? $_POST ["c_user"]:''; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> C.A.F.E.: Dados </title>
    <link rel="shortcut icon" href="../../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <script src="../../js/jquery-3.1.0.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/index.js"></script>
</head>

<script>
    function subAction(nn, idd) { var page;
        if (nn == 1) {          page = 'conf.php'
        } else if (nn == 2) {   page = '../results.php' }
        $("#d_envia").val(idd);
        document.aUsuario.action = page;
        document.aUsuario.submit();
    }
</script>

<body>
<div id="content">
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../../ext/logo_transp_branco.png" width="100"> </div> </nav>

        <div class="floatMenu collapse"> <div class="btn-group-vertical" role="group">
                <button class="labPer btn btn-primary btn-lg btn-block" onclick="toLocal(17)"> Aplicação </button>
                <button class="labPer btn btn-primary btn-lg btn-block" onclick="toLocal(25)"> Base de dados </button>
                <button class="labPer btn btn-primary btn-lg btn-block" onclick="toLocal(18)"> Página inicial </button>
                <button class="labPer btn btn-primary btn-lg btn-block" onclick="toLocal(11)"> Logout </button>
            </div> </div> <div class="btnMenu" onclick="displaymenu()"> <img class="m-a-p" src="../../ext/logo_miniatura.png" width="30"> </div>
        <form name="formMenu" id="formMenu" method="post" action="">
            <?php print ("<input type='text' value='$vuser' name='c_user' class='collapse'>");?>
        </form>

        <br/> <div class="result-custom pC9 crPreta" id="pnResposta">
            <form name="aUsuario" id="aUsuario" method="post" action="">
                <input type='text' id='d_envia' name='d_envia' class='collapse'>
                <?php print ("<input type='text' value='$vuser' name='c_user' class='collapse'>");?>
            </form>

            <div>
                <?php header("Content-Type: text/html; charset=UTF-8",true);
                /* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
                /* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

                $result = mysqli_query($link, "select * from cafe_salvos ORDER BY id"); if (!$result) { die('Invalid query: ' . mysqli_connect_error()); }

                echo"<table class='table pC9 crPreta cntr'>";
                echo"<thead class='thead-inverse'> <tr> 
<th class='col-md-1 cntr'>ID</th> 
<th class='col-md-4 cntr'>Nome do avaliado</th> 
<th class='col-md-3 cntr'>Cadastrado por</th> 
<th class='col-md-3 cntr'>Data</th>
<th class='col-md-1 cntr'>Apagar</th>
                </tr> </thead> <tbody>";
                while ($exibe = mysqli_fetch_assoc($result) ) { // Obtém os dados da linha atual e avança para o próximo registro
                    echo"<tr role='button' class='user'> 
<th onclick='subAction(2, $exibe[id])' class='col-md-1 cntr' scope='row'>$exibe[id]</th> 
<td onclick='subAction(2, $exibe[id])' class='col-md-4'>$exibe[nome]</td> 
<td onclick='subAction(2, $exibe[id])' class='col-md-3'>$exibe[usuario]</td> 
<td onclick='subAction(2, $exibe[id])' class='col-md-3'>$exibe[dat]</td> 
<th align='center' class='col-md-1 glyphicons' onclick='subAction(1, $exibe[id])'><div class='glyphicons-17-bin'></div></th>
                </tr> ";
                } echo"</tbody> </table>";
                mysqli_close($link);
                ?>
            </div>

        </div>
    </div> <br/>

</div>
</body>

</html>