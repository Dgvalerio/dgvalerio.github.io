var naf;
var statd = 0;

function imcPeso(idd) {
    $('#pnPesoImc').css({"padding": "10px", "transition": "all .5s"});
    if (idd == "fID") {
        switch (statd) {
            case 0:
                $('#fID').collapse('show');
                $('#pnPesoImc').css({"background-color": "#37474F", "transition": "all .5s"});
                $('#pnIMCD').css({"background-color": "#37474F", "transition": "all .5s"});
                statd = 1;
                break;
            case 1:
                $('#fID').collapse('hide');
                $('#pnPesoImc').collapse('hide');
                $('#pnPesoImc').css({"padding":"0"});
                document.getElementById('pImcDes').value = "";
                $('#pnIMCD').css({"background-color": "#263238", "transition": "all .5s"});
                statd = 0;
                break;
            case 2:
                $('#fID').collapse('show');
                $('#fPD').collapse('hide');
                document.getElementById('pPesoDes').value = "";
                $('#pnPesoImc').css({"background-color": "#37474F", "transition": "all .5s"});
                $('#pnIMCD').css({"background-color": "#37474F", "transition": "all .5s"});
                $('#pnPesoD').css({"background-color": "#263238", "transition": "all .5s"});
                statd = 1;
                break;
        }
    } else if (idd == "fPD") {
        switch (statd) {
            case 0:
                $('#fPD').collapse('show');
                $('#pnPesoImc').css({"background-color": "#78909C", "transition": "all .5s"});
                $('#pnPesoD').css({"background-color": "#78909C", "transition": "all .5s"});
                statd = 2;
                break;
            case 1:
                $('#fPD').collapse('show');
                $('#fID').collapse('hide');
                document.getElementById('pImcDes').value = "";
                $('#pnPesoImc').css({"background-color": "#78909C", "transition": "all .5s"});
                $('#pnPesoD').css({"background-color": "#78909C", "transition": "all .5s"});
                $('#pnIMCD').css({"background-color": "#263238", "transition": "all .5s"});
                statd = 2;
                break;
            case 2:
                $('#fPD').collapse('hide');
                $('#pnPesoImc').collapse('hide');
                $('#pnPesoImc').css({"padding":"0"});
                document.getElementById('pPesoDes').value = "";
                $('#pnPesoD').css({"background-color": "#263238", "transition": "all .5s"});
                statd = 0;
                break;
        }
    }
}

function calculaGMB(s,i,P,g,n){
    var gmb=0;
    if (s==1){
        if (i>=1 && i<=3) { gmb=(60.9*P)-54 }
        else if (i>=4 && i<=10) { gmb = (22.7 * P) + 495 }
        else if (i>=11 && i<=18) { gmb = (17.5 * P) + 651 }
        else if (i>=19 && i<=30) { gmb = (15.3 * P) + 679 }
        else if (i>=31 && i<=60) { gmb = (11.6 * P) + 879 }
        else if (i>60) { gmb = (13.5 * P) + 487 }
    }
    else if (s==2){
        if (i>=1 && i<=3) { gmb = (61 * P) - 51 }
        else if (i>=4 && i<=10) { gmb = (22.5 * P) + 499 }
        else if (i>=11 && i<=18) { gmb = (12.2 * P) + 746 }
        else if (i>=19 && i<=30) { gmb = (14.7 * P) + 496 }
        else if (i>=31 && i<=60) { gmb = (8.7 * P) + 829 }
        else if (i>60) { gmb = (10.5 * P) + 596 }
        if (g==1) { if (n == 1) { gmb += 200 } }
        else if (n==2) { gmb += 285 }
    }
    return gmb;
}

function calculaGET(gmb,s,i,n){
    var GET=0;
    if (s==1) {
        if (n == 1) { GET = gmb * 1.55 }
        else if (n == 2) { GET = gmb * 1.78 }
        else if (n == 3) { GET = gmb * 2.10 }
    }
    else if (s==2) {
        if (n == 1) { GET = gmb * 1.56 }
        else if (n == 2) { GET = gmb * 1.64 }
        else if (n == 3) { GET = gmb * 1.82 }
    }
    if (i>=13 && i<=15) { GET += (GET * 0.13) }
    else if (i>=16 && i<=19) { GET += (GET * 0.05) }
    else if (i>=40 && i<=49) { GET -= (GET * 0.05) }
    else if (i>=50 && i<=59) { GET -= (GET * 0.10) }
    else if (i>=60 && i<=69) { GET -= (GET * 0.20) }
    else if (i>70) { GET -= (GET * 0.30) }
    return GET;
}

function calculo(){
    if (verificaCalcula()) {
        if (document.getElementById('pPesoDes').value == "" && document.getElementById('pImcDes').value == ""){
            var ipd = confirm("Tem certeza que não deseja calcular IMC/Peso desejado?");
            if (ipd==true){ calcular() }
        }
        else{ calcular() }
    } else { alert("Preencha todos os campos obrigatórios!") }
}

function calcular(){
    $('#pnNImprime').collapse('hide');
    $('#pn04').collapse('hide');
    $('#formulario').css({"opacity":"0","transition":"all .5s"});
    $('#pnResposta').collapse('show').css({"opacity":"1","transition":"all .5s"});

    r = 1;
    var sexo = 0, gest = 0;
    var nome = $('#pNome').val();   $("#pnRNome").html(nome);
    var idade = $('#pIdade').val(); $("#pnRIdade").html(idade + " anos");
    naf =  $('#pNivel').val(); if (naf == 1) { nva = "Leve" }  else if (naf == 2) { nva = "Moderada" }  else if (naf == 3) { nva = "Intensa" }
    $("#pnRNivel").html(nva);
    var peso = $('#pMassa').val(); $("#pnRMassa").html(peso + " Kg");
    var altura = $('#pEstrutura').val(); $("#pnREstatura").html(altura + " m");
    if ($("#pSexMasculino").is(':checked')) { sexo = 1; sx = "Masculino"; $('#cGest').css({"display":"none"}); }
    else if ($("#pSexFeminino").is(':checked')) { sexo = 2; sx = "Feminino"; }
    $("#pnRSexo").html(sx);
    if ($("#pGravidaS").is(':checked')) { gest = 1; gv = "Sim"; $('#cGest').css({"display":"block"}); }
    else if ($("#pGravidaN").is(':checked')) { gest = 2; gv = "Não"; $('#cGest').css({"display":"none"}); }

    var imc = peso / (altura * altura);
    if (imc < 18.5) {dimc = "Baixo peso";} else if (imc >= 18.5 && imc < 25) {dimc = "Peso Normal";} else if (imc >= 25 && imc < 30) {dimc = "Pré-obesidade";} else if (imc >= 30 && imc < 35) {dimc = "Obesidade Grau I";}else if (imc >= 35 && imc < 40) {dimc = "Obesidade Grau II";}else if (imc > 40) {dimc = "Obesidade Grau III";}
    $("#cIMC").html(parseFloat(imc.toFixed(2)));
    $("#dIMC").html(dimc);
    var gmb = calculaGMB(sexo, idade, peso, gest, naf);
    $("#cGMB").html(parseFloat(gmb.toFixed(2)));
    var GET = calculaGET(gmb, sexo, idade, naf);
    $("#cGET").html(parseFloat(GET.toFixed(2)));

    var imcd = $('#pImcDes').val();
    var pesod = $('#pPesoDes').val();
    var saldo = 0;
    if (imcd==""&&pesod==""){
        $('#pnDadosNut').collapse('hide');
    }
    else {
        $('#pnDadosNut').collapse('show');
        if (pesod != 0) {
            imcd = pesod / (altura*altura);
            pesod = imcd * (altura*altura);

        }
        else if (imcd != 0) {
            pesod = imcd * (altura*altura);
            imcd = pesod / (altura*altura);

        }
        $("#pnRIndice").html(parseFloat(imcd.toFixed(2)) + " Kg/m²");
        $("#pnRPeso").html(parseFloat(pesod.toFixed(2)) + " Kg");

        if (pesod > peso) {
            saldo = pesod - peso;
            $("#pnOpQuilos").html("Quantidade de quilos a ganhar: ");
            $("#pnRQuilos").html(parseFloat(saldo.toFixed(2)) + "Kg");
        }
        else if (pesod < peso) {
            saldo = peso - pesod;
            $("#pnOpQuilos").html("Quantidade de quilos a perder: ");
            $("#pnRQuilos").html(parseFloat(saldo.toFixed(2)) + "Kg");
        }
        else if ((pesod==peso) || (imcd==imc)) {
            $("#pnOpQuilos").html("Já atingiu o peso desejado!");
        }
    }
}

function recalculo(){
    r = 0;
    $('#pnNImprime').collapse('show');
    $('#pnResposta').collapse('hide').css({"opacity":"0","transition":"all .5s"});
    $('#formulario').css({"opacity":"1","transition":"all .5s"});
}

setTimeout(function(){
    $('#gif').css({"opacity":"0","transition":"all 1s"});
    $('#preloader').css({"opacity":"0","transition":"all 1s"});
    $('#content').css({"display":"block"});
    setTimeout(function(){
        $('#gif').css({"display":"none"});
        $('#preloader').css({"display":"none"});
    },100);
},3800);

setTimeout(function(){(setInterval('forms()',200))},3000);
var stat = 0;
var r = 0;
$(document).ready(function () { $('#formulario').collapse('show');$('#pnNImprime').collapse('show'); });

function verificaSexo() {
    if ($("#pSexFeminino").is(':checked')) {
        $('#pnGravida').collapse('show');
        if (stat>=5){
            $("#pGravidaS").prop("disabled", false);
            $("#pGravidaN").prop("disabled", false);
        }
        if (document.getElementById('pGravidaS').checked){
            $("#opIntensa").prop("disabled", true);
            if (document.getElementById('pNivel').value == 3){ document.getElementById('pNivel').value = 0 }
        }
        else{ $("#opIntensa").prop("disabled", false); }
    }
    if ($("#pSexMasculino").is(':checked')) {
        $('#pnGravida').collapse('hide');
        document.getElementById('pGravidaS').checked=false;
        document.getElementById('pGravidaN').checked=false;
        $("#opIntensa").prop("disabled", false)
    }
}

function verificaCalcula() {
    if (document.getElementById('pNome').value != "" && document.getElementById('pIdade').value != "" && r==0) {
        if (document.getElementById('pSexFeminino').checked) {
            if (document.getElementById('pMassa').value != "" && document.getElementById('pEstrutura').value != "" && document.getElementById('pNivel').value != "" && (document.getElementById('pGravidaS').checked || document.getElementById('pGravidaN').checked)){
                $('#pn04').collapse('show'); return true;
            }
            else { $('#pn04').collapse('hide'); return false; }
        }
        if (document.getElementById('pSexMasculino').checked) {
            if (document.getElementById('pMassa').value != "" && document.getElementById('pEstrutura').value != "" && document.getElementById('pNivel').value != ""){
                $('#pn04').collapse('show'); return true;
            }
            else { $('#pn04').collapse('hide'); return false; }
        }
    }
    else { $('#pn04').collapse('hide'); return false; }
}

function dadosEspeciais() {
    if (document.getElementById("pIdade").value != "") {
        var i = document.getElementById("pIdade").value;
        var c = "0";
        if (i >= 13 && i <= 15) { c = "13" }
        else if (i >= 16 && i <= 19) { c = "5" }
        else if (i >= 40 && i <= 49) { c = "-5" }
        else if (i >= 50 && i <= 59) { c = "-10" }
        else if (i >= 60 && i <= 70) { c = "-20" }
        else if (i > 70) { c = "-30" }
        if (c != "0") { $('#smCorrecao').collapse('show'); $("#spCorrecao").html(c + "%"); }
        else { $('#smCorrecao').collapse('hide'); }
    }
    if (document.getElementById("pSexMasculino").checked) {
        var naf = document.getElementById("pNivel").value;
        var c = 0;
        if (naf == 1) { c = "1,55" }
        else if (naf == 2) { c = "1,78" }
        else if (naf == 3) { c = "2,10" }
        if (c != "0") { $('#smFator').collapse('show'); $("#spFator").html(c);}
        else { $('#smFator').collapse('hide'); }
    }

    if (document.getElementById("pSexFeminino").checked) {
        var naf = document.getElementById("pNivel").value;
        var c = 0;
        if (naf == 1) { c = "1,56" }
        else if (naf == 2) { c = "1,64" }
        else if (naf == 3) { c = "1,82" }
        if (c != "0") { $('#smFator').collapse('show'); $("#spFator").html(c); }
        else { $('#smFator').collapse('hide'); }
    }
}

function forms(){
    switch (stat) {
        case 0:
            $("#pIdade").prop("disabled", true);
            $("#pSexMasculino").prop("disabled", true);
            $("#pSexFeminino").prop("disabled", true);
            $("#pGravidaS").prop("disabled", true);
            $("#pGravidaN").prop("disabled", true);
            $("#pMassa").prop("disabled", true);
            $("#pEstrutura").prop("disabled", true);
            $("#pNivel").prop("disabled", true);
            if (document.getElementById('pNome').value != "") { stat = 1; }
            verificaCalcula();
            break;
        case 1:
            $("#pIdade").prop("disabled", false);
            if (document.getElementById('pIdade').value != "") { stat = 2; }
            verificaCalcula();
            break;
        case 2:
            $("#pSexMasculino").prop("disabled", false);
            $("#pSexFeminino").prop("disabled", false);
            if (document.getElementById("pSexMasculino").checked || document.getElementById('pSexFeminino').checked) { stat = 3; }
            verificaCalcula();
            dadosEspeciais();
            break;
        case 3:
            $('#pn02').collapse('show');
            $("#pMassa").prop("disabled", false);
            if (document.getElementById('pMassa').value != "") { stat = 4; }
            verificaCalcula();
            dadosEspeciais();
            verificaSexo();
            break;
        case 4:
            $("#pEstrutura").prop("disabled", false);
            if (document.getElementById('pEstrutura').value != "") { stat = 5; }
            verificaCalcula();
            dadosEspeciais();
            verificaSexo();
            break;
        case 5:
            if (document.getElementById("pSexMasculino").checked) { $('#pn03').collapse('show') }
            if (document.getElementById("pSexFeminino").checked && (document.getElementById('pGravidaS').checked || document.getElementById('pGravidaN').checked)) { $('#pn03').collapse('show'); }
            $("#pNivel").prop("disabled", false);
            if (document.getElementById('pNivel').value != "") { stat = 6; }
            verificaCalcula();
            dadosEspeciais();
            verificaSexo();
            break;
        case 6:
            $('#pn05').collapse('show');
            verificaCalcula();
            dadosEspeciais();
            verificaSexo();
            break;
        default: stat=0;
    }
}

function Imprime() { window.print(); }