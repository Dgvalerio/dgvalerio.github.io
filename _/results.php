<?php header("Content-Type: text/html; charset=UTF-8",true); $idd = ''; $userr = ''; $nomee = ''; $idadee = ''; $sexoo = ''; $massaa = ''; $estatt = ''; $NAFF = ''; $gestt = ''; $imcDD = ''; $pesoDD = ''; $datt = '';
/* Conexão */
$link = mysqli_connect('localhost', 'root', ''); if (!$link) { die('Não foi possível conectar: ' . mysqli_connect_error()); } echo '';
/* Uso do Banco de Dados */
$db_selected = mysqli_select_db($link, 'cafe_login'); if (!$db_selected) { die ('Can\'t use foo : ' . mysqli_connect_error());  } else {echo ''; }

$vuser	= isset ($_POST ["c_user"])? $_POST ["c_user"]:'';
$idd = isset ($_POST ["d_envia"])? $_POST ["d_envia"]:'0';

$result = mysqli_query($link, "select * from cafe_salvos where id = $idd;");
if (!$result) { die('Invalid query: ' . mysqli_connect_error()); }

while ($exibe = mysqli_fetch_assoc($result) ) { // Obtém os dados da linha atual e avança para o próximo registro
    $idd = $exibe['id']; $userr = $exibe['usuario']; $nomee = $exibe['nome']; $idadee = $exibe['idade']; $sexoo = $exibe['sexo']; $massaa = $exibe['massa']; $estatt = $exibe['estat']; $NAFF = $exibe['NAF']; $gestt = $exibe['gest']; $imcDD = $exibe['imc_d']; $pesoDD = $exibe['peso_d']; $datt = $exibe['dat'];
}
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
    <?php
    if ($vuser == '') { print ("
        <style>
            #btnSalva { display: none; }
        </style>
    "); }

    if ($sexoo == 1) {
        $sexoo = 'Masculino';
    } else if ($sexoo == 2) {
        $sexoo = 'Feminino';
    }

    if ($NAFF == 1) {
        $NAFF = 'Leve';
    } else if ($NAFF == 2) {
        $NAFF = 'Moderada';
    } else if ($NAFF == 3) {
        $NAFF = 'Intensa';
    }

    if ($gestt == 1) {
        $gestt = 'block';
    } else if ($gestt == 2) {
        $gestt = 'none';
    }

    print("<script>
    $(function () {       
        $('#pnRNome').html('$nomee');
        $('#pnRIdade').html('$idadee');
        $('#pnRSexo').html('$sexoo');
        $('#pnRMassa').html('$massaa');
        $('#pnREstatura').html('$estatt');
        $('#pnRNivel').html('$NAFF');
        $('#cGest').css({'display':'$gestt'});
        $('#pImcDes').html('$imcDD');
        $('#pPesoDes').html('$pesoDD');       
    });
    </script>
    ");

    ?>
</head>
<body class="plBG7">
<div id="content"> <nav class="navbar-y"> <div class="plBG5 navbar-y"><br/> <br/> <br/> <br/> <br/> </div> </nav>
    <div class="container" align="center"> <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../ext/logo_transp_branco.png" width="100"> </div> </nav>
        <form class="result-custom pC9 crPreta" id="pnResposta" method="post" action="sav.php">
            <div id="pnImprime">
                <table class="table table-striped">
                    <thead class="thead-inverse"> <tr> <th class="text-md-center" colspan="4"> Dados Básicos </th> </tr> </thead>
                    <tbody>
                    <tr> <td class="text-md-center" colspan="4"> <span id="pnRNome"> NOME </span> </td> </tr>
                    <tr>
                        <th class="col-md-3 text-md-right" scope="row"> <span> Idade: </span> </th>
                        <td class="col-md-3 text-md-left"> <span id="pnRIdade"> IDADE </span> </td>
                        <th class="col-md-3 text-md-right" scope="row"> <span> Sexo: </span> </th>
                        <td class="col-md-3 text-md-left"> <span id="pnRSexo"> SEXO </span> </td> </tr>
                    <tr>
                        <th class="col-md-3 text-md-right" scope="row"> <span> Massa corporal: </span> </th>
                        <td class="col-md-3 text-md-left"> <span id="pnRMassa"> MASSA </span> </td>
                        <th class="col-md-3 text-md-right" scope="row"> <span> Estatura: </span> </th>
                        <td class="col-md-3 text-md-left"> <span id="pnREstatura"> ESTATURA </span> </td> </tr>
                    <tr>
                        <th class="col-md-6 text-md-right" colspan="2"> <span> Nível de atividade Física: </span> </th>
                        <td class="col-md-6 text-md-left" colspan="2"> <span id="pnRNivel"> NÍVEL </span> </td>
                    </tr>
                    <tr>
                        <th class="text-md-center" scope="row" style="display: none" id="cGest"> <span>Gestante</span> </th>
                    </tr>
                    </tbody>
                </table> <br/>

                <table class="table table-striped">
                    <thead class="thead-inverse"> <tr> <th class="text-md-center" colspan="3"> Dados Nutricionais </th> </tr> </thead>
                    <tbody>
                    <tr>
                        <th class="col-md-4 text-md-right" scope="row">GET (Gasto Energético Total):</th>
                        <td class="col-md-4 text-md-center"> <span id="cGET"> - </span> </td>
                        <td class="col-md-4 text-md-left"> <span> </span> </td> </tr>
                    <tr>
                        <th class="col-md-4 text-md-right" scope="row">GMB (Gasto Metabólico Basal):</th>
                        <td class="col-md-4 text-md-center"> <span id="cGMB"> - </span> </td>
                        <td class="col-md-4 text-md-left"> <span> </span> </td> </tr>
                    <tr>
                        <th class="col-md-4 text-md-right" scope="row">IMC (Índice de Massa Corporal):</th>
                        <td class="col-md-4 text-md-center"> <span id="cIMC"> - </span> </td>
                        <td class="col-md-4 text-md-left"> <span id="dIMC"> - </span> </td> </tr>
                    </tbody>
                </table> <br/>

                <?php print ("<input type='text' value='$vuser' name='c_user' class='collapse'>");?>
                <input type='text' name='c_nome'    class='collapse' id='c_nome'>
                <input type='text' name='c_idade'   class='collapse' id='c_idade'>
                <input type='text' name='c_sexo'    class='collapse' id='c_sexo'>
                <input type='text' name='c_massa'   class='collapse' id='c_massa'>
                <input type='text' name='c_estat'   class='collapse' id='c_estat'>
                <input type='text' name='c_NAF'     class='collapse' id='c_NAF'>
                <input type='text' name='c_gest'    class='collapse' id='c_gest'>
                <input type='text' name='c_imcD'    class='collapse' id='c_imcD'>
                <input type='text' name='c_pesoD'   class='collapse' id='c_pesoD'>


                <div id="pnDadosNut" class="collapse">
                <table class="table table-striped">
                    <thead class="thead-inverse"> <tr> <th class="text-md-center" colspan="2"> Projeções </th> </tr> </thead>
                    <tbody>
                    <tr>
                        <th class="col-md-6 text-md-right"> <span> Índice de Massa Corporal desejado: </span> </th>
                        <td class="col-md-6 text-md-left"> <span id="pnRIndice"> - </span> </td> </tr>
                    <tr>
                        <th class="col-md-6 text-md-right"> <span> Peso desejado: </span> </th>
                        <td class="col-md-6 text-md-left"> <span id="pnRPeso"> - </span> </td> </tr>
                    <tr>
                        <th class="col-md-6 text-md-right"> <span id="pnOpQuilos"> - </span> </th>
                        <td class="col-md-6 text-md-left"> <span id="pnRQuilos"> - </span> </td>
                    </tr>

                    </tbody>
                </table> </div> <br/>
            </div>

<div align="center" class="hidden-print">
    <div class="btn-group col-md-12" role="group">
        <button type="button" id="btnPrint"  class="btn btn-primary btn-lg col-md-12" onclick="Imprime()">Imprimir</button>
    </div> <br> <br> <br>
</div>

</form></div> <br/>
</div>
</body>
</html>