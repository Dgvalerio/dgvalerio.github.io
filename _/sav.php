<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Salvando... </title>
    <link rel="shortcut icon" href="../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
</head>
<body class="plBG7"> <div id="content"> <div class="container" align="center"> <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="./ext/logo_transp_branco.png" width="44"> </div> </nav> <div>
<?php header("Content-Type: text/html; charset=UTF-8",true);
/* Conexão */ $link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Uso do Banco de Dados */ $db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }
/* Criação da Tabela */ $sql = "
create table if not exists cafe_salvos ( 
  id int not null auto_increment, 
  usuario varchar(30), 
  nome varchar(40), 
  idade int, 
  sexo smallint, 
  massa float, 
  estat float, 
  NAF smallint, 
  gest boolean, 
  imc_d float default '0', 
  peso_d float default '0', 
  dat varchar(15), 
  primary key(id) 
) default charset = utf8;
";
if (mysqli_query($link, $sql)) { echo "\n"; } else { echo 'Erro: ' . mysqli_connect_error() . "\n"; }

$_POST ["c_user"]   = isset ($_POST ["c_user"])?    $_POST ["c_user"]:'0';
$_POST ["c_nome"]   = isset ($_POST ["c_nome"])?    $_POST ["c_nome"]:'0';
$_POST ["c_idade"]  = isset ($_POST ["c_idade"])?   $_POST ["c_idade"]:'0';
$_POST ["c_sexo"]   = isset ($_POST ["c_sexo"])?    $_POST ["c_sexo"]:'0';
$_POST ["c_massa"]  = isset ($_POST ["c_massa"])?   $_POST ["c_massa"]:'0';
$_POST ["c_estat"]  = isset ($_POST ["c_estat"])?   $_POST ["c_estat"]:'0';
$_POST ["c_NAF"]    = isset ($_POST ["c_NAF"])?     $_POST ["c_NAF"]:'0';
$_POST ["c_gest"]   = isset ($_POST ["c_gest"])?    $_POST ["c_gest"]:'0';
$_POST ["c_imcD"]   = isset ($_POST ["c_imcD"])?    $_POST ["c_imcD"]:'0';
$_POST ["c_pesoD"]  = isset ($_POST ["c_pesoD"])?   $_POST ["c_pesoD"]:'0';

$date = date('d-m-Y');
$user	= $_POST ["c_user"];    if ($user == '') { $user = 'Sem Nome'; }
$nome = $_POST ["c_nome"];      if ($nome == '') { $nome = 'Sem Nome'; }
$idade	= $_POST ["c_idade"];   if ($idade == '') { $idade = 0; }
$sexo = $_POST ["c_sexo"];      if ($sexo == '') { $sexo = 0; }
$massa	= $_POST ["c_massa"];   if ($massa == '') { $massa = 0; }
$estat = $_POST ["c_estat"];    if ($estat == '') { $estat = 0; }
$NAF	= $_POST ["c_NAF"];     if ($NAF == '') { $NAF = 0; }
$gest = $_POST ["c_gest"];      if ($gest == '') { $gest = 2; }
$imcD	= $_POST ["c_imcD"];    if ($imcD == '') { $imcD = 0; }
$pesoD	= $_POST ["c_pesoD"];   if ($pesoD == '') { $pesoD = 0; }

$sql = "insert into cafe_salvos (usuario, nome, idade, sexo, massa, estat, NAF, gest, imc_d, peso_d, dat) values ('$user',  '$nome', '$idade', '$sexo', '$massa', '$estat', '$NAF', '$gest', '$imcD', '$pesoD', '$date');";
if (mysqli_query($link, $sql)) { echo " 
    <form class='form-custom card-success' method='post'>
    <br/><h1>Dados salvos com sucesso!</h1><br/>
    <button id='enter' class='btn btn-success btn-block btn-lg' type='button' onclick='toPage(10)'/>Voltar</button> <br/>
    </form>
"; } else { print ("Erro:" . mysqli_error($link)); }

?> <br/> </div> </div> <br/> </div> </body> </html>