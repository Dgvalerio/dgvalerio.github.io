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
</head>
<body class="plBG7">
<div id="content">
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="./ext/logo_transp_branco.png" width="44"> </div> </nav>

        <div id="" class="">

<?php header("Content-Type: text/html; charset=UTF-8",true); $log = 0;

/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

    $vuser	= $_POST ["pUser"];
    $vsenha = $_POST ["pPass"];

            $result = mysqli_query($link, "select * from cafe_users"); if (!$result) { die('Invalid query: ' . mysqli_connect_error()); }

            while ($confere = mysqli_fetch_assoc($result) ) {
                if ($confere['usuario'] == $vuser) {
                    if ($confere['senha'] == $vsenha) {
                        print(" <script> location.href='../index.html'; </script> ");
                    } else { $log = 3; }
                } else { $log = 2; }
            }

            switch ($log) {
                case 1:
                    break;
                case 2:
                    print "
            
                    <form class='form-custom plB8' method='post' action='cad.php'>
                    
                        <br/><h1>O Usuário <i>$vuser</i> não existe!</h1><br/>
                        
                        <button class='btn btn-primary col-md-5 btn-lg' type='submit'>Cadastrar <i>$vuser</i> </button>
                    
                        <button class='btn btn-primary col-md-5 btn-lg f-right' type='button' onclick='toPage(1)'/>Voltar</button> 
                        
                        <input type='text' value='$vuser' name='c_vuser' class='collapse'>
                        <br/><br/>
                    
                    </form>
            
                    "; break;
                case 3:
                    print "

                    <form class='form-custom card-danger' method='post' action='cad.php'>
                    
                        <br/><h1>A Senha de <i>$vuser</i> está errada!</h1><br/>
                    
                        <button class='btn btn-danger col-md-5 btn-lg f-right' type='button' onclick='toPage(1)'/>Voltar</button> 
                        <br/><br/>
                    
                    </form>

                    "; break;
            }



            ?>

<br/> </div> </div> <br/> </div> </body> </html>