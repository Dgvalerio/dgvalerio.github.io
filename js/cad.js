var estado = 0;
$(document).keypress(function(e) { if(e.which == 13) $('#btnEnter').click(); });

$(function () {
    $('#pnBd01').collapse('show');

    $('#ini').click(function () { location.href='../index.html'; });

    $('#enter').click(function () {
        var login = document.getElementById('pUser').value;
        var nome = document.getElementById('pNome').value;
        var senha = document.getElementById('pPass').value;
        var csenha = document.getElementById('pCPass').value;
        var msenha = document.getElementById('pMPass').value;
        if (login==""||nome==""||senha==""||csenha==""||msenha==""){ alert("Preencha todos os campos!") }

        //Coisas que AINDA devem ser testadas
        if (0==1/*Login existe no banco*/){ alert("Este login já está cadastrado, por favor, escolha outro!") }
    });

    $('#btnEnter').click(function () {
        var login = document.getElementById('pUser').value;
        var nome = document.getElementById('pNome').value;
        var senha = document.getElementById('pPass').value;
        var csenha = document.getElementById('pCPass').value;
        var msenha = document.getElementById('pMPass').value;
        if (login==""||nome==""||senha==""||csenha==""||msenha==""){ alert("Atenção!\nPreencha todos os campos!") }
        else if ((formcadastro.pUser.value.length) <= 3) { alert("Atenção!\nO campo 'login' deve possuir mais de três caracteres!"); formcadastro.pUser.focus(); }
        else if ((formcadastro.pNome.value.length) <= 3) { alert("Atenção!\nO campo 'nome' deve possuir mais de três caracteres!"); formcadastro.pNome.focus(); }
        else if ($("#pPass").val() !=  $("#pCPass").val()){ alert("Atenção!\nA senha não confere com a confirmação!") }
        else { document.formcadastro.submit(); }
    });
});

setInterval('formLog()',200);
function formLog(){
    switch (estado) {
        case 0:
            $("#pNome").prop("disabled", true);
            $("#pPass").prop("disabled", true);
            $("#pCPass").prop("disabled", true);

            $('#pnMaster').collapse('hide');
            $('#cadd').collapse('hide');

            if ($('#pUser').val() != "") { estado = 1; }
            break;
        case 1:
            $("#pNome").prop("disabled", false);
            if ($('#pNome').val() != "") { estado = 2; }
            break;
        case 2:
            $("#pPass").prop("disabled", false);
            if ($('#pPass').val() != "") { estado = 3; }
            break;
        case 3:
            $("#pCPass").prop("disabled", false);
            if ($('#pCPass').val() != "") { estado = 4; }
            break;
        case 4:
            $('#pnMaster').collapse('hide');
            $('#cadd').collapse('hide');
            if (($("#pPass").val() !=  $("#pCPass").val()) || ($("#pPass").val() == "" || $("#pCPass").val() == "")) {
                document.getElementById('pStatus').innerHTML = "As senhas não conferem!";
                $('#pnStatus').css({"background-color": "#ff0028", "transition": "all .5s"});
            } else {
                document.getElementById('pStatus').innerHTML = "As senhas conferem!";
                $('#pnStatus').css({"background-color": "#34cc33", "transition": "all .5s"});
                estado = 5;
            }
            break;
        case 5:
            $('#cadd').collapse('hide');
            $('#pnMaster').collapse('show');
            if (($("#pPass").val() !=  $("#pCPass").val()) || ($("#pPass").val() == "" || $("#pCPass").val() == "")) {
                document.getElementById('pStatus').innerHTML = "As senhas não conferem!";
                $('#pnStatus').css({"background-color": "#ff0028", "transition": "all .5s"});
                estado = 4;
            } else {
                document.getElementById('pStatus').innerHTML = "As senhas conferem!";
                $('#pnStatus').css({"background-color": "#34cc33", "transition": "all .5s"});
            }
            if ($('#pMPass').val() != "") { estado = 6; }
            break;
        case 6:
            if (($("#pPass").val() !=  $("#pCPass").val()) || ($("#pPass").val() == "" || $("#pCPass").val() == "")) {
                document.getElementById('pStatus').innerHTML = "As senhas não conferem!";
                $('#pnStatus').css({"background-color": "#ff0028", "transition": "all .5s"});
                estado = 4;
            } else {
                document.getElementById('pStatus').innerHTML = "As senhas conferem!";
                $('#pnStatus').css({"background-color": "#34cc33", "transition": "all .5s"});
                $('#cadd').collapse('show');
            }
            break;
        default: estado=0;
    }
}