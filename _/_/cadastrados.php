<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Usuários </title>
    <link rel="shortcut icon" href="../../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <script src="../../js/jquery-3.1.0.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/index.js"></script>
</head>

<body>
<div id="content">
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../../ext/logo_transp_branco.png" width="100"> </div> </nav>
        <br/>
        <div class="result-custom pC9 crPreta" id="pnResposta">
            <div id="pnImprime">

                <?php header("Content-Type: text/html; charset=UTF-8",true);

                /* Conexão */
                $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
                /* Uso do Banco de Dados */
                $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

                $result = mysqli_query($link, "select * from cafe_users");
                if (!$result) { die('Invalid query: ' . mysqli_connect_error()); }

                echo"<table class='table table-striped pC9 crPreta'>";
                echo"<thead class='thead-inverse'> <tr> <th class='col-md-3'>#</th> <th class='col-md-3'>Usuário</th> <th class='col-md-3'>Nome de usuário</th> <th class='col-md-3'>Senha</th> </tr> </thead> <tbody>";
                while ($exibe = mysqli_fetch_assoc($result) ) { // Obtém os dados da linha atual e avança para o próximo registro
                echo"<tr> <th class='col-md-3' scope='row'>$exibe[id]</th> <td class='col-md-3'>$exibe[usuario]</td> <td class='col-md-3'>$exibe[nome]</td> <td class='col-md-3'>$exibe[senha]</td> </tr>";
                }
                echo"</tbody> </table>";
                mysqli_close($link);
                ?>

            </div>
        </div>
    </div> <br/>

</div>
</body>
</html>