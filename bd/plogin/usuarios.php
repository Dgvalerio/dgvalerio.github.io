<!DOCTYPE html>
<!-- REGRAS PARA ID'S
        - 1º Sempre começar com letras minúsculas;
        - 2º Não são permitidos espaços nem acentos;
        - 3º A primeira letra de cada palavra é maiúscula, só a primeira letra, independentemente de ser uma sigla ou não.
-->
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Usuários </title>
    <link rel="shortcut icon" href="../../ext/logo_miniatura.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="print" href="../../bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../js/toolbar/jquery.toolbar.css"/>
    <link rel="stylesheet" type="text/css" href="../../js/toolbar/font-awesome-4.6.3/css/font-awesome.css"/>
    <script src="../../js/jquery-3.1.0.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/index.js"></script>
    <script src="../../js/toolbar/jquery.toolbar.js"></script>
    <script src="../../js/toolbar/jquery.toolbar.min.js"></script>

    <style>
        .cursor{
            cursor: pointer;
        }
    </style>

</head>

<body>
<div id="content">
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../ext/logo_transp_branco.png" width="100"> </div> </nav>
        <br/>
        <div class="result-custom pC9 crPreta" id="pnResposta">

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

                echo"<tr> <th class='col-md-3' scope='row'>$exibe[id]</th> <td class='col-md-3'>$exibe[usuario]</td> <td class='col-md-3'>$exibe[nome]</td> <td class='col-md-3'> <span id='s1'>$exibe[senha]</span> <form class='altsenha' style='display: none' id='$exibe[id]' ><input style='' value='$exibe[senha]'/> </form>  <div id='b1' class='button btn-toolbar btn-toolbar-dark f-right cursor'> <i id='c1' class='fa fa-cog'></i> </div> </td> </tr>";
            }
            $teste = "Excluir";

            echo"<div id='toolbar-options' class='hidden'>
                <a onclick='altSenha($exibe[id])' href=''#'><i class='fa fa-edit'></i></a>
                <a onclick='alert($teste)' href=''#'><i class='fa fa-close'></i></a>
            </div>";

            echo"</tbody> </table>";
            mysqli_close($link);
            ?>
                    <script>
                        var stat = 0;
                        function altSenha() {
                            if (stat==0) {
                                $('#s1').css({"display": "none"});
                                $('#b1').css({"border-radius": "0 6px 6px 0"});
                                $('#1').css({"display": "inline-block"});
                                $('#c1').removeClass('fa fa-cog');
                                $('#c1').addClass('fa fa-check');
                                stat = 1;
                            }
                            else {
                                $('#s1').css({"display": "inline-block"});
                                $('#b1').css({"border-radius": "6px"});
                                $('#1').css({"display": "none"});
                                $('#c1').removeClass('fa fa-check');
                                $('#c1').addClass('fa fa-cog');
                                stat = 0;
                            }
                        }

                        $('.button').toolbar({
                            content: '#toolbar-options',
                            position: 'top',
                            style: 'dark',
                            event: 'click',
                            hideOnClick: true,
                            adjustment: 20
                        });
                    </script>

                    </tbody> </table>

            </div>
        </div>
    </div> <br/>

</div>
</body>
</html>