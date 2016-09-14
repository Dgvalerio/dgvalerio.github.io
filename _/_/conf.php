<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> C.A.F.E. </title>
    <link rel="shortcut icon" href="../../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <script src="../../js/jquery-3.1.0.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/index.js"></script>
    <script>
        function subAction(nn) { var page;
            if (nn == 1) {
                page = 'salvos.php'
            } else if (nn == 2) {
                page = 'del.php'
            }
            document.aUsuario.action = page;
            document.aUsuario.submit();
        }
    </script>
</head>
<body class="plBG7"> <div id="content"> <div class="container" align="center"> <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../../ext/logo_transp_branco.png" width="100"> </div> </nav> <div>
    <?php header("Content-Type: text/html; charset=UTF-8",true);
    /* Conexão */ $p_link = $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
    /* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

    $_POST ["d_envia"] = isset ($_POST ["d_envia"])? $_POST ["d_envia"]:'0';   $p_idd = $idd    = $_POST ["d_envia"];
    $_POST ["c_user"] = isset ($_POST ["c_user"])? $_POST ["c_user"]:'0';      $p_user = $vuser  = $_POST ["c_user"];


echo " 
<form name='aUsuario' id='aUsuario' class='form-custom plBG9' method='post' action=''>
<input type='text' value='$p_user' name='c_user' class='collapse'>
<input type='text' value='$idd' name='c_id' class='collapse'>

    <br/><h1>Você deseja mesmo apagar o registro?!</h1> <br/> <br/>
<div class='btn-group col-md-12' role='group'>
    <button class='btn btn-success col-md-6 btn-lg' type='submit' onclick='subAction(2)'>SIM</button> 
    <button class='btn btn-danger col-md-6 btn-lg' type='submit' onclick='subAction(1)'>NÃO</button> 
</div> <br/> <br/> <br/>
</form>
";
?>
<br/> </div> </div> <br/> </div> </body> </html>