<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> C.A.F.E.: Deletando... </title>
    <link rel="shortcut icon" href="../../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <script src="../../js/jquery-3.1.0.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/index.js"></script>
</head>
<body class="plBG7"> <div id="content"> <div class="container" align="center"> <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../../ext/logo_transp_branco.png" width="100"> </div> </nav> <div>
    <?php header("Content-Type: text/html; charset=UTF-8",true);
    /* Conexão */ $p_link = $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
    /* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

    $_POST ["c_id"] = isset ($_POST ["c_id"])? $_POST ["c_id"]:'0';   $p_idd = $idd    = $_POST ["c_id"];
    $_POST ["c_user"] = isset ($_POST ["c_user"])? $_POST ["c_user"]:'0';      $p_user = $vuser  = $_POST ["c_user"];

function feito ($p_idd, $p_link, $p_user) {
/* Delete */ $sql = " delete from cafe_users where id = '$p_idd'; ";
if (mysqli_query($p_link, $sql)) { echo " 
    <form class='form-custom card-success' method='post' action='cadastrados.php'>
    <br/><h1>Deletado!</h1><br/>
    <input type='text' value='$p_user' name='c_user' class='collapse'>
    <button class='btn btn-success btn-block btn-lg' type='submit'/>Voltar</button> 
    </form>
"; }
    }
function erro_ ($p_link, $p_user) { echo "        
    <form class='form-custom btn-danger' method='post' action='cadastrados.php'>
    <br/><h1>Erro" . mysqli_error($p_link) ."</h1><br/>
    <input type='text' value='$p_user' name='c_user' class='collapse'>
    <button class='btn btn-danger btn-block btn-lg' type='submit'/>Voltar</button> 
    </form>
"; }

if ($vuser == "Mestre") {
    $userv = '';
    $result = mysqli_query($link, "select * from cafe_users where id = '$idd';"); if (!$result) {}
    while ($confere = mysqli_fetch_assoc($result) ) { $userv = $confere['usuario']; }
    if ("Mestre" != $userv) { feito($idd, $link, $vuser); } else { erro_($link, $vuser); }
} else {
    $userv = '';
    $result = mysqli_query($link, "select * from cafe_users where id = '$idd';"); if (!$result) {}
    while ($confere = mysqli_fetch_assoc($result) ) { $userv = $confere['usuario']; }
    if ($vuser == $userv) { feito($idd, $link, $vuser); } else { erro_($link, $vuser); }
}
?>
<br/> </div> </div> <br/> </div> </body> </html>
