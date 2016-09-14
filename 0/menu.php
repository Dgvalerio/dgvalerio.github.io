<!--
<body>
<div id="content">
    <div class="container" align="center">
        <nav class="navbar-fixed-top navbar-x"> <div class="plBG5 navbar-x"> <img class="m-a-p" src="../ext/logo_transp_branco.png" width="100"> </div> </nav>
-->
        <div class="floatMenu collapse"> <div class="btn-group-vertical" role="group">
            <button class="labPer btn btn-primary btn-lg btn-block" onclick="toPage(20)"> Aplicação </button>
            <button class="labPer btn btn-primary btn-lg btn-block" onclick="toPage(22)"> Base de dados </button>
            <button class="labPer btn btn-primary btn-lg btn-block" onclick="toPage(24)"> Página inicial </button>
            <button class="labPer btn btn-primary btn-lg btn-block" onclick="location.href('index.php')"> Logout </button>
        </div> </div> <div class="btnMenu" onclick="displaymenu()"> <img class="m-a-p" src="../ext/logo_miniatura.png" width="30"> </div>

<form name="formMenu" id="formMenu" method="post" action="">
    <?php print ("<input type='text' value='$vuser' name='c_user' class='collapse'>");?>
</form>
