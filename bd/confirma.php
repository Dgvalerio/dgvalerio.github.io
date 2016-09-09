<!DOCTYPE html>
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
</head>
<body class="plBG7"> <div id="content"> <div class="container" align="center"> <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="./ext/logo_transp_branco.png" width="44"> </div> </nav> <div>
<?php header("Content-Type: text/html; charset=UTF-8",true); $tst_one = 0; $tst_two = 0; $conf_senha = '';
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

    $vuser	= $_POST ["pUser"];
    $vsenha = $_POST ["pPass"];

            $result = mysqli_query($link, "select * from cafe_users;"); if (!$result) {}
            while ($confere = mysqli_fetch_assoc($result) ) { if ($confere['usuario'] == $vuser)  { $tst_one = 2; $conf_senha = $confere['senha']; break; } else { $tst_one = 1; } }

            if ($tst_one == 1) { print "
                <form class='form-custom plB8' method='post' action='cad.php'>
                    <br/><h1>O Usuário <i>$vuser</i> não existe!</h1><br/>
                    <button class='btn btn-primary col-md-5 btn-lg' type='submit'>Cadastrar <i>$vuser</i> </button>
                    <button class='btn btn-primary col-md-5 btn-lg f-right' type='button' onclick='toPage(1)'/>Voltar</button> 
                    <input type='text' value='$vuser' name='c_vuser' class='collapse'>
                    <br/><br/>
                </form>
            "; } else if ($tst_one == 2) { if ($conf_senha == $vsenha) { $tst_two = 1; } else { $tst_two = 2; } }

            if ($tst_two == 2) { print "
                <form class='form-custom card-danger' method='post' action='cad.php'>
                    <br/><h1>A Senha de <i>$vuser</i> está errada!</h1><br/>
                    <button class='btn btn-danger btn-block btn-lg' type='button' onclick='toPage(1)'/>Voltar</button> 
                    <br/>
                </form>
            "; } else if ($tst_two == 1) { print(" <script> location.href='index2.php'; </script> "); }

?> <br/> </div> </div> <br/> </div> </body> </html>