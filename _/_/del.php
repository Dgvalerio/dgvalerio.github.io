<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Deletando... </title>
    <link rel="shortcut icon" href="../../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
</head>
<body class="plBG7"> <div id="content"> <div class="container" align="center"> <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="./ext/logo_transp_branco.png" width="44"> </div> </nav> <div>
    <?php header("Content-Type: text/html; charset=UTF-8",true);
    /* Conexão */ $p_link = $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
    /* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

    $_GET ["d_envia"] = isset ($_GET ["d_envia"])? $_GET ["d_envia"]:'0';   $p_idd = $idd    = $_GET ["d_envia"];
    $_GET ["c_user"] = isset ($_GET ["c_user"])? $_GET ["c_user"]:'0';      $p_user = $vuser  = $_GET ["c_user"];

function feito ($p_idd, $p_link) { //Gravando no banco de dados !
        /* Delete */ $sql = " delete from cafe_salvos where id = '$p_idd'; ";
if (mysqli_query($p_link, $sql)) { echo " 
    <form class='form-custom card-success' method='post'>
    <br/><h1>Deletado!</h1><br/>
    <button id='enter' class='btn btn-success btn-block btn-lg' type='button' onclick='toPage(12)'/>OK</button> <br/>
    </form>
"; }
    }
function erro_ ($p_link) { echo "        
    <form class='form-custom btn-danger' method='post'>
    <br/><h1>Erro:" . mysqli_error($p_link) ."</h1><br/>
    <button id='enter' class='btn btn-danger btn-block btn-lg' type='button' onclick='toPage(12)'/>OK</button> <br/>
    </form>
"; }

if ($vuser == "Mester") {
    feito($idd, $link);
} else {
    erro_($link);
}
?>
<br/> </div> </div> <br/> </div> </body> </html>
